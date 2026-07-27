@extends('layout.erp.app')
@section('title', 'Create Task')
@section('style')
<style>
    /* Base Styles */
    .mirsaige-task-container {
        padding: var(--mirsaige-space-md);
        color: var(--mirsaige-text);
        max-width: 100%;
    }

    /* Header Section */
    .mirsaige-task-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: var(--mirsaige-space-sm);
        margin-bottom: var(--mirsaige-space-md);
    }

    /* Breadcrumbs */
    .mirsaige-app-breadcrumbs {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: var(--mirsaige-space-2xs);
        font-size: 0.85rem;
        padding: 10px 0;
        margin: 10px 0;
    }

    .mirsaige-app-breadcrumb {
        display: flex;
        align-items: center;
        gap: var(--mirsaige-space-2xs);
    }

    .mirsaige-app-breadcrumb a {
        color: var(--mirsaige-accent);
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: var(--mirsaige-space-3xs);
        padding: var(--mirsaige-space-3xs) var(--mirsaige-space-xs);
        border-radius: 4px;
        background: rgba(255, 178, 62, 0.1);
    }

    .mirsaige-app-breadcrumb a:hover {
        color: var(--mirsaige-gold);
        background: rgba(255, 178, 62, 0.2);
        transform: translateY(-1px);
    }
    
    .mirsaige-app-breadcrumb a.active {
        color: var(--mirsaige-text);
        pointer-events: none;
    }
    
    .mirsaige-app-breadcrumb.divider {
        color: var(--mirsaige-text);
        opacity: 0.7;
    }

    /* Action Button */
    .mirsaige-app-breadcrumbs-btn {
        background: var(--mirsaige-dark-blue);
        color: var(--mirsaige-accent);
        border: 1px solid rgba(255, 178, 62, 0.3);
        padding: var(--mirsaige-space-xs) var(--mirsaige-space-md);
        border-radius: 6px;
        font-weight: 600;
        cursor: pointer;
        vertical-align: top;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: var(--mirsaige-space-xs);
        align-self: flex-start; 
        margin-top: 0; 
    }

    .mirsaige-app-breadcrumbs-btn:hover {
        background: rgba(255, 178, 62, 0.1);
        color: var(--mirsaige-accent);
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(221, 153, 51, 0.3);
    }

    /* Form Container */
    .mirsaige-task-form-container {
        background: var(--mirsaige-dark-blue);
        border-radius: 8px;
        padding: var(--mirsaige-space-md);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        border: 1px solid rgba(255, 178, 62, 0.1);
        transition: all 0.3s ease;
    }

    .mirsaige-task-form-container:hover {
        box-shadow: 0 6px 25px rgba(0, 0, 0, 0.2);
        border-color: rgba(255, 178, 62, 0.2);
    }

    /* Form Styles */
    .mirsaige-task-form {
        display: grid;
        gap: var(--mirsaige-space-md);
    }

    .mirsaige-form-group {
        display: grid;
        gap: var(--mirsaige-space-xs);
    }

    .mirsaige-form-label {
        color: var(--mirsaige-accent);
        font-weight: 500;
        font-size: 0.9rem;
        display: flex;
        align-items: center;
        gap: var(--mirsaige-space-xs);
    }

    .mirsaige-form-control {
        background: var(--mirsaige-darker-blue);
        border: 1px solid rgba(255, 178, 62, 0.2);
        border-radius: 4px;
        padding: var(--mirsaige-space-xs) var(--mirsaige-space-sm);
        color: var(--mirsaige-text);
        transition: all 0.2s ease;
        width: 100%;
    }

    .mirsaige-form-control:focus {
        outline: none;
        border-color: var(--mirsaige-accent);
        box-shadow: 0 0 0 2px rgba(255, 178, 62, 0.2);
    }

    .mirsaige-form-textarea {
        min-height: 100px;
        resize: vertical;
    }

    /* Date Picker Styles */
    .mirsaige-date-picker {
        position: relative;
    }

    .mirsaige-date-picker i {
        position: absolute;
        right: var(--mirsaige-space-sm);
        top: 50%;
        transform: translateY(-50%);
        color: var(--mirsaige-accent);
        pointer-events: none;
    }

    /* Form Actions */
    .mirsaige-form-actions {
        display: flex;
        gap: var(--mirsaige-space-sm);
        margin-top: var(--mirsaige-space-md);
    }

    /* Submit Button */
    .mirsaige-form-submit {
        background: var(--mirsaige-accent);
        color: var(--mirsaige-dark);
        border: none;
        padding: var(--mirsaige-space-xs) var(--mirsaige-space-lg);
        border-radius: 6px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: var(--mirsaige-space-xs);
    }

    .mirsaige-form-submit:hover {
        background: var(--mirsaige-gold);
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(221, 153, 51, 0.3);
    }

    /* Reset Button */
    .mirsaige-form-reset {
        background: var(--mirsaige-dark-blue);
        color: var(--mirsaige-accent);
        border: 1px solid rgba(255, 178, 62, 0.3);
        padding: var(--mirsaige-space-xs) var(--mirsaige-space-lg);
        border-radius: 6px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: var(--mirsaige-space-xs);
    }

    .mirsaige-form-reset:hover {
        background: rgba(255, 178, 62, 0.1);
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(221, 153, 51, 0.1);
    }

    /* Animation for form entry */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .mirsaige-animated-form {
        animation: fadeInUp 0.5s ease-out forwards;
    }

    /* Responsive Styles */
    @media (min-width: 768px) {
        .mirsaige-task-form {
            grid-template-columns: repeat(2, 1fr);
        }
        
        .mirsaige-form-group.full-width {
            grid-column: span 2;
        }
    }

    @media (max-width: 767px) {
        .mirsaige-task-container {
            padding: var(--mirsaige-space-sm);
        }
        
        .mirsaige-app-breadcrumbs {
            font-size: 0.8rem;
        }
        
        .mirsaige-app-breadcrumbs-btn {
            padding: var(--mirsaige-space-xs);
            font-size: 0.75rem;
            margin-top: 10px;
        }
        
        .mirsaige-form-actions {
            flex-direction: column;
        }
    }

    @media (max-width: 575px) {
        .mirsaige-app-breadcrumbs {
            font-size: 0.7rem;
        }
    }

    @media (max-width: 430px) {
        .mirsaige-app-breadcrumbs-btn {
            padding: var(--mirsaige-space-xs) var(--mirsaige-space-sm);
            font-size: 0.75rem;
        }
        
        .mirsaige-app-breadcrumb {
            display: none;
        }

        .mirsaige-form-submit,
        .mirsaige-form-reset {
            width: 100%;
        }
    }

    /* Date Picker Custom Styling */
    input[type="date"] {
        appearance: none;
        -webkit-appearance: none;
        background: var(--mirsaige-darker-blue) url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%23FFB23E' viewBox='0 0 16 16'%3E%3Cpath d='M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z'/%3E%3C/svg%3E") no-repeat 95% center;
        background-size: 16px;
        padding-right: 30px;
        position: relative;
        z-index: 1;
    }

    /* Status Badge Styles */
    .status-badge {
        display: inline-block;
        padding: 0.25rem 0.5rem;
        border-radius: 4px;
        font-size: 0.75rem;
        font-weight: 600;
    }

    .status-not-started {
        background-color: rgba(108, 117, 125, 0.2);
        color: #6c757d;
    }

    .status-in-progress {
        background-color: rgba(13, 110, 253, 0.2);
        color: #0d6efd;
    }

    .status-completed {
        background-color: rgba(25, 135, 84, 0.2);
        color: #198754;
    }

    .status-on-hold {
        background-color: rgba(255, 193, 7, 0.2);
        color: #ffc107;
    }

    .status-cancelled {
        background-color: rgba(220, 53, 69, 0.2);
        color: #dc3545;
    }
       /* Date Picker Custom Styling */
