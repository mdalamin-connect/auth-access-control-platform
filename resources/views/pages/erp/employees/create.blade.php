@extends('layout.erp.app')
@section('title', 'Create Employee')
@section('style')
<style>
    /* Main Container */
    .mirsaige-employee-container {
        padding: var(--mirsaige-space-md);
        color: var(--mirsaige-text);
        max-width: 100%;
        margin: 0 auto;
    }

    /* Header Section */
    .mirsaige-employee-header {
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
    .mirsaige-employee-form-container {
        background: var(--mirsaige-dark-blue);
        border-radius: 8px;
        padding: var(--mirsaige-space-md);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        border: 1px solid rgba(255, 178, 62, 0.1);
        transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
    }

    .mirsaige-employee-form-container:hover {
        box-shadow: 0 6px 25px rgba(0, 0, 0, 0.2);
        border-color: rgba(255, 178, 62, 0.2);
    }

    /* Form Layout */
    .mirsaige-employee-form-wrapper {
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
        padding: var(--mirsaige-space-2xs);
        border-radius: 4px;
        width: 100%;
        border: 1px solid rgba(255, 178, 62, 0.3);
    }

    /* CV Upload Section */
    .mirsaige-cv-section {
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

    .mirsaige-cv-preview-container {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .mirsaige-cv-placeholder {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        color: var(--mirsaige-text);
    }

    .mirsaige-cv-placeholder i {
        font-size: 2.5rem;
        color: var(--mirsaige-accent);
        margin-bottom: var(--mirsaige-space-xs);
        opacity: 0.7;
    }

    .mirsaige-cv-upload-actions {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: var(--mirsaige-space-sm);
        width: 100%;
    }

    .mirsaige-cv-upload-btn,
    .mirsaige-cv-remove-btn {
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

    .mirsaige-cv-upload-btn {
        background: var(--mirsaige-dark-blue);
        color: var(--mirsaige-accent);
        border: 1px solid rgba(255, 178, 62, 0.3);
    }

    .mirsaige-cv-upload-btn:hover {
        background: rgba(255, 178, 62, 0.1);
        transform: translateY(-2px);
    }

    .mirsaige-cv-remove-btn {
        background: transparent;
        color: #ff6b6b;
        border: 1px solid rgba(255, 107, 107, 0.3);
    }

    .mirsaige-cv-remove-btn:hover {
        background: rgba(255, 107, 107, 0.1);
        transform: translateY(-2px);
    }

    .mirsaige-cv-upload-info {
        color: var(--mirsaige-text);
        opacity: 0.7;
        font-size: 0.65rem;
        text-align: center;
        padding: var(--mirsaige-space-4xs);
        padding: var(--mirsaige-space-2xs);
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

    /* Success Messages */
    .mirsaige-form-success {
        color: #28a745;
        font-size: 0.8rem;
        margin-top: var(--mirsaige-space-3xs);
        display: flex;
        align-items: center;
        gap: var(--mirsaige-space-3xs);
    }

    /* Responsive Styles */
    @media (max-width: 1200px) {
        .mirsaige-employee-form-wrapper {
            gap: var(--mirsaige-space-md);
        }
    }

    @media (max-width: 992px) {
        .mirsaige-employee-form-wrapper {
            grid-template-columns: 1fr;
        }

        .mirsaige-image-section,
        .mirsaige-cv-section {
            order: -1;
            margin-bottom: var(--mirsaige-space-lg);
        }

        .mirsaige-form-actions {
            justify-content: center;
        }
    }

    @media (max-width: 768px) {
        .mirsaige-employee-header {
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

        .mirsaige-image-section,
        .mirsaige-cv-section {
            width: 100%;
        }
    }

    @media (max-width: 576px) {
        .mirsaige-employee-container {
            padding: var(--mirsaige-space-sm);
        }

        .mirsaige-employee-form-container {
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
        .mirsaige-image-upload-info,
        .mirsaige-cv-upload-info {
            font-size: 0.6rem;
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
        .mirsaige-image-upload-info,
        .mirsaige-cv-upload-info {
            font-size: 0.5rem;
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
    .mirsaige-form-group:nth-child(9) { animation-delay: 0.5s; }
    .mirsaige-form-group:nth-child(10) { animation-delay: 0.55s; }
    .mirsaige-form-group:nth-child(11) { animation-delay: 0.6s; }
</style>
@endsection

@section('page')
<div class="mirsaige-employee-container">
    <div class="mirsaige-employee-header">
        <div class="mirsaige-app-breadcrumbs">
            <div class="mirsaige-app-breadcrumb">
                <a href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-house"></i> Home</a>
            </div>
            <div class="mirsaige-app-breadcrumb divider">
                <i class="fa-solid fa-angle-right"></i>
            </div>
            <div class="mirsaige-app-breadcrumb">
                <a href="{{ route('employees.index') }}">Employees</a>
            </div>
            <div class="mirsaige-app-breadcrumb divider">
                <i class="fa-solid fa-angle-right"></i>
            </div>
            <div class="mirsaige-app-breadcrumb">
                <a href="{{ route('employees.create') }}" class="active">Create Employee</a>
            </div>
        </div>

        <a href="{{ route('employees.index') }}" class="mirsaige-app-breadcrumbs-btn">
            <i class="fa-solid fa-list-check"></i> Employee List
        </a>
    </div>

    <div class="mirsaige-employee-form-container">
        <form action="{{ route('employees.store') }}" method="post" enctype="multipart/form-data" id="employeeCreateForm">
            @csrf

            <div class="mirsaige-employee-form-wrapper">
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

                    <div class="mirsaige-form-group">
                        <label for="nid" class="mirsaige-form-label">
                            <i class="fa-solid fa-id-card"></i>
                            National ID (NID)
                        </label>
                        <input type="text" class="mirsaige-form-control" name="nid" id="nid" placeholder="Enter national ID number" value="{{ old('nid') }}">
                        @error('nid')
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
                            <option value="{{ $department->id }}" {{ old('department_id') == $department->id ? 'selected' : '' }}>{{ $department->name }}</option>
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
                            <option value="{{ $designation->id }}" {{ old('designation_id') == $designation->id ? 'selected' : '' }}>{{ $designation->name }}</option>
                            @endforeach
                        </select>
                        @error('designation_id')
                        <small class="mirsaige-form-error"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mirsaige-form-group">
                        <label for="joining_date" class="mirsaige-form-label">
                            <i class="fa-solid fa-calendar-day"></i>
                            Joining Date
                        </label>
                        <input type="date" class="mirsaige-form-control" name="joining_date" id="joining_date" value="{{ old('joining_date') }}" required>
                        @error('joining_date')
                        <small class="mirsaige-form-error"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <!-- Right Section - Employment Info -->
                <div class="mirsaige-form-half-section">
									 <!-- Employment Information -->
                    <div class="mirsaige-form-group">
                        <label for="salary" class="mirsaige-form-label">
                            <i class="fa-solid fa-money-bill-wave"></i>
                            Salary
                        </label>
                        <input type="number" class="mirsaige-form-control" name="salary" id="salary" placeholder="Enter salary" value="{{ old('salary') }}" required>
                        @error('salary')
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
                    <!-- Image Upload Section -->
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

                    <!-- CV Upload Section -->
                    <div class="mirsaige-cv-section" id="cvUploadSection">
                        <div class="mirsaige-cv-preview-container">
                            <div class="mirsaige-cv-placeholder" id="cvPreview">
                                <i class="fa-solid fa-file-pdf"></i>
                                <span>Upload CV</span>
                            </div>
                        </div>

                        <div class="mirsaige-cv-upload-actions">
                            <input type="file" name="cv" id="cv" accept=".pdf,.doc,.docx" style="display: none;">
                            <button type="button" class="mirsaige-cv-upload-btn" id="uploadCvBtn">
                                <i class="fa-solid fa-upload"></i> Choose CV
                            </button>
                            <button type="button" class="mirsaige-cv-remove-btn" id="removeCvBtn" style="display: none;">
                                <i class="fa-solid fa-trash"></i> Remove CV
                            </button>
                            <div class="mirsaige-cv-upload-info">
                                PDF or DOC/DOCX (Max 5MB)
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
                        <i class="fa-solid fa-floppy-disk"></i> Save Employee
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
        const form = document.getElementById('employeeCreateForm');
        const photoInput = document.getElementById('photo');
        const uploadBtn = document.getElementById('uploadBtn');
        const removeBtn = document.getElementById('removeBtn');
        const imagePreview = document.getElementById('imagePreview');
        const cvInput = document.getElementById('cv');
        const uploadCvBtn = document.getElementById('uploadCvBtn');
        const removeCvBtn = document.getElementById('removeCvBtn');
        const cvPreview = document.getElementById('cvPreview');
        const resetBtn = document.getElementById('resetBtn');
        const submitBtn = document.getElementById('submitBtn');
        const phoneInput = document.getElementById('phone');

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

        // CV Upload Functionality
        uploadCvBtn.addEventListener('click', function() {
            cvInput.click();
        });

        cvInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                // Validate file size (max 5MB)
                if (file.size > 5 * 1024 * 1024) {
                    showAlert('Error', 'CV file size should be less than 5MB', 'error');
                    this.value = '';
                    return;
                }

                // Validate file type
                const validTypes = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
                if (!validTypes.includes(file.type)) {
                    showAlert('Error', 'Only PDF or DOC/DOCX files are allowed', 'error');
                    this.value = '';
                    return;
                }

                // Clear previous content
                cvPreview.innerHTML = '';

                // Create and append new preview
                const icon = document.createElement('i');
                icon.className = 'fa-solid fa-file-pdf';
                
                const fileName = document.createElement('span');
                fileName.textContent = file.name;
                fileName.style.marginTop = '10px';
                fileName.style.fontSize = '0.8rem';
                fileName.style.textAlign = 'center';
                fileName.style.wordBreak = 'break-word';

                cvPreview.appendChild(icon);
                cvPreview.appendChild(fileName);

                // Show remove button
                removeCvBtn.style.display = 'flex';
            }
        });

        removeCvBtn.addEventListener('click', function() {
            cvInput.value = '';
            cvPreview.innerHTML = `
                <i class="fa-solid fa-file-pdf"></i>
                <span>Upload CV</span>
            `;
            removeCvBtn.style.display = 'none';
        });

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

            // Reset CV preview
            cvInput.value = '';
            cvPreview.innerHTML = `
                <i class="fa-solid fa-file-pdf"></i>
                <span>Upload CV</span>
            `;
            removeCvBtn.style.display = 'none';

            // Reset all form validation states
            const errorElements = document.querySelectorAll('.mirsaige-form-error');
            errorElements.forEach(el => el.style.display = 'none');
        });

        // Form Submission Handling
        form.addEventListener('submit', function(e) {
            // Show loading state
            submitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Processing...';
            submitBtn.disabled = true;
        });

        // Phone number validation
        phoneInput.addEventListener('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '');
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
    });
</script>
@endsection