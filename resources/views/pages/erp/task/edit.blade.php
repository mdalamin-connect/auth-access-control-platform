@extends('layout.erp.app')
@section('title', 'Edit Task')
@section('style')
<style>
    /* Main Container */
    .mirsaige-task-container {
        padding: var(--mirsaige-space-md);
        color: var(--mirsaige-text);
        max-width: 100%;
        margin: 0 auto;
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
    }

    .mirsaige-app-breadcrumb {
        display: flex;
        align-items: center;
        gap: var(--mirsaige-space-2xs);
    }

    .mirsaige-app-breadcrumb a {
        color: var(--mirsaige-accent);
        transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        display: inline-flex;
        align-items: center;
        gap: var(--mirsaige-space-3xs);
        padding: var(--mirsaige-space-3xs) var(--mirsaige-space-xs);
        border-radius: 4px;
        background: rgba(255, 178, 62, 0.1);
        text-decoration: none;
    }

    .mirsaige-app-breadcrumb a:hover {
        color: var(--mirsaige-gold);
        background: rgba(255, 178, 62, 0.2);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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
        transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        display: inline-flex;
        align-items: center;
        gap: var(--mirsaige-space-xs);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        text-decoration: none;
    }

    .mirsaige-app-breadcrumbs-btn:hover {
        background: rgba(255, 178, 62, 0.1);
        color: var(--mirsaige-accent);
        box-shadow: 0 4px 8px rgba(221, 153, 51, 0.3);
    }

    /* Form Container */
    .mirsaige-task-form-container {
        background: var(--mirsaige-dark-blue);
        border-radius: 8px;
        padding: var(--mirsaige-space-md);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        border: 1px solid rgba(255, 178, 62, 0.1);
        transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
    }

    .mirsaige-task-form-container:hover {
        box-shadow: 0 6px 25px rgba(0, 0, 0, 0.2);
        border-color: rgba(255, 178, 62, 0.2);
    }

    /* Form Layout */
    .mirsaige-task-form-wrapper {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: var(--mirsaige-space-lg);
    }

    /* Form Sections */
    .mirsaige-form-section {
        display: flex;
        flex-direction: column;
        gap: var(--mirsaige-space-md);
    }

    /* Form Fields */
    .mirsaige-form-group {
        display: flex;
        flex-direction: column;
        gap: var(--mirsaige-space-xs);
        position: relative;
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
        border-radius: 6px;
        padding: var(--mirsaige-space-sm);
        color: var(--mirsaige-text);
        transition: all 0.3s ease;
        width: 100%;
        font-size: 0.95rem;
    }

    .mirsaige-form-control:focus {
        outline: none;
        border-color: var(--mirsaige-accent);
        box-shadow: 0 0 0 3px rgba(255, 178, 62, 0.2);
    }

    .mirsaige-form-select {
        background: var(--mirsaige-darker-blue);
        border: 1px solid rgba(255, 178, 62, 0.2);
        border-radius: 6px;
        padding: var(--mirsaige-space-sm);
        color: var(--mirsaige-text);
        transition: all 0.3s ease;
        width: 100%;
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%23FFB23E' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 0.75rem center;
        background-size: 16px 12px;
        font-size: 0.95rem;
    }

    .mirsaige-form-select:focus {
        outline: none;
        border-color: var(--mirsaige-accent);
        box-shadow: 0 0 0 2px rgba(255, 178, 62, 0.2);
    }

    .mirsaige-form-textarea {
        background: var(--mirsaige-darker-blue);
        border: 1px solid rgba(255, 178, 62, 0.2);
        border-radius: 6px;
        padding: var(--mirsaige-space-sm);
        color: var(--mirsaige-text);
        transition: all 0.3s ease;
        width: 100%;
        font-size: 0.95rem;
        min-height: 100px;
        resize: vertical;
    }

    /* Form Actions */
    .mirsaige-form-actions {
        grid-column: 1 / -1;
        display: flex;
        gap: var(--mirsaige-space-sm);
        margin-top: var(--mirsaige-space-md);
        justify-content: flex-end;
    }

    .mirsaige-form-submit {
        background: var(--mirsaige-accent);
        color: var(--mirsaige-dark);
        border: none;
        padding: var(--mirsaige-space-sm) var(--mirsaige-space-xl);
        border-radius: 6px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: var(--mirsaige-space-xs);
        min-width: 150px;
    }

    .mirsaige-form-submit:hover {
        background: var(--mirsaige-gold);
        box-shadow: 0 4px 8px rgba(221, 153, 51, 0.3);
        transform: translateY(-2px);
    }

    .mirsaige-form-reset {
        background: transparent;
        color: var(--mirsaige-accent);
        border: 1px solid rgba(255, 178, 62, 0.3);
        padding: var(--mirsaige-space-sm) var(--mirsaige-space-xl);
        border-radius: 6px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: var(--mirsaige-space-xs);
        min-width: 150px;
    }

    .mirsaige-form-reset:hover {
        background: rgba(255, 178, 62, 0.1);
        transform: translateY(-2px);
    }

    /* Full width fields */
    .mirsaige-form-group.full-width {
        grid-column: span 2;
    }

    /* Error Messages */
    .mirsaige-form-error {
        color: #ff6b6b;
        font-size: 0.8rem;
        margin-top: var(--mirsaige-space-3xs);
        display: flex;
        align-items: center;
        gap: var(--mirsaige-space-3xs);
    }

    /* Status Badges */
    .mirsaige-status-badge {
        display: inline-flex;
        align-items: center;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
        margin-left: 8px;
    }

    .mirsaige-status-pending {
        background-color: rgba(255, 193, 7, 0.2);
        color: #ffc107;
    }

    .mirsaige-status-in-progress {
        background-color: rgba(0, 123, 255, 0.2);
        color: #007bff;
    }

    .mirsaige-status-completed {
        background-color: rgba(40, 167, 69, 0.2);
        color: #28a745;
    }

    .mirsaige-status-cancelled {
        background-color: rgba(220, 53, 69, 0.2);
        color: #dc3545;
    }

    /* Responsive Styles */
    @media (max-width: 1200px) {
        .mirsaige-task-form-wrapper {
            gap: var(--mirsaige-space-md);
        }
    }

    @media (max-width: 992px) {
        .mirsaige-task-form-wrapper {
            grid-template-columns: 1fr;
        }

        .mirsaige-form-actions {
            justify-content: center;
        }
    }

    @media (max-width: 768px) {
        .mirsaige-task-header {
            flex-direction: row;
            align-items: flex-start;
        }

        .mirsaige-app-breadcrumbs {
            margin-bottom: var(--mirsaige-space-sm);
        }
        .mirsaige-app-breadcrumbs-btn {
            padding: var(--mirsaige-space-xs);
            font-size: 0.75rem;
            margin-top: 10px;
        }
        .mirsaige-form-actions {
            flex-direction: column;
        }

        .mirsaige-form-submit,
        .mirsaige-form-reset {
            width: 100%;
        }
    }

    @media (max-width: 576px) {
        .mirsaige-task-container {
            padding: var(--mirsaige-space-sm);
        }

        .mirsaige-task-form-container {
            padding: var(--mirsaige-space-sm);
        }

        .mirsaige-app-breadcrumbs {
            font-size: 0.6rem;
        }
        .mirsaige-app-breadcrumb a {
            padding: var(--mirsaige-space-3xs);
        }
        .mirsaige-app-breadcrumbs-btn {
            padding: var(--mirsaige-space-2xs) var(--mirsaige-space-2xs);
            font-size: 0.7rem;
            margin-top: 10px;
        }
        .mirsaige-form-control,
        .mirsaige-form-select,
        .mirsaige-form-textarea {
            padding: var(--mirsaige-space-xs);
        }

        .mirsaige-form-submit,
        .mirsaige-form-reset {
            padding: var(--mirsaige-space-sm);
        }
    }

    @media (max-width: 430px) {
        .mirsaige-app-breadcrumb {
            display: none;
        }

        .mirsaige-app-breadcrumbs-btn {
            padding: var(--mirsaige-space-2xs) var(--mirsaige-space-2xs);
            font-size: 0.75rem;
            margin-top: 10px;
        }
        .mirsaige-form-control,
        .mirsaige-form-select,
        .mirsaige-form-textarea {
            padding: var(--mirsaige-space-xs);
        }

        .mirsaige-form-submit,
        .mirsaige-form-reset {
            padding: var(--mirsaige-space-sm);
        }
    }

    /* Animation for form elements */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .mirsaige-form-group {
        animation: fadeIn 0.3s ease forwards;
    }

    /* Delayed animations for better visual flow */
    .mirsaige-form-group:nth-child(1) { animation-delay: 0.1s; }
    .mirsaige-form-group:nth-child(2) { animation-delay: 0.15s; }
    .mirsaige-form-group:nth-child(3) { animation-delay: 0.2s; }
    .mirsaige-form-group:nth-child(4) { animation-delay: 0.25s; }
    .mirsaige-form-group:nth-child(5) { animation-delay: 0.3s; }
    .mirsaige-form-group:nth-child(6) { animation-delay: 0.35s; }
    .mirsaige-form-group:nth-child(7) { animation-delay: 0.4s; }
    .mirsaige-form-group:nth-child(8) { animation-delay: 0.45s; }
