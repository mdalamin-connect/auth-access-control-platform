@extends('layout.erp.app')
@section('title', 'Apply for Leave')
@section('style')
<style>
    .mirsaige-leave-form-container {
        padding: var(--mirsaige-space-md);
        max-width: 800px;
        margin: 0 auto;
    }

    .mirsaige-leave-form {
        background: var(--mirsaige-dark-blue);
        padding: var(--mirsaige-space-md);
        border-radius: 8px;
        box-shadow: var(--mirsaige-shadow-md);
        border: 1px solid rgba(255, 178, 62, 0.2);
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

    .mirsaige-form-select {
        appearance: none;
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23FFB23E' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right 0.75rem center;
        background-size: 16px 12px;
    }

    .mirsaige-form-textarea {
        min-height: 120px;
        resize: vertical;
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

    .mirsaige-form-submit:hover {
        opacity: 0.9;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(221, 153, 51, 0.3);
    }

    /* Responsive Styles */
    @media (max-width: 767px) {
        .mirsaige-leave-form-container {
            padding: var(--mirsaige-space-sm);
        }
        
        .mirsaige-leave-form {
            padding: var(--mirsaige-space-sm);
        }
        
        .mirsaige-form-group {
            margin-bottom: var(--mirsaige-space-sm);
        }
    }

    @media (max-width: 575px) {
        .mirsaige-form-submit {
            width: 100%;
            justify-content: center;
        }
    }
</style>
@endsection

@section('page')
<div class="mirsaige-leave-form-container">
    <div class="mirsaige-leave-form">
        <h2 class="mirsaige-app-breadcrumbs-title" style="margin-bottom: var(--mirsaige-space-md);">Apply for Leave</h2>
        
        <form action="{{ route('leaves.store') }}" method="POST">
            @if ($errors->any())
                <div class="alert alert-danger" style="margin-bottom: 20px; background: #ff4444; color: white; padding: 15px; border-radius: 5px;">
                    <h4 style="margin-top: 0;">Form Errors</h4>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @csrf
            
            <div class="mirsaige-form-group">
                <label for="leave_type_id" class="mirsaige-form-label">Leave Type</label>
                <select name="leave_type_id" id="leave_type_id" class="mirsaige-form-control mirsaige-form-select" required>
                    <option value="">Select Leave Type</option>
                    @foreach($leaveTypes as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="mirsaige-form-group">
                <label for="start_date" class="mirsaige-form-label">Start Date</label>
                <input type="date" name="start_date" id="start_date" class="mirsaige-form-control" required min="{{ date('Y-m-d') }}">
            </div>
            
            <div class="mirsaige-form-group">
                <label for="end_date" class="mirsaige-form-label">End Date</label>
                <input type="date" name="end_date" id="end_date" class="mirsaige-form-control" required>
            </div>
            
            <div class="mirsaige-form-group">
                <label for="reason" class="mirsaige-form-label">Reason</label>
                <textarea name="reason" id="reason" class="mirsaige-form-control mirsaige-form-textarea" required></textarea>
            </div>
            
            <div class="mirsaige-form-group">
                <button type="submit" class="mirsaige-form-submit">
                    <i class="fa-solid fa-paper-plane"></i> Submit Application
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const startDate = document.getElementById('start_date');
        const endDate = document.getElementById('end_date');
        
        startDate.addEventListener('change', function() {
            endDate.min = this.value;
            
            // If end date is before the new start date, reset it
            if (endDate.value && endDate.value < this.value) {
                endDate.value = this.value;
            }
        });
    });
</script>
@endsection