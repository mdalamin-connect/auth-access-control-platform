
@extends('layout.erp.app')
@section('title','Create ActivityLog')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('activity-log.index')}}">Manage</a>
<form action="{{route('activity-log.store')}}" method ="post" enctype="multipart/form-data">
@csrf
<div class="row mb-3">
	<label for="user_id" class="col-sm-2 col-form-label">User</label>
	<div class="col-sm-10">
		<select class="form-control" name="user_id" id="user_id">
			@foreach($users as $user)
				<option value="{{$user->id}}">{{$user->name}}</option>
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="activity_type" class="col-sm-2 col-form-label">Activity Type</label>
	<div class="col-sm-10">
		<textarea class="form-control" name="activity_type" id="activity_type" placeholder="Activity Type"></textarea>
	</div>
</div>

<button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection
@section('script')


@endsection
