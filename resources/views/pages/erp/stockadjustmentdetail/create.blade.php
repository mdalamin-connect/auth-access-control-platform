<?php

?>
@extends('layout.erp.app')
@section('title','Create StockAdjustmentDetail')
@section('style')


@endsection
@section('page')
<main>
	<div style="justify-content:space-between; display:flex; padding:4px">
		<div>
			<ul class="breadcrumbs">
				<li><a class="btn btn-light" href="{{ route('admin.dashboard') }}">Home </a></li>
				<li><a class="btn btn-light" href="#">Stock Adjustment Details</a></li>
				<li><a class="btn btn-light" href="{{ route('stockadjustmentdetails.create') }}">Add Stock Adjustment Details</a></li>
			</ul>
		</div>
		<div>
			<a href="{{ route('stockadjustments.index') }}" class="btn btn-info">Manage Stock Adjustment Details</a>
		</div>
	</div>
<form action="{{route('stockadjustmentdetails.store')}}" method ="post" enctype="multipart/form-data">
@csrf
<div class="row mb-3">
	<label for="stock_adjustment_id" class="col-sm-2 col-form-label">Stock_Adjustment </label>
	<div class="col-sm-10">
		<select class="form-control" name="stock_adjustment_id" id="stock_adjustment_id">
			@foreach($stock_adjustments as $stock_adjustment)
				<option value="{{$stock_adjustment->id}}">{{$stock_adjustment->name}}</option>
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="product_id" class="col-sm-2 col-form-label">Product</label>
	<div class="col-sm-10">
		<select class="form-control" name="product_id" id="product_id">
			@foreach($products as $product)
				<option value="{{$product->id}}">{{$product->name}}</option>
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="qty" class="col-sm-2 col-form-label">Qty</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="qty" id="qty" placeholder="Qty">
	</div>
</div>
<div class="row mb-3">
	<label for="price" class="col-sm-2 col-form-label">Price</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="price" id="price" placeholder="Price">
	</div>
</div>

<button type="submit" class="btn btn-primary">Save</button>
</form>
</main>
@endsection
@section('script')


@endsection
