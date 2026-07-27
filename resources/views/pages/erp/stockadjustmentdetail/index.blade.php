<?php

?>
@extends('layout.erp.app')
@section('title','Manage StockAdjustmentDetail')
@section('style')


@endsection
@section('page')
<main>
	<div style="justify-content:space-between; display:flex; padding:4px">
		<div>
			<ul class="breadcrumbs">
				<li><a class="btn btn-light" href="{{ route('admin.dashboard') }}">Home </a></li>
				<li><a class="btn btn-light" href="#">Status</a></li>
				<li><a class="btn btn-light" href="{{ route('stockadjustmentdetails.index') }}">Manage Stock Adjustment Details</a></li>
			</ul>
		</div>
		<div>
			<a href="{{ route('stockadjustmentdetails.create') }}" class="btn btn-info">Add New Stock</a>
		</div>
	</div>
<table class="table table-hover text-nowrap">
	<thead>
		<tr>
			<th>Id</th>
			<th>Stock Adjustment</th>
			<th>Product</th>
			<th>Qty</th>
			<th>Price</th>
		

			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	@foreach($stockadjustmentdetails as $stockadjustmentdetail)
		<tr>
			<td>{{$stockadjustmentdetail->id}}</td>
			<td>{{$stockadjustmentdetail->stock_adjustment_id}}</td>
			<td>{{$stockadjustmentdetail->product_id}}</td>
			<td>{{$stockadjustmentdetail->qty}}</td>
			<td>{{$stockadjustmentdetail->price}}</td>
			

			<td>
			<form action = "{{route('stockadjustmentdetails.destroy',$stockadjustmentdetail->id)}}" method = "post">
				<a class= 'btn btn-primary' href = "{{route('stockadjustmentdetails.show',$stockadjustmentdetail->id)}}">View</a>
				<a class= 'btn btn-success' href = "{{route('stockadjustmentdetails.edit',$stockadjustmentdetail->id)}}"> Edit </a>
				@method('DELETE')
				@csrf
				<input type = "submit" class="btn btn-danger" name = "delete" value = "Delete" />
			</form>
			</td>
		</tr>
	@endforeach
	</tbody>
</table>
<main>
@endsection
@section('script')


@endsection
