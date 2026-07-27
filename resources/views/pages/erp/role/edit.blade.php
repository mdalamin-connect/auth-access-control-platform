@extends('layout.erp.app')
@section('title', 'Edit Role')
@section('style')
<style>
    /* Main Container */
    .mirsaige-role-container {
        padding: var(--mirsaige-space-md);
        color: var(--mirsaige-text);
        max-width: 100%;
        margin: 0 auto;
    }

    /* Header Section */
    .mirsaige-role-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: nowrap;
        gap: var(--mirsaige-space-sm);
        margin-bottom: var(--mirsaige-space-md);
    }

    /* Breadcrumbs */
    .mirsaige-app-breadcrumbs {
        display: flex;
        align-items: center;
        gap: var(--mirsaige-space-2xs);
        margin-bottom: var(--mirsaige-space-md);
        flex-wrap: wrap;
    }

    .mirsaige-app-breadcrumb {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: var(--mirsaige-space-2xs);
        font-size: 0.85rem;
        padding: 10px 0;
        margin: 10px 0;
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
        vertical-align: top;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: right;
        gap: var(--mirsaige-space-xs);
        align-self: flex-end; 
        margin-bottom: 20px; 
    }

    .mirsaige-app-breadcrumbs-btn:hover {
        background: rgba(255, 178, 62, 0.1);
        color: var(--mirsaige-accent);
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(221, 153, 51, 0.3);
    }

    /* Form Container */
    .mirsaige-role-form-container {
        background: var(--mirsaige-dark-blue);
        border-radius: 8px;
        padding: var(--mirsaige-space-md);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        border: 1px solid rgba(255, 178, 62, 0.1);
        transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
    }

    .mirsaige-role-form-container:hover {
        box-shadow: 0 6px 25px rgba(0, 0, 0, 0.2);
        border-color: rgba(255, 178, 62, 0.2);
    }

    /* Form Layout */
    .mirsaige-role-form-wrapper {
        display: flex;
        flex-direction: column;
        gap: var(--mirsaige-space-lg);
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
        margin-bottom: var(--mirsaige-space-xs);
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

    /* Permissions Section */
    .mirsaige-permissions-section {
        margin-top: var(--mirsaige-space-sm);
    }

    .mirsaige-permissions-header {
        display: flex;
        align-items: center;
        margin-bottom: var(--mirsaige-space-sm);
        padding-bottom: var(--mirsaige-space-xs);
        border-bottom: 1px solid rgba(255, 178, 62, 0.1);
    }

    .mirsaige-permissions-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: var(--mirsaige-space-md);
    }

    .mirsaige-permission-group {
        background: rgba(255, 178, 62, 0.05);
        border: 1px solid rgba(255, 178, 62, 0.1);
        border-radius: 6px;
        padding: var(--mirsaige-space-sm);
        transition: all 0.3s ease;
    }

    .mirsaige-permission-group:hover {
        border-color: rgba(255, 178, 62, 0.3);
        box-shadow: 0 2px 8px rgba(255, 178, 62, 0.1);
    }

    .mirsaige-permission-group-title {
        color: var(--mirsaige-accent);
        font-weight: 600;
        padding-bottom: var(--mirsaige-space-xs);
        border-bottom: 1px solid rgba(255, 178, 62, 0.1);
        display: flex;
        align-items: center;
        gap: var(--mirsaige-space-xs);
    }

    .mirsaige-permission-items {
        display: grid;
        grid-template-columns: 1fr;
        gap: var(--mirsaige-space-xs);
    }

    .mirsaige-permission-item {
        display: flex;
        align-items: center;
        padding: var(--mirsaige-space-xs);
        border-radius: 4px;
        transition: all 0.2s ease;
    }

    .mirsaige-permission-item:hover {
        background: rgba(255, 178, 62, 0.1);
    }

    .mirsaige-permission-checkbox {
        margin-right: var(--mirsaige-space-sm);
        accent-color: var(--mirsaige-accent);
        width: 16px;
        height: 16px;
        cursor: pointer;
    }

    .mirsaige-permission-label {
        color: var(--mirsaige-text);
        font-size: 0.85rem;
        cursor: pointer;
        flex-grow: 1;
    }

    /* Select All Checkbox */
    .mirsaige-select-all-container {
        display: flex;
        align-items: center;
        margin-bottom: var(--mirsaige-space-md);
        padding: var(--mirsaige-space-xs);
        background: rgba(255, 178, 62, 0.05);
        border-radius: 6px;
    }

    /* Form Actions */
    .mirsaige-form-actions {
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

    /* Error Messages */
    .mirsaige-form-error {
        color: #ff6b6b;
        font-size: 0.8rem;
        margin-top: var(--mirsaige-space-3xs);
        display: flex;
        align-items: center;
        gap: var(--mirsaige-space-3xs);
    }

    /* Responsive Styles */
    @media (max-width: 1200px) {
        .mirsaige-role-form-wrapper {
            gap: var(--mirsaige-space-md);
        }
    }

    @media (max-width: 992px) {
        .mirsaige-permissions-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 768px) {
        .mirsaige-role-header {
            flex-direction: row;
        }

        .mirsaige-app-breadcrumb {
            display: none;
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
        .mirsaige-role-container {
            padding: var(--mirsaige-space-sm);
        }

        .mirsaige-role-form-container {
            padding: var(--mirsaige-space-sm);
        }

        .mirsaige-app-breadcrumb {
            display: none;
        }
        .mirsaige-form-control {
            padding: var(--mirsaige-space-xs);
        }

        .mirsaige-form-submit,
        .mirsaige-form-reset {
            padding: var(--mirsaige-space-sm);
        }

        .mirsaige-permission-group-title {
            font-size: 0.9rem;
        }

        .mirsaige-permission-label {
            font-size: 0.8rem;
        }
    }
    @media (max-width: 430px){

        .mirsaige-app-breadcrumb {
            display: none;
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
    .mirsaige-form-group:nth-child(9) { animation-delay: 0.5s; }
    .mirsaige-form-group:nth-child(10) { animation-delay: 0.55s; }
    .mirsaige-form-group:nth-child(11) { animation-delay: 0.6s; }
</style>
@endsection

@section('page')
<div class="mirsaige-role-container">
    <div class="mirsaige-role-header">
        <div class="mirsaige-app-breadcrumbs">
            <div class="mirsaige-app-breadcrumb">
                <a href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-house"></i> Home</a>
            </div>
            <div class="mirsaige-app-breadcrumb divider">
                <i class="fa-solid fa-angle-right"></i>
            </div>
            <div class="mirsaige-app-breadcrumb">
                <a href="{{ route('roles.index') }}">Roles</a>
            </div>
            <div class="mirsaige-app-breadcrumb divider">
                <i class="fa-solid fa-angle-right"></i>
            </div>
            <div class="mirsaige-app-breadcrumb">
                <a href="{{ route('roles.edit', $role->id) }}" class="active">Edit Role</a>
            </div>
        </div>

        <a href="{{ route('roles.index') }}" class="mirsaige-app-breadcrumbs-btn">
            <i class="fa-solid fa-list-check"></i> Role List
        </a>
    </div>

    <div class="mirsaige-role-form-container">
        <form action="{{ route('roles.update', $role->id) }}" method="post" enctype="multipart/form-data" id="roleEditForm">
            @csrf
            @method('PUT')

            <div class="mirsaige-role-form-wrapper">
                <!-- Role Name Field -->
                <div class="mirsaige-form-group">
                    <label for="name" class="mirsaige-form-label">
                        <i class="fa-solid fa-tag"></i>
                        Role Name
                    </label>
                    <input type="text" class="mirsaige-form-control" name="name" id="name" 
                           placeholder="Enter role name" value="{{ old('name', $role->name) }}" required>
                    @error('name')
                    <small class="mirsaige-form-error"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                    @enderror
                </div>

                <!-- Permissions Section -->
                <div class="mirsaige-permissions-section">
                    <label class="mirsaige-form-label">
                        <i class="fa-solid fa-key"></i>
                        Permissions
                    </label>

                    <!-- Select All Checkbox -->
                    <div class="mirsaige-select-all-container">
                        <input class="mirsaige-permission-checkbox" type="checkbox" id="checkAll">
                        <label class="mirsaige-permission-label" for="checkAll">
                            Select All Permissions
                        </label>
                    </div>

                    <!-- Permissions Grid (Split into two columns) -->
                    <div class="mirsaige-permissions-grid">
                        <!-- Left Column -->
                        <div class="mirsaige-permission-group">
                            <div class="mirsaige-permission-items">
                                @foreach($permissions->slice(0, ceil($permissions->count() / 2)) as $permission)
                                <div class="mirsaige-permission-item">
                                    <input class="mirsaige-permission-checkbox" type="checkbox" 
                                           id="permission{{ $permission->id }}" 
                                           name="permissions[]" 
                                           value="{{ $permission->id }}"
                                           {{ in_array($permission->id, old('permissions', $role->permissions->pluck('id')->toArray())) ? 'checked' : '' }}>
                                    <label class="mirsaige-permission-label" for="permission{{ $permission->id }}">
                                        {{ $permission->name }}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="mirsaige-permission-group">
                            <div class="mirsaige-permission-items">
                                @foreach($permissions->slice(ceil($permissions->count() / 2)) as $permission)
                                <div class="mirsaige-permission-item">
                                    <input class="mirsaige-permission-checkbox" type="checkbox" 
                                           id="permission{{ $permission->id }}" 
                                           name="permissions[]" 
                                           value="{{ $permission->id }}"
                                           {{ in_array($permission->id, old('permissions', $role->permissions->pluck('id')->toArray())) ? 'checked' : '' }}>
                                    <label class="mirsaige-permission-label" for="permission{{ $permission->id }}">
                                        {{ $permission->name }}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="mirsaige-form-actions">
                    <button type="reset" class="mirsaige-form-reset" id="resetBtn">
                        <i class="fas fa-undo"></i> Reset Form
                    </button>
                    <button type="submit" class="mirsaige-form-submit" id="submitBtn">
                        <i class="fa-solid fa-floppy-disk"></i> Update Role
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
        const form = document.getElementById('roleEditForm');
        const checkAll = document.getElementById('checkAll');
        const permissionCheckboxes = document.querySelectorAll('.mirsaige-permission-checkbox:not(#checkAll)');
        const resetBtn = document.getElementById('resetBtn');
        const submitBtn = document.getElementById('submitBtn');

        // Initialize "Select All" checkbox state
        function updateSelectAllCheckbox() {
            const allChecked = Array.from(permissionCheckboxes).every(checkbox => checkbox.checked);
            checkAll.checked = allChecked;
        }

        // Set initial state of "Select All" checkbox
        updateSelectAllCheckbox();

        // Check All functionality
        if (checkAll) {
            checkAll.addEventListener('change', function() {
                permissionCheckboxes.forEach(checkbox => {
                    checkbox.checked = this.checked;
                });
            });
            
            // Uncheck "Select All" if any permission is unchecked
            permissionCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    updateSelectAllCheckbox();
                });
            });
        }

        // Form Reset Functionality - Resets to original values
        if (resetBtn) {
            resetBtn.addEventListener('click', function() {
                // Reset role name to original value
                document.querySelector('input[name="name"]').value = "{{ $role->name }}";
                
                // Reset permission checkboxes to original state
                @foreach($permissions as $permission)
                    document.getElementById('permission{{ $permission->id }}').checked = {{ in_array($permission->id, $role->permissions->pluck('id')->toArray()) ? 'true' : 'false' }};
                @endforeach
                
                // Update "Select All" checkbox state
                updateSelectAllCheckbox();
                
                // Clear any error messages
                const errorMessages = document.querySelectorAll('.mirsaige-form-error');
                errorMessages.forEach(error => error.style.display = 'none');
                
                // Show a brief confirmation
                const originalText = this.innerHTML;
                this.innerHTML = '<i class="fa-solid fa-check"></i> Form Reset';
                this.disabled = true;
                
                setTimeout(() => {
                    this.innerHTML = originalText;
                    this.disabled = false;
                }, 1500);
            });
        }

        // Form Submission Handling
        if (form) {
            form.addEventListener('submit', function(e) {
                // Show loading state
                submitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Updating...';
                submitBtn.disabled = true;
            });
        }

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
    });
</script>
@endsection