@extends('layout.erp.app')

@section('page')
    <div class="container">
        <h1>Add Salary</h1>
        <form action="{{ route('salaries.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="employee_id">Employee</label>
                <select name="employee_id" class="form-control" required>
                    @foreach ($employees as $employee)
                        <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="basic_salary">Basic Salary</label>
                <input type="number" name="basic_salary" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="house_rent">House Rent</label>
                <input type="number" name="house_rent" class="form-control">
            </div>
            <div class="form-group">
                <label for="medical_allowance">Medical Allowance</label>
                <input type="number" name="medical_allowance" class="form-control">
            </div>
            <div class="form-group">
                <label for="transport_allowance">Transport Allowance</label>
                <input type="number" name="transport_allowance" class="form-control">
            </div>
            <div class="form-group">
                <label for="other_allowance">Other Allowance</label>
                <input type="number" name="other_allowance" class="form-control">
            </div>
            <div class="form-group">
                <label for="effective_from">Effective From</label>
                <input type="date" name="effective_from" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
