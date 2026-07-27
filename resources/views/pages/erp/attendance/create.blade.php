@extends('layout.erp.app')
@section('title', 'Create Attendance')
@section('style')
<style>
    /* ===== Attendance Form Base Styles ===== */
    .mirsaige-attendance-form-container {
        padding: var(--mirsaige-space-md);
        color: var(--mirsaige-text);
        max-width: 100%;
        min-height: 100vh;
    }

    /* Header Section */
    .mirsaige-attendance-form-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: var(--mirsaige-space-sm);
        margin-bottom: var(--mirsaige-space-md);
    }

    /* Form Card */
    .mirsaige-attendance-form-card {
        background: var(--mirsaige-dark-blue);
        border-radius: var(--mirsaige-radius-md);
        padding: var(--mirsaige-space-md);
        box-shadow: var(--mirsaige-shadow-sm);
        border: 1px solid rgba(255, 178, 62, 0.1);
        margin: 0 auto;
    }

    /* Form Group */
    .mirsaige-form-group {
        margin-bottom: var(--mirsaige-space-md);
    }

    .mirsaige-form-label {
        display: block;
        margin-bottom: var(--mirsaige-space-xs);
        font-weight: 500;
        color: var(--mirsaige-accent);
    }

    .mirsaige-form-control {
        width: 100%;
        padding: var(--mirsaige-space-sm);
        background: var(--mirsaige-darker-blue);
        border: 1px solid rgba(255, 178, 62, 0.2);
        border-radius: var(--mirsaige-radius-sm);
        color: var(--mirsaige-text);
        transition: all 0.3s ease;
    }

    .mirsaige-form-control:focus {
        border-color: var(--mirsaige-accent);
        box-shadow: 0 0 0 3px rgba(255, 178, 62, 0.2);
        outline: none;
    }

    /* Time Inputs */
    .mirsaige-time-inputs {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: var(--mirsaige-space-sm);
    }

    /* Status Radio Buttons */
    .mirsaige-status-options {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
        gap: var(--mirsaige-space-sm);
        margin-top: var(--mirsaige-space-xs);
    }

    .mirsaige-status-option {
        position: relative;
    }

    .mirsaige-status-radio {
        position: absolute;
        opacity: 0;
        width: 0;
        height: 0;
    }

    .mirsaige-status-label {
        display: block;
        padding: var(--mirsaige-space-xs) var(--mirsaige-space-sm);
        border-radius: var(--mirsaige-radius-sm);
        background: var(--mirsaige-dark-blue);
        border: 1px solid rgba(255, 178, 62, 0.2);
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
        text-transform: capitalize;
    }

    .mirsaige-status-radio:checked + .mirsaige-status-label {
        background: var(--mirsaige-accent);
        color: var(--mirsaige-dark);
        border-color: var(--mirsaige-accent);
        font-weight: 600;
    }

    /* Status colors */
    .status-present {
        background-color: rgba(40, 167, 69, 0.2) !important;
        color: #28a745 !important;
    }

    .status-absent {
        background-color: rgba(220, 53, 69, 0.2) !important;
        color: #dc3545 !important;
    }

    .status-late {
        background-color: rgba(255, 193, 7, 0.2) !important;
        color: #ffc107 !important;
    }

    .status-half_day {
        background-color: rgba(23, 162, 184, 0.2) !important;
        color: #17a2b8 !important;
    }

    .status-holiday {
        background-color: rgba(108, 117, 125, 0.2) !important;
        color: #6c757d !important;
    }

    .status-leave {
        background-color: rgba(0, 123, 255, 0.2) !important;
        color: #007bff !important;
    }

    .mirsaige-status-radio:checked + .mirsaige-status-label.status-present {
        background: #28a745 !important;
        color: white !important;
    }

    .mirsaige-status-radio:checked + .mirsaige-status-label.status-absent {
        background: #dc3545 !important;
        color: white !important;
    }

    .mirsaige-status-radio:checked + .mirsaige-status-label.status-late {
        background: #ffc107 !important;
        color: #212529 !important;
    }

    .mirsaige-status-radio:checked + .mirsaige-status-label.status-half_day {
        background: #17a2b8 !important;
        color: white !important;
    }

    .mirsaige-status-radio:checked + .mirsaige-status-label.status-holiday {
        background: #6c757d !important;
        color: white !important;
    }

    .mirsaige-status-radio:checked + .mirsaige-status-label.status-leave {
        background: #007bff !important;
        color: white !important;
    }

    /* Form Actions */
    .mirsaige-form-actions {
        display: flex;
        justify-content: flex-end;
        gap: var(--mirsaige-space-sm);
        margin-top: var(--mirsaige-space-xl);
    }

    .mirsaige-form-btn {
        padding: var(--mirsaige-space-sm) var(--mirsaige-space-md);
        border-radius: var(--mirsaige-radius-sm);
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: var(--mirsaige-space-xs);
        border: none;
    }

    .mirsaige-form-btn.submit {
        background: var(--mirsaige-accent);
        color: var(--mirsaige-dark);
    }

    .mirsaige-form-btn.cancel {
        background: var(--mirsaige-dark-blue);
        color: var(--mirsaige-text);
        border: 1px solid rgba(255, 178, 62, 0.2);
    }

    .mirsaige-form-btn:hover {
        transform: translateY(-2px);
        box-shadow: var(--mirsaige-shadow-md);
    }

    /* Error Messages */
    .mirsaige-form-error {
        color: var(--mirsaige-danger);
        font-size: 0.8rem;
        margin-top: var(--mirsaige-space-3xs);
        display: block;
    }

    /* ===== RESPONSIVE STYLES ===== */

    /* Tablet Styles (768px - 991px) */
    @media (min-width: 768px) and (max-width: 991px) {
        .mirsaige-attendance-form-container {
            padding: var(--mirsaige-space-sm);
        }
        
        .mirsaige-attendance-form-card {
            padding: var(--mirsaige-space-md);
        }
        
        .mirsaige-status-options {
            grid-template-columns: repeat(auto-fill, minmax(110px, 1fr));
        }
        
        .mirsaige-form-btn {
            padding: var(--mirsaige-space-xs) var(--mirsaige-space-md);
        }
    }

    /* Mobile Styles (767px and below) */
    @media (max-width: 767px) {
        .mirsaige-attendance-form-container {
            padding: var(--mirsaige-space-sm);
        }
        
        .mirsaige-attendance-form-card {
            padding: var(--mirsaige-space-sm);
        }
        
        .mirsaige-time-inputs {
            grid-template-columns: 1fr;
            gap: var(--mirsaige-space-md);
        }
        
        .mirsaige-status-options {
            grid-template-columns: 1fr 1fr;
        }
        
        .mirsaige-form-actions {
            flex-direction: column-reverse;
            gap: var(--mirsaige-space-xs);
        }
        
        .mirsaige-form-btn {
            width: 100%;
            justify-content: center;
        }
    }

    /* Small Mobile Styles (575px and below) */
    @media (max-width: 575px) {
        .mirsaige-status-options {
            grid-template-columns: 1fr;
        }
    }

    /* Print Styles */
    @media print {
        .mirsaige-attendance-form-card {
            background: white !important;
            color: black !important;
            border: 1px solid #ddd !important;
        }
        
        .mirsaige-form-label {
            color: black !important;
        }
        
        .mirsaige-form-control {
            background: white !important;
            color: black !important;
            border: 1px solid #ddd !important;
        }
        
        .mirsaige-form-actions {
            display: none !important;
        }
    }
