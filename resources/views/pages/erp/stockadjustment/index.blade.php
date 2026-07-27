<?php

?>
@extends('layout.erp.app')
@section('title','Manage Stock Adjustment')
@section('style')


@endsection
@section('page')
<main>
	<div style="justify-content:space-between; display:flex; padding:4px">
		<div>
			<ul class="breadcrumbs">
				<li><a class="btn btn-light" href="{{ route('admin.dashboard') }}">Home </a></li>
				<li><a class="btn btn-light" href="#">Status</a></li>
				<li><a class="btn btn-light" href="{{ route('stockadjustments.index') }}">Manage Stock Adjustments</a></li>
			</ul>
		</div>
		<div>

		</div>
	</div>
<table class="table table-hover text-nowrap">
	<thead>
		<tr>
			<th>Id</th>
			<th>Product</th>
			<th>Qty</th>
			<th>Uom</th>

		</tr>
	</thead>
	<tbody>
	@foreach($stockadjustments as $stockadjustment)
		<tr>
			<td>{{$stockadjustment->id}}</td>
			<td>{{$stockadjustment->product->name}}</td>
			<td>{{$stockadjustment->total_quantity}}</td>
			<td>{{$stockadjustment->uom->name}}</td>
		</tr>
	@endforeach
	</tbody>
</table>
<main>
@endsection
@section('script')


@endsection
