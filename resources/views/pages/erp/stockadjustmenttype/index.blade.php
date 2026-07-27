<?php

?>
@extends('layout.erp.app')
@section('title','Manage StockAdjustmentType')
@section('style')


@endsection
@section('page')
<main>
	<div style="justify-content:space-between; display:flex; padding:4px">
		<div>
			<ul class="breadcrumbs">
				<li><a class="btn btn-light" href="{{ route('admin.dashboard') }}">Home </a></li>
				<li><a class="btn btn-light" href="#">Status</a></li>
				<li><a class="btn btn-light" href="{{ route('stockadjustmenttypes.index') }}">Manage Stock Adjustment Types</a></li>
			</ul>
		</div>
		<div>
			<a href="{{ route('stockadjustmenttypes.create') }}" class="btn btn-info">Add New Stock</a>
		</div>
	</div>
<table class="table table-hover text-nowrap">
	<thead>
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th>Description</th>
		

			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	@foreach($stockadjustmenttypes as $stockadjustmenttype)
		<tr>
			<td>{{$stockadjustmenttype->id}}</td>
			<td>{{$stockadjustmenttype->name}}</td>
			<td>{{$stockadjustmenttype->description}}</td>
			

			<td>
			<form action = "{{route('stockadjustmenttypes.destroy',$stockadjustmenttype->id)}}" method = "post">
				<a class= 'btn btn-primary' href = "{{route('stockadjustmenttypes.show',$stockadjustmenttype->id)}}">View</a>
				<a class= 'btn btn-success' href = "{{route('stockadjustmenttypes.edit',$stockadjustmenttype->id)}}"> Edit </a>
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
