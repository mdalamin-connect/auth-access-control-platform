@extends('layout.erp.app')
@section('title', 'Edit Permission')
@section('style')
<style>
    /* Base Styles */
    .mirsaige-permission-container {
        background: var(--mirsaige-dark-blue);
        border-radius: 8px;
        padding: var(--mirsaige-space-md);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        border: 1px solid rgba(255, 178, 62, 0.1);
        transition: all 0.3s ease;
    }

    .mirsaige-permission-container:hover {
        box-shadow: 0 6px 25px rgba(0, 0, 0, 0.2);
        border-color: rgba(255, 178, 62, 0.2);
    }

    /* Form Elements */
    .mirsaige-form-label {
        color: var(--mirsaige-accent);
        font-weight: 500;
        margin-bottom: var(--mirsaige-space-xs);
        display: block;
    }

    .mirsaige-form-input {
        background: var(--mirsaige-darker-blue);
        border: 1px solid rgba(255, 178, 62, 0.2);
        color: var(--mirsaige-white);
        padding: var(--mirsaige-space-xs) var(--mirsaige-space-sm);
        border-radius: 6px;
        width: 100%;
        transition: all 0.3s ease;
    }

    .mirsaige-form-input:focus {
        border-color: var(--mirsaige-accent);
        box-shadow: 0 0 0 3px rgba(255, 178, 62, 0.2);
        outline: none;
    }

    .mirsaige-form-input:hover {
        border-color: rgba(255, 178, 62, 0.4);
    }

    .mirsaige-form-btn {
        background: var(--mirsaige-accent);
        color: var(--mirsaige-dark);
        border: none;
        padding: var(--mirsaige-space-xs) var(--mirsaige-space-md);
        border-radius: 6px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: var(--mirsaige-space-xs);
    }

    .mirsaige-form-btn:hover {
        background: #FFA01A;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(221, 153, 51, 0.3);
    }

    .mirsaige-form-btn-secondary {
        background: var(--mirsaige-dark-blue);
        color: var(--mirsaige-accent);
        border: 1px solid rgba(255, 178, 62, 0.3);
    }

    .mirsaige-form-btn-secondary:hover {
        background: rgba(255, 178, 62, 0.1);
        color: var(--mirsaige-accent);
        transform: translateY(-2px);
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

    .mirsaige-app-breadcrumb.divider i {
        color: var(--mirsaige-text);
        opacity: 0.7;
        font-size: 0.9rem;
    }

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

    .mirsaige-form-textarea {
        min-height: 100px;
        resize: vertical;
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

    /* Responsive adjustments */
    @media (max-width: 767.98px) {
        .mirsaige-permission-container {
            padding: var(--mirsaige-space-sm);
        }
        
        .mirsaige-form-actions {
            flex-direction: column;
            gap: var(--mirsaige-space-xs);
        }
        
        .mirsaige-app-breadcrumb {
            display: none;
        }
        
        .mirsaige-form-btn {
            width: 100%;
            justify-content: center;
        }
    }
 
    @media (max-width: 575.98px) {
        .mirsaige-app-breadcrumb {
            display: none;
        }
    }
    
    /* Extra Small Mobile Styles (430px and below) */
    @media (max-width: 430px) {
        .mirsaige-app-breadcrumb {
            display: none;
        }
        
        .mirsaige-app-breadcrumbs-btn {
            padding: var(--mirsaige-space-xs) var(--mirsaige-space-sm);
            font-size: 0.85rem;
        }

        .mirsaige-form-submit,
        .mirsaige-form-reset {
            width: 100%;
        }
    }
</style>
@endsection

@section('page')
<main class="mirsaige-app-main">
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <div class="mirsaige-app-breadcrumbs">
                    <div class="mirsaige-app-breadcrumb">
                        <a href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-house"></i> Home</a>
                    </div>
                    <div class="mirsaige-app-breadcrumb divider">
                        <i class='bx bx-chevron-right'></i>
                    </div>
                    <div class="mirsaige-app-breadcrumb">
                        <a href="{{ route('permissions.index') }}">Permissions</a>
                    </div>
                    <div class="mirsaige-app-breadcrumb divider">
                        <i class='bx bx-chevron-right'></i>
                    </div>
                    <div class="mirsaige-app-breadcrumb">
                        <a href="{{ route('permissions.edit', $permission->id) }}" class="active">Edit Permission</a>
                    </div>
                </div>
            </div>
            
            <a href="{{ route('permissions.index') }}" class="mirsaige-app-breadcrumbs-btn">
                <i class="fa-solid fa-list-check"></i>
                Permissions List
            </a>
        </div>

        <!-- Form Container -->
        <div class="mirsaige-permission-container mirsaige-animated-form">
            <form action="{{ route('permissions.update', $permission) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="mb-4">
                    <label for="name" class="mirsaige-form-label">
                        <i class="bx bxs-rename"></i>
                        Permission Name
                    </label>
                    <input type="text" class="mirsaige-form-input" name="name" id="name" 
                           placeholder="Enter permission name" value="{{ $permission->name }}" required>
                    @error('name')
                        <small class="text-danger" style="color: #ff6b6b !important;">{{ $message }}</small>
                    @enderror
                </div>
                
                <div class="mb-4">
                    <label for="description" class="mirsaige-form-label">
                        <i class='bx bx-text'></i>
                        Description
                    </label>
                    <textarea class="mirsaige-form-input mirsaige-form-textarea" 
                              name="description" id="description" 
                              placeholder="Enter description">{{ $permission->description }}</textarea>
                    @error('description')
                        <small class="text-danger" style="color: #ff6b6b !important;">{{ $message }}</small>
                    @enderror
                </div>

                <div class="d-flex gap-3 mirsaige-form-actions">
                    <button type="submit" class="mirsaige-form-btn">
                        <i class="bx bxs-save"></i>
                        Update Permission
                    </button>
                    <button type="button" class="mirsaige-form-btn mirsaige-form-btn-secondary" id="resetFormBtn">
                        <i class="bx bx-reset"></i>
                        Reset Form
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add focus effect to form inputs
        const inputs = document.querySelectorAll('.mirsaige-form-input');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.querySelector('.mirsaige-form-label').style.color = 'var(--mirsaige-gold)';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.querySelector('.mirsaige-form-label').style.color = 'var(--mirsaige-accent)';
            });
        });
        
        // Custom reset functionality - resets to original values
        const resetBtn = document.getElementById('resetFormBtn');
        if (resetBtn) {
            resetBtn.addEventListener('click', function() {
                // Reset form to original values
                document.querySelector('input[name="name"]').value = '{{ $permission->name }}';
                document.querySelector('textarea[name="description"]').value = '{{ $permission->description }}';
                
                // Clear any error messages
                const errorMessages = document.querySelectorAll('.text-danger');
                errorMessages.forEach(error => error.style.display = 'none');
                
                // Show a brief confirmation
                const originalText = this.innerHTML;
                this.innerHTML = '<i class="bx bx-check"></i> Form Reset';
                this.disabled = true;
                
                setTimeout(() => {
                    this.innerHTML = originalText;
                    this.disabled = false;
                }, 1500);
            });
        }
        
        // Form submission loading state
        const form = document.querySelector('form');
        if (form) {
            form.addEventListener('submit', function() {
                const submitBtn = this.querySelector('button[type="submit"]');
                if (submitBtn) {
                    submitBtn.innerHTML = '<i class="bx bx-loader bx-spin"></i> Updating...';
                    submitBtn.disabled = true;
                }
            });
        }
    });
</script>
@endsection