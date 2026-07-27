@extends('layout.erp.app')
@section('title', 'Manage Leaves')
@section('style')
<style>
    /* Base Styles */
    .mirsaige-leaves-container {
        padding: var(--mirsaige-space-md);
        color: var(--mirsaige-text);
        max-width: 100%;
        overflow-x: hidden;
    }

    /* Header Section */
    .mirsaige-leaves-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: var(--mirsaige-space-sm);
        margin-bottom: var(--mirsaige-space-md);
    }

    /* Table Container */
    .mirsaige-leaves-table-wrapper {
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        position: relative;
    }

    .mirsaige-leaves-table-container {
        border-radius: 8px;
        min-width: 100%;
    }

    /* Table Styles */
    .mirsaige-leaves-table {
        width: 100%;
        border-collapse: collapse;
    }

    .mirsaige-leaves-table thead {
        background: var(--mirsaige-darker-blue);
    }

    .mirsaige-leaves-table th {
        color: var(--mirsaige-accent);
        padding: var(--mirsaige-space-sm);
        text-align: center;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.8rem;
        letter-spacing: 0.5px;
        border-bottom: 1px solid rgba(255, 178, 62, 0.1);
        white-space: nowrap;
    }

    .mirsaige-leaves-table td {
        padding: var(--mirsaige-space-sm);
        color: var(--mirsaige-text);
        border-bottom: 1px solid rgba(255, 178, 62, 0.05);
        font-size: 0.9rem;
        vertical-align: middle;
    }

    .mirsaige-leaves-table tr:last-child td {
        border-bottom: none;
    }

    .mirsaige-leaves-table tr:hover td {
        background: rgba(255, 178, 62, 0.05);
        color: var(--mirsaige-white);
    }

    /* Status Badge */
    .mirsaige-status-badge {
        display: inline-block;
        padding: var(--mirsaige-space-3xs) var(--mirsaige-space-xs);
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 500;
        text-transform: capitalize;
    }

    .mirsaige-status-badge.pending {
        background-color: rgba(255, 193, 7, 0.2);
        color: #ffc107;
    }

    .mirsaige-status-badge.approved {
        background-color: rgba(40, 167, 69, 0.2);
        color: #28a745;
    }

    .mirsaige-status-badge.rejected {
        background-color: rgba(220, 53, 69, 0.2);
        color: #dc3545;
    }

    /* Action Buttons */
    .mirsaige-leaves-actions {
        display: flex;
        gap: var(--mirsaige-space-2xs);
        flex-wrap: nowrap;
    }

    .mirsaige-leaves-action-btn {
        padding: var(--mirsaige-space-3xs) var(--mirsaige-space-2xs);
        border-radius: 4px;
        font-size: 0.8rem;
        font-weight: 500;
        transition: all 0.2s ease;
        border: none;
        display: inline-flex;
        align-items: center;
        gap: var(--mirsaige-space-3xs);
        cursor: pointer;
        white-space: nowrap;
        min-width: 30px;
        justify-content: center;
    }

    .mirsaige-leaves-action-btn.view {
        background: var(--mirsaige-primary);
        color: var(--mirsaige-accent);
    }

    .mirsaige-leaves-action-btn.edit {
        background: var(--mirsaige-secondary);
        color: var(--mirsaige-accent);
    }

    .mirsaige-leaves-action-btn.delete {
        background: #dc3545;
        color: var(--mirsaige-white);
    }

    .mirsaige-leaves-action-btn:hover {
        opacity: 0.9;
        transform: translateY(-1px);
    }

    /* Action text visibility */
    .mirsaige-leaves-action-btn .action-text {
        display: inline;
    }

    /* Responsive Styles */
    @media (max-width: 767px) {
        .mirsaige-leaves-table {
            display: block;
            width: 100%;
        }
        
        .mirsaige-leaves-table thead {
            display: none;
        }
        
        .mirsaige-leaves-table tbody {
            display: block;
            width: 100%;
        }
        
        .mirsaige-leaves-table tr {
            display: block;
            margin-bottom: var(--mirsaige-space-md);
            border: 1px solid rgba(255, 178, 62, 0.2);
            border-radius: 6px;
            overflow: hidden;
        }
        
        .mirsaige-leaves-table td {
            display: block;
            width: 100%;
            padding: var(--mirsaige-space-xs) var(--mirsaige-space-sm);
            padding-left: 45%;
            position: relative;
            text-align: right;
            white-space: normal;
            border-bottom: 1px solid rgba(255, 178, 62, 0.1);
        }
        
        .mirsaige-leaves-table td:last-child {
            border-bottom: none;
        }
        
        .mirsaige-leaves-table td::before {
            content: attr(data-label);
            position: absolute;
            left: var(--mirsaige-space-sm);
            top: var(--mirsaige-space-xs);
            width: 40%;
            padding-right: var(--mirsaige-space-sm);
            text-align: left;
            font-weight: 600;
            color: var(--mirsaige-accent);
            white-space: nowrap;
        }
        
        .mirsaige-leaves-actions {
            justify-content: flex-end;
        }
    }

    @media (max-width: 575px) {
        .mirsaige-leaves-table td {
            padding-left: 40%;
            font-size: 0.8rem;
        }
        
        .mirsaige-leaves-table td::before {
            width: 35%;
            font-size: 0.75rem;
        }
    }

    @media (max-width: 430px) {
        .mirsaige-leaves-table td {
            padding-left: 35%;
            padding-top: var(--mirsaige-space-2xs);
            padding-bottom: var(--mirsaige-space-2xs);
        }
        
        .mirsaige-leaves-table td::before {
            width: 30%;
            left: var(--mirsaige-space-xs);
        }
    }
