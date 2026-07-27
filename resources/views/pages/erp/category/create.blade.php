@extends('layout.erp.app')
@section('title', 'Create Category')
@section('style')
<style>
    /* Base Styles */
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
        text-decoration: none;
    }

    .mirsaige-app-breadcrumbs-btn:hover {
        background: rgba(255, 178, 62, 0.1);
        color: var(--mirsaige-accent);
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(221, 153, 51, 0.3);
    }

    /* Form Container */
    .mirsaige-category-form-container {
        background: var(--mirsaige-dark-blue);
        border-radius: 8px;
        padding: var(--mirsaige-space-md);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        border: 1px solid rgba(255, 178, 62, 0.1);
        transition: all 0.3s ease;
    }

    .mirsaige-category-form-container:hover {
        box-shadow: 0 6px 25px rgba(0, 0, 0, 0.2);
        border-color: rgba(255, 178, 62, 0.2);
    }

    /* Form Styles */
    .mirsaige-category-form {
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

    .mirsaige-form-select {
        background: var(--mirsaige-darker-blue);
        border: 1px solid rgba(255, 178, 62, 0.2);
        border-radius: 4px;
        padding: var(--mirsaige-space-xs) var(--mirsaige-space-sm);
        color: var(--mirsaige-text);
        transition: all 0.2s ease;
        width: 100%;
        cursor: pointer;
    }

    .mirsaige-form-select:focus {
        outline: none;
        border-color: var(--mirsaige-accent);
        box-shadow: 0 0 0 2px rgba(255, 178, 62, 0.2);
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
        .mirsaige-category-form {
            grid-template-columns: repeat(2, 1fr);
        }
        
        .mirsaige-form-group.full-width {
            grid-column: span 2;
        }
    }

    @media (max-width: 767px) {
        .mirsaige-category-container {
            padding: var(--mirsaige-space-sm);
        }
        
        .mirsaige-app-breadcrumbs {
            font-size: 0.8rem;
        }
        .mirsaige-app-breadcrumb a{
            padding: var(--mirsaige-space-3xs);
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
            font-size: 0.5rem;
        }
        .mirsaige-app-breadcrumb a{
            padding: var(--mirsaige-space-3xs);
        }
        .mirsaige-app-breadcrumbs-btn {
            padding: var(--mirsaige-space-2xs) var(--mirsaige-space-2xs);
            font-size: 0.75rem;
            margin-top: 10px;
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
</style>
@endsection

@section('page')
<div class="mirsaige-category-container">
    <div class="mirsaige-category-header">
        <div>
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
                    <a href="{{ route('categories.create') }}" class="active">Create Category</a>
                </div>
            </div>
        </div>
        
        <a href="{{ route('categories.index') }}" class="mirsaige-app-breadcrumbs-btn">
            <i class="fa-solid fa-list-check"></i>Category List
        </a>
    </div>

    <div class="mirsaige-category-form-container mirsaige-animated-form">
        <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data" class="mirsaige-category-form">
            @csrf
            
            <div class="mirsaige-form-group full-width">
                <label for="name" class="mirsaige-form-label">
                    <i class="fa-solid fa-tag"></i>
                    Category Name
                </label>
                <input type="text" class="mirsaige-form-control" name="name" id="name" placeholder="Enter category name" required>
                @error('name')
                    <small class="text-danger" style="color: #ff6b6b !important;">{{ $message }}</small>
                @enderror
            </div>
            
            <div class="mirsaige-form-group full-width">
                <label for="department_id" class="mirsaige-form-label">
                    <i class="fa-solid fa-building"></i>
                    Department
                </label>
                <select class="mirsaige-form-select" name="department_id" id="department_id" required>
                    <option value="">Select Department</option>
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </select>
                @error('department_id')
                    <small class="text-danger" style="color: #ff6b6b !important;">{{ $message }}</small>
                @enderror
            </div>
            
            <div class="mirsaige-form-actions">
                <button type="submit" class="mirsaige-form-submit">
                   <i class="fa-solid fa-floppy-disk"></i> Save Category
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
        // Add focus effect to form inputs
        const inputs = document.querySelectorAll('.mirsaige-form-control, .mirsaige-form-select');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.querySelector('.mirsaige-form-label').style.color = 'var(--mirsaige-gold)';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.querySelector('.mirsaige-form-label').style.color = 'var(--mirsaige-accent)';
            });
        });
        
        // Form reset functionality
        const resetBtn = document.getElementById('resetFormBtn');
        if (resetBtn) {
            resetBtn.addEventListener('click', function() {
                // Clear all form inputs
                document.querySelector('input[name="name"]').value = '';
                document.querySelector('select[name="department_id"]').selectedIndex = 0;
                
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
        const form = document.querySelector('.mirsaige-category-form');
        if (form) {
            form.addEventListener('submit', function() {
                const submitBtn = this.querySelector('button[type="submit"]');
                if (submitBtn) {
                    submitBtn.innerHTML = '<i class="fa-solid fa-circle-notch fa-spin"></i> Processing...';
                    submitBtn.disabled = true;
                }
            });
        }
    });
</script>
@endsection