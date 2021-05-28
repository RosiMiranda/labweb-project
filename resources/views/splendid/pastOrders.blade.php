@extends('layouts.main')

@section('content')
<h1 class="title">Ordenes entregadas</h1>
    <div class="container arrows" style="width: 50%;">
        <h4 style="opacity:0%;">hola</h4>
    </div>
<div class="container align-center mt-3" style="min-height:80vh;">
													<div class="table-wrapper">
														<table>
															<thead>
																<tr>
																	<th>Order</th>
																	<th>Total</th>
																	<th>ststus</th>
																</tr>
															</thead>
															<tbody>
															@foreach ($orders as $order)
																<tr>
																	<td>{{$order->id}}</td>
																	<td>{{$order->total}}</td>
																	<td>entregado: {{$order->status}}</td>
																</tr>
															@endforeach
															</tbody>
														</table>
													</div>											
</div>
@endsection
