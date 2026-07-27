@extends('layout.erp.app')
@section('title', 'Edit Supplier')
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
        font-size: 0.85rem;
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

    /* Form Actions */
    .mirsaige-form-actions {
        display: flex;
        justify-content: flex-end;
        gap: var(--mirsaige-space-sm);
        margin-top: var(--mirsaige-space-md);
        grid-column: 1 / -1;
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
    @media (max-width: 992px) {
        .mirsaige-supplier-form-wrapper {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 768px) {
        .mirsaige-supplier-header {
            flex-direction: row;
        }

        .mirsaige-app-breadcrumb {
            display: none;
        }
        
        .mirsaige-form-actions {
            flex-direction: column;
            gap: var(--mirsaige-space-xs);
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

        .mirsaige-app-breadcrumb {
            display: none;
        }
        
        .mirsaige-form-control {
            padding: var(--mirsaige-space-xs);
        }

        /* Ensure inputs don't overflow on small devices */
        input, select, textarea {
            max-width: 100%;
            box-sizing: border-box;
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
                <a href="{{ route('suppliers.edit', $supplier->id) }}" class="active">Edit Supplier</a>
            </div>
        </div>

        <a href="{{ route('suppliers.index') }}" class="mirsaige-app-breadcrumbs-btn">
            <i class="fa-solid fa-list-check"></i> Manage Suppliers
        </a>
    </div>

    <div class="mirsaige-supplier-form-container">
        <form action="{{ route('suppliers.update', $supplier->id) }}" method="post" enctype="multipart/form-data" id="supplierEditForm">
            @csrf
            @method('PUT')

            <div class="mirsaige-supplier-form-wrapper">
                <!-- Left Section - Basic Info -->
                <div class="mirsaige-form-section">
                    <div class="mirsaige-form-group">
                        <label for="name" class="mirsaige-form-label">
                            <i class="fa-solid fa-user"></i>
                            Supplier Name
                        </label>
                        <input type="text" class="mirsaige-form-control" name="name" id="name" placeholder="Enter supplier name" value="{{ old('name', $supplier->name) }}" required>
                        @error('name')
                        <small class="mirsaige-form-error"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mirsaige-form-group">
                        <label for="email" class="mirsaige-form-label">
                            <i class="fa-solid fa-envelope"></i>
                            Email Address
                        </label>
                        <input type="email" class="mirsaige-form-control" name="email" id="email" placeholder="Enter email address" value="{{ old('email', $supplier->email) }}" required>
                        @error('email')
                        <small class="mirsaige-form-error"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mirsaige-form-group">
                        <label for="company_name" class="mirsaige-form-label">
                            <i class="fa-solid fa-building"></i>
                            Company Name
                        </label>
                        <input type="text" class="mirsaige-form-control" name="company_name" id="company_name" placeholder="Enter company name" value="{{ old('company_name', $supplier->company_name) }}" required>
                        @error('company_name')
                        <small class="mirsaige-form-error"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <!-- Right Section - Contact Info -->
                <div class="mirsaige-form-section">
                    <div class="mirsaige-form-group">
                        <label for="phone" class="mirsaige-form-label">
                            <i class="fa-solid fa-phone"></i>
                            Phone Number
                        </label>
                        <input type="text" class="mirsaige-form-control" name="phone" id="phone" placeholder="Enter phone number" value="{{ old('phone', $supplier->phone) }}" pattern="[0-9]{10,15}" required>
                        @error('phone')
                        <small class="mirsaige-form-error"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mirsaige-form-group">
                        <label for="address" class="mirsaige-form-label">
                            <i class="fa-solid fa-map-marker-alt"></i>
                            Address
                        </label>
                        <textarea class="mirsaige-form-control" name="address" id="address" placeholder="Enter supplier address" rows="3">{{ old('address', $supplier->address) }}</textarea>
                        @error('address')
                        <small class="mirsaige-form-error"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Additional Fields (if needed in future) -->
                    <div class="mirsaige-form-group" style="opacity: 0.7;">
                        <label class="mirsaige-form-label">
                            <i class="fa-solid fa-plus-circle"></i>
                            Additional Information
                        </label>
                        <div style="padding: var(--mirsaige-space-sm); background: rgba(255, 178, 62, 0.05); border-radius: 6px; font-size: 0.85rem;">
                            <i class="fa-solid fa-info-circle" style="color: var(--mirsaige-accent);"></i>
                            Additional supplier fields can be added here as needed.
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="mirsaige-form-actions">
                    <button type="reset" class="mirsaige-form-reset" id="resetBtn">
                        <i class="fas fa-undo"></i> Reset Changes
                    </button>
                    <button type="submit" class="mirsaige-form-submit" id="submitBtn">
                        <i class="fa-solid fa-floppy-disk"></i> Update Supplier
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
        const form = document.getElementById('supplierEditForm');
        const resetBtn = document.getElementById('resetBtn');
        const submitBtn = document.getElementById('submitBtn');
        const phoneInput = document.getElementById('phone');

        // Phone number validation
        phoneInput.addEventListener('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '');
        });

        // Email validation
        const emailInput = document.getElementById('email');
        emailInput.addEventListener('blur', function() {
            const email = this.value;
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            
            if (email && !emailPattern.test(email)) {
                this.style.borderColor = '#ff6b6b';
                if (!this.nextElementSibling || !this.nextElementSibling.classList.contains('mirsaige-form-error')) {
                    const errorDiv = document.createElement('small');
                    errorDiv.className = 'mirsaige-form-error';
                    errorDiv.innerHTML = '<i class="fa-solid fa-circle-exclamation"></i> Please enter a valid email address';
                    this.parentNode.appendChild(errorDiv);
                }
            } else {
                this.style.borderColor = 'rgba(255, 178, 62, 0.2)';
                const errorDiv = this.nextElementSibling;
                if (errorDiv && errorDiv.classList.contains('mirsaige-form-error')) {
                    errorDiv.remove();
                }
            }
        });

        // Form Reset Functionality
        resetBtn.addEventListener('click', function() {
            // Clear any custom error messages
            const errorMessages = form.querySelectorAll('.mirsaige-form-error');
            errorMessages.forEach(error => {
                if (!error.hasAttribute('data-server-error')) {
                    error.remove();
                }
            });

            // Reset border colors
            const inputs = form.querySelectorAll('.mirsaige-form-control');
            inputs.forEach(input => {
                input.style.borderColor = 'rgba(255, 178, 62, 0.2)';
            });
        });

        // Form Submission Handling
        form.addEventListener('submit', function(e) {
            let isValid = true;

            // Basic validation
            const requiredFields = form.querySelectorAll('[required]');
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    isValid = false;
                    field.style.borderColor = '#ff6b6b';
                    if (!field.nextElementSibling || !field.nextElementSibling.classList.contains('mirsaige-form-error')) {
                        const errorDiv = document.createElement('small');
                        errorDiv.className = 'mirsaige-form-error';
                        errorDiv.innerHTML = '<i class="fa-solid fa-circle-exclamation"></i> This field is required';
                        field.parentNode.appendChild(errorDiv);
                    }
                }
            });

            if (!isValid) {
                e.preventDefault();
                // Scroll to first error
                const firstError = form.querySelector('.mirsaige-form-error');
                if (firstError) {
                    firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
            } else {
                // Show loading state
                submitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Processing...';
                submitBtn.disabled = true;
            }
        });

        // Real-time validation for required fields
        const requiredFields = form.querySelectorAll('[required]');
        requiredFields.forEach(field => {
            field.addEventListener('input', function() {
                if (this.value.trim()) {
                    this.style.borderColor = 'rgba(255, 178, 62, 0.2)';
                    const errorDiv = this.nextElementSibling;
                    if (errorDiv && errorDiv.classList.contains('mirsaige-form-error') && !errorDiv.hasAttribute('data-server-error')) {
                        errorDiv.remove();
                    }
                }
            });
        });
    });
</script>
@endsection