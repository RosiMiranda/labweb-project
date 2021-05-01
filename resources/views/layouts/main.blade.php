
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- font -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="../../css/main.css" />
        <link rel="stylesheet" href="../../css/style.css">
        <!-- google icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">


        <title>Splendid</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg" style="background-color:#BA2E66;">
            <div class="container-fluid">
                @auth
                <li class="nav-item dropdown btn main-btn">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Bienvenido </br> {{ auth()->user()-> name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('user.profile')}}">My Profile</a></li>
                        <li><a class="dropdown-item" href="{{ route('splendid.index')}}">My Products</a></li>
                        <li><a class="dropdown-item" href="{{ route('order.index')}}">My Orders</a></li>
                        <li><a class="dropdown-item" href="{{ route('auth.logout')}}">Log out</a></li>
                    </ul>
                </li>
                @endauth
                @if (!Auth::check())
                <a class="button primary" href="{{ route('auth.login')}}"> Sign in</a>
                @endif

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon material-icons">table_rows</span>

                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('home.index') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('store.index') }}" >Store</a>
                        </li>
                        <li class="nav-item cart-icon">
                            <a class="nav-link" href="{{ route('user.cart') }}" >ShoppingCart</a>
                            <span class="material-icons">
                                shopping_cart
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div>
            @yield('content')
        </div>

        <!-- Optional JavaScript -->
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        @stack('layout_end_body')
    </body>
</html>

