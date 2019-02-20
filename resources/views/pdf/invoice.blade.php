@extends('layouts.pdf')

@section('title')
	INVOICE G{{ sprintf("%05d", $order->id) }}
@endsection

@section('to')
	<br>
	<b>TO:</b><br>
	{{ $order->billing_name }}<br>
	{{ $order->billing_address }}
@endsection

@section('extra')
	Date: {{ $order->updated_at->format("jS M Y") }}
@endsection

@section('content')
	<table>
		<thead>
			<tr>
				<th style="padding: 10px 0; border-top: 2px solid black; border-bottom: 2px solid black">Name</th>
				<th style="padding: 10px 0; border-top: 2px solid black; border-bottom: 2px solid black">Qty</th>
				<th style="padding: 10px 0; border-top: 2px solid black; border-bottom: 2px solid black">Installation Type</th>
				<th style="padding: 10px 0; border-top: 2px solid black; border-bottom: 2px solid black">Installation Price (Per Unit)</th>
				<th style="padding: 10px 0; border-top: 2px solid black; border-bottom: 2px solid black">Price (Per Unit)</th>
				<th style="padding: 10px 0; border-top: 2px solid black; border-bottom: 2px solid black">Amount ({{ $order->is_std ? "USD" : "RM" }})</th>
			</tr>
		</thead>
		<tbody>
			@foreach($order->items as $item)
				<tr>
					<td style="padding-top:10px;">{{ $item->name }}</td>
					<td class="text-center" style="padding-top:10px;">{{ $item->qty }}</td>
					<td class="text-center" style="padding-top:10px;">{{ $item->installation_type }}</td>
					<td class="text-center" style="padding-top:10px;">{{ $item->installation_price }}</td>
					<td class="text-center" style="padding-top:10px;">{{ number_format($item->price, 2, ".", ",") }}</td>
					<td class="text-center" style="padding-top:10px;">{{ number_format(($item->price + $item->installation_price) * $item->qty, 2, ".", ",") }}</td>
				</tr>
			@endforeach
		</tbody>
		<tfoot>
			<tr>
				<td style="border-top:1px solid black"></td>
				<td style="border-top:1px solid black"></td>
				<td style="border-top:1px solid black"></td>
				<td style="border-top:1px solid black"></td>
				<td style="border-top:1px solid black"></td>
				<td style="padding: 15px 0;border-top:1px solid black;border-bottom: 3px solid black" class="text-center">
					<b>{{ number_format($order->total, 2, ".", ",") }}</b>
				</td>
			</tr>
		</tfoot>
@endsection