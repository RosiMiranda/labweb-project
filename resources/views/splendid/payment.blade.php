@extends('layouts.main')

@section('content')
<div class="container mt-3 mb-3 align-center" style="min-height:80vh">
    <div class="row">
        <div class="col-6">

                <div class="card">
                <div class="col-12">
                    <h3>ID Orden: {{$order->id}}</h3>
                    <div class="row">
                        <h3 style="margin:0;">Vendedor: </h3>
                        <p style="margin:0;">{{$seller->name}}</p>
                        <p style="margin:0;">{{$seller->address}}</p>
                    </div>
                </div>
                <div class="col-12 mt-5 mb-3" style="padding:0;">
                    @foreach ($products as $product)
                    <div class="card mt-1 product-order">
                        <div class="row">
                            <div class="col-4">
                                <img src="../uploads/products/{{$product->file_path}}" class="" alt="..." style="width: 50%;">
                            </div>
                            <div class="col-4 align-center">
                                <h3 style="margin:0;">{{$product->description }}</h3>
                            </div>
                            <div class="col-4 align-center">
                                <h3 style="margin:0;"> ${{$product->price }}</h3>
                            </div>
                        </div>
                    </div>
                    @endforeach

                <div class="col-12 mt-3 mb-3" style="padding:0;">
                    <h2>Total: ${{$order->total}}</h2>
                </div></div>

            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <form method="POST" action="{{ route('purchase', ['order'=>$order->id]) }}" class="card-form mt-3 mb-3" >
                    @csrf
                    <input type="hidden" name="payment_method" class="payment-method">
                    <input class="StripeElement mb-3" name="card_holder_name" placeholder="Titular de la tarjeta" required>
                    <div class="col">
                        <div id="card-element"></div>
                    </div>
                    <div id="card-errors" role="alert"></div>
                    <div class="form-group mt-3">
                        <button type="enviar" class="button primary pay">
                            Comprar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://js.stripe.com/v3/"></script>
<script>
    let stripe = Stripe("{{ env('STRIPE_KEY') }}")
    let elements = stripe.elements()
    let style = {
        base: {
            color: '#32325d',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    }
    let card = elements.create('card', {style: style})
    card.mount('#card-element');

    let paymentMethod = null;
    $('.card-form').on('submit', function (e) {
        $('button.pay').attr('disabled', true)
        if (paymentMethod) {
            return true
        }
        stripe.confirmCardSetup(
            "{{ $intent->client_secret }}",
            {
                payment_method: {
                    card: card,
                    billing_details: {name: $('.card_holder_name').val()},
                }
            }
        ).then(function (result) {
            if (result.error) {
                $('#card-errors').text(result.error.message)
                $('button.pay').removeAttr('disabled')
            } else {
                paymentMethod = result.setupIntent.payment_method
                $('.payment-method').val(paymentMethod)
                $('.card-form').submit()
            }
        })
        return false
    })
</script>

@endsection