input[type="date"] {
    appearance: none;
    -webkit-appearance: none;
    background: var(--mirsaige-darker-blue) url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%23FFB23E' viewBox='0 0 16 16'%3E%3Cpath d='M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z'/%3E%3C/svg%3E") no-repeat 95% center;
    background-size: 16px;
    padding-right: 30px;
    position: relative;
    z-index: 1;
}

/* Date Picker Popup Styling */
::-webkit-datetime-edit { 
    color: var(--mirsaige-text);
    padding: 0.2em;
}

::-webkit-datetime-edit-fields-wrapper { 
    background: var(--mirsaige-darker-blue);
}

::-webkit-datetime-edit-text {
    color: var(--mirsaige-accent);
    padding: 0 0.2em;
}

::-webkit-datetime-edit-month-field,
::-webkit-datetime-edit-day-field,
::-webkit-datetime-edit-year-field {
    color: var(--mirsaige-text);
}

::-webkit-inner-spin-button {
    display: none;
}

::-webkit-calendar-picker-indicator {
    opacity: 0;
    position: absolute;
    right: 0;
    width: 100%;
    height: 100%;
    cursor: pointer;
}

/* Calendar Popup Styling */
::-webkit-date-and-time-value {
    text-align: center;
}

/* Custom Calendar Popup (using JavaScript fallback) */
.mirsaige-datepicker-wrapper {
    position: absolute;
    background: var(--mirsaige-dark-blue);
    border: 1px solid rgba(255, 178, 62, 0.3);
    border-radius: 6px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    z-index: 1000;
    padding: 10px;
    width: 280px;
    color: var(--mirsaige-text);
}

