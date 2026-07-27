<?php

?>
@extends('layout.erp.app')
@section('title', 'Edit Stock Adjustment')
@section('style')


@endsection
@section('page')
    <main>
        <div style="justify-content:space-between; display:flex; padding:4px">
            <div>
                <ul class="breadcrumbs">
                    <li><a class="btn btn-light" href="{{ route('admin.dashboard') }}">Home </a></li>
                    <li><a class="btn btn-light" href="#">Stocks</a></li>
                    <li><a class="btn btn-light" href="{{ route('stockadjustments.create') }}">Edit Stock Adjustments</a></li>
                </ul>
            </div>
            <div>
                <a href="{{ route('stockadjustments.index') }}" class="btn btn-info">Manage Stock Adjustments</a>
            </div>
        </div>
        <form action="{{ route('stockadjustments.update',$stockadjustment) }}" method ="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label for="user_id" class="col-sm-2 col-form-label">User</label>
                <div class="col-sm-10">
                    <select class="form-control" name="user_id" id="user_id">
                        @foreach ($users as $user)
                            @if ($user->id == $stockadjustment->user_id)
                                <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                            @else
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="stock_adjustment_type_id" class="col-sm-2 col-form-label">Stock_Adjustment_Type</label>
                <div class="col-sm-10">
                    <select class="form-control" name="stock_adjustment_type_id" id="stock_adjustment_type_id">
                        @foreach ($stock_adjustment_types as $stock_adjustment_type)
                            @if ($stock_adjustment_type->id == $stockadjustment->stock_adjustment_type_id)
                                <option value="{{ $stock_adjustment_type->id }}" selected>
                                    {{ $stock_adjustment_type->name }}</option>
                            @else
                                <option value="{{ $stock_adjustment_type->id }}">{{ $stock_adjustment_type->name }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="remark" class="col-sm-2 col-form-label">Remark</label>
                <div class="col-sm-10">
                    <input type = "text" class="form-control" name="remark" value="{{ $stockadjustment->remark }}"
                        id="remark" placeholder="Remark">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Save Change</button>
        </form>
    </main>
@endsection
@section('script')


@endsection
