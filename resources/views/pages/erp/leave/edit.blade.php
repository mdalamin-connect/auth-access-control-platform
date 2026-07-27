@extends('layout.erp.app')
@section('title', 'Edit Leave Application')
@section('style')
<style>
    .mirsaige-leave-edit-container {
        padding: var(--mirsaige-space-md);
        max-width: 800px;
        margin: 0 auto;
    }

    .mirsaige-leave-edit-card {
        background: var(--mirsaige-dark-blue);
        border-radius: 8px;
        padding: var(--mirsaige-space-md);
        margin-bottom: var(--mirsaige-space-md);
        border: 1px solid rgba(255, 178, 62, 0.2);
        box-shadow: var(--mirsaige-shadow-md);
    }

    .mirsaige-leave-edit-title {
        color: var(--mirsaige-accent);
        margin-bottom: var(--mirsaige-space-md);
        font-size: 1.25rem;
        border-bottom: 1px solid rgba(255, 178, 62, 0.2);
        padding-bottom: var(--mirsaige-space-xs);
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
        .mirsaige-leave-edit-container {
            padding: var(--mirsaige-space-sm);
        }
        
        .mirsaige-leave-edit-card {
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
<div class="mirsaige-leave-edit-container">
    <div class="mirsaige-leave-edit-card">
        <h2 class="mirsaige-leave-edit-title">Edit Leave Application</h2>
        
        <form action="{{ route('leaves.update', $leave->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mirsaige-form-group">
                <label for="leave_type_id" class="mirsaige-form-label">Leave Type</label>
                <select name="leave_type_id" id="leave_type_id" class="mirsaige-form-control mirsaige-form-select" required>
                    @foreach($leaveTypes as $type)
                        <option value="{{ $type->id }}" {{ $type->id == $leave->leave_type_id ? 'selected' : '' }}>
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div class="mirsaige-form-group">
                <label for="start_date" class="mirsaige-form-label">Start Date</label>
                <input type="date" name="start_date" id="start_date" class="mirsaige-form-control" 
                       value="{{ $leave->start_date }}" required min="{{ date('Y-m-d') }}">
            </div>
            
            <div class="mirsaige-form-group">
                <label for="end_date" class="mirsaige-form-label">End Date</label>
                <input type="date" name="end_date" id="end_date" class="mirsaige-form-control" 
                       value="{{ $leave->end_date }}" required>
            </div>
            
            <div class="mirsaige-form-group">
                <label for="reason" class="mirsaige-form-label">Reason</label>
                <textarea name="reason" id="reason" class="mirsaige-form-control mirsaige-form-textarea" required>{{ $leave->reason }}</textarea>
            </div>
            
            <div class="mirsaige-form-actions">
                <button type="submit" class="mirsaige-form-submit">
                    <i class="fa-solid fa-floppy-disk"></i> Update Application
                </button>
                
                <a href="{{ route('leaves.show', $leave->id) }}" class="mirsaige-form-cancel">
                    <i class="fa-solid fa-xmark"></i> Cancel
                </a>
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