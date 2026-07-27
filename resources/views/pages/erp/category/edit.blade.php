@extends('layout.erp.app')
@section('title', 'Edit Category')
@section('style')
<style>
    /* Main Container */
    .mirsaige-category-container {
        padding: var(--mirsaige-space-md);
        color: var(--mirsaige-text);
        max-width: 100%;
        margin: 0 auto;
    }

    /* Header Section */
    .mirsaige-category-header {
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
    .mirsaige-category-form-container {
        background: var(--mirsaige-dark-blue);
        border-radius: 8px;
        padding: var(--mirsaige-space-md);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        border: 1px solid rgba(255, 178, 62, 0.1);
        transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
        margin: 0 auto;
    }

    .mirsaige-category-form-container:hover {
        box-shadow: 0 6px 25px rgba(0, 0, 0, 0.2);
        border-color: rgba(255, 178, 62, 0.2);
    }

    /* Form Layout */
    .mirsaige-category-form-wrapper {
        display: flex;
        flex-direction: column;
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

    /* Form Actions */
    .mirsaige-form-actions {
        display: flex;
        justify-content: flex-end;
        gap: var(--mirsaige-space-sm);
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

    /* Category Stats */
    .mirsaige-category-stats {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: var(--mirsaige-space-sm);
        margin-top: var(--mirsaige-space-md);
        padding: var(--mirsaige-space-md);
        background: rgba(255, 178, 62, 0.05);
        border-radius: 8px;
        border: 1px solid rgba(255, 178, 62, 0.1);
    }

    .mirsaige-stat-item {
        text-align: center;
        padding: var(--mirsaige-space-sm);
    }

    .mirsaige-stat-value {
        font-size: 1.5rem;
        font-weight: 600;
        color: var(--mirsaige-accent);
        display: block;
    }

    .mirsaige-stat-label {
        font-size: 0.8rem;
        color: var(--mirsaige-text);
        opacity: 0.8;
    }

    /* Responsive Styles */
    @media (max-width: 768px) {
        .mirsaige-category-header {
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

        .mirsaige-category-stats {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 576px) {
        .mirsaige-category-container {
            padding: var(--mirsaige-space-sm);
        }

        .mirsaige-category-form-container {
            padding: var(--mirsaige-space-sm);
        }

        .mirsaige-app-breadcrumb {
            display: none;
        }
        
        .mirsaige-form-control,
        .mirsaige-form-select {
            padding: var(--mirsaige-space-xs);
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
    .mirsaige-form-group:nth-child(2) { animation-delay: 0.2s; }
</style>
@endsection

@section('page')
<div class="mirsaige-category-container">
    <div class="mirsaige-category-header">
        <div class="mirsaige-app-breadcrumbs">
            <div class="mirsaige-app-breadcrumb">
                <a href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-house"></i> Home</a>
            </div>
            <div class="mirsaige-app-breadcrumb divider">
                <i class="fa-solid fa-angle-right"></i>
            </div>
            <div class="mirsaige-app-breadcrumb">
                <a href="{{ route('categories.index') }}">Categories</a>
            </div>
            <div class="mirsaige-app-breadcrumb divider">
                <i class="fa-solid fa-angle-right"></i>
            </div>
            <div class="mirsaige-app-breadcrumb">
                <a href="{{ route('categories.edit', $category->id) }}" class="active">Edit Category</a>
            </div>
        </div>

        <a href="{{ route('categories.index') }}" class="mirsaige-app-breadcrumbs-btn">
            <i class="fa-solid fa-list-check"></i> Manage Categories
        </a>
    </div>

    <div class="mirsaige-category-form-container">
        <form action="{{ route('categories.update', $category->id) }}" method="post" enctype="multipart/form-data" id="categoryEditForm">
            @csrf
            @method('PUT')

            <div class="mirsaige-category-form-wrapper">
                <div class="mirsaige-form-section">
                    <div class="mirsaige-form-group">
                        <label for="name" class="mirsaige-form-label">
                            <i class="fa-solid fa-tag"></i>
                            Category Name
                        </label>
                        <input type="text" class="mirsaige-form-control" name="name" id="name" placeholder="Enter category name" value="{{ old('name', $category->name) }}" required>
                        @error('name')
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
                            <option value="{{ $department->id }}" {{ old('department_id', $category->department_id) == $department->id ? 'selected' : '' }}>
                                {{ $department->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('department_id')
                        <small class="mirsaige-form-error"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Optional: Category Description Field -->
                    <div class="mirsaige-form-group">
                        <label for="description" class="mirsaige-form-label">
                            <i class="fa-solid fa-align-left"></i>
                            Description (Optional)
                        </label>
                        <textarea class="mirsaige-form-control" name="description" id="description" placeholder="Enter category description" rows="3">{{ old('description', $category->description ?? '') }}</textarea>
                        @error('description')
                        <small class="mirsaige-form-error"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                        @enderror
                    </div>


                </div>

                <!-- Form Actions -->
                <div class="mirsaige-form-actions">
                    <button type="reset" class="mirsaige-form-reset" id="resetBtn">
                        <i class="fas fa-undo"></i> Reset Changes
                    </button>
                    <button type="submit" class="mirsaige-form-submit" id="submitBtn">
                        <i class="fa-solid fa-floppy-disk"></i> Update Category
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
        const form = document.getElementById('categoryEditForm');
        const resetBtn = document.getElementById('resetBtn');
        const submitBtn = document.getElementById('submitBtn');
        const nameInput = document.getElementById('name');
        const departmentSelect = document.getElementById('department_id');
        const productsCount = document.getElementById('productsCount');
        const activeProducts = document.getElementById('activeProducts');



        // Department change handler
        departmentSelect.addEventListener('change', function() {
            // You can add additional logic here when department changes
            console.log('Department changed to:', this.value);
        });

        // Name validation
        nameInput.addEventListener('blur', function() {
            const name = this.value.trim();
            if (name && name.length < 2) {
                this.style.borderColor = '#ff6b6b';
                if (!this.nextElementSibling || !this.nextElementSibling.classList.contains('mirsaige-form-error')) {
                    const errorDiv = document.createElement('small');
                    errorDiv.className = 'mirsaige-form-error';
                    errorDiv.innerHTML = '<i class="fa-solid fa-circle-exclamation"></i> Category name must be at least 2 characters long';
                    this.parentNode.appendChild(errorDiv);
                }
            } else if (name) {
                this.style.borderColor = 'rgba(255, 178, 62, 0.2)';
                const errorDiv = this.nextElementSibling;
                if (errorDiv && errorDiv.classList.contains('mirsaige-form-error') && !errorDiv.hasAttribute('data-server-error')) {
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
            const inputs = form.querySelectorAll('.mirsaige-form-control, .mirsaige-form-select');
            inputs.forEach(input => {
                input.style.borderColor = 'rgba(255, 178, 62, 0.2)';
            });

            // Reload original stats
            loadCategoryStats();
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

            // Name length validation
            if (nameInput.value.trim().length < 2) {
                isValid = false;
                nameInput.style.borderColor = '#ff6b6b';
            }

            if (!isValid) {
                e.preventDefault();
                // Scroll to first error
                const firstError = form.querySelector('.mirsaige-form-error');
                if (firstError) {
                    firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
            } else {
                // Show loading state
                submitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Updating...';
                submitBtn.disabled = true;
                
                // Optional: Add a small delay to show the loading state
                setTimeout(() => {
                    form.submit();
                }, 500);
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

        // Load initial statistics
        loadCategoryStats();
    });
</script>
@endsection