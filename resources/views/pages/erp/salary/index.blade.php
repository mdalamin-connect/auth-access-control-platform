@extends('layout.erp.app')
@section('title', 'Salary Management')
@section('style')
<style>
    .mirsaige-salary-container {
        padding: var(--mirsaige-space-md);
    }

    .mirsaige-salary-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: var(--mirsaige-space-md);
    }

    .mirsaige-salary-card {
        background: var(--mirsaige-dark-blue);
        border-radius: var(--mirsaige-radius-md);
        padding: var(--mirsaige-space-md);
        margin-bottom: var(--mirsaige-space-md);
        box-shadow: var(--mirsaige-shadow-sm);
        border: 1px solid rgba(255, 178, 62, 0.1);
    }

    .mirsaige-salary-status {
        display: inline-block;
        padding: var(--mirsaige-space-3xs) var(--mirsaige-space-sm);
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 500;
    }

    .status-paid {
        background-color: rgba(40, 167, 69, 0.2);
        color: #28a745;
    }

    .status-pending {
        background-color: rgba(108, 117, 125, 0.2);
        color: #6c757d;
    }

    .status-cancelled {
        background-color: rgba(220, 53, 69, 0.2);
        color: #dc3545;
    }

    .mirsaige-salary-amount {
        font-weight: 600;
        color: var(--mirsaige-accent);
    }

    @media (max-width: 768px) {
        .mirsaige-salary-header {
            flex-direction: column;
            align-items: flex-start;
            gap: var(--mirsaige-space-sm);
        }
    }
</style>
@endsection

@section('page')
<div class="mirsaige-salary-container">
    <div class="mirsaige-salary-header">
        <div>
            <h1 class="mirsaige-app-breadcrumbs-title">Salary Management</h1>
            <div class="mirsaige-app-breadcrumbs">
                <div class="mirsaige-app-breadcrumb">
                    <a href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-house"></i> Home</a>
                </div>
                <div class="mirsaige-app-breadcrumb divider">
                    <i class="fa-solid fa-angle-right"></i>
                </div>
                <div class="mirsaige-app-breadcrumb">
                    <a href="{{ route('salaries.index') }}" class="active">Salaries</a>
                </div>
            </div>
        </div>
        
        @if(in_array($user_role_id, [1, 2]))
        <div>
            <a href="{{ route('salary.report') }}" class="mirsaige-app-breadcrumbs-btn">
                <i class="fa-solid fa-file-lines"></i> <span class="action-text">Salary Report</span>
            </a>
        </div>
        @endif
    </div>

    <div class="mirsaige-salary-card">
        <div class="table-responsive">
            <table class="mirsaige-app-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Employee</th>
                        <th>Period</th>
                        <th>Payment Date</th>
                        <th>Amount</th>
                        <th>Method</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($salaries as $salary)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $salary->employee->name }}</td>
                        <td>
                            {{ date('F', mktime(0, 0, 0, $salary->month, 1)) }} {{ $salary->year }}
                        </td>
                        <td>{{ date('d M Y', strtotime($salary->payment_date)) }}</td>
                        <td class="mirsaige-salary-amount">
                            {{ number_format($salary->net_salary, 2) }}
                        </td>
                        <td>{{ ucfirst(str_replace('_', ' ', $salary->payment_method)) }}</td>
                        <td>
                            <span class="mirsaige-salary-status status-{{ $salary->status }}">
                                {{ ucfirst($salary->status) }}
                            </span>
                        </td>
                        <td>
                            <div class="mirsaige-users-actions">
                                <a href="{{ route('salaries.show', $salary->id) }}" class="mirsaige-users-action-btn view">
                                    <i class="fa-solid fa-eye"></i> <span class="action-text">View</span>
                                </a>
                                <a href="{{ route('salaries.payslip', $salary->id) }}" class="mirsaige-users-action-btn edit">
                                    <i class="fa-solid fa-file-invoice"></i> <span class="action-text">Payslip</span>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center">No salary records found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        {!! pagination($salaries) !!}
    </div>
</div>
@endsection