.mirsaige-datepicker-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
    color: var(--mirsaige-accent);
}

.mirsaige-datepicker-nav {
    display: flex;
    gap: 10px;
}

.mirsaige-datepicker-nav button {
    background: var(--mirsaige-darker-blue);
    color: var(--mirsaige-accent);
    border: 1px solid rgba(255, 178, 62, 0.2);
    border-radius: 4px;
    padding: 2px 8px;
    cursor: pointer;
}

.mirsaige-datepicker-days {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 5px;
    text-align: center;
}

.mirsaige-datepicker-day-header {
    font-weight: bold;
    color: var(--mirsaige-accent);
    padding: 5px 0;
}

.mirsaige-datepicker-day {
    padding: 5px;
    cursor: pointer;
    border-radius: 4px;
}

.mirsaige-datepicker-day:hover {
    background: rgba(255, 178, 62, 0.1);
}

.mirsaige-datepicker-day.selected {
    background: var(--mirsaige-accent);
    color: var(--mirsaige-dark);
    font-weight: bold;
}

.mirsaige-datepicker-day.other-month {
    color: var(--mirsaige-text-muted);
    opacity: 0.5;
}
</style>
@endsection

@section('page')
<div class="mirsaige-task-container">
    <div class="mirsaige-task-header">
        <div>
            <div class="mirsaige-app-breadcrumbs">
                <div class="mirsaige-app-breadcrumb">
                    <a href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-house"></i> Home</a>
                </div>
                <div class="mirsaige-app-breadcrumb divider">
                   <i class="fa-solid fa-angle-right"></i>
                </div>
                <div class="mirsaige-app-breadcrumb">
                    <a href="{{ route('tasks.index') }}">Tasks</a>
                </div>
                <div class="mirsaige-app-breadcrumb divider">
                    <i class="fa-solid fa-angle-right"></i>
                </div>
                <div class="mirsaige-app-breadcrumb">
                    <a href="{{ route('tasks.create') }}" class="active">Create Task</a>
                </div>
            </div>
        </div>
        
        <a href="{{ route('tasks.index') }}" class="mirsaige-app-breadcrumbs-btn">
            <i class="fa-solid fa-list-check"></i> Task List
        </a>
    </div>

    <div class="mirsaige-task-form-container mirsaige-animated-form">
        <form action="{{ route('tasks.store') }}" method="post" class="mirsaige-task-form">
            @csrf
            
            <!-- Basic Information -->
            <div class="mirsaige-form-group">
                <label for="name" class="mirsaige-form-label">
                    <i class="fa-solid fa-signature"></i>
                    Task Name
                </label>
                <input type="text" class="mirsaige-form-control" name="name" id="name" placeholder="Enter task name" required>
                @error('name')
                    <small class="text-danger" style="color: #ff6b6b !important;">{{ $message }}</small>
                @enderror
            </div>
            
            <div class="mirsaige-form-group">
                <label for="project_id" class="mirsaige-form-label">
                    <i class="fa-solid fa-project-diagram"></i>
                    Project
                </label>
                <select class="mirsaige-form-control" name="project_id" id="project_id" required>
                    <option value="">Select Project</option>
                    @foreach ($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                    @endforeach
                </select>
                @error('project_id')
                    <small class="text-danger" style="color: #ff6b6b !important;">{{ $message }}</small>
                @enderror
            </div>
            
            <!-- Task Details -->
            <div class="mirsaige-form-group">
                <label for="user_id" class="mirsaige-form-label">
                    <i class="fa-solid fa-user-tie"></i>
                    Assignee
                </label>
                <select class="mirsaige-form-control" name="user_id" id="user_id" required>
                    <option value="">Select Assignee</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
                @error('user_id')
                    <small class="text-danger" style="color: #ff6b6b !important;">{{ $message }}</small>
                @enderror
            </div>
            
            <div class="mirsaige-form-group">
                <label for="estimated_time" class="mirsaige-form-label">
                    <i class="fa-solid fa-clock"></i>
                    Estimated Time (hours)
                </label>
                <div class="mirsaige-time-input">
                    <input type="number" step="0.25" min="0" class="mirsaige-form-control" name="estimated_time" id="estimated_time" placeholder="0.00">
                </div>
                @error('estimated_time')
                    <small class="text-danger" style="color: #ff6b6b !important;">{{ $message }}</small>
                @enderror
            </div>
            
            <!-- Date Information -->
            <div class="mirsaige-form-group mirsaige-date-picker">
                <label for="start_time" class="mirsaige-form-label">
                    <i class="fa-solid fa-calendar-day"></i>
                    Start Date
                </label>
                <input type="date" class="mirsaige-form-control" name="start_time" id="start_time" required>
                @error('start_time')
                    <small class="text-danger" style="color: #ff6b6b !important;">{{ $message }}</small>
                @enderror
            </div>
            
            <div class="mirsaige-form-group mirsaige-date-picker">
                <label for="end_time" class="mirsaige-form-label">
                    <i class="fa-solid fa-calendar-check"></i>
                    End Date
                </label>
                <input type="date" class="mirsaige-form-control" name="end_time" id="end_time">
                @error('end_time')
                    <small class="text-danger" style="color: #ff6b6b !important;">{{ $message }}</small>
                @enderror
            </div>
            
            <!-- Status and Location -->
            <div class="mirsaige-form-group">
                <label for="status" class="mirsaige-form-label">
                    <i class="fa-solid fa-circle-check"></i>
                    Status
                </label>
                <select class="mirsaige-form-control" name="status" id="status" required>
                    <option value="Not Started" class="status-not-started">Not Started</option>
                    <option value="In Progress" class="status-in-progress" selected>In Progress</option>
                    <option value="Completed" class="status-completed">Completed</option>
                    <option value="On Hold" class="status-on-hold">On Hold</option>
                    <option value="Cancelled" class="status-cancelled">Cancelled</option>
                </select>
                @error('status')
                    <small class="text-danger" style="color: #ff6b6b !important;">{{ $message }}</small>
                @enderror
            </div>
            
            <div class="mirsaige-form-group">
                <label for="locations" class="mirsaige-form-label">
                    <i class="fa-solid fa-location-dot"></i>
                    Location(s)
                </label>
                <input type="text" class="mirsaige-form-control" name="locations" id="locations" placeholder="Enter task location(s)">
                @error('locations')
                    <small class="text-danger" style="color: #ff6b6b !important;">{{ $message }}</small>
                @enderror
            </div>
            
            <!-- Description -->
            <div class="mirsaige-form-group full-width">
                <label for="description" class="mirsaige-form-label">
                    <i class="fa-solid fa-align-left"></i>
                    Description
                </label>
                <textarea class="mirsaige-form-control mirsaige-form-textarea" name="description" id="description" placeholder="Enter task description"></textarea>
                @error('description')
                    <small class="text-danger" style="color: #ff6b6b !important;">{{ $message }}</small>
                @enderror
            </div>
            
            <!-- Form Actions -->
            <div class="mirsaige-form-actions">
                <button type="submit" class="mirsaige-form-submit">
                   <i class="fa-solid fa-floppy-disk"></i> Save Task
                </button>
                <button type="button" class="mirsaige-form-reset" id="resetFormBtn">
                    <i class="fas fa-undo"></i> Reset Form
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Date Validation
         const dateInputs = document.querySelectorAll('input[type="date"]');
    
        dateInputs.forEach(input => {
            // Fallback for browsers that don't support native datepicker
            if (!Modernizr.inputtypes.date) {
                createCustomDatepicker(input);
            } else {
                // For browsers with native datepicker but we want to style it
                input.addEventListener('focus', function() {
                    // We can't directly style the native calendar popup,
                    // but we can add a class to the parent for visual feedback
                    this.parentElement.classList.add('datepicker-focused');
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.classList.remove('datepicker-focused');
                });
            }
        });
        
        function createCustomDatepicker(input) {
            // Implementation of custom datepicker would go here
            // This is a simplified version - you might want to use a library like flatpickr
            console.log('Creating custom datepicker for', input.id);
        }
        // Date Validation
        const startDate = document.getElementById('start_time');
        const endDate = document.getElementById('end_time');
        
        if (startDate && endDate) {
            startDate.addEventListener('change', function() {
                if (this.value && endDate.value && this.value > endDate.value) {
                    endDate.value = '';
                    alert('End date must be after start date');
                }
            });
            
            endDate.addEventListener('change', function() {
                if (this.value && startDate.value && this.value < startDate.value) {
                    alert('End date must be after start date');
                    this.value = '';
                }
            });
        }

        // Time input validation
        const estimatedTimeInput = document.getElementById('estimated_time');
        if (estimatedTimeInput) {
            estimatedTimeInput.addEventListener('change', function() {
                if (this.value < 0) {
                    this.value = 0;
                }
                if (this.value % 0.25 !== 0) {
                    this.value = Math.round(this.value / 0.25) * 0.25;
                }
            });
        }

        // Form reset functionality
        const resetBtn = document.getElementById('resetFormBtn');
        if (resetBtn) {
            resetBtn.addEventListener('click', function() {
                // Clear all form inputs
                document.querySelector('input[name="name"]').value = '';
                document.querySelector('select[name="project_id"]').selectedIndex = 0;
                document.querySelector('select[name="user_id"]').selectedIndex = 0;
                document.querySelector('input[name="estimated_time"]').value = '';
                document.querySelector('input[name="start_time"]').value = '';
                document.querySelector('input[name="end_time"]').value = '';
                document.querySelector('select[name="status"]').selectedIndex = 0;
                document.querySelector('input[name="locations"]').value = '';
                document.querySelector('textarea[name="description"]').value = '';
                document.querySelector('form').reset();
                
                // Clear any error messages
                const errorMessages = document.querySelectorAll('.text-danger');
                errorMessages.forEach(error => error.style.display = 'none');
                
                // Show a brief confirmation
                const originalText = this.innerHTML;
                this.innerHTML = '<i class="fa-solid fa-check"></i> Form Cleared';
                this.disabled = true;
                
                setTimeout(() => {
                    this.innerHTML = originalText;
                    this.disabled = false;
                }, 1500);
            });
        }
        
        // Form submission loading state
        const form = document.querySelector('.mirsaige-task-form');
        if (form) {
            form.addEventListener('submit', function() {
                const submitBtn = this.querySelector('button[type="submit"]');
                if (submitBtn) {
                    submitBtn.innerHTML = '<i class="fa-solid fa-circle-notch fa-spin"></i> Processing...';
                    submitBtn.disabled = true;
                }
            });
        }
        
        // Add focus effect to form inputs
        const inputs = document.querySelectorAll('.mirsaige-form-control');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.querySelector('.mirsaige-form-label').style.color = 'var(--mirsaige-gold)';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.querySelector('.mirsaige-form-label').style.color = 'var(--mirsaige-accent)';
            });
        });
        
        // Dynamic status and priority styling
        const statusSelect = document.getElementById('status');
        const prioritySelect = document.getElementById('priority');
        
        function updateSelectStyle(selectElement) {
            const selectedOption = selectElement.options[selectElement.selectedIndex];
            selectElement.className = ''; // Clear existing classes
            selectElement.classList.add('mirsaige-form-control');
            selectElement.classList.add(selectedOption.className);
        }
        
        if (statusSelect) {
            statusSelect.addEventListener('change', function() {
                updateSelectStyle(this);
            });
            // Initialize
            updateSelectStyle(statusSelect);
        }
        
        if (prioritySelect) {
            prioritySelect.addEventListener('change', function() {
                updateSelectStyle(this);
            });
            // Initialize
            updateSelectStyle(prioritySelect);
        }
    });
</script>
@endsection