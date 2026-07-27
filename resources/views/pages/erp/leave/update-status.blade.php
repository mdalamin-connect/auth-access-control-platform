@extends('layout.erp.app')
@section('title', 'Update Leave Status')
@section('style')
<style>
    .mirsaige-leave-status-container {
        padding: var(--mirsaige-space-md);
        max-width: 600px;
        margin: 0 auto;
    }

    .mirsaige-status-card {
        background: var(--mirsaige-dark-blue);
        border-radius: 8px;
        padding: var(--mirsaige-space-md);
        margin-bottom: var(--mirsaige-space-md);
        border: 1px solid rgba(255, 178, 62, 0.2);
        box-shadow: var(--mirsaige-shadow-md);
    }

    .mirsaige-status-title {
        color: var(--mirsaige-accent);
        margin-bottom: var(--mirsaige-space-md);
        font-size: 1.25rem;
        border-bottom: 1px solid rgba(255, 178, 62, 0.2);
        padding-bottom: var(--mirsaige-space-xs);
    }

    .mirsaige-status-info {
        margin-bottom: var(--mirsaige-space-md);
    }

    .mirsaige-status-info-item {
        margin-bottom: var(--mirsaige-space-sm);
    }

    .mirsaige-status-label {
        display: block;
        margin-bottom: var(--mirsaige-space-3xs);
        color: var(--mirsaige-accent);
        font-weight: 500;
    }

    .mirsaige-status-value {
        color: var(--mirsaige-text);
        padding: var(--mirsaige-space-2xs) var(--mirsaige-space-sm);
        background: var(--mirsaige-darker-blue);
        border-radius: 6px;
        border-left: 3px solid var(--mirsaige-accent);
    }

    .mirsaige-form-group {
        margin-bottom: var(--mirsaige-space-md);
    }

    .mirsaige-form-label {
        display: block;
        margin-bottom: var(--mirsaige-space-xs);
        color: var(--mirsaige-accent);
        font-weight: 500;
    }

    .mirsaige-form-control {
        width: 100%;
        padding: var(--mirsaige-space-sm);
        background: var(--mirsaige-darker-blue);
        border: 1px solid rgba(255, 178, 62, 0.2);
        border-radius: 6px;
        color: var(--mirsaige-text);
        transition: all 0.3s ease;
    }

    .mirsaige-form-control:focus {
        border-color: var(--mirsaige-accent);
        box-shadow: 0 0 0 3px rgba(255, 178, 62, 0.2);
        outline: none;
    }

    .mirsaige-form-textarea {
        min-height: 120px;
        resize: vertical;
    }

    .mirsaige-form-actions {
        display: flex;
        gap: var(--mirsaige-space-sm);
        margin-top: var(--mirsaige-space-md);
    }

    .mirsaige-form-submit {
        background: var(--mirsaige-accent);
        color: var(--mirsaige-dark);
        border: none;
        padding: var(--mirsaige-space-sm) var(--mirsaige-space-lg);
        border-radius: 6px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: var(--mirsaige-space-xs);
    }

    .mirsaige-form-cancel {
        background: var(--mirsaige-darker-blue);
        color: var(--mirsaige-text);
        border: 1px solid rgba(255, 178, 62, 0.2);
        padding: var(--mirsaige-space-sm) var(--mirsaige-space-lg);
        border-radius: 6px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: var(--mirsaige-space-xs);
    }

    .mirsaige-form-submit:hover,
    .mirsaige-form-cancel:hover {
        opacity: 0.9;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(221, 153, 51, 0.3);
    }

    /* Responsive Styles */
    @media (max-width: 767px) {
        .mirsaige-leave-status-container {
            padding: var(--mirsaige-space-sm);
        }
        
        .mirsaige-status-card {
            padding: var(--mirsaige-space-sm);
        }
    }

    @media (max-width: 575px) {
        .mirsaige-form-actions {
            flex-direction: column;
        }
        
        .mirsaige-form-submit,
        .mirsaige-form-cancel {
            width: 100%;
            justify-content: center;
        }
    }
</style>
@endsection

@section('page')
<div class="mirsaige-leave-status-container">
    <div class="mirsaige-status-card">
        <h2 class="mirsaige-status-title">Update Leave Status</h2>
        
        <div class="mirsaige-status-info">
            <div class="mirsaige-status-info-item">
                <span class="mirsaige-status-label">Employee Name</span>
                <div class="mirsaige-status-value">{{ $leave->employee->name }}</div>
            </div>
            
            <div class="mirsaige-status-info-item">
                <span class="mirsaige-status-label">Leave Type</span>
                <div class="mirsaige-status-value">{{ $leave->leaveType->name }}</div>
            </div>
            
            <div class="mirsaige-status-info-item">
                <span class="mirsaige-status-label">Duration</span>
                <div class="mirsaige-status-value">
                    {{ date('d M Y', strtotime($leave->start_date)) }} to {{ date('d M Y', strtotime($leave->end_date)) }}
                    ({{ \Carbon\Carbon::parse($leave->start_date)->diffInDays($leave->end_date) + 1 }} days)
                </div>
            </div>
            
            <div class="mirsaige-status-info-item">
                <span class="mirsaige-status-label">Reason</span>
                <div class="mirsaige-status-value" style="white-space: pre-wrap;">{{ $leave->reason }}</div>
            </div>
        </div>
        
        <form action="{{ route('leaves.update-status', $leave->id) }}" method="POST">
            @csrf
            
            <div class="mirsaige-form-group">
                <span class="mirsaige-form-label">Status</span>
                <div class="mirsaige-status-value" style="text-transform: capitalize;">
                    {{ ucfirst($status) }}
                    <input type="hidden" name="status" value="{{ $status }}">
                </div>
            </div>
            
            <div class="mirsaige-form-group">
                <label for="comments" class="mirsaige-form-label">Comments</label>
                <textarea name="comments" id="comments" class="mirsaige-form-control mirsaige-form-textarea" 
                          placeholder="Enter your comments (required for rejections)" 
                          {{ $status === 'rejected' ? 'required' : '' }}></textarea>
            </div>
            
            <div class="mirsaige-form-actions">
                <button type="submit" class="mirsaige-form-submit">
                    <i class="fa-solid fa-check-circle"></i> Confirm {{ ucfirst($status) }}
                </button>
                
                <a href="{{ route('leaves.show', $leave->id) }}" class="mirsaige-form-cancel">
                    <i class="fa-solid fa-xmark"></i> Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection