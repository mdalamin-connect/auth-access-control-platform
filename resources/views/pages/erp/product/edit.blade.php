@extends('layout.erp.app')
@section('title', 'Edit Product')
@section('style')
<style>
    /* Main Container */
    .mirsaige-product-container {
        padding: var(--mirsaige-space-md);
        color: var(--mirsaige-text);
        max-width: 100%;
        margin: 0 auto;
    }

    /* Header Section */
    .mirsaige-product-header {
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
    .mirsaige-product-form-container {
        background: var(--mirsaige-dark-blue);
        border-radius: 8px;
        padding: var(--mirsaige-space-md);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        border: 1px solid rgba(255, 178, 62, 0.1);
        transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
    }

    .mirsaige-product-form-container:hover {
        box-shadow: 0 6px 25px rgba(0, 0, 0, 0.2);
        border-color: rgba(255, 178, 62, 0.2);
    }

    /* Form Layout */
    .mirsaige-product-form-wrapper {
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
    }

    .mirsaige-image-preview-container {
        width: 200px;
        height: 200px;
        border-radius: 12px;
        background: var(--mirsaige-darker-blue);
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        border: 3px solid rgba(255, 178, 62, 0.3);
        transition: all 0.3s ease;
        position: relative;
    }

    .mirsaige-image-preview {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .mirsaige-image-placeholder {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: var(--mirsaige-text);
        width: 100%;
        height: 100%;
    }

    .mirsaige-image-placeholder i {
        font-size: 2.5rem;
        color: var(--mirsaige-accent);
        margin-bottom: var(--mirsaige-space-sm);
        opacity: 0.7;
    }

    .mirsaige-image-upload-actions {
        display: flex;
        flex-direction: column;
        gap: var(--mirsaige-space-sm);
        width: 100%;
        max-width: 250px;
    }

    .mirsaige-image-upload-btn {
        background: var(--mirsaige-dark-blue);
        color: var(--mirsaige-accent);
        border: 1px solid rgba(255, 178, 62, 0.3);
        padding: var(--mirsaige-space-xs);
        border-radius: 6px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: var(--mirsaige-space-xs);
        width: 100%;
    }

    .mirsaige-image-upload-btn:hover {
        background: rgba(255, 178, 62, 0.1);
    }

    .mirsaige-image-remove-btn {
        background: transparent;
        color: #ff6b6b;
        border: 1px solid rgba(255, 107, 107, 0.3);
        padding: var(--mirsaige-space-xs);
        border-radius: 6px;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: var(--mirsaige-space-xs);
        width: 100%;
    }

    .mirsaige-image-remove-btn:hover {
        background: rgba(255, 107, 107, 0.1);
    }

    .mirsaige-image-upload-info {
        font-size: 0.75rem;
        color: var(--mirsaige-text);
        opacity: 0.7;
        text-align: center;
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

    /* Last Updated Info */
    .mirsaige-last-updated {
        font-size: 0.8rem;
        color: var(--mirsaige-text);
        opacity: 0.7;
        margin-top: var(--mirsaige-space-xs);
        display: flex;
        align-items: center;
        gap: var(--mirsaige-space-xs);
    }

    /* Responsive Styles */
    @media (max-width: 992px) {
        .mirsaige-product-form-wrapper {
            grid-template-columns: 1fr;
        }
        
        .mirsaige-image-section {
            width: 100%;
            margin: 0 auto var(--mirsaige-space-md);
        }
    }

    @media (max-width: 768px) {
        .mirsaige-product-header {
            flex-direction: row;
        }

        .mirsaige-app-breadcrumb {
            display: none;
        }

        .mirsaige-image-section {
            width: 100%;
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
        .mirsaige-product-container {
            padding: var(--mirsaige-space-sm);
        }

        .mirsaige-product-form-container {
            padding: var(--mirsaige-space-sm);
        }

        .mirsaige-app-breadcrumb {
            display: none;
        }
        
        .mirsaige-image-section {
            width: 100%;
        }
        
        .mirsaige-form-control,
        .mirsaige-form-select {
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
    .mirsaige-form-group:nth-child(7) { animation-delay: 0.4s; }
    .mirsaige-form-group:nth-child(8) { animation-delay: 0.45s; }
    .mirsaige-form-group:nth-child(9) { animation-delay: 0.5s; }
    .mirsaige-form-group:nth-child(10) { animation-delay: 0.55s; }
</style>
@endsection

@section('page')
<div class="mirsaige-product-container">
    <div class="mirsaige-product-header">
        <div class="mirsaige-app-breadcrumbs">
            <div class="mirsaige-app-breadcrumb">
                <a href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-house"></i> Home</a>
            </div>
            <div class="mirsaige-app-breadcrumb divider">
                <i class="fa-solid fa-angle-right"></i>
            </div>
            <div class="mirsaige-app-breadcrumb">
                <a href="{{ route('products.index') }}">Products</a>
            </div>
            <div class="mirsaige-app-breadcrumb divider">
                <i class="fa-solid fa-angle-right"></i>
            </div>
            <div class="mirsaige-app-breadcrumb">
                <a href="{{ route('products.edit', $product->id) }}" class="active">Edit Product</a>
            </div>
        </div>

        <a href="{{ route('products.index') }}" class="mirsaige-app-breadcrumbs-btn">
            <i class="fa-solid fa-list-check"></i> Manage Products
        </a>
    </div>

    <div class="mirsaige-product-form-container">
        <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data" id="productEditForm">
            @csrf
            @method('PUT')

            <div class="mirsaige-product-form-wrapper">
                <!-- Left Section - Basic Info -->
                <div class="mirsaige-form-section">
                    

                    <!-- Basic Information Fields -->
                    <div class="mirsaige-form-group">
                        <label for="name" class="mirsaige-form-label">
                            <i class="fa-solid fa-tag"></i>
                            Product Name
                        </label>
                        <input type="text" class="mirsaige-form-control" name="name" id="name" placeholder="Enter product name" value="{{ old('name', $product->name) }}" required>
                        @error('name')
                        <small class="mirsaige-form-error"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mirsaige-form-group">
                        <label for="description" class="mirsaige-form-label">
                            <i class="fa-solid fa-align-left"></i>
                            Description
                        </label>
                        <textarea class="mirsaige-form-control" name="description" id="description" placeholder="Enter product description" rows="3">{{ old('description', $product->description) }}</textarea>
                        @error('description')
                        <small class="mirsaige-form-error"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mirsaige-form-group">
                        <label for="category_id" class="mirsaige-form-label">
                            <i class="fa-solid fa-layer-group"></i>
                            Category
                        </label>
                        <select class="mirsaige-form-select" name="category_id" id="category_id" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <small class="mirsaige-form-error"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                        @enderror
                    </div>
                    <!-- Image Upload Section -->
                    <div class="mirsaige-image-section">
                        <div class="mirsaige-image-preview-container">
                            <div class="mirsaige-image-preview" id="imagePreview">
                                @if($product->photo)
                                    <img src="{{ asset('img/products/' . $product->photo) }}" alt="Product Photo" class="mirsaige-image-preview">
                                @else
                                    <div class="mirsaige-image-placeholder">
                                        <i class="fa-solid fa-image"></i>
                                        <span>Product Image</span>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="mirsaige-image-upload-actions">
                            <input type="file" name="photo" id="photo" accept="image/*" style="display: none;">
                            <button type="button" class="mirsaige-image-upload-btn" id="uploadBtn">
                                <i class="fa-solid fa-upload"></i> Change Image
                            </button>
                            <button type="button" class="mirsaige-image-remove-btn" id="removeBtn" style="{{ $product->photo ? 'display: flex' : 'display: none' }}">
                                <i class="fa-solid fa-trash"></i> Remove Image
                            </button>
                            <div class="mirsaige-image-upload-info">
                                JPG, PNG, GIF or WEBP (Max 10MB)
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Right Section - Pricing & Additional Info -->
                <div class="mirsaige-form-section">
                    <div class="mirsaige-form-group">
                        <label for="uom_id" class="mirsaige-form-label">
                            <i class="fa-solid fa-balance-scale"></i>
                            Unit of Measure
                        </label>
                        <select class="mirsaige-form-select" name="uom_id" id="uom_id" required>
                            <option value="">Select UOM</option>
                            @foreach($uoms as $uom)
                            <option value="{{ $uom->id }}" {{ old('uom_id', $product->uom_id) == $uom->id ? 'selected' : '' }}>{{ $uom->name }}</option>
                            @endforeach
                        </select>
                        @error('uom_id')
                        <small class="mirsaige-form-error"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mirsaige-form-group">
                        <label for="regular_price" class="mirsaige-form-label">
                            <i class="fa-solid fa-tag"></i>
                            Regular Price
                        </label>
                        <input type="number" step="0.01" class="mirsaige-form-control" name="regular_price" id="regular_price" placeholder="Enter regular price" value="{{ old('regular_price', $product->regular_price) }}" required>
                        @error('regular_price')
                        <small class="mirsaige-form-error"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mirsaige-form-group">
                        <label for="offer_price" class="mirsaige-form-label">
                            <i class="fa-solid fa-tags"></i>
                            Offer Price
                        </label>
                        <input type="number" step="0.01" class="mirsaige-form-control" name="offer_price" id="offer_price" placeholder="Enter offer price" value="{{ old('offer_price', $product->offer_price) }}">
                        @error('offer_price')
                        <small class="mirsaige-form-error"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mirsaige-form-group">
                        <label for="offer_discount" class="mirsaige-form-label">
                            <i class="fa-solid fa-percentage"></i>
                            Offer Discount (%)
                        </label>
                        <input type="number" step="0.01" class="mirsaige-form-control" name="offer_discount" id="offer_discount" placeholder="Enter offer discount percentage" value="{{ old('offer_discount', $product->offer_discount) }}">
                        @error('offer_discount')
                        <small class="mirsaige-form-error"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mirsaige-form-group">
                        <label for="star" class="mirsaige-form-label">
                            <i class="fa-solid fa-star"></i>
                            Star Rating
                        </label>
                        <input type="number" step="0.1" min="0" max="5" class="mirsaige-form-control" name="star" id="star" placeholder="Enter star rating (0-5)" value="{{ old('star', $product->star) }}">
                        @error('star')
                        <small class="mirsaige-form-error"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mirsaige-form-group">
                        <label for="weight" class="mirsaige-form-label">
                            <i class="fa-solid fa-weight-hanging"></i>
                            Weight
                        </label>
                        <input type="text" class="mirsaige-form-control" name="weight" id="weight" placeholder="Enter product weight" value="{{ old('weight', $product->weight) }}">
                        @error('weight')
                        <small class="mirsaige-form-error"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mirsaige-form-group">
                        <label for="barcode" class="mirsaige-form-label">
                            <i class="fa-solid fa-barcode"></i>
                            Barcode
                        </label>
                        <input type="text" class="mirsaige-form-control" name="barcode" id="barcode" placeholder="Enter barcode" value="{{ old('barcode', $product->barcode) }}">
                        @error('barcode')
                        <small class="mirsaige-form-error"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <!-- Last Updated Info -->
                <div class="mirsaige-last-updated" style="grid-column: 1 / -1;">
                    <i class="fa-solid fa-clock"></i>
                    Last updated by: {{ $product->updater->name ?? 'System' }} on {{ $product->updated_at->format('M d, Y h:i A') }}
                </div>

                <!-- Form Actions -->
                <div class="mirsaige-form-actions">
                    <button type="reset" class="mirsaige-form-reset" id="resetBtn">
                        <i class="fas fa-undo"></i> Reset Changes
                    </button>
                    <button type="submit" class="mirsaige-form-submit" id="submitBtn">
                        <i class="fa-solid fa-floppy-disk"></i> Update Product
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
        const form = document.getElementById('productEditForm');
        const photoInput = document.getElementById('photo');
        const uploadBtn = document.getElementById('uploadBtn');
        const removeBtn = document.getElementById('removeBtn');
        const imagePreview = document.getElementById('imagePreview');
        const resetBtn = document.getElementById('resetBtn');
        const submitBtn = document.getElementById('submitBtn');
        
        // Price calculation
        const regularPriceInput = document.getElementById('regular_price');
        const offerPriceInput = document.getElementById('offer_price');
        const offerDiscountInput = document.getElementById('offer_discount');

        // Image Upload Functionality
        uploadBtn.addEventListener('click', function() {
            photoInput.click();
        });

        photoInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                // Validate file size (max 10MB)
                if (file.size > 10 * 1024 * 1024) {
                    alert('Error: Image size should be less than 10MB');
                    this.value = '';
                    return;
                }

                // Validate file type
                const validTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
                if (!validTypes.includes(file.type)) {
                    alert('Error: Only JPG, PNG, GIF, or WEBP files are allowed');
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
                    img.alt = 'Product Preview';
                    img.className = 'mirsaige-image-preview';
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
                    <i class="fa-solid fa-image"></i>
                    <span>Product Image</span>
                </div>
            `;
            removeBtn.style.display = 'none';
        });

        // Form Reset Functionality
        resetBtn.addEventListener('click', function() {
            // Reset image preview
            photoInput.value = '';
            @if($product->photo)
                imagePreview.innerHTML = `
                    <img src="{{ asset('img/products/' . $product->photo) }}" alt="Product Photo" class="mirsaige-image-preview">
                `;
                removeBtn.style.display = 'flex';
            @else
                imagePreview.innerHTML = `
                    <div class="mirsaige-image-placeholder">
                        <i class="fa-solid fa-image"></i>
                        <span>Product Image</span>
                    </div>
                `;
                removeBtn.style.display = 'none';
            @endif
        });

        // Price Calculation Logic
        function calculateDiscount() {
            const regularPrice = parseFloat(regularPriceInput.value) || 0;
            const offerPrice = parseFloat(offerPriceInput.value) || 0;
            
            if (regularPrice > 0 && offerPrice > 0) {
                const discount = ((regularPrice - offerPrice) / regularPrice) * 100;
                offerDiscountInput.value = discount.toFixed(2);
            }
        }

        function calculateOfferPrice() {
            const regularPrice = parseFloat(regularPriceInput.value) || 0;
            const discount = parseFloat(offerDiscountInput.value) || 0;
            
            if (regularPrice > 0 && discount > 0) {
                const offerPrice = regularPrice - (regularPrice * discount / 100);
                offerPriceInput.value = offerPrice.toFixed(2);
            }
        }

        regularPriceInput.addEventListener('blur', calculateDiscount);
        offerPriceInput.addEventListener('blur', calculateDiscount);
        offerDiscountInput.addEventListener('blur', calculateOfferPrice);

        // Form Submission Handling
        form.addEventListener('submit', function(e) {
            // Show loading state
            submitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Processing...';
            submitBtn.disabled = true;
        });
    });
</script>
@endsection