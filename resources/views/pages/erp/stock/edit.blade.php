@extends('layout.erp.app')
@section('title', 'Edit Stock')
@section('style')


@endsection
@section('page')
    <main>
        <div style="justify-content:space-between; display:flex; padding:4px">
            <div>
                <ul class="breadcrumbs">
                    <li><a class="btn btn-light" href="{{ route('admin.dashboard') }}">Home </a></li>
                    <li><a class="btn btn-light" href="#">Stocks</a></li>
                    <li><a class="btn btn-light" href="{{ route('stocks.create') }}">Edit Stocks</a></li>
                </ul>
                
            </div>
            <div>
                <a href="{{ route('stocks.index') }}" class="btn btn-info">Manage Stocks</a>
            </div>
        </div>
        <form action="{{ route('stocks.update', $stock) }}" method ="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label for="product_id" class="col-sm-2 col-form-label">Product</label>
                <div class="col-sm-10">
                    <select class="form-control" name="product_id" id="product_id">
                        @foreach ($products as $product)
                            @if ($product->id == $stock->product_id)
                                <option value="{{ $product->id }}" selected>{{ $product->name }}</option>
                            @else
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="qty" class="col-sm-2 col-form-label">Qty</label>
                <div class="col-sm-10">
                    <input type = "text" class="form-control" name="qty" value="{{ $stock->qty }}" id="qty"
                        placeholder="Qty">
                </div>
            </div>
            <div class="row mb-3">
                <label for="transaction_type_id" class="col-sm-2 col-form-label">Transaction_Type</label>
                <div class="col-sm-10">
                    <select class="form-control" name="transaction_type_id" id="transaction_type_id">
                        @foreach ($transaction_types as $transaction_type)
                            @if ($transaction_type->id == $stock->transaction_type_id)
                                <option value="{{ $transaction_type->id }}" selected>{{ $transaction_type->name }}</option>
                            @else
                                <option value="{{ $transaction_type->id }}">{{ $transaction_type->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="remark" class="col-sm-2 col-form-label">Remark</label>
                <div class="col-sm-10">
                    <input type = "text" class="form-control" name="remark" value="{{ $stock->remark }}" id="remark"
                        placeholder="Remark">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Save Change</button>
        </form>
    </main>
@endsection
@section('script')


@endsection