</style>
@endsection

@section('page')
<div class="mirsaige-leaves-container">
    <div class="mirsaige-leaves-header">
        <div>
            <h1 class="mirsaige-app-breadcrumbs-title">Leaves List</h1>
            <div class="mirsaige-app-breadcrumbs">
                <div class="mirsaige-app-breadcrumb">
                    <a href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-house"></i> Home</a>
                </div>
                <div class="mirsaige-app-breadcrumb divider">
                    <i class="fa-solid fa-angle-right"></i>
                </div>
                <div class="mirsaige-app-breadcrumb">
                    <a href="{{ route('leaves.index') }}" class="active">Manage Leaves</a>
                </div>
            </div>
        </div>
        
        @if (in_array($user_role_id, [1, 2, 3,4,5]))
        <a href="{{ route('leaves.create') }}" class="mirsaige-app-breadcrumbs-btn">
            <i class="fa-solid fa-square-plus"></i> <span class="action-text">Apply Leave</span>
        </a>
        @endif
    </div>

    <div class="mirsaige-leaves-table-wrapper">
        <div class="mirsaige-leaves-table-container">
            <table class="mirsaige-leaves-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        @if(in_array($user_role_id, [1, 2]))
                        <th>Employee</th>
                        @endif
                        <th>Leave Type</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Duration</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($leaves as $leave)
                    <tr>
                        <td data-label="ID">{{ $leave->id }}</td>
                        @if(in_array($user_role_id, [1, 2,3,4,5]))
                        <td data-label="Employee">{{ $leave->employee->name }}</td>
                        @endif
                        <td data-label="Leave Type">{{ $leave->leaveType->name }}</td>
                        <td data-label="Start Date">{{ date('d M Y', strtotime($leave->start_date)) }}</td>
                        <td data-label="End Date">{{ date('d M Y', strtotime($leave->end_date)) }}</td>
                        <td data-label="Duration">
                            {{ \Carbon\Carbon::parse($leave->start_date)->diffInDays($leave->end_date) + 1 }} days
                        </td>
                        <td data-label="Status">
                            <span class="mirsaige-status-badge {{ $leave->status }}">
                                {{ ucfirst($leave->status) }}
                            </span>
                        </td>
                        <td data-label="Actions">
                            <div class="mirsaige-leaves-actions">
                                <a href="{{ route('leaves.show', $leave->id) }}" class="mirsaige-leaves-action-btn view">
                                    <i class="fa-solid fa-eye"></i> <span class="action-text">View</span>
                                </a>
                                
                                @if($leave->status === 'pending' && ($user_role_id == $leave->employee_id || in_array($user_role_id, [1, 2,3,4,5])))
                                <a href="{{ route('leaves.edit', $leave->id) }}" class="mirsaige-leaves-action-btn edit">
                                    <i class="fa-solid fa-pen-to-square"></i> <span class="action-text">Edit</span>
                                </a>
                                
                                <form action="{{ route('leaves.destroy', $leave->id) }}" method="post" style="display: inline;">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="mirsaige-leaves-action-btn delete">
                                       <i class="fa-solid fa-trash-can"></i> <span class="action-text">Delete</span>
                                    </button>
                                </form>
                                @endif
                                
                                @if(in_array($user_role_id, [1, 2,3]) && $leave->status === 'pending')
                                <form action="{{ route('leaves.status', $leave->id) }}" method="post" style="display: inline;">
                                    @csrf
                                    <input type="hidden" name="status" value="approved">
                                    <button type="submit" class="mirsaige-leaves-action-btn edit">
                                        <i class="fa-solid fa-check"></i> <span class="action-text">Approve</span>
                                    </button>
                                </form>
                                
                                <form action="{{ route('leaves.status', $leave->id) }}" method="post" style="display: inline;">
                                    @csrf
                                    <input type="hidden" name="status" value="rejected">
                                    <button type="submit" class="mirsaige-leaves-action-btn delete">
                                        <i class="fa-solid fa-xmark"></i> <span class="action-text">Reject</span>
                                    </button>
                                </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    {!! pagination($leaves) !!}
</div>
@endsection