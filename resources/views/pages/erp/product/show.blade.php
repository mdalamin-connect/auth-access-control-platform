@extends('layout.erp.app')
@section('title', 'Product Details')
@section('style')
<style>
    /* Modern Design with App Blade Color Scheme */
    .mirsaige-details-container {
        margin: 0 auto;
        padding: 2rem;
    }

    .mirsaige-app-breadcrumbs {
        display: flex;
        align-items: center;
        gap: var(--mirsaige-space-2xs);
        flex-wrap: wrap;
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

    .mirsaige-app-breadcrumb.divider i {
        color: var(--mirsaige-text);
        opacity: 0.7;
        font-size: 0.9rem;
    }

   .mirsaige-app-breadcrumbs-title,
    .mirsaige-app-breadcrumbs-btn {
        background: var(--mirsaige-dark-blue);
        color: var(--mirsaige-accent);
        border: 1px solid rgba(255, 178, 62, 0.3);
        padding: var(--mirsaige-space-xs) var(--mirsaige-space-md);
        border-radius: 6px;
        font-weight: 600;
        font-size: 1.2rem;
        
        position:inherit;
        height: 50PX;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: var(--mirsaige-space-xs);
        vertical-align: top;
        align-self: flex-start; 
        white-space: nowrap;
    }
     .mirsaige-app-breadcrumbs-title:hover,
    .mirsaige-app-breadcrumbs-btn:hover {
        background: rgba(255, 178, 62, 0.1);
        color: var(--mirsaige-accent);
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(221, 153, 51, 0.3);
    }

    /* Header Section */
    .mirsaige-details-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: var(--mirsaige-space-xs) 0;
        padding: var(--mirsaige-space-2xs)      0 ;
        border-bottom: 1px solid rgba(255, 178, 62, 0.1);
    }

    .mirsaige-details-title {
        font-size: 1.75rem;
        font-weight: 600;
        color: var(--mirsaige-white);
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .mirsaige-details-title-icon {
        color: var(--mirsaige-accent);
        font-size: 1.5rem;
    }

    .mirsaige-details-subtitle {
        font-size: 0.9rem;
        color: var(--mirsaige-text);
        opacity: 0.8;
        margin-top: 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    /* Details Grid */
    .mirsaige-details-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 1.5rem;
        margin-bottom: 3rem;
    }

    .mirsaige-detail-card {
        background: var(--mirsaige-dark-blue);
        border-radius: 10px;
        padding: 1.5rem;
        border: 1px solid rgba(255, 178, 62, 0.1);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .mirsaige-detail-card:hover {
        transform: translateY(-5px);
        border-color: rgba(255, 178, 62, 0.3);
    }

    .mirsaige-detail-label {
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: var(--mirsaige-accent);
        margin-bottom: 0.75rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .mirsaige-detail-value {
        font-size: 1.1rem;
        font-weight: 500;
        color: var(--mirsaige-white);
    }

    /* Product Profile Card */
    .mirsaige-product-profile-card {
        background: var(--mirsaige-dark-blue);
        border-radius: 10px;
        padding: 1.5rem;
        border: 1px solid rgba(255, 178, 62, 0.1);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        grid-column: 1 / -1;
        display: flex;
        align-items: center;
        gap: 2rem;
    }

    .mirsaige-product-profile-img {
        width: 150px;
        height: 150px;
        border-radius: 10px;
        object-fit: cover;
        border: 3px solid var(--mirsaige-accent);
    }

    .mirsaige-product-profile-info {
        flex: 1;
    }

    .mirsaige-product-profile-name {
        font-size: 1.5rem;
        font-weight: 600;
        color: var(--mirsaige-white);
        margin-bottom: 0.5rem;
    }

    .mirsaige-product-profile-category {
        font-size: 1rem;
        color: var(--mirsaige-accent);
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .mirsaige-product-profile-price {
        font-size: 0.9rem;
        color: var(--mirsaige-text);
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 0.5rem;
    }

    .mirsaige-product-profile-status {
        display: inline-block;
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 500;
    }

    .mirsaige-product-profile-status.featured {
        background: rgba(40, 167, 69, 0.2);
        color: #28a745;
    }

    .mirsaige-product-profile-status.regular {
        background: rgba(108, 117, 125, 0.2);
        color: #6c757d;
    }

    /* Price Highlight */
    .price-highlight {
        font-size: 1.2rem;
        font-weight: 600;
        color: var(--mirsaige-accent);
    }

    .regular-price {
        text-decoration: line-through;
        color: var(--mirsaige-text);
        opacity: 0.7;
        margin-left: 0.5rem;
    }

    /* Action Buttons */
    .mirsaige-details-actions {
        display: flex;
        justify-content: flex-end;
        gap: 1rem;
        margin-top: 2.5rem;
        padding-top: 1.5rem;
        border-top: 1px solid rgba(255, 178, 62, 0.1);
    }

    .mirsaige-details-action-btn {
        padding: 0.75rem 1.5rem;
        border-radius: 8px;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
        text-decoration: none;
        font-size: 0.95rem;
    }

    .mirsaige-details-action-btn.back {
        background: transparent;
        color: var(--mirsaige-accent);
        border: 1px solid var(--mirsaige-accent);
    }

    .mirsaige-details-action-btn.back:hover {
        background: rgba(255, 178, 62, 0.1);
    }

    .mirsaige-details-action-btn.edit {
        background: var(--mirsaige-accent);
        color: var(--mirsaige-dark);
        border: 1px solid var(--mirsaige-accent);
    }

    .mirsaige-details-action-btn.edit:hover {
        background: #FFA01A;
        box-shadow: 0 4px 12px rgba(255, 178, 62, 0.3);
    }

    .mirsaige-details-action-btn.reset {
        background: var(--mirsaige-darker-blue);
        color: var(--mirsaige-accent);
        border: 1px solid var(--mirsaige-accent);
    }

    .mirsaige-details-action-btn.reset:hover {
        background: rgba(255, 178, 62, 0.1);
    }

    /* Responsive Adjustments */
    @media (min-width: 992px) and (max-width: 1270px) {
        .mirsaige-app-breadcrumbs-title {
            font-size: 1.3rem;
        }
    }

    @media (min-width: 768px) and (max-width: 991px) {
        .mirsaige-app-breadcrumbs-title {
            font-size: 1.25rem;
        }
        
        .mirsaige-app-breadcrumbs {
            font-size: 0.8rem;
        }
    }

    @media (max-width: 768px) {
        .mirsaige-details-container {
            padding: 1.25rem;
        }
        .mirsaige-app-breadcrumbs-title {
            font-size: 1.2rem;
        }
        .mirsaige-app-breadcrumb {
            display: none;
        }
        .mirsaige-details-grid {
            grid-template-columns: 1fr;
        }
        .mirsaige-details-title {
            font-size: 1.2rem;
        }
        .mirsaige-details-actions {
            flex-direction: column;
            gap: 0.75rem;
        }
        
        .mirsaige-details-action-btn {
            width: 100%;
            justify-content: center;
        }
    }

    /* Animation */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .mirsaige-detail-card {
        animation: fadeIn 0.4s ease-out forwards;
    }

    .mirsaige-detail-card:nth-child(1) { animation-delay: 0.1s; }
    .mirsaige-detail-card:nth-child(2) { animation-delay: 0.2s; }
    .mirsaige-detail-card:nth-child(3) { animation-delay: 0.3s; }
    .mirsaige-detail-card:nth-child(4) { animation-delay: 0.4s; }
    .mirsaige-detail-card:nth-child(5) { animation-delay: 0.5s; }
    .mirsaige-detail-card:nth-child(6) { animation-delay: 0.6s; }

    @media (max-width: 575.98px) {
        .mirsaige-app-breadcrumbs-title {
            display: none;
        }
        .mirsaige-app-breadcrumb {
            display: none;
        }
        .mirsaige-details-title {
            display: none;
        }

        .mirsaige-product-profile-card {
            flex-direction: column;
            align-items: flex-start;
        }

        .mirsaige-product-profile-img {
            order: 1; 
            width: 120px;
            height: 120px;
            align-items:flex-baseline;
        }
        
        .mirsaige-product-profile-info {
            order: 2;
        }
    }

    /* Extra Small Mobile Styles (430px and below) */
    @media (max-width: 430px) {
        .mirsaige-app-breadcrumbs-title {
            display: none;
        }
        .mirsaige-app-breadcrumb {
            display: none;
        }
        .mirsaige-details-title {
            display: none;
        }

        .mirsaige-product-profile-card {
            flex-direction: column;
            align-items: flex-start;
        }
        .mirsaige-product-profile-img {
            width: 100px;
            height: 100px;
            align-content: first baseline;
            order: 1;
        }
        
        .mirsaige-product-profile-info {
            font-size: 1.3rem;
            order: 2;
        }
        
        .mirsaige-product-profile-category,
        .mirsaige-product-profile-price {
            font-size: 0.9rem;
        }
    }
</style>
@endsection

@section('page')
<div class="mirsaige-details-container">
    <!-- Breadcrumb Navigation -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="mirsaige-app-breadcrumbs-title">Product Details</h1>
            <div class="mirsaige-app-breadcrumbs">
                <div class="mirsaige-app-breadcrumb">
                    <a href="{{ route('admin.dashboard') }}"><i class='bx bx-home'></i> Home</a>
                </div>
                <div class="mirsaige-app-breadcrumb divider">
                    <i class='bx bx-chevron-right'></i>
                </div>
                <div class="mirsaige-app-breadcrumb">
                    <a href="{{ route('products.index') }}">Products</a>
                </div>
                <div class="mirsaige-app-breadcrumb divider">
                    <i class='bx bx-chevron-right'></i>
                </div>
                <div class="mirsaige-app-breadcrumb">
                    <a href="{{ route('products.show', $product->id) }}" class="active">Product Details</a>
                </div>
            </div>
        </div>

        <a href="{{ route('products.index') }}" class="mirsaige-app-breadcrumbs-btn">
            <i class="bx bx-arrow-back"></i>
            Back to List
        </a>
    </div>

    <!-- Product Profile Card -->
    <div class="mirsaige-product-profile-card">
        <div class="mirsaige-product-profile-info">
            <h2 class="mirsaige-product-profile-name">{{ $product->name }}</h2>
            <div class="mirsaige-product-profile-category">
                <i class='bx bx-category'></i>
                {{ $product->category->name }}
            </div>
            <div class="mirsaige-product-profile-price">
                <i class='bx bx-purchase-tag'></i>
                <span class="price-highlight">${{ $product->offer_price }}</span>
                @if($product->offer_price < $product->regular_price)
                    <span class="regular-price">${{ $product->regular_price }}</span>
                @endif
            </div>
            <div>
                <span class="mirsaige-product-profile-status {{ $product->is_featured ? 'featured' : 'regular' }}">
                    {{ $product->is_featured ? 'Featured Product' : 'Regular Product' }}
                </span>
                @if($product->is_brand)
                    <span class="mirsaige-product-profile-status" style="background: rgba(0, 123, 255, 0.2); color: #007bff; margin-left: 0.5rem;">
                        Brand Product
                    </span>
                @endif
            </div>
        </div>
        <img src="{{ asset('img/products/' . $product->photo) }}" class="mirsaige-product-profile-img" alt="Product Image">
    </div>

    <!-- Header Section -->
    <div class="mirsaige-details-header">
        <div>
            <h1 class="mirsaige-details-title">
                <i class='bx bxs-package mirsaige-details-title-icon'></i>
                Product Information
            </h1>
            <p class="mirsaige-details-subtitle">
                <i class='bx bx-time-five'></i>
                Last updated: {{ $product->updated_at->format('M d, Y \a\t h:i A') }}
            </p>
        </div>
    </div>

    <!-- Details Grid -->
    <div class="mirsaige-details-grid">
        <div class="mirsaige-detail-card">
            <div class="mirsaige-detail-label">
                <i class='bx bx-id-card'></i>
                Product ID
            </div>
            <div class="mirsaige-detail-value">{{ $product->id }}</div>
        </div>
        
        <div class="mirsaige-detail-card">
            <div class="mirsaige-detail-label">
                <i class='bx bx-purchase-tag'></i>
                Regular Price
            </div>
            <div class="mirsaige-detail-value">${{ $product->regular_price }}</div>
        </div>
        
        <div class="mirsaige-detail-card">
            <div class="mirsaige-detail-label">
                <i class='bx bx-purchase-tag-alt'></i>
                Offer Price
            </div>
            <div class="mirsaige-detail-value">${{ $product->offer_price }}</div>
        </div>
        
        <div class="mirsaige-detail-card">
            <div class="mirsaige-detail-label">
                <i class='bx bx-percent'></i>
                Offer Discount
            </div>
            <div class="mirsaige-detail-value">{{ $product->offer_discount }}%</div>
        </div>
        
        <div class="mirsaige-detail-card">
            <div class="mirsaige-detail-label">
                <i class='bx bx-category'></i>
                Category
            </div>
            <div class="mirsaige-detail-value">{{ $product->category->name }}</div>
        </div>
        
        <div class="mirsaige-detail-card">
            <div class="mirsaige-detail-label">
                <i class='bx bx-ruler'></i>
                Unit of Measure
            </div>
            <div class="mirsaige-detail-value">{{ $product->uom->name }}</div>
        </div>
        
        <div class="mirsaige-detail-card">
            <div class="mirsaige-detail-label">
                <i class='bx bx-star'></i>
                Star Rating
            </div>
            <div class="mirsaige-detail-value">{{ $product->star }}</div>
        </div>
        
        <div class="mirsaige-detail-card">
            <div class="mirsaige-detail-label">
                <i class='bx bx-weight'></i>
                Weight
            </div>
            <div class="mirsaige-detail-value">{{ $product->weight }}</div>
        </div>
        
        <div class="mirsaige-detail-card">
            <div class="mirsaige-detail-label">
                <i class='bx bx-barcode'></i>
                Barcode
            </div>
            <div class="mirsaige-detail-value">{{ $product->barcode ?? 'Not provided' }}</div>
        </div>
        
        <div class="mirsaige-detail-card">
            <div class="mirsaige-detail-label">
                <i class='bx bx-calendar-plus'></i>
                Created Date
            </div>
            <div class="mirsaige-detail-value">{{ $product->created_at->format('M d, Y \a\t h:i A') }}</div>
        </div>
        
        <div class="mirsaige-detail-card">
            <div class="mirsaige-detail-label">
                <i class='bx bx-user-plus'></i>
                Created By
            </div>
            <div class="mirsaige-detail-value">{{ $product->creator->name ?? 'System' }}</div>
        </div>
        
        <div class="mirsaige-detail-card">
            <div class="mirsaige-detail-label">
                <i class='bx bx-user-check'></i>
                Updated By
            </div>
            <div class="mirsaige-detail-value">{{ $product->updater->name ?? 'System' }}</div>
        </div>
    </div>

    <!-- Description Section -->
    <div class="mirsaige-details-header" style="margin-top: 2rem;">
        <div>
            <h1 class="mirsaige-details-title">
                <i class='bx bx-detail mirsaige-details-title-icon'></i>
                Product Description
            </h1>
        </div>
    </div>
    
    <div class="mirsaige-detail-card" style="grid-column: 1 / -1;">
        <div class="mirsaige-detail-label">
            <i class='bx bx-text'></i>
            Description
        </div>
        <div class="mirsaige-detail-value">{{ $product->description ?? 'No description provided' }}</div>
    </div>

    <!-- Action Buttons -->
    <div class="mirsaige-details-actions">
        @if (in_array(session('sess_user_role_id'), [1, 2]))
        <a href="{{ route('products.edit', $product->id) }}" class="mirsaige-details-action-btn edit">
            <i class='bx bx-edit'></i> Edit Product
        </a>
        @endif
        
        <a href="{{ route('products.index') }}" class="mirsaige-details-action-btn back">
            <i class='bx bx-arrow-back'></i> Back to Products
        </a>
    </div>
</div>
@endsection

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add any interactive functionality here
        console.log('Product details page loaded');
    });
</script>
@endsection