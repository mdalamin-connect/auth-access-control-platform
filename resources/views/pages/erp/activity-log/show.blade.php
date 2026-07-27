
@extends('layout.erp.app')
@section('title','Show Activity Log')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('activity-log.index')}}">Manage</a>
<table class='table table-striped text-nowrap'>
<tbody>
		<tr><th>Id</th><td>{{$activitylog->id}}</td></tr>
		<tr><th>User Id</th><td>{{$activitylog->user_id}}</td></tr>
		<tr><th>Activity Type</th><td>{{$activitylog->activity_type}}</td></tr>
		<tr><th>Created At</th><td>{{$activitylog->created_at}}</td></tr>
		<tr><th>Updated At</th><td>{{$activitylog->updated_at}}</td></tr>

</tbody>
</table>
@endsection
@section('script')


@endsection