</style>
@endsection

@section('page')
<div class="mirsaige-task-container">
    <div class="mirsaige-task-header">
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
                <a href="{{ route('tasks.edit', $task->id) }}" class="active">Edit Task</a>
            </div>
        </div>

        <a href="{{ route('tasks.index') }}" class="mirsaige-app-breadcrumbs-btn">
            <i class="fa-solid fa-list-check"></i> Task List
        </a>
    </div>

    <div class="mirsaige-task-form-container">
        <form action="{{ route('tasks.update', $task) }}" method="post" enctype="multipart/form-data" id="taskEditForm">
            @csrf
            @method('PUT')

            <div class="mirsaige-task-form-wrapper">
                <!-- Left Section - Basic Info -->
                <div class="mirsaige-form-section">
                    <div class="mirsaige-form-group">
                        <label for="name" class="mirsaige-form-label">
                            <i class="fa-solid fa-tasks"></i>
                            Task Name
                        </label>
                        <input type="text" class="mirsaige-form-control" name="name" id="name" placeholder="Enter task name" value="{{ old('name', $task->name) }}" required>
                        @error('name')
                        <small class="mirsaige-form-error"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mirsaige-form-group">
                        <label for="project_id" class="mirsaige-form-label">
                            <i class="fa-solid fa-project-diagram"></i>
                            Project
                        </label>
                        <select class="mirsaige-form-select" name="project_id" id="project_id" required>
                            <option value="">Select Project</option>
                            @foreach($projects as $project)
                            <option value="{{ $project->id }}" {{ old('project_id', $task->project_id) == $project->id ? 'selected' : '' }}>{{ $project->name }}</option>
                            @endforeach
                        </select>
                        @error('project_id')
                        <small class="mirsaige-form-error"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mirsaige-form-group">
                        <label for="locations" class="mirsaige-form-label">
                            <i class="fa-solid fa-map-marker-alt"></i>
                            Locations
                        </label>
                        <input type="text" class="mirsaige-form-control" name="locations" id="locations" placeholder="Enter task locations" value="{{ old('locations', $task->locations) }}">
                        @error('locations')
                        <small class="mirsaige-form-error"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mirsaige-form-group">
                        <label for="user_id" class="mirsaige-form-label">
                            <i class="fa-solid fa-user-check"></i>
                            Task Assignee
                        </label>
                        <select class="mirsaige-form-select" name="user_id" id="user_id" required>
                            <option value="">Select Assignee</option>
                            @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ old('user_id', $task->user_id) == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                            @endforeach
                        </select>
                        @error('user_id')
                        <small class="mirsaige-form-error"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <!-- Right Section - Task Details -->
                <div class="mirsaige-form-section">
                    <div class="mirsaige-form-group">
                        <label for="status" class="mirsaige-form-label">
                            <i class="fa-solid fa-circle-check"></i>
                            Status
                        </label>
                        <select class="mirsaige-form-select" name="status" id="status" required>
                            <option value="">Select Status</option>
                            <option value="pending" {{ old('status', $task->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="in-progress" {{ old('status', $task->status) == 'in-progress' ? 'selected' : '' }}>In Progress</option>
                            <option value="completed" {{ old('status', $task->status) == 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="cancelled" {{ old('status', $task->status) == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                        @error('status')
                        <small class="mirsaige-form-error"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mirsaige-form-group">
                        <label for="start_time" class="mirsaige-form-label">
                            <i class="fa-solid fa-calendar-plus"></i>
                            Start Time
                        </label>
                        <input type="date" class="mirsaige-form-control" name="start_time" id="start_time" value="{{ old('start_time', $task->start_time) }}" required>
                        @error('start_time')
                        <small class="mirsaige-form-error"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mirsaige-form-group">
                        <label for="end_time" class="mirsaige-form-label">
                            <i class="fa-solid fa-calendar-minus"></i>
                            End Time
                        </label>
                        <input type="date" class="mirsaige-form-control" name="end_time" id="end_time" value="{{ old('end_time', $task->end_time) }}" required>
                        @error('end_time')
                        <small class="mirsaige-form-error"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mirsaige-form-group full-width">
                        <label for="description" class="mirsaige-form-label">
                            <i class="fa-solid fa-file-alt"></i>
                            Description (Optional)
                        </label>
                        <textarea class="mirsaige-form-textarea" name="description" id="description" placeholder="Enter task description">{{ old('description', $task->description ?? '') }}</textarea>
                        @error('description')
                        <small class="mirsaige-form-error"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <!-- Form Actions (Full Width) -->
                <div class="mirsaige-form-actions">
                    <button type="reset" class="mirsaige-form-reset" id="resetBtn">
                        <i class="fas fa-undo"></i> Reset Changes
                    </button>
                    <button type="submit" class="mirsaige-form-submit" id="submitBtn">
                        <i class="fa-solid fa-floppy-disk"></i> Update Task
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // DOM Elements
        const form = document.getElementById('taskEditForm');
        const resetBtn = document.getElementById('resetBtn');
        const submitBtn = document.getElementById('submitBtn');
        const startTimeInput = document.getElementById('start_time');
        const endTimeInput = document.getElementById('end_time');

        // Date Validation
        startTimeInput.addEventListener('change', function() {
            if (endTimeInput.value && this.value > endTimeInput.value) {
                endTimeInput.value = '';
                showAlert('Warning', 'End time cannot be before start time', 'warning');
            }
        });

        endTimeInput.addEventListener('change', function() {
            if (startTimeInput.value && this.value < startTimeInput.value) {
                this.value = '';
                showAlert('Warning', 'End time cannot be before start time', 'warning');
            }
        });

        // Form Reset Functionality
        resetBtn.addEventListener('click', function() {
            // Reset all form validation states
            const errorElements = document.querySelectorAll('.mirsaige-form-error');
            errorElements.forEach(el => el.style.display = 'none');
        });

        // Form Submission Handling
        form.addEventListener('submit', function(e) {
            // Validate dates
            if (startTimeInput.value && endTimeInput.value && startTimeInput.value > endTimeInput.value) {
                e.preventDefault();
                showAlert('Error', 'End time cannot be before start time', 'error');
                return;
            }

            // Show loading state
            submitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Processing...';
            submitBtn.disabled = true;
        });

        // Helper function to show alerts
        function showAlert(title, message, type) {
            // You can replace this with your preferred alert/notification system
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });

            Toast.fire({
                icon: type,
                title: title,
                text: message
            });
        }

        // Status badge display for current status
        const statusSelect = document.getElementById('status');
        const statusLabel = document.querySelector('label[for="status"]');
        
        function updateStatusBadge() {
            // Remove existing badge
            const existingBadge = statusLabel.querySelector('.mirsaige-status-badge');
            if (existingBadge) {
                existingBadge.remove();
            }
            
            // Add new badge
            const status = statusSelect.value;
            if (status) {
                const badge = document.createElement('span');
                badge.className = `mirsaige-status-badge mirsaige-status-${status}`;
                badge.textContent = status.charAt(0).toUpperCase() + status.slice(1).replace('-', ' ');
                statusLabel.appendChild(badge);
            }
        }
        
        // Initial badge setup
        updateStatusBadge();
        
        // Update badge on change
        statusSelect.addEventListener('change', updateStatusBadge);
    });
</script>
@endsection