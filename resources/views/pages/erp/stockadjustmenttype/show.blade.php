<?php

?>
@extends('layout.erp.app')
@section('title','Show StockAdjustmentType')
@section('style')


@endsection
@section('page')
<main>
	<div style="justify-content:space-between; display:flex; padding:4px">
		<div>
			<ul class="breadcrumbs">
				<li><a class="btn btn-light" href="{{ route('admin.dashboard') }}">Home </a></li>
				<li><a class="btn btn-light" href="#">Stocks</a></li>
				<li><a class="btn btn-light" href="{{ route('stockadjustmenttypes.create') }}">Stock Adjustment Type Details</a></li>
			</ul>
		</div>
		<div>
			<a href="{{ route('stockadjustmenttypes.index') }}" class="btn btn-info">Manage Stock Adjustment Type Details</a>
		</div>
	</div>
<table class='table table-striped text-nowrap'>
<tbody>
		<tr><th>Id</th><td>{{$stockadjustmenttype->id}}</td></tr>
		<tr><th>Name</th><td>{{$stockadjustmenttype->name}}</td></tr>
		<tr><th>Description</th><td>{{$stockadjustmenttype->description}}</td></tr>
		<tr><th>Created At</th><td>{{$stockadjustmenttype->created_at}}</td></tr>
		<tr><th>Updated At</th><td>{{$stockadjustmenttype->updated_at}}</td></tr>

</tbody>
</table>
<main>
@endsection
@section('script')


@endsection
