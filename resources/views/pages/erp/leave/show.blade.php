@extends('layout.erp.app')
@section('title', 'Leave Details')
@section('style')
<style>
    .mirsaige-leave-details-container {
        padding: var(--mirsaige-space-md);
        margin: 0 auto;
    }

    .mirsaige-leave-card {
        background: var(--mirsaige-dark-blue);
        border-radius: 8px;
        padding: var(--mirsaige-space-md);
        margin-bottom: var(--mirsaige-space-md);
        border: 1px solid rgba(255, 178, 62, 0.2);
        box-shadow: var(--mirsaige-shadow-sm);
    }

    .mirsaige-leave-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: var(--mirsaige-space-md);
        padding-bottom: var(--mirsaige-space-sm);
        border-bottom: 1px solid rgba(255, 178, 62, 0.2);
    }

    .mirsaige-leave-title {
        color: var(--mirsaige-accent);
        font-size: 1.25rem;
    }

    .mirsaige-status-badge {
        display: inline-block;
        padding: var(--mirsaige-space-3xs) var(--mirsaige-space-sm);
        border-radius: 20px;
        font-size: 0.85rem;
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

    .mirsaige-details-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: var(--mirsaige-space-md);
        margin-bottom: var(--mirsaige-space-md);
    }

    .mirsaige-detail-item {
        margin-bottom: var(--mirsaige-space-sm);
    }

    .mirsaige-detail-label {
        display: block;
        margin-bottom: var(--mirsaige-space-3xs);
        color: var(--mirsaige-accent);
        font-weight: 500;
        font-size: 0.9rem;
    }

    .mirsaige-detail-value {
        color: var(--mirsaige-text);
        font-size: 0.95rem;
        padding: var(--mirsaige-space-2xs) var(--mirsaige-space-sm);
        background: var(--mirsaige-darker-blue);
        border-radius: 6px;
        border-left: 3px solid var(--mirsaige-accent);
    }

    .mirsaige-comments-section {
        margin-top: var(--mirsaige-space-md);
        padding-top: var(--mirsaige-space-md);
        border-top: 1px solid rgba(255, 178, 62, 0.2);
    }

    .mirsaige-comments-title {
        color: var(--mirsaige-accent);
        margin-bottom: var(--mirsaige-space-sm);
        font-size: 1rem;
    }

    .mirsaige-comments-content {
        background: var(--mirsaige-darker-blue);
        padding: var(--mirsaige-space-sm);
        border-radius: 6px;
        color: var(--mirsaige-text);
        font-size: 0.9rem;
        line-height: 1.5;
    }

    .mirsaige-actions {
        display: flex;
        gap: var(--mirsaige-space-sm);
        margin-top: var(--mirsaige-space-md);
        flex-wrap: wrap;
    }

    .mirsaige-action-btn {
        padding: var(--mirsaige-space-xs) var(--mirsaige-space-md);
        border-radius: 6px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: var(--mirsaige-space-xs);
        text-decoration: none;
    }

    .mirsaige-action-btn.back {
        background: var(--mirsaige-darker-blue);
        color: var(--mirsaige-text);
        border: 1px solid rgba(255, 178, 62, 0.2);
    }

    .mirsaige-action-btn.edit {
        background: var(--mirsaige-secondary);
        color: var(--mirsaige-accent);
    }

    .mirsaige-action-btn.delete {
        background: #dc3545;
        color: var(--mirsaige-white);
    }

    .mirsaige-action-btn.approve {
        background: rgba(40, 167, 69, 0.2);
        color: #28a745;
        border: 1px solid #28a745;
    }

    .mirsaige-action-btn.reject {
        background: rgba(220, 53, 69, 0.2);
        color: #dc3545;
        border: 1px solid #dc3545;
    }

    .mirsaige-action-btn:hover {
        opacity: 0.9;
        transform: translateY(-1px);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    /* Responsive Styles */
    @media (max-width: 767px) {
        .mirsaige-leave-details-container {
            padding: var(--mirsaige-space-sm);
        }
        
        .mirsaige-details-grid {
            grid-template-columns: 1fr;
        }
        
        .mirsaige-leave-card {
            padding: var(--mirsaige-space-sm);
        }
    }

    @media (max-width: 575px) {
        .mirsaige-leave-header {
            flex-direction: column;
            align-items: flex-start;
            gap: var(--mirsaige-space-sm);
        }
        
        .mirsaige-actions {
            flex-direction: column;
        }
        
        .mirsaige-action-btn {
            width: 100%;
            justify-content: center;
        }
    }
</style>
@endsection

@section('page')
<div class="mirsaige-leave-details-container">
    <div class="mirsaige-leave-card">
        <div class="mirsaige-leave-header">
            <h2 class="mirsaige-leave-title">Leave Application Details</h2>
            <span class="mirsaige-status-badge {{ $leave->status }}">
                {{ ucfirst($leave->status) }}
            </span>
        </div>

        <div class="mirsaige-details-grid">
            <div class="mirsaige-detail-item">
                <span class="mirsaige-detail-label">Employee Name</span>
                <div class="mirsaige-detail-value">{{ $leave->employee->name }}</div>
            </div>

            <div class="mirsaige-detail-item">
                <span class="mirsaige-detail-label">Leave Type</span>
                <div class="mirsaige-detail-value">{{ $leave->leaveType->name }}</div>
            </div>

            <div class="mirsaige-detail-item">
                <span class="mirsaige-detail-label">Start Date</span>
                <div class="mirsaige-detail-value">{{ date('d M Y', strtotime($leave->start_date)) }}</div>
            </div>

            <div class="mirsaige-detail-item">
                <span class="mirsaige-detail-label">End Date</span>
                <div class="mirsaige-detail-value">{{ date('d M Y', strtotime($leave->end_date)) }}</div>
            </div>

            <div class="mirsaige-detail-item">
                <span class="mirsaige-detail-label">Duration</span>
                <div class="mirsaige-detail-value">
                    {{ \Carbon\Carbon::parse($leave->start_date)->diffInDays($leave->end_date) + 1 }} days
                </div>
            </div>

            <div class="mirsaige-detail-item">
                <span class="mirsaige-detail-label">Applied On</span>
                <div class="mirsaige-detail-value">{{ $leave->created_at->format('d M Y ') }}</div>
            </div>
        </div>

        <div class="mirsaige-detail-item">
            <span class="mirsaige-detail-label">Reason</span>
            <div class="mirsaige-detail-value" style="white-space: pre-wrap;">{{ $leave->reason }}</div>
        </div>

        @if($leave->comments)
        <div class="mirsaige-comments-section">
            <h3 class="mirsaige-comments-title">Manager's Comments</h3>
            <div class="mirsaige-comments-content">
                {{ $leave->comments }}
            </div>
        </div>
        @endif

        <div class="mirsaige-actions">
            <a href="{{ route('leaves.index') }}" class="mirsaige-action-btn back">
                <i class="fa-solid fa-arrow-left"></i> Back to List
            </a>

            @if($leave->status === 'pending' && ($user_role_id == $leave->employee_id || in_array($user_role_id, [1, 2])))
            <a href="{{ route('leaves.edit', $leave->id) }}" class="mirsaige-action-btn edit">
                <i class="fa-solid fa-pen-to-square"></i> Edit Application
            </a>
            @endif

            @if($leave->status === 'pending' && in_array($user_role_id, [1, 2]))
            <form action="{{ route('leaves.update-status', $leave->id) }}" method="POST" style="display: inline;">
                @csrf
                <input type="hidden" name="status" value="approved">
                <button type="submit" class="mirsaige-action-btn approve">
                    <i class="fa-solid fa-check"></i> Approve Leave
                </button>
            </form>

            <form action="{{ route('leaves.update-status', $leave->id) }}" method="POST" style="display: inline;">
                @csrf
                <input type="hidden" name="status" value="rejected">
                <button type="submit" class="mirsaige-action-btn reject">
                    <i class="fa-solid fa-xmark"></i> Reject Leave
                </button>
            </form>
            @endif

            @if($leave->status === 'pending' && ($user_role_id == $leave->employee_id || in_array($user_role_id, [1, 2])))
            <form action="{{ route('leaves.destroy', $leave->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="mirsaige-action-btn delete" onclick="return confirm('Are you sure you want to delete this leave application?')">
                    <i class="fa-solid fa-trash-can"></i> Delete Application
                </button>
            </form>
            @endif
        </div>
    </div>
</div>
@endsection