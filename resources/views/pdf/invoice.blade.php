@extends('layouts.pdf')

@section('title')
	INVOICE G{{ sprintf("%05d", $order->id) }}
@endsection

@section('to')
	<br>
	<b>Biller Information</b><br>
	<b>Name:</b> {{ $order->billing_name }}<br>
	@if($order->billing_company_name) <b>Company name:</b> {{$order->billing_company_name}} @endif
	<b>Address</b><br>
	{{ $order->billing_address }}, {{$order->billing_city}}, <br>
	{{ $order->billing_postcode }}, {{ $order->billing_state}} <br>
	<b>Phone: </b>{{$order->billing_phone}}<br>
@endsection

@section('extra')
	Date: {{ $order->updated_at->format("jS M Y") }}
	<br>
	<b>Order Information</b><br>
	<b>Billplz No. </b> {{ $order->billplz_bill_id }}<br>
	<b>Pickup Option: </b> {{ $order->pickup }}
	<br>
	<br>
	<br>
	<div style="padding-right: 45px">
		<b>Shipment Information</b><br>
		<b>Name:</b> {{ $order->shipping_name }}<br>
		@if($order->shipping_company_name) <b>Company name:</b> {{$order->shipping_company_name}} @endif
		<b>Address</b><br>
		{{ $order->shipping_address }}, {{$order->shipping_city}}, <br>
		{{ $order->shipping_postcode }}, {{ $order->shipping_state}} <br>
		<b>Phone: </b>{{$order->shipping_phone}}
	</div>
@endsection

@section('content')
	<table>
		<thead>
			<tr>
				<th style="padding: 10px 0; border-top: 2px solid black; border-bottom: 2px solid black">Name</th>
				<th style="padding: 10px 0; border-top: 2px solid black; border-bottom: 2px solid black">Model</th>
				<th style="padding: 10px 0; border-top: 2px solid black; border-bottom: 2px solid black">Qty</th>
				<th style="padding: 10px 0; border-top: 2px solid black; border-bottom: 2px solid black">Installation Type</th>
				<th style="padding: 10px 0; border-top: 2px solid black; border-bottom: 2px solid black">Installation Price (Unit)</th>
				<th style="padding: 10px 0; border-top: 2px solid black; border-bottom: 2px solid black">Price (Unit)</th>
				<th style="padding: 10px 0; border-top: 2px solid black; border-bottom: 2px solid black">Amount ({{ $order->is_std ? "USD" : "RM" }})</th>
			</tr>
		</thead>
		<tbody>
			@foreach($order->items as $item)
				<tr>
					<td style="padding-top:10px;">{{ $item->name }}</td>
					<td style="padding-top:10px;">{{ $item->model }}</td>
					<td class="text-center" style="padding-top:10px;">{{ $item->qty }}</td>
					<td class="text-center" style="padding-top:10px;">{{ $item->installation_type }}</td>
					<td class="text-center" style="padding-top:10px;">{{ $item->installation_price }}</td>
					<td class="text-center" style="padding-top:10px;">{{ number_format($item->price, 2, ".", ",") }}</td>
					<td class="text-center" style="padding-top:10px;">{{ number_format(($item->price + $item->installation_price) * $item->qty, 2, ".", ",") }}</td>
				</tr>
			@endforeach
			@if ($order->shipping_price)
				<tr>
					<td>Delivery</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td class="text-center" style="padding-top:10px;">
						<b>{{ number_format($order->shipping_price, 2, ".", ",") }}</b>
					</td>
				</tr>
			@endif
			<tr>
				<td style="border-top:1px solid black"></td>
				<td style="border-top:1px solid black"></td>
				<td style="border-top:1px solid black"></td>
				<td style="border-top:1px solid black"></td>
				<td style="border-top:1px solid black"></td>
				<td style="border-top:1px solid black"></td>
				<td style="padding: 15px 0;border-top:1px solid black;border-bottom: 3px solid black" class="text-center">
					<b>{{ number_format($order->total, 2, ".", ",") }}</b>
				</td>
			</tr>
		</tbody>
	</table>
@endsection