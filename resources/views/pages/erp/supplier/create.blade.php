@extends('layout.erp.app')
@section('title', 'Create Supplier')
@section('style')
<style>
    /* Main Container */
    .mirsaige-supplier-container {
        padding: var(--mirsaige-space-md);
        color: var(--mirsaige-text);
        max-width: 100%;
        margin: 0 auto;
    }

    /* Header Section */
    .mirsaige-supplier-header {
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
    .mirsaige-supplier-form-container {
        background: var(--mirsaige-dark-blue);
        border-radius: 8px;
        padding: var(--mirsaige-space-md);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        border: 1px solid rgba(255, 178, 62, 0.1);
        transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
    }

    .mirsaige-supplier-form-container:hover {
        box-shadow: 0 6px 25px rgba(0, 0, 0, 0.2);
        border-color: rgba(255, 178, 62, 0.2);
    }

    /* Form Layout */
    .mirsaige-supplier-form-wrapper {
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

    /* Full width fields */
    .mirsaige-form-group.full-width {
        grid-column: span 2;
    }

    /* Contact Information Section */
    .mirsaige-contact-section {
        background: rgba(255, 178, 62, 0.05);
        border-radius: 8px;
        padding: var(--mirsaige-space-md);
        border: 1px solid rgba(255, 178, 62, 0.1);
        margin-bottom: var(--mirsaige-space-md);
    }

    .mirsaige-contact-header {
        color: var(--mirsaige-accent);
        font-weight: 600;
        margin-bottom: var(--mirsaige-space-sm);
        display: flex;
        align-items: center;
        gap: var(--mirsaige-space-xs);
        font-size: 1rem;
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

    /* Validation Icons */
    .mirsaige-validation-icon {
        position: absolute;
        right: var(--mirsaige-space-sm);
        top: 50%;
        transform: translateY(-50%);
        font-size: 0.9rem;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .mirsaige-validation-valid {
        color: #28a745;
        opacity: 1;
    }

    .mirsaige-validation-invalid {
        color: #dc3545;
        opacity: 1;
    }

    /* Responsive Styles */
    @media (max-width: 1200px) {
        .mirsaige-supplier-form-wrapper {
            gap: var(--mirsaige-space-md);
        }
    }

    @media (max-width: 992px) {
        .mirsaige-supplier-form-wrapper {
            grid-template-columns: 1fr;
        }

        .mirsaige-form-actions {
            justify-content: center;
        }
    }

    @media (max-width: 768px) {
        .mirsaige-supplier-header {
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
        .mirsaige-supplier-container {
            padding: var(--mirsaige-space-sm);
        }

        .mirsaige-supplier-form-container {
            padding: var(--mirsaige-space-sm);
        }

        .mirsaige-app-breadcrumbs {
            font-size: 0.7rem;
        }
        
        .mirsaige-app-breadcrumb a {
            padding: var(--mirsaige-space-3xs);
        }
        
        .mirsaige-app-breadcrumbs-btn {
            padding: var(--mirsaige-space-2xs) var(--mirsaige-space-2xs);
            font-size: 0.75rem;
            margin-top: 10px;
        }
        
        .mirsaige-form-control {
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
        
        .mirsaige-form-control {
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
</style>
@endsection

@section('page')
<div class="mirsaige-supplier-container">
    <div class="mirsaige-supplier-header">
        <div class="mirsaige-app-breadcrumbs">
            <div class="mirsaige-app-breadcrumb">
                <a href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-house"></i> Home</a>
            </div>
            <div class="mirsaige-app-breadcrumb divider">
                <i class="fa-solid fa-angle-right"></i>
            </div>
            <div class="mirsaige-app-breadcrumb">
                <a href="{{ route('suppliers.index') }}">Suppliers</a>
            </div>
            <div class="mirsaige-app-breadcrumb divider">
                <i class="fa-solid fa-angle-right"></i>
            </div>
            <div class="mirsaige-app-breadcrumb">
                <a href="{{ route('suppliers.create') }}" class="active">Create Supplier</a>
            </div>
        </div>

        <a href="{{ route('suppliers.index') }}" class="mirsaige-app-breadcrumbs-btn">
            <i class="fa-solid fa-list-check"></i> Supplier List
        </a>
    </div>

    <div class="mirsaige-supplier-form-container">
        <form action="{{ route('suppliers.store') }}" method="post" enctype="multipart/form-data" id="supplierCreateForm">
            @csrf

            <div class="mirsaige-supplier-form-wrapper">
                <!-- Left Section - Basic Supplier Info -->
                <div class="mirsaige-form-half-section">
                    <!-- Basic Information Fields -->
                    <div class="mirsaige-form-group">
                        <label for="name" class="mirsaige-form-label">
                            <i class="fa-solid fa-user-tie"></i>
                            Supplier Name
                        </label>
                        <input type="text" class="mirsaige-form-control" name="name" id="name" placeholder="Enter supplier name" value="{{ old('name') }}" required>
                        <i class="fa-solid fa-check mirsaige-validation-icon" id="nameValid"></i>
                        <i class="fa-solid fa-xmark mirsaige-validation-icon" id="nameInvalid"></i>
                        @error('name')
                        <small class="mirsaige-form-error"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mirsaige-form-group">
                        <label for="company_name" class="mirsaige-form-label">
                            <i class="fa-solid fa-building"></i>
                            Company Name
                        </label>
                        <input type="text" class="mirsaige-form-control" name="company_name" id="company_name" placeholder="Enter company name" value="{{ old('company_name') }}" required>
                        <i class="fa-solid fa-check mirsaige-validation-icon" id="companyNameValid"></i>
                        <i class="fa-solid fa-xmark mirsaige-validation-icon" id="companyNameInvalid"></i>
                        @error('company_name')
                        <small class="mirsaige-form-error"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mirsaige-contact-section">
                        <div class="mirsaige-contact-header">
                            <i class="fa-solid fa-address-card"></i>
                            Contact Information
                        </div>
                        
                        <div class="mirsaige-form-group">
                            <label for="email" class="mirsaige-form-label">
                                <i class="fa-solid fa-envelope"></i>
                                Email Address
                            </label>
                            <input type="email" class="mirsaige-form-control" name="email" id="email" placeholder="Enter email address" value="{{ old('email') }}">
                            <i class="fa-solid fa-check mirsaige-validation-icon" id="emailValid"></i>
                            <i class="fa-solid fa-xmark mirsaige-validation-icon" id="emailInvalid"></i>
                            @error('email')
                            <small class="mirsaige-form-error"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mirsaige-form-group">
                            <label for="phone" class="mirsaige-form-label">
                                <i class="fa-solid fa-phone"></i>
                                Phone Number
                            </label>
                            <input type="text" class="mirsaige-form-control" name="phone" id="phone" placeholder="Enter phone number" value="{{ old('phone') }}" required>
                            <i class="fa-solid fa-check mirsaige-validation-icon" id="phoneValid"></i>
                            <i class="fa-solid fa-xmark mirsaige-validation-icon" id="phoneInvalid"></i>
                            @error('phone')
                            <small class="mirsaige-form-error"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Right Section - Address Information -->
                <div class="mirsaige-form-half-section">
                    <!-- Address Information -->
                    <div class="mirsaige-form-group full-width">
                        <label for="address" class="mirsaige-form-label">
                            <i class="fa-solid fa-map-marker-alt"></i>
                            Full Address
                        </label>
                        <textarea class="mirsaige-form-control" name="address" id="address" placeholder="Enter complete address" rows="6">{{ old('address') }}</textarea>
                        @error('address')
                        <small class="mirsaige-form-error"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Additional Fields Section (Placeholder for future expansion) -->
                    <div class="mirsaige-contact-section">
                        <div class="mirsaige-contact-header">
                            <i class="fa-solid fa-info-circle"></i>
                            Additional Information
                        </div>
                        
                        <div class="mirsaige-form-group">
                            <label for="tax_number" class="mirsaige-form-label">
                                <i class="fa-solid fa-receipt"></i>
                                Tax Number (Optional)
                            </label>
                            <input type="text" class="mirsaige-form-control" name="tax_number" id="tax_number" placeholder="Enter tax identification number" value="{{ old('tax_number') }}">
                            @error('tax_number')
                            <small class="mirsaige-form-error"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mirsaige-form-group">
                            <label for="website" class="mirsaige-form-label">
                                <i class="fa-solid fa-globe"></i>
                                Website (Optional)
                            </label>
                            <input type="url" class="mirsaige-form-control" name="website" id="website" placeholder="Enter website URL" value="{{ old('website') }}">
                            @error('website')
                            <small class="mirsaige-form-error"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <!-- Status Field (if needed in future) -->
                    <!--
                    <div class="mirsaige-form-group">
                        <label for="status" class="mirsaige-form-label">
                            <i class="fa-solid fa-circle-check"></i>
                            Status
                        </label>
                        <select class="mirsaige-form-control" name="status" id="status">
                            <option value="1" selected>Active</option>
                            <option value="0">Inactive</option>
                        </select>
                        @error('status')
                        <small class="mirsaige-form-error"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                        @enderror
                    </div>
                    -->
                </div>

                <!-- Form Actions (Full Width) -->
                <div class="mirsaige-form-actions">
                    <button type="reset" class="mirsaige-form-reset" id="resetBtn">
                        <i class="fas fa-undo"></i> Reset Form
                    </button>
                    <button type="submit" class="mirsaige-form-submit" id="submitBtn">
                        <i class="fa-solid fa-floppy-disk"></i> Save Supplier
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
        const form = document.getElementById('supplierCreateForm');
        const resetBtn = document.getElementById('resetBtn');
        const submitBtn = document.getElementById('submitBtn');
        
        // Validation elements
        const nameInput = document.getElementById('name');
        const companyNameInput = document.getElementById('company_name');
        const emailInput = document.getElementById('email');
        const phoneInput = document.getElementById('phone');
        
        const nameValid = document.getElementById('nameValid');
        const nameInvalid = document.getElementById('nameInvalid');
        const companyNameValid = document.getElementById('companyNameValid');
        const companyNameInvalid = document.getElementById('companyNameInvalid');
        const emailValid = document.getElementById('emailValid');
        const emailInvalid = document.getElementById('emailInvalid');
        const phoneValid = document.getElementById('phoneValid');
        const phoneInvalid = document.getElementById('phoneInvalid');

        // Validation Functions
        function validateName() {
            const value = nameInput.value.trim();
            const isValid = value.length >= 2 && value.length <= 100;
            
            updateValidationIcons(nameValid, nameInvalid, isValid);
            return isValid;
        }

        function validateCompanyName() {
            const value = companyNameInput.value.trim();
            const isValid = value.length >= 2 && value.length <= 200;
            
            updateValidationIcons(companyNameValid, companyNameInvalid, isValid);
            return isValid;
        }

        function validateEmail() {
            const value = emailInput.value.trim();
            if (value === '') {
                updateValidationIcons(emailValid, emailInvalid, null);
                return true; // Email is optional
            }
            
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            const isValid = emailRegex.test(value);
            
            updateValidationIcons(emailValid, emailInvalid, isValid);
            return isValid;
        }

        function validatePhone() {
            const value = phoneInput.value.trim();
            // Basic phone validation - adjust regex as needed for your region
            const phoneRegex = /^[\d\s\-\+\(\)]{10,}$/;
            const isValid = phoneRegex.test(value) && value.replace(/\D/g, '').length >= 10;
            
            updateValidationIcons(phoneValid, phoneInvalid, isValid);
            return isValid;
        }

        function updateValidationIcons(validIcon, invalidIcon, isValid) {
            if (isValid === null) {
                // Field is optional and empty
                validIcon.classList.remove('mirsaige-validation-valid');
                invalidIcon.classList.remove('mirsaige-validation-invalid');
            } else if (isValid) {
                validIcon.classList.add('mirsaige-validation-valid');
                invalidIcon.classList.remove('mirsaige-validation-invalid');
            } else {
                validIcon.classList.remove('mirsaige-validation-valid');
                invalidIcon.classList.add('mirsaige-validation-invalid');
            }
        }

        // Real-time validation
        nameInput.addEventListener('input', validateName);
        companyNameInput.addEventListener('input', validateCompanyName);
        emailInput.addEventListener('input', validateEmail);
        phoneInput.addEventListener('input', validatePhone);

        // Phone number formatting
        phoneInput.addEventListener('input', function() {
            // Remove non-numeric characters except +, -, (, )
            this.value = this.value.replace(/[^\d\s\-\+\(\)]/g, '');
        });

        // Form Reset Functionality
        resetBtn.addEventListener('click', function() {
            // Reset validation icons
            updateValidationIcons(nameValid, nameInvalid, null);
            updateValidationIcons(companyNameValid, companyNameInvalid, null);
            updateValidationIcons(emailValid, emailInvalid, null);
            updateValidationIcons(phoneValid, phoneInvalid, null);
            
            // Reset all form validation states
            const errorElements = document.querySelectorAll('.mirsaige-form-error');
            errorElements.forEach(el => el.style.display = 'none');
        });

        // Form Submission Handling
        form.addEventListener('submit', function(e) {
            // Validate all required fields
            const isNameValid = validateName();
            const isCompanyNameValid = validateCompanyName();
            const isEmailValid = validateEmail();
            const isPhoneValid = validatePhone();

            if (!isNameValid || !isCompanyNameValid || !isEmailValid || !isPhoneValid) {
                e.preventDefault();
                showAlert('Error', 'Please fix the validation errors before submitting.', 'error');
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

        // Initialize validation on page load
        validateName();
        validateCompanyName();
        validateEmail();
        validatePhone();
    });
</script>
@endsection