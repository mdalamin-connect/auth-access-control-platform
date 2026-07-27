@extends('layout.erp.app')
@section('title', 'Create User')
@section('style')
<style>

    /* Main Container */
    .mirsaige-user-container {
        padding: var(--mirsaige-space-md);
        color: var(--mirsaige-text);
        max-width: 100%;
        margin: 0 auto;
    }

    /* Header Section */
    .mirsaige-user-header {
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
    .mirsaige-user-form-container {
        background: var(--mirsaige-dark-blue);
        border-radius: 8px;
        padding: var(--mirsaige-space-md);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        border: 1px solid rgba(255, 178, 62, 0.1);
        transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
    }

    .mirsaige-user-form-container:hover {
        box-shadow: 0 6px 25px rgba(0, 0, 0, 0.2);
        border-color: rgba(255, 178, 62, 0.2);
    }

    /* Form Layout */
    .mirsaige-user-form-wrapper {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: var(--mirsaige-space-lg);
    }

    /* Form Sections */
    .mirsaige-form-half-section {
        display: flex;
        flex-direction: column;
        gap: var(--mirsaige-space-md);
    }

    /* Image Section */
.mirsaige-image-section {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: var(--mirsaige-space-md);
    padding: var(--mirsaige-space-md);
    background: rgba(255, 178, 62, 0.05);
    border-radius: 12px;
    border: 2px dashed rgba(255, 178, 62, 0.3);
    margin-bottom: var(--mirsaige-space-md);
    transition: all 0.3s ease;
}

.mirsaige-image-preview-container {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    background: var(--mirsaige-darker-blue);
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
    border: 3px solid rgba(255, 178, 62, 0.3);
}

.mirsaige-image-preview {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
}

.mirsaige-image-placeholder {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    color: var(--mirsaige-text);
    margin-top: var(--mirsaige-space-md);

}

.mirsaige-image-placeholder i {
    font-size: 2.5rem;
    color: var(--mirsaige-accent);
    margin-bottom: var(--mirsaige-space-xs);
    opacity: 0.7;
}

.mirsaige-image-upload-actions {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: var(--mirsaige-space-sm);
    width: 100%;
    max-width: 200px;
}

.mirsaige-image-upload-btn,
.mirsaige-image-remove-btn {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: var(--mirsaige-space-xs);
    padding: var(--mirsaige-space-xs) var(--mirsaige-space-sm);
    border-radius: 6px;
    font-weight: 500;
    font-size: 0.85rem;
    cursor: pointer;
    transition: all 0.3s ease;
}

.mirsaige-image-upload-btn {
    background: var(--mirsaige-dark-blue);
    color: var(--mirsaige-accent);
    border: 1px solid rgba(255, 178, 62, 0.3);
}

.mirsaige-image-upload-btn:hover {
    background: rgba(255, 178, 62, 0.1);
    transform: translateY(-2px);
}

.mirsaige-image-remove-btn {
    background: transparent;
    color: #ff6b6b;
    border: 1px solid rgba(255, 107, 107, 0.3);
}

.mirsaige-image-remove-btn:hover {
    background: rgba(255, 107, 107, 0.1);
    transform: translateY(-2px);
}

.mirsaige-image-upload-info {
    color: var(--mirsaige-text);
    opacity: 0.7;
    font-size: 0.65rem;
    text-align: center;
    padding: var(--mirsaige-space-4xs);
    padding: var(--mirsaige-space-2xs)  ;
    border-radius: 4px;
    width: 100%;
    border: 1px solid rgba(255, 178, 62, 0.3);
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
    /* Password Fields */
    .mirsaige-password-field {
        position: relative;
    }

    .mirsaige-password-toggle {
        position: absolute;
        right: var(--mirsaige-space-sm);
        top: 50%;
        transform: translateY(-50%);
        color: var(--mirsaige-text);
        cursor: pointer;
        transition: all 0.2s ease;
        background: rgba(255, 178, 62, 0.1);
        width: 30px;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
    }

    .mirsaige-password-toggle:hover {
        color: var(--mirsaige-accent);
        background: rgba(255, 178, 62, 0.2);
    }

    /* Password Match Indicator */
    .mirsaige-password-match {
        position: absolute;
        right: 40px;
        top: 50%;
        transform: translateY(-50%);
        color: #28a745;
        display: none;
    }

    .mirsaige-password-mismatch {
        position: absolute;
        right: 40px;
        top: 50%;
        transform: translateY(-50%);
        color: #dc3545;
        display: none;
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

    /* Success Messages */
    .mirsaige-form-success {
        color: #28a745;
        font-size: 0.8rem;
        margin-top: var(--mirsaige-space-3xs);
        display: flex;
        align-items: center;
        gap: var(--mirsaige-space-3xs);
    }

    /* Password Strength Meter */
    .mirsaige-password-strength {
        width: 100%;
        height: 4px;
        background: var(--mirsaige-darker-blue);
        border-radius: 2px;
        margin-top: var(--mirsaige-space-xs);
        overflow: hidden;
    }

    .mirsaige-password-strength-bar {
        height: 100%;
        width: 0;
        transition: width 0.3s ease, background 0.3s ease;
    }

    /* Responsive Styles */
    @media (max-width: 1200px) {
        .mirsaige-user-form-wrapper {
            gap: var(--mirsaige-space-md);
        }
    }

    @media (max-width: 992px) {
        .mirsaige-user-form-wrapper {
            grid-template-columns: 1fr;
        }

        .mirsaige-image-section {
            order: -1;
            margin-bottom: var(--mirsaige-space-lg);
        }

        .mirsaige-form-actions {
            justify-content: center;
        }
    }

    @media (max-width: 768px) {
        .mirsaige-user-header {
            flex-direction: row;
            align-items: flex-start;
        }

        .mirsaige-app-breadcrumbs {
            margin-bottom: var(--mirsaige-space-sm);
        }
        .mirsaige-app-breadcrumbs-btn {
            padding: var(--mirsaige-space-xs) ;
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

        .mirsaige-image-section {
            width: 100%;
        }
    }

    @media (max-width: 576px) {
        .mirsaige-user-container {
            padding: var(--mirsaige-space-sm);
        }

        .mirsaige-user-form-container {
            padding: var(--mirsaige-space-sm);
        }

        .mirsaige-app-breadcrumbs {
            font-size: 0.7rem;
        }
        .mirsaige-app-breadcrumb a{
            padding: var(--mirsaige-space-3xs);

        }
        .mirsaige-app-breadcrumbs-btn {
            padding: var(--mirsaige-space-2xs) var(--mirsaige-space-2xs);
            font-size: 0.75rem;
            margin-top: 10px;

        }
        .mirsaige-image-upload-info {
            font-size: 0.6rem;



            
        }
        .mirsaige-form-control,
        .mirsaige-form-select {
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
        .mirsaige-image-upload-info {
            font-size: 0.5rem;



            
        }
        .mirsaige-form-control,
        .mirsaige-form-select {
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
    .mirsaige-form-group:nth-child(9) { animation-delay: 0.5s; }
    .mirsaige-form-group:nth-child(10) { animation-delay: 0.55s; }
    .mirsaige-form-group:nth-child(11) { animation-delay: 0.6s; }
</style>
@endsection

@section('page')
<div class="mirsaige-user-container">
    <div class="mirsaige-user-header">
        <div class="mirsaige-app-breadcrumbs">
            <div class="mirsaige-app-breadcrumb">
                <a href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-house"></i> Home</a>
            </div>
            <div class="mirsaige-app-breadcrumb divider">
                <i class="fa-solid fa-angle-right"></i>
            </div>
            <div class="mirsaige-app-breadcrumb">
                <a href="{{ route('users.index') }}">Users</a>
            </div>
            <div class="mirsaige-app-breadcrumb divider">
                <i class="fa-solid fa-angle-right"></i>
            </div>
            <div class="mirsaige-app-breadcrumb">
                <a href="{{ route('users.create') }}" class="active">Create User</a>
            </div>
        </div>

        <a href="{{ route('users.index') }}" class="mirsaige-app-breadcrumbs-btn">
            <i class="fa-solid fa-list-check"></i> User List
        </a>
    </div>

    <div class="mirsaige-user-form-container">
        <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data" id="userCreateForm">
            @csrf

            <div class="mirsaige-user-form-wrapper">
                <!-- Left Section - Basic Info -->
                <div class="mirsaige-form-half-section">
                    <!-- Basic Information Fields -->
                    <div class="mirsaige-form-group">
                        <label for="name" class="mirsaige-form-label">
                            <i class="fa-solid fa-user"></i>
                            Full Name
                        </label>
                        <input type="text" class="mirsaige-form-control" name="name" id="name" placeholder="Enter full name" value="{{ old('name') }}" required>
                        @error('name')
                        <small class="mirsaige-form-error"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mirsaige-form-group">
                        <label for="username" class="mirsaige-form-label">
                            <i class="fa-solid fa-user-tag"></i>
                            Username
                        </label>
                        <input type="text" class="mirsaige-form-control" name="username" id="username" placeholder="Enter username" value="{{ old('username') }}" required>
                        @error('username')
                        <small class="mirsaige-form-error"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mirsaige-form-group">
                        <label for="email" class="mirsaige-form-label">
                            <i class="fa-solid fa-envelope"></i>
                            Email
                        </label>
                        <input type="email" class="mirsaige-form-control" name="email" id="email" placeholder="Enter email" value="{{ old('email') }}" required>
                        @error('email')
                        <small class="mirsaige-form-error"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mirsaige-form-group">
                        <label for="phone" class="mirsaige-form-label">
                            <i class="fa-solid fa-phone"></i>
                            Phone
                        </label>
                        <input type="text" class="mirsaige-form-control" name="phone" id="phone" placeholder="Enter phone number" value="{{ old('phone') }}" pattern="[0-9]{10,15}">
                        @error('phone')
                        <small class="mirsaige-form-error"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mirsaige-form-group">
                        <label for="address" class="mirsaige-form-label">
                            <i class="fa-solid fa-map-marker-alt"></i>
                            Address
                        </label>
                        <input type="text" class="mirsaige-form-control" name="address" id="address" placeholder="Enter address" value="{{ old('address') }}">
                        @error('address')
                        <small class="mirsaige-form-error"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                        @enderror
                    </div>
                                        <!-- Password Fields (Full Width) -->
                    <div class="mirsaige-form-group ">
                        <label for="password" class="mirsaige-form-label">
                            <i class="fa-solid fa-lock"></i>
                            Password
                        </label>
                        <div class="mirsaige-password-field">
                            <input type="password" class="mirsaige-form-control" name="password" id="password" placeholder="Enter password" required minlength="8">
                            <i class="fa-solid fa-eye mirsaige-password-toggle" id="togglePassword"></i>
                            <i class="fa-solid fa-check mirsaige-password-match" id="passwordMatch"></i>
                            <i class="fa-solid fa-xmark mirsaige-password-mismatch" id="passwordMismatch"></i>
                        </div>
                        <div class="mirsaige-password-strength">
                            <div class="mirsaige-password-strength-bar" id="passwordStrengthBar"></div>
                        </div>
                        @error('password')
                        <small class="mirsaige-form-error"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                        @enderror
                        <small class="mirsaige-form-success" id="passwordHelpText">
                            <i class="fa-solid fa-circle-info"></i> Password must be at least 8 characters with uppercase, lowercase, number, and symbol
                        </small>
                    </div>

                    <div class="mirsaige-form-group ">
                        <label for="password_confirmation" class="mirsaige-form-label">
                            <i class="fa-solid fa-lock"></i>
                            Confirm Password
                        </label>
                        <div class="mirsaige-password-field">
                            <input type="password" class="mirsaige-form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirm password" required>
                            <i class="fa-solid fa-eye mirsaige-password-toggle" id="toggleConfirmPassword"></i>
                        </div>
                        <small class="mirsaige-form-error" id="passwordConfirmError" style="display: none;">
                            <i class="fa-solid fa-circle-exclamation"></i> Passwords do not match
                        </small>
                    </div>
                </div>

                <!-- Right Section - Security and Role Info -->
                <div class="mirsaige-form-half-section">
                    <!-- Image Upload Section -->
                    

                    <!-- Role and Status Fields -->
                    <div class="mirsaige-form-group">
                        <label for="role_id" class="mirsaige-form-label">
                            <i class="fa-solid fa-user-shield"></i>
                            Role
                        </label>
                        <select class="mirsaige-form-select" name="role_id" id="role_id" required>
                            <option value="">Select Role</option>
                            @foreach($roles as $role)
                            <option value="{{$role->id}}" {{ old('role_id') == $role->id ? 'selected' : '' }}>{{$role->name}}</option>
                            @endforeach
                        </select>
                        @error('role_id')
                        <small class="mirsaige-form-error"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mirsaige-form-group">
                        <label for="department_id" class="mirsaige-form-label">
                            <i class="fa-solid fa-building"></i>
                            Department
                        </label>
                        <select class="mirsaige-form-select" name="department_id" id="department_id" required>
                            <option value="">Select Department</option>
                            @foreach($departments as $department)
                            <option value="{{$department->id}}" {{ old('department_id') == $department->id ? 'selected' : '' }}>{{$department->name}}</option>
                            @endforeach
                        </select>
                        @error('department_id')
                        <small class="mirsaige-form-error"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mirsaige-form-group">
                        <label for="designation_id" class="mirsaige-form-label">
                            <i class="fa-solid fa-id-card"></i>
                            Designation
                        </label>
                        <select class="mirsaige-form-select" name="designation_id" id="designation_id" required>
                            <option value="">Select Designation</option>
                            @foreach($designations as $designation)
                            <option value="{{$designation->id}}" {{ old('designation_id') == $designation->id ? 'selected' : '' }}>{{$designation->name}}</option>
                            @endforeach
                        </select>
                        @error('designation_id')
                        <small class="mirsaige-form-error"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mirsaige-form-group">
                        <label for="gender" class="mirsaige-form-label">
                            <i class="fa-solid fa-venus-mars"></i>
                            Gender
                        </label>
                        <select class="mirsaige-form-select" name="gender" id="gender" required>
                            <option value="">Select Gender</option>
                            <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                            <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                        @error('gender')
                        <small class="mirsaige-form-error"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mirsaige-form-group">
                        <label for="status" class="mirsaige-form-label">
                            <i class="fa-solid fa-circle-check"></i>
                            Status
                        </label>
                        <select class="mirsaige-form-select" name="status" id="status">
                            <option value="1" {{ old('status', 1) == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('status')
                        <small class="mirsaige-form-error"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mirsaige-image-section" id="imageUploadSection">
                        <div class="mirsaige-image-preview-container">
                            <div class="mirsaige-image-preview" id="imagePreview">
                                <div class="mirsaige-image-placeholder">
                                    <i class="fa-solid fa-user-circle"></i>
                                    <span>Profile Photo</span>
                                </div>
                            </div>
                        </div>

                        <div class="mirsaige-image-upload-actions">
                            <input type="file" name="photo" id="photo" accept="image/*" style="display: none;">
                            <button type="button" class="mirsaige-image-upload-btn" id="uploadBtn">
                                <i class="fa-solid fa-upload"></i> Choose Image
                            </button>
                            <button type="button" class="mirsaige-image-remove-btn" id="removeBtn" style="display: none;">
                                <i class="fa-solid fa-trash"></i> Remove Image
                            </button>
                            <div class="mirsaige-image-upload-info">
                                JPG, PNG, GIF or WEBP (Max 10MB)
                            </div>
                        </div>
                    </div>
                

                </div>


                <!-- Form Actions (Full Width) -->
                <div class="mirsaige-form-actions">
                    <button type="reset" class="mirsaige-form-reset" id="resetBtn">
                        <i class="fas fa-undo"></i> Reset Form
                    </button>
                    <button type="submit" class="mirsaige-form-submit" id="submitBtn">
                        <i class="fa-solid fa-floppy-disk"></i> Save User
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
        const form = document.getElementById('userCreateForm');
        const photoInput = document.getElementById('photo');
        const uploadBtn = document.getElementById('uploadBtn');
        const removeBtn = document.getElementById('removeBtn');
        const imagePreview = document.getElementById('imagePreview');
        const imageUploadSection = document.getElementById('imageUploadSection');
        const togglePassword = document.getElementById('togglePassword');
        const password = document.getElementById('password');
        const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
        const confirmPassword = document.getElementById('password_confirmation');
        const passwordMatch = document.getElementById('passwordMatch');
        const passwordMismatch = document.getElementById('passwordMismatch');
        const passwordConfirmError = document.getElementById('passwordConfirmError');
        const passwordStrengthBar = document.getElementById('passwordStrengthBar');
        const resetBtn = document.getElementById('resetBtn');
        const submitBtn = document.getElementById('submitBtn');

        // Image Upload Functionality
        uploadBtn.addEventListener('click', function() {
            photoInput.click();
        });

        photoInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                // Validate file size (max 10MB)
                if (file.size > 10 * 1024 * 1024) {
                    showAlert('Error', 'Image size should be less than 10MB', 'error');
                    this.value = '';
                    return;
                }

                // Validate file type
                const validTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
                if (!validTypes.includes(file.type)) {
                    showAlert('Error', 'Only JPG, PNG, GIF, or WEBP files are allowed', 'error'); 
                    this.value = '';
                    return;
                }

                const reader = new FileReader();

                reader.onload = function(e) {
                    // Clear previous content
                    imagePreview.innerHTML = '';

                    // Create and append new image
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.alt = 'Profile Preview';
                    img.className = 'mirsaige-image-preview';
                    img.style.objectFit = 'cover';
                    img.style.width = '100%';
                    img.style.height = '100%';
                    img.style.borderRadius = '50%';
                    imagePreview.appendChild(img);

                    // Show remove button
                    removeBtn.style.display = 'flex';
                };

                reader.readAsDataURL(file);
            }
        });

        removeBtn.addEventListener('click', function() {
            photoInput.value = '';
            imagePreview.innerHTML = `
                <div class="mirsaige-image-placeholder">
                    <i class="fa-solid fa-user-circle"></i>
                    <span>Profile Photo</span>
                </div>
            `;
            removeBtn.style.display = 'none';
        });

        // Password Toggle Visibility
        togglePassword.addEventListener('click', function() {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });

        toggleConfirmPassword.addEventListener('click', function() {
            const type = confirmPassword.getAttribute('type') === 'password' ? 'text' : 'password';
            confirmPassword.setAttribute('type', type);
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });

        // Password Validation
        function validatePassword() {
            const passwordValue = password.value;
            const confirmValue = confirmPassword.value;

            // Check if passwords match (only if both fields have values)
            if (passwordValue && confirmValue) {
                if (passwordValue === confirmValue) {
                    passwordMatch.style.display = 'flex';
                    passwordMismatch.style.display = 'none';
                    passwordConfirmError.style.display = 'none';
                    confirmPassword.setCustomValidity('');
                } else {
                    passwordMatch.style.display = 'none';
                    passwordMismatch.style.display = 'flex';
                    passwordConfirmError.style.display = 'flex';
                    confirmPassword.setCustomValidity('Passwords do not match');
                }
            } else {
                passwordMatch.style.display = 'none';
                passwordMismatch.style.display = 'none';
                passwordConfirmError.style.display = 'none';
                confirmPassword.setCustomValidity('');
            }

            // Update password strength meter
            updatePasswordStrength(passwordValue);
        }

        // Password Strength Meter
        function updatePasswordStrength(password) {
            if (!password) {
                passwordStrengthBar.style.width = '0%';
                passwordStrengthBar.style.backgroundColor = 'transparent';
                return;
            }

            let strength = 0;

            // Length check
            if (password.length >= 8) strength += 1;
            if (password.length >= 12) strength += 1;

            // Character type checks
            if (/[A-Z]/.test(password)) strength += 1;
            if (/[a-z]/.test(password)) strength += 1;
            if (/[0-9]/.test(password)) strength += 1;
            if (/[^A-Za-z0-9]/.test(password)) strength += 1;

            // Calculate percentage and color
            const percentage = (strength / 6) * 100;
            let color;

            if (strength <= 2) {
                color = '#dc3545'; // Red
            } else if (strength <= 4) {
                color = '#ffc107'; // Yellow
            } else {
                color = '#28a745'; // Green
            }

            passwordStrengthBar.style.width = `${percentage}%`;
            passwordStrengthBar.style.backgroundColor = color;
        }

        // Event listeners for password validation
        password.addEventListener('input', validatePassword);
        confirmPassword.addEventListener('input', validatePassword);

        // Form Reset Functionality
        resetBtn.addEventListener('click', function() {
            // Reset image preview
            photoInput.value = '';
            imagePreview.innerHTML = `
                <div class="mirsaige-image-placeholder">
                    <i class="fa-solid fa-user-circle"></i>
                    <span>Profile Photo</span>
                </div>
            `;
            removeBtn.style.display = 'none';

            // Reset password indicators
            passwordMatch.style.display = 'none';
            passwordMismatch.style.display = 'none';
            passwordConfirmError.style.display = 'none';
            passwordStrengthBar.style.width = '0%';
            passwordStrengthBar.style.backgroundColor = 'transparent';

            // Reset all form validation states
            const errorElements = document.querySelectorAll('.mirsaige-form-error');
            errorElements.forEach(el => el.style.display = 'none');
        });

        // Form Submission Handling
        form.addEventListener('submit', function(e) {
            // Final password match check before submission
            if (password.value !== confirmPassword.value) {
                e.preventDefault();
                passwordConfirmError.style.display = 'flex';
                confirmPassword.focus();
                showAlert('Error', 'Passwords do not match', 'error');
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

        // Phone number validation
        const phoneInput = document.getElementById('phone');
        phoneInput.addEventListener('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '');
        });

        // Initialize form validation
        validatePassword();
    });
</script>
@endsection