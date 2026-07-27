<?php

?>
@extends('layout.erp.app')
@section('title', 'Create Stock Adjustment')
@section('style')


@endsection
@section('page')
    <main>
        <div style="justify-content:space-between; display:flex; padding:4px">
            <div>
                <ul class="breadcrumbs">
                    <li><a class="btn btn-light" href="{{ route('admin.dashboard') }}">Home </a></li>
                    <li><a class="btn btn-light" href="#">Stocks Adjustment</a></li>
                    <li><a class="btn btn-light" href="{{ route('stockadjustments.create') }}">Add Stock Adjustment</a></li>
                </ul>
            </div>
            <div>
                <a href="{{ route('stockadjustments.index') }}" class="btn btn-info">Manage Stock Adjustment</a>
            </div>
        </div>

        <form action="{{ route('stockadjustments.store') }}" method ="post" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <label for="user_id" class="col-sm-2 col-form-label">User</label>
                <div class="col-sm-10">
                    <select class="form-control" name="user_id" id="user_id">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="stock_adjustment_type_id" class="col-sm-2 col-form-label">Stock_Adjustment_Type</label>
                <div class="col-sm-10">
                    <select class="form-control" name="stock_adjustment_type_id" id="stock_adjustment_type_id">
                        @foreach ($stock_adjustment_types as $stock_adjustment_type)
                            <option value="{{ $stock_adjustment_type->id }}">{{ $stock_adjustment_type->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="remark" class="col-sm-2 col-form-label">Remark</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="remark" id="remark" placeholder="Remark"></textarea>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </main>
@endsection
@section('script')


@endsection