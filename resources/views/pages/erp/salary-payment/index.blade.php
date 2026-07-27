@extends('layout.erp.app')

@section('title', 'Salary Payments')

@section('page')
<div class="content-wrapper">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Salary Payments</h3>
            @can('process_payment')
            <a href="{{ route('hr.salary-payments.create') }}" class="btn btn-primary">Process Payment</a>
            @endcan
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Employee</th>
                            <th>Month/Year</th>
                            <th>Amount</th>
                            <th>Payment Method</th>
                            <th>Paid On</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($payments as $payment)
                        <tr>
                            <td>{{ $payment->id }}</td>
                            <td>{{ $payment->employee->name }}</td>
                            <td>{{ $payment->month }} {{ $payment->year }}</td>
                            <td>{{ number_format($payment->paid_amount, 2) }}</td>
                            <td>{{ ucfirst(str_replace('_', ' ', $payment->payment_method)) }}</td>
                            <td>{{ $payment->created_at->format('d M, Y') }}</td>
                            <td>
                                <a href="{{ route('hr.salary-payments.show', $payment->id) }}" class="btn btn-sm btn-info">View</a>
                                <a href="{{ route('hr.salary-payments.slip', $payment->id) }}" class="btn btn-sm btn-primary">Slip</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                {{ $payments->links() }}
            </div>
        </div>
    </div>
</div>
@endsection