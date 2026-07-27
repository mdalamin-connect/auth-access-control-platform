@extends('layout.erp.app')
@section('title', 'Use Product Details')
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
        background: var(--mirsaige-dark-blue);
        border-radius: 10px;
        border: 1px solid rgba(255, 178, 62, 0.1);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); 
        margin-bottom: 2.5rem;
        display: flex;
        padding: var(--mirsaige-space-md);  
        justify-content: space-between;
        align-items: center;
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

    /* Products Table */
    .mirsaige-products-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 2rem;
    }

    .mirsaige-products-table thead {
        background: rgba(255, 178, 62, 0.1);
    }

    .mirsaige-products-table th {
        padding: 1rem;
        text-align: left;
        color: var(--mirsaige-accent);
        font-weight: 500;
        border-bottom: 1px solid rgba(255, 178, 62, 0.2);
    }

    .mirsaige-products-table td {
        padding: 1rem;
        color: var(--mirsaige-text);
        border-bottom: 1px solid rgba(255, 178, 62, 0.1);
    }

    .mirsaige-products-table tr:last-child td {
        border-bottom: none;
    }

    .mirsaige-products-table tr:hover td {
        background: rgba(255, 178, 62, 0.05);
    }

    /* Status Badge */
    .mirsaige-status-badge {
        display: inline-block;
        padding: 0.35rem 0.75rem;
        border-radius: 50px;
        font-size: 0.8rem;
        font-weight: 500;
    }

    .mirsaige-status-badge.used {
        background: rgba(40, 167, 69, 0.2);
        color: #28a745;
    }

    .mirsaige-status-badge.damage {
        background: rgba(220, 53, 69, 0.2);
        color: #dc3545;
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
    }
</style>
@endsection

@section('page')
<div class="mirsaige-details-container">
    <!-- Breadcrumb Navigation -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="mirsaige-app-breadcrumbs-title">Use Product Details</h1>
            <div class="mirsaige-app-breadcrumbs">
                <div class="mirsaige-app-breadcrumb">
                    <a href="{{ route('admin.dashboard') }}"><i class='bx bx-home'></i> Home</a>
                </div>
                <div class="mirsaige-app-breadcrumb divider">
                    <i class='bx bx-chevron-right'></i>
                </div>
                <div class="mirsaige-app-breadcrumb">
                    <a href="{{ route('use_product') }}">Use Products</a>
                </div>
                <div class="mirsaige-app-breadcrumb divider">
                    <i class='bx bx-chevron-right'></i>
                </div>
                <div class="mirsaige-app-breadcrumb">
                    <a href="#" class="active">Use Product Details</a>
                </div>
            </div>
        </div>

        <a href="{{ route('use_product') }}" class="mirsaige-app-breadcrumbs-btn">
            <i class="bx bx-arrow-back"></i>
            Back to List
        </a>
    </div>

    @if(count($useProductDetails) > 0)
        <!-- Header Section -->
        <div class="mirsaige-details-header">
            <div>
                <h1 class="mirsaige-details-title">
                    <i class='bx bx-package mirsaige-details-title-icon'></i>
                    Use Product #{{ $useProductDetails[0]['use_product_id'] }}
                </h1>
                @if(isset($useProductDetails[0]['updated_at']))
                <p class="mirsaige-details-subtitle">
                    <i class='bx bx-time-five'></i>
                    Last updated: {{ \Carbon\Carbon::parse($useProductDetails[0]['updated_at'])->format('M d, Y \a\t h:i A') }}
                </p>
                @endif
            </div>
        </div>

        <!-- Details Grid -->
        <div class="mirsaige-details-grid">
            <div class="mirsaige-detail-card">
                <div class="mirsaige-detail-label">
                    <i class='bx bx-id-card'></i>
                    Transaction ID
                </div>
                <div class="mirsaige-detail-value">{{ $useProductDetails[0]['use_product_id'] }}</div>
            </div>
            
            <div class="mirsaige-detail-card">
                <div class="mirsaige-detail-label">
                    <i class='bx bx-user'></i>
                    User
                </div>
                <div class="mirsaige-detail-value">
                    @if(isset($useProductDetails[0]['use_product']['user_id']))
                        {{-- If user is just an ID --}}
                        {{-- You might need to query the user name here --}}
                        User ID: {{ $useProductDetails[0]['use_product']['user_id'] }}
                    @elseif(isset($useProductDetails[0]['use_product']['user']['name']))
                        {{ $useProductDetails[0]['use_product']['user']['name'] }}
                    @else
                        N/A
                    @endif
                </div>
            </div>
            
            <div class="mirsaige-detail-card">
                <div class="mirsaige-detail-label">
                    <i class='bx bx-calendar-plus'></i>
                    Created Date
                </div>
                <div class="mirsaige-detail-value">
                    {{ \Carbon\Carbon::parse($useProductDetails[0]['created_at'])->format('M d, Y \a\t h:i A') }}
                </div>
            </div>
            
            <div class="mirsaige-detail-card">
                <div class="mirsaige-detail-label">
                    <i class='bx bx-info-circle'></i>
                    Status
                </div>
                <div class="mirsaige-detail-value">
                    @if(isset($useProductDetails[0]['use_product']['status']))
                    <span class="mirsaige-status-badge {{ strtolower($useProductDetails[0]['use_product']['status']) }}">
                        {{ $useProductDetails[0]['use_product']['status'] }}
                    </span>
                    @else
                    N/A
                    @endif
                </div>
            </div>
        </div>

        <!-- Products Table -->
        <div class="mirsaige-detail-card" style="grid-column: 1 / -1; padding: 0;">
            <table class="mirsaige-products-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Project</th>
                        <th>Task</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Unit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($useProductDetails as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item['project']['name'] ?? 'N/A' }}</td>
                        <td>{{ $item['task']['name'] ?? 'N/A' }}</td>
                        <td>{{ $item['product']['name'] ?? 'N/A' }}</td>
                        <td>{{ $item['qty'] }}</td>
                        <td>{{ $item['uom']['name'] ?? 'N/A' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Action Buttons -->
        <div class="mirsaige-details-actions">
            <a href="{{ route('use_product') }}" class="mirsaige-details-action-btn back">
                <i class='bx bx-arrow-back'></i> Back to List
            </a>

        </div>
    @else
        <div class="alert alert-danger">
            <i class='bx bx-error-circle'></i> No use product details found or the record doesn't exist.
        </div>
    @endif
</div>
@endsection

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add any interactive functionality here
        console.log('Use Product details page loaded');
    });
</script>
@endsection