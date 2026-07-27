<?php

?>
@extends('layout.erp.app')
@section('title','Show Stock Adjustment')
@section('style')


@endsection
@section('page')
<main>
	<div style="justify-content:space-between; display:flex; padding:4px">
		<div>
			<ul class="breadcrumbs">
				<li><a class="btn btn-light" href="{{ route('admin.dashboard') }}">Home </a></li>
				<li><a class="btn btn-light" href="#">Stocks</a></li>
				<li><a class="btn btn-light" href="{{ route('stockadjustments.create') }}">Details Stock Adjustment</a></li>
			</ul>
		</div>
		<div>
			<a href="{{ route('stockadjustments.index') }}" class="btn btn-info">Manage Stock Adjustments</a>
		</div>
	</div>
<table class='table table-striped text-nowrap'>
<tbody>
		<tr><th>Id</th><td>{{$stockadjustment->id}}</td></tr>
		<tr><th>Name</th><td>{{$stockadjustment->name}}</td></tr>
		<tr><th>User</th><td>{{$stockadjustment->user_id}}</td></tr>
		<tr><th>Stock Adjustment Type</th><td>{{$stockadjustment->stock_adjustment_type_id}}</td></tr>
		<tr><th>Remark</th><td>{{$stockadjustment->remark}}</td></tr>
		<tr><th>Created At</th><td>{{$stockadjustment->created_at}}</td></tr>
		<tr><th>Updated At</th><td>{{$stockadjustment->updated_at}}</td></tr>

</tbody>
</table>
<main>
@endsection
@section('script')


@endsection