</style>
@endsection

@section('page')
<div class="mirsaige-attendance-form-container">
    <div class="mirsaige-attendance-form-header">
        <div>
            <h1 class="mirsaige-app-breadcrumbs-title">Create Attendance Record</h1>
            <div class="mirsaige-app-breadcrumbs">
                <div class="mirsaige-app-breadcrumb">
                    <a href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-house"></i> Home</a>
                </div>
                <div class="mirsaige-app-breadcrumb divider">
                    <i class="fa-solid fa-angle-right"></i>
                </div>
                <div class="mirsaige-app-breadcrumb">
                    <a href="{{ route('attendances.index') }}">Attendance</a>
                </div>
                <div class="mirsaige-app-breadcrumb divider">
                    <i class="fa-solid fa-angle-right"></i>
                </div>
                <div class="mirsaige-app-breadcrumb">
                    <a href="#" class="active">Create</a>
                </div>
            </div>
        </div>
    </div>

    <div class="mirsaige-attendance-form-card">
        <form action="{{ route('attendances.store') }}" method="POST">
            @csrf
            
            <div class="mirsaige-form-group">
                <label for="employee_id" class="mirsaige-form-label">Employee</label>
                <select name="employee_id" id="employee_id" class="mirsaige-form-control" required>
                    <option value="">Select Employee</option>
                    @foreach($employees as $employee)
                        <option value="{{ $employee->id }}" {{ old('employee_id') == $employee->id ? 'selected' : '' }}>
                            {{ $employee->name }}
                        </option>
                    @endforeach
                </select>
                @error('employee_id')
                    <span class="mirsaige-form-error">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="mirsaige-form-group">
                <label for="date" class="mirsaige-form-label">Date</label>
                <input type="date" name="date" id="date" class="mirsaige-form-control" 
                       value="{{ old('date', date('Y-m-d')) }}" required>
                @error('date')
                    <span class="mirsaige-form-error">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="mirsaige-form-group">
                <label class="mirsaige-form-label">Time</label>
                <div class="mirsaige-time-inputs">
                    <div>
                        <label for="check_in" class="mirsaige-form-label">Check In</label>
                        <input type="time" name="check_in" id="check_in" class="mirsaige-form-control" 
                               value="{{ old('check_in') }}">
                        @error('check_in')
                            <span class="mirsaige-form-error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="check_out" class="mirsaige-form-label">Check Out</label>
                        <input type="time" name="check_out" id="check_out" class="mirsaige-form-control" 
                               value="{{ old('check_out') }}">
                        @error('check_out')
                            <span class="mirsaige-form-error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            
            <div class="mirsaige-form-group">
                <label class="mirsaige-form-label">Status</label>
                <div class="mirsaige-status-options">
                    @foreach(['present', 'absent', 'late', 'half_day', 'holiday', 'leave'] as $status)
                        <div class="mirsaige-status-option">
                            <input type="radio" name="status" id="status_{{ $status }}" 
                                   class="mirsaige-status-radio" value="{{ $status }}"
                                   {{ old('status', 'present') == $status ? 'checked' : '' }} required>
                            <label for="status_{{ $status }}" class="mirsaige-status-label status-{{ $status }}">
                                {{ ucfirst(str_replace('_', ' ', $status)) }}
                            </label>
                        </div>
                    @endforeach
                </div>
                @error('status')
                    <span class="mirsaige-form-error">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="mirsaige-form-group">
                <label for="notes" class="mirsaige-form-label">Notes</label>
                <textarea name="notes" id="notes" class="mirsaige-form-control" 
                          rows="3">{{ old('notes') }}</textarea>
                @error('notes')
                    <span class="mirsaige-form-error">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="mirsaige-form-actions">
                <a href="{{ route('attendances.index') }}" class="mirsaige-form-btn cancel">
                    <i class="fa-solid fa-xmark"></i> Cancel
                </a>
                <button type="submit" class="mirsaige-form-btn submit">
                    <i class="fa-solid fa-floppy-disk"></i> Save Attendance
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        // Set default time values if not set
        if (!$('#check_in').val()) {
            $('#check_in').val('10:00');
        }
        
        if (!$('#check_out').val()) {
            $('#check_out').val('18:00');
        }
        
        // Validate check-out is after check-in
        $('form').submit(function(e) {
            const checkIn = $('#check_in').val();
            const checkOut = $('#check_out').val();
            
            if (checkIn && checkOut && checkOut <= checkIn) {
                e.preventDefault();
                alert('Check-out time must be after check-in time');
                return false;
            }
            
            return true;
        });
        
        // Auto-disable check-in/check-out for certain statuses
        $('.mirsaige-status-radio').change(function() {
            const status = $(this).val();
            
            if (status === 'absent' || status === 'holiday' || status === 'leave') {
                $('#check_in').val('').prop('disabled', true);
                $('#check_out').val('').prop('disabled', true);
            } else {
                $('#check_in').prop('disabled', false);
                $('#check_out').prop('disabled', false);
                
                if (!$('#check_in').val()) {
                    $('#check_in').val('09:00');
                }
                
                if (!$('#check_out').val()) {
                    $('#check_out').val('17:00');
                }
            }
        });
        
        // Trigger change on page load to set initial state
        $('.mirsaige-status-radio:checked').trigger('change');
    });
</script>
@endsection