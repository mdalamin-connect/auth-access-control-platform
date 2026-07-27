
@extends('layout.erp.app')
@section('title', 'Create Holiday')
@section('style')
<style>
    /* Base Styles */
    .mirsaige-holiday-create-container {
        padding: var(--mirsaige-space-md);
        color: var(--mirsaige-text);
        max-width: 100%;
        overflow-x: hidden;
        min-height: 100vh;
    }

    /* Header Section */
    .mirsaige-holiday-create-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: var(--mirsaige-space-sm);
        margin-bottom: var(--mirsaige-space-md);
    }

    /* Form Container */
    .mirsaige-holiday-create-card {
        background: var(--mirsaige-dark-blue);
        border-radius: 8px;
        border: 1px solid rgba(255, 178, 62, 0.1);
        padding: var(--mirsaige-space-md);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    /* Form Styles */
    .mirsaige-form-group {
        margin-bottom: var(--mirsaige-space-md);
    }

    .mirsaige-form-label {
        display: block;
        margin-bottom: var(--mirsaige-space-xs);
        color: var(--mirsaige-accent);
        font-weight: 500;
    }

    .mirsaige-form-control {
        width: 100%;
        padding: var(--mirsaige-space-sm);
        background-color: var(--mirsaige-darker-blue);
        border: 1px solid rgba(255, 178, 62, 0.2);
        border-radius: 6px;
        color: var(--mirsaige-text);
        font-size: 0.95rem;
        transition: all 0.3s ease;
    }

    .mirsaige-form-control:focus {
        border-color: var(--mirsaige-gold);
        box-shadow: 0 0 0 3px rgba(255, 178, 62, 0.2);
        outline: none;
    }

    textarea.mirsaige-form-control {
        min-height: 120px;
        resize: vertical;
    }

    /* Checkbox Styles */
    .mirsaige-form-check {
        display: flex;
        align-items: center;
        gap: var(--mirsaige-space-xs);
        margin-bottom: var(--mirsaige-space-md);
    }

    .mirsaige-form-check-input {
        width: 18px;
        height: 18px;
        accent-color: var(--mirsaige-gold);
    }

    .mirsaige-form-check-label {
        color: var(--mirsaige-text);
        font-size: 0.95rem;
    }

    /* Button Styles */
    .mirsaige-form-actions {
        display: flex;
        gap: var(--mirsaige-space-sm);
        margin-top: var(--mirsaige-space-lg);
    }

    .mirsaige-btn {
        padding: var(--mirsaige-space-sm) var(--mirsaige-space-md);
        border-radius: 6px;
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: var(--mirsaige-space-xs);
        border: none;
    }

    .mirsaige-btn-primary {
        background-color: var(--mirsaige-gold);
        color: var(--mirsaige-dark-blue);
    }

    .mirsaige-btn-primary:hover {
        background-color: #ffb63e;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(255, 178, 62, 0.3);
    }

    .mirsaige-btn-secondary {
        background-color: var(--mirsaige-darker-blue);
        color: var(--mirsaige-text);
        border: 1px solid rgba(255, 178, 62, 0.3);
    }

    .mirsaige-btn-secondary:hover {
        background-color: rgba(255, 178, 62, 0.1);
        color: var(--mirsaige-accent);
        transform: translateY(-2px);
    }

    /* Responsive Styles */
    @media (max-width: 768px) {
        .mirsaige-holiday-create-container {
            padding: var(--mirsaige-space-sm);
        }
        
        .mirsaige-form-actions {
            flex-direction: column;
            gap: var(--mirsaige-space-xs);
        }
        
        .mirsaige-btn {
            width: 100%;
            justify-content: center;
        }
    }

    @media (max-width: 576px) {
        .mirsaige-holiday-create-card {
            padding: var(--mirsaige-space-sm);
        }
        
        .mirsaige-form-control {
            padding: var(--mirsaige-space-xs) var(--mirsaige-space-sm);
        }
    }
</style>
@endsection

@section('page')
<div class="mirsaige-holiday-create-container">
    <div class="mirsaige-holiday-create-header">
        <div>
            <h1 class="mirsaige-app-breadcrumbs-title">Create Holiday</h1>
            <div class="mirsaige-app-breadcrumbs">
                <div class="mirsaige-app-breadcrumb">
                    <a href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-house"></i> Home</a>
                </div>
                <div class="mirsaige-app-breadcrumb divider">
                    <i class="fa-solid fa-angle-right"></i>
                </div>
                <div class="mirsaige-app-breadcrumb">
                    <a href="{{ route('holidays.index') }}">Holidays</a>
                </div>
                <div class="mirsaige-app-breadcrumb divider">
                    <i class="fa-solid fa-angle-right"></i>
                </div>
                <div class="mirsaige-app-breadcrumb">
                    <a href="{{ route('holidays.create') }}" class="active">Create Holiday</a>
                </div>
            </div>
        </div>
        
        <a href="{{ route('holidays.index') }}" class="mirsaige-app-breadcrumbs-btn">
            <i class="fa-solid fa-arrow-left"></i> <span class="action-text">Back to List</span>
        </a>
    </div>

    <div class="mirsaige-holiday-create-card">
        <form action="{{ route('holidays.store') }}" method="POST">
            @csrf
            
            <div class="mirsaige-form-group">
                <label for="name" class="mirsaige-form-label">Holiday Name</label>
                <input type="text" id="name" name="name" class="mirsaige-form-control" required 
                       placeholder="Enter holiday name" value="{{ old('name') }}">
            </div>
            
            <div class="mirsaige-form-group">
                <label for="date" class="mirsaige-form-label">Date</label>
                <input type="date" id="date" name="date" class="mirsaige-form-control" required 
                       value="{{ old('date') }}">
            </div>
            
            <div class="mirsaige-form-group">
                <label for="description" class="mirsaige-form-label">Description</label>
                <textarea id="description" name="description" class="mirsaige-form-control" 
                          placeholder="Enter holiday description">{{ old('description') }}</textarea>
            </div>
            
            <div class="mirsaige-form-check">
                <input type="checkbox" id="is_recurring" name="is_recurring" class="mirsaige-form-check-input"
                       {{ old('is_recurring') ? 'checked' : '' }}>
                <label for="is_recurring" class="mirsaige-form-check-label">Recurring Holiday (repeats annually)</label>
            </div>
            
            <div class="mirsaige-form-actions">
                <button type="submit" class="mirsaige-btn mirsaige-btn-primary">
                    <i class="fa-solid fa-save"></i> Create Holiday
                </button>
                <a href="{{ route('holidays.index') }}" class="mirsaige-btn mirsaige-btn-secondary">
                    <i class="fa-solid fa-times"></i> Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection