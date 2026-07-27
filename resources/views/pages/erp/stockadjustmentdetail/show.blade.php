<?php

?>
@extends('layout.erp.app')
@section('title','Show StockAdjustmentDetail')
@section('style')


@endsection
@section('page')
<main>
	<div style="justify-content:space-between; display:flex; padding:4px">
		<div>
			<ul class="breadcrumbs">
				<li><a class="btn btn-light" href="{{ route('admin.dashboard') }}">Home </a></li>
				<li><a class="btn btn-light" href="#">Stocks</a></li>
				<li><a class="btn btn-light" href="{{ route('stockadjustmentdetails.create') }}">Details Stock Adjustment Details</a></li>
			</ul>
		</div>
		<div>
			<a href="{{ route('stockadjustmentdetails.index') }}" class="btn btn-info">Manage Stock Adjustment Details </a>
		</div>
	</div>
<table class='table table-striped text-nowrap'>
<tbody>
		<tr><th>Id</th><td>{{$stockadjustmentdetail->id}}</td></tr>
		<tr><th>Stock Adjustment</th><td>{{$stockadjustmentdetail->stock_adjustment_id}}</td></tr>
		<tr><th>Product</th><td>{{$stockadjustmentdetail->product_id}}</td></tr>
		<tr><th>Qty</th><td>{{$stockadjustmentdetail->qty}}</td></tr>
		<tr><th>Price</th><td>{{$stockadjustmentdetail->price}}</td></tr>
		<tr><th>Created At</th><td>{{$stockadjustmentdetail->created_at}}</td></tr>
		<tr><th>Updated At</th><td>{{$stockadjustmentdetail->updated_at}}</td></tr>

</tbody>
</table>
<main>
@endsection
@section('script')


@endsection
