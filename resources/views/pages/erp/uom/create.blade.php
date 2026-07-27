@extends('layout.erp.app')
@section('title', 'Create UOM')
@section('style')
<style>
    /* Main Container */
    .mirsaige-uom-container {
        padding: var(--mirsaige-space-md);
        color: var(--mirsaige-text);
        max-width: 100%;
        margin: 0 auto;
    }

    /* Header Section */
    .mirsaige-uom-header {
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
    .mirsaige-uom-form-container {
        background: var(--mirsaige-dark-blue);
        border-radius: 8px;
        padding: var(--mirsaige-space-md);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        border: 1px solid rgba(255, 178, 62, 0.1);
        transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
        
        margin: 0 auto;
    }

    .mirsaige-uom-form-container:hover {
        box-shadow: 0 6px 25px rgba(0, 0, 0, 0.2);
        border-color: rgba(255, 178, 62, 0.2);
    }

    /* UOM Icon Section */
    .mirsaige-uom-icon-section {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: var(--mirsaige-space-md);
        padding: var(--mirsaige-space-lg);
        background: rgba(255, 178, 62, 0.05);
        border-radius: 12px;
        border: 2px dashed rgba(255, 178, 62, 0.3);
        margin-bottom: var(--mirsaige-space-lg);
        text-align: center;
    }

    .mirsaige-uom-icon {
        width: 80px;
        height: 80px;
        background: var(--mirsaige-darker-blue);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.5rem;
        color: var(--mirsaige-accent);
        border: 3px solid rgba(255, 178, 62, 0.3);
        transition: all 0.3s ease;
    }

    .mirsaige-uom-icon-text {
        color: var(--mirsaige-text);
        font-size: 0.9rem;
        opacity: 0.8;
    }

    /* Form Fields */
    .mirsaige-form-group {
        display: flex;
        flex-direction: column;
        gap: var(--mirsaige-space-xs);
        position: relative;
        margin-bottom: var(--mirsaige-space-md);
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

    /* Additional Options Section */
    .mirsaige-uom-options {
        background: rgba(255, 178, 62, 0.05);
        border-radius: 8px;
        padding: var(--mirsaige-space-md);
        border: 1px solid rgba(255, 178, 62, 0.1);
        margin-bottom: var(--mirsaige-space-md);
    }

    .mirsaige-uom-options-header {
        color: var(--mirsaige-accent);
        font-weight: 600;
        margin-bottom: var(--mirsaige-space-sm);
        display: flex;
        align-items: center;
        gap: var(--mirsaige-space-xs);
        font-size: 1rem;
    }

    .mirsaige-option-group {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: var(--mirsaige-space-md);
    }

    /* Form Actions */
    .mirsaige-form-actions {
        display: flex;
        gap: var(--mirsaige-space-sm);
        justify-content: center;
        margin-top: var(--mirsaige-space-lg);
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

    /* UOM Examples */
    .mirsaige-uom-examples {
        background: rgba(255, 178, 62, 0.03);
        border-radius: 6px;
        padding: var(--mirsaige-space-sm);
        margin-top: var(--mirsaige-space-xs);
        border: 1px solid rgba(255, 178, 62, 0.1);
    }

    .mirsaige-uom-examples-title {
        color: var(--mirsaige-text);
        font-size: 0.8rem;
        margin-bottom: var(--mirsaige-space-2xs);
        opacity: 0.7;
    }

    .mirsaige-uom-examples-list {
        display: flex;
        flex-wrap: wrap;
        gap: var(--mirsaige-space-2xs);
        font-size: 0.75rem;
    }

    .mirsaige-uom-example {
        background: rgba(255, 178, 62, 0.1);
        padding: var(--mirsaige-space-3xs) var(--mirsaige-space-2xs);
        border-radius: 4px;
        color: var(--mirsaige-accent);
    }

    /* Responsive Styles */
    @media (max-width: 768px) {
        .mirsaige-uom-header {
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

        .mirsaige-option-group {
            grid-template-columns: 1fr;
            gap: var(--mirsaige-space-sm);
        }
    }

    @media (max-width: 576px) {
        .mirsaige-uom-container {
            padding: var(--mirsaige-space-sm);
        }

        .mirsaige-uom-form-container {
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

        .mirsaige-uom-icon-section {
            padding: var(--mirsaige-space-md);
        }

        .mirsaige-uom-icon {
            width: 60px;
            height: 60px;
            font-size: 2rem;
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

    .mirsaige-uom-form-container {
        animation: fadeIn 0.5s ease forwards;
    }

    .mirsaige-form-group {
        animation: fadeIn 0.3s ease forwards;
    }
</style>
@endsection

@section('page')
<div class="mirsaige-uom-container">
    <div class="mirsaige-uom-header">
        <div class="mirsaige-app-breadcrumbs">
            <div class="mirsaige-app-breadcrumb">
                <a href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-house"></i> Home</a>
            </div>
            <div class="mirsaige-app-breadcrumb divider">
                <i class="fa-solid fa-angle-right"></i>
            </div>
            <div class="mirsaige-app-breadcrumb">
                <a href="{{ route('uoms.index') }}">UOMs</a>
            </div>
            <div class="mirsaige-app-breadcrumb divider">
                <i class="fa-solid fa-angle-right"></i>
            </div>
            <div class="mirsaige-app-breadcrumb">
                <a href="{{ route('uoms.create') }}" class="active">Create UOM</a>
            </div>
        </div>

        <a href="{{ route('uoms.index') }}" class="mirsaige-app-breadcrumbs-btn">
            <i class="fa-solid fa-list-check"></i> UOM List
        </a>
    </div>

    <div class="mirsaige-uom-form-container">
        <form action="{{ route('uoms.store') }}" method="post" enctype="multipart/form-data" id="uomCreateForm">
            @csrf

            <!-- UOM Icon Section -->
            <div class="mirsaige-uom-icon-section">
                <div class="mirsaige-uom-icon">
                    <i class="fa-solid fa-ruler-combined"></i>
                </div>
                <div class="mirsaige-uom-icon-text">
                    Unit of Measure (UOM) defines the standard measurement units used in your inventory system
                </div>
            </div>

            <!-- Main UOM Information -->
            <div class="mirsaige-form-group">
                <label for="name" class="mirsaige-form-label">
                    <i class="fa-solid fa-tag"></i>
                    UOM Name
                </label>
                <input type="text" class="mirsaige-form-control" name="name" id="name" 
                       placeholder="Enter UOM name (e.g., Kilogram, Liter, Piece)" 
                       value="{{ old('name') }}" required maxlength="50">
                <i class="fa-solid fa-check mirsaige-validation-icon" id="nameValid"></i>
                <i class="fa-solid fa-xmark mirsaige-validation-icon" id="nameInvalid"></i>
                @error('name')
                <small class="mirsaige-form-error"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                @enderror
                
                <!-- UOM Examples -->
                <div class="mirsaige-uom-examples">
                    <div class="mirsaige-uom-examples-title">Common UOM Examples:</div>
                    <div class="mirsaige-uom-examples-list">
                        <span class="mirsaige-uom-example">Piece</span>
                        <span class="mirsaige-uom-example">Kilogram</span>
                        <span class="mirsaige-uom-example">Gram</span>
                        <span class="mirsaige-uom-example">Liter</span>
                        <span class="mirsaige-uom-example">Meter</span>
                        <span class="mirsaige-uom-example">Box</span>
                        <span class="mirsaige-uom-example">Pack</span>
                        <span class="mirsaige-uom-example">Set</span>
                    </div>
                </div>
            </div>

            <!-- Additional Options Section -->
            <div class="mirsaige-uom-options">
                <div class="mirsaige-uom-options-header">
                    <i class="fa-solid fa-gear"></i>
                    Additional Options
                </div>
                
                <div class="mirsaige-option-group">
                    <div class="mirsaige-form-group">
                        <label for="symbol" class="mirsaige-form-label">
                            <i class="fa-solid fa-symbols"></i>
                            Symbol (Optional)
                        </label>
                        <input type="text" class="mirsaige-form-control" name="symbol" id="symbol" 
                               placeholder="Enter symbol (e.g., kg, L, pcs)" 
                               value="{{ old('symbol') }}" maxlength="10">
                        @error('symbol')
                        <small class="mirsaige-form-error"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mirsaige-form-group">
                        <label for="description" class="mirsaige-form-label">
                            <i class="fa-solid fa-align-left"></i>
                            Description (Optional)
                        </label>
                        <input type="text" class="mirsaige-form-control" name="description" id="description" 
                               placeholder="Brief description of the UOM" 
                               value="{{ old('description') }}" maxlength="100">
                        @error('description')
                        <small class="mirsaige-form-error"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="mirsaige-form-actions">
                <button type="reset" class="mirsaige-form-reset" id="resetBtn">
                    <i class="fas fa-undo"></i> Reset Form
                </button>
                <button type="submit" class="mirsaige-form-submit" id="submitBtn">
                    <i class="fa-solid fa-floppy-disk"></i> Create UOM
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // DOM Elements
        const form = document.getElementById('uomCreateForm');
        const nameInput = document.getElementById('name');
        const resetBtn = document.getElementById('resetBtn');
        const submitBtn = document.getElementById('submitBtn');
        
        // Validation elements
        const nameValid = document.getElementById('nameValid');
        const nameInvalid = document.getElementById('nameInvalid');

        // Validation Functions
        function validateName() {
            const value = nameInput.value.trim();
            const isValid = value.length >= 2 && value.length <= 50 && /^[a-zA-Z\s]+$/.test(value);
            
            updateValidationIcons(nameValid, nameInvalid, isValid);
            return isValid;
        }

        function updateValidationIcons(validIcon, invalidIcon, isValid) {
            if (isValid) {
                validIcon.classList.add('mirsaige-validation-valid');
                invalidIcon.classList.remove('mirsaige-validation-invalid');
            } else {
                validIcon.classList.remove('mirsaige-validation-valid');
                invalidIcon.classList.add('mirsaige-validation-invalid');
            }
        }

        // Real-time validation
        nameInput.addEventListener('input', function() {
            // Allow only letters and spaces
            this.value = this.value.replace(/[^a-zA-Z\s]/g, '');
            validateName();
        });

        // Auto-capitalize first letter of each word
        nameInput.addEventListener('blur', function() {
            if (this.value) {
                this.value = this.value.toLowerCase().replace(/\b\w/g, function(char) {
                    return char.toUpperCase();
                });
            }
        });

        // Form Reset Functionality
        resetBtn.addEventListener('click', function() {
            // Reset validation icons
            updateValidationIcons(nameValid, nameInvalid, false);
            
            // Reset all form validation states
            const errorElements = document.querySelectorAll('.mirsaige-form-error');
            errorElements.forEach(el => el.style.display = 'none');
            
            // Show success message briefly
            setTimeout(() => {
                const successMessage = document.createElement('div');
                successMessage.className = 'mirsaige-form-success';
                successMessage.innerHTML = '<i class="fa-solid fa-check"></i> Form reset successfully';
                successMessage.style.animation = 'fadeIn 0.3s ease';
                
                const formGroup = nameInput.closest('.mirsaige-form-group');
                const existingSuccess = formGroup.querySelector('.mirsaige-form-success');
                if (existingSuccess) existingSuccess.remove();
                
                formGroup.appendChild(successMessage);
                
                setTimeout(() => {
                    successMessage.style.opacity = '0';
                    setTimeout(() => successMessage.remove(), 300);
                }, 2000);
            }, 100);
        });

        // Form Submission Handling
        form.addEventListener('submit', function(e) {
            // Validate required fields
            const isNameValid = validateName();

            if (!isNameValid) {
                e.preventDefault();
                showAlert('Error', 'Please enter a valid UOM name (2-50 characters, letters only).', 'error');
                nameInput.focus();
                return;
            }

            // Show loading state
            submitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Creating...';
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
        
        // Auto-focus on name input for better UX
        nameInput.focus();
    });
</script>
@endsection