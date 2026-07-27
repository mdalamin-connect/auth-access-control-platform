@extends('layout.erp.app')
@section('title', 'Monthly Reports')
@section('style')
<style>
    /* Monthly Report Specific Styles */
    .mirsaige-monthly-container {
        padding: var(--mirsaige-space-md);
        color: var(--mirsaige-text);
        max-width: 100%;
        overflow-x: hidden;
        min-height: 100vh;
    }

    /* Header Section */
    .mirsaige-monthly-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: var(--mirsaige-space-sm);
        margin-bottom: var(--mirsaige-space-lg);
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
    
    /* Title */
    .mirsaige-app-breadcrumbs-title {
        background: var(--mirsaige-dark-blue);
        color: var(--mirsaige-accent);
        border: 1px solid rgba(255, 178, 62, 0.3);
        padding: var(--mirsaige-space-xs) var(--mirsaige-space-md);
        border-radius: 6px;
        font-weight: 600;
        font-size: 1.2rem;
        height: 50px;
        display: inline-flex;
        align-items: center;
        gap: var(--mirsaige-space-xs);
        vertical-align: top;
        align-self: flex-start; 
        white-space: nowrap;
    }

    /* Month Display */
    .mirsaige-month-display {
        background: var(--mirsaige-primary);
        color: var(--mirsaige-white);
        padding: var(--mirsaige-space-xs) var(--mirsaige-space-md);
        border-radius: 20px;
        font-weight: 500;
        font-size: 0.9rem;
        display: inline-flex;
        align-items: center;
        gap: var(--mirsaige-space-xs);
        margin-left: var(--mirsaige-space-sm);
    }

    /* Report Dropdown */
    .mirsaige-report-dropdown {
        position: relative;
    }

    .mirsaige-report-btn {
        background: var(--mirsaige-dark-blue);
        color: var(--mirsaige-accent);
        border: 1px solid var(--mirsaige-accent);
        padding: var(--mirsaige-space-xs) var(--mirsaige-space-sm);
        border-radius: var(--mirsaige-radius-sm);
        display: flex;
        align-items: center;
        gap: var(--mirsaige-space-xs);
        transition: all 0.3s ease;
        cursor: pointer;
        font-weight: 500;
        box-shadow: var(--mirsaige-shadow-sm);
    }

    .mirsaige-report-btn:hover {
        background: rgba(255, 178, 62, 0.1);
        transform: translateY(-1px);
        box-shadow: var(--mirsaige-shadow-md);
    }

    .mirsaige-report-dropdown-menu {
        position: absolute;
        right: 0;
        top: 100%;
        background: var(--mirsaige-dark-blue);
        border: 1px solid rgba(255, 178, 62, 0.2);
        border-radius: var(--mirsaige-radius-sm);
        padding: var(--mirsaige-space-xs) 0;
        min-width: 200px;
        box-shadow: var(--mirsaige-shadow-lg);
        opacity: 0;
        pointer-events: none;
        transform: translateY(10px);
        transition: all 0.3s ease;
        z-index: 100;
    }

    .mirsaige-report-dropdown-menu.show {
        opacity: 1;
        pointer-events: auto;
        transform: translateY(0);
    }

    .mirsaige-report-dropdown-menu a {
        display: block;
        padding: var(--mirsaige-space-xs) var(--mirsaige-space-md);
        color: var(--mirsaige-text);
        transition: all 0.2s ease;
        text-decoration: none;
        font-size: 0.9rem;
    }

    .mirsaige-report-dropdown-menu a:hover {
        background: rgba(255, 178, 62, 0.1);
        color: var(--mirsaige-accent);
        padding-left: var(--mirsaige-space-lg);
    }

    /* Report Sections */
    .mirsaige-report-section {
        margin-bottom: var(--mirsaige-space-xl);
    }

    .mirsaige-section-header {
        background: linear-gradient(90deg, var(--mirsaige-primary), var(--mirsaige-primary-light));
        color: var(--mirsaige-white);
        padding: var(--mirsaige-space-sm) var(--mirsaige-space-md);
        border-radius: var(--mirsaige-radius-md) var(--mirsaige-radius-md) 0 0;
        font-weight: 600;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: var(--mirsaige-space-sm);
        margin-bottom: 0;
    }

    /* Table Container */
    .mirsaige-report-table-wrapper {
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        position: relative;
        margin-bottom: var(--mirsaige-space-md);
        border-radius: 0 0 var(--mirsaige-radius-md) var(--mirsaige-radius-md);
        background: var(--mirsaige-dark-blue);
        border: 1px solid rgba(255, 178, 62, 0.1);
        box-shadow: var(--mirsaige-shadow-sm);
    }

    .mirsaige-report-table-container {
        border-radius: 8px;
        min-width: 100%;
    }

    /* Table Styles */
    .mirsaige-report-table {
        width: 100%;
        border-collapse: collapse;
    }

    .mirsaige-report-table thead {
        background: var(--mirsaige-darker-blue);
    }

    .mirsaige-report-table th {
        color: var(--mirsaige-accent);
        padding: var(--mirsaige-space-sm);
        text-align: left;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.8rem;
        letter-spacing: 0.5px;
        border-bottom: 1px solid rgba(255, 178, 62, 0.1);
        white-space: nowrap;
    }

    .mirsaige-report-table td {
        padding: var(--mirsaige-space-sm);
        color: var(--mirsaige-text);
        border-bottom: 1px solid rgba(255, 178, 62, 0.05);
        font-size: 0.9rem;
        vertical-align: middle;
    }

    .mirsaige-report-table tr:last-child td {
        border-bottom: none;
    }

    .mirsaige-report-table tr:hover td {
        background: rgba(255, 178, 62, 0.05);
        color: var(--mirsaige-white);
    }

    /* Status styling */
    .mirsaige-status {
        padding: var(--mirsaige-space-3xs) var(--mirsaige-space-xs);
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 500;
        text-transform: capitalize;
        display: inline-block;
    }

    .mirsaige-status.pending {
        background-color: rgba(255, 193, 7, 0.2);
        color: #ffc107;
    }

    .mirsaige-status.approved {
        background-color: rgba(40, 167, 69, 0.2);
        color: #28a745;
    }

    .mirsaige-status.rejected {
        background-color: rgba(220, 53, 69, 0.2);
        color: #dc3545;
    }

    /* Price styling */
    .mirsaige-price {
        color: var(--mirsaige-success);
        font-weight: 500;
    }

    .mirsaige-price-discount {
        color: var(--mirsaige-info);
        font-weight: 500;
    }

    /* Quantity styling */
    .mirsaige-quantity {
        color: var(--mirsaige-warning);
        font-weight: 500;
    }

    /* Stock status colors */
    .mirsaige-stock-in {
        color: var(--mirsaige-success);
        font-weight: 500;
    }

    .mirsaige-stock-out {
        color: var(--mirsaige-warning);
        font-weight: 500;
    }

    .mirsaige-stock-damage {
        color: var(--mirsaige-danger);
        font-weight: 500;
    }

    .mirsaige-stock-current {
        color: var(--mirsaige-info);
        font-weight: 600;
    }

    /* Scrollbar Styling */
    .mirsaige-report-table-wrapper::-webkit-scrollbar {
        height: 8px;
    }

    .mirsaige-report-table-wrapper::-webkit-scrollbar-track {
        background: var(--mirsaige-dark-blue);
        border-radius: 4px;
    }

    .mirsaige-report-table-wrapper::-webkit-scrollbar-thumb {
        background: var(--mirsaige-accent);
        border-radius: 4px;
    }

    .mirsaige-report-table-wrapper::-webkit-scrollbar-thumb:hover {
        background: var(--mirsaige-gold);
    }

    /* Responsive Styles */
    @media (max-width: 992px) {
        .mirsaige-monthly-header {
            flex-direction: column;
            align-items: flex-start;
            gap: var(--mirsaige-space-md);
        }
        
        .mirsaige-report-dropdown {
            width: 100%;
        }
        
        .mirsaige-report-dropdown-menu {
            width: 100%;
        }
    }

    @media (max-width: 768px) {
        .mirsaige-report-table {
            display: block;
            width: 100%;
        }
        
        .mirsaige-report-table thead {
            display: none;
        }
        
        .mirsaige-report-table tbody {
            display: block;
            width: 100%;
        }
        
        .mirsaige-report-table tr {
            display: block;
            margin-bottom: var(--mirsaige-space-md);
            border: 1px solid rgba(255, 178, 62, 0.2);
            border-radius: 6px;
            overflow: hidden;
        }
        
        .mirsaige-report-table td {
            display: block;
            width: 100%;
            padding: var(--mirsaige-space-xs) var(--mirsaige-space-sm);
            padding-left: 45%;
            position: relative;
            text-align: right;
            white-space: normal;
            border-bottom: 1px solid rgba(255, 178, 62, 0.1);
        }
        
        .mirsaige-report-table td:last-child {
            border-bottom: none;
        }
        
        .mirsaige-report-table td::before {
            content: attr(data-label);
            position: absolute;
            left: var(--mirsaige-space-sm);
            top: var(--mirsaige-space-xs);
            width: 40%;
            padding-right: var(--mirsaige-space-sm);
            text-align: left;
            font-weight: 600;
            color: var(--mirsaige-accent);
            white-space: nowrap;
        }
    }

    @media (max-width: 576px) {
        .mirsaige-report-table td {
            padding-left: 40%;
            font-size: 0.8rem;
        }
        
        .mirsaige-report-table td::before {
            width: 35%;
            font-size: 0.75rem;
        }
        
        .mirsaige-app-breadcrumbs-title {
            font-size: 1rem;
        }
    }

    @media (max-width: 430px) {
        .mirsaige-report-table td {
            padding-left: 35%;
            padding-top: var(--mirsaige-space-2xs);
            padding-bottom: var(--mirsaige-space-2xs);
        }
        
        .mirsaige-report-table td::before {
            width: 30%;
            left: var(--mirsaige-space-xs);
        }
    }
</style>
@endsection

@section('page')
<?php
$sessions = session()->all();
$user_id = session('sess_user_id');
$user_role_id = session('sess_user_role_id');
?>

<div class="mirsaige-monthly-container">
    <div class="mirsaige-monthly-header">
        <div>
            <h1 class="mirsaige-app-breadcrumbs-title">Monthly Reports
                <span class="mirsaige-month-display">
                    <i class="fa-solid fa-calendar"></i>
                    {{$curretMonth}}
                </span>
            </h1>
            <div class="mirsaige-app-breadcrumbs">
                <div class="mirsaige-app-breadcrumb">
                    <a href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-house"></i> Home</a>
                </div>
                <div class="mirsaige-app-breadcrumb divider">
                    <i class="fa-solid fa-angle-right"></i>
                </div>
                <div class="mirsaige-app-breadcrumb">
                    <a href="#" class="active">Monthly Reports</a>
                </div>
            </div>
        </div>
        
        <div class="mirsaige-report-dropdown">
            <button class="mirsaige-report-btn" id="reportDropdownBtn">
                <i class="fa-solid fa-file-lines"></i>
                <span>Reports</span>
                <i class="fa-solid fa-chevron-down"></i>
            </button>
            <div class="mirsaige-report-dropdown-menu" id="reportDropdown">
                <a href="{{url('/report/requisition')}}"><i class="fa-solid fa-clipboard-list"></i> Requisition</a>
                <a href="{{url('/report/purchase')}}"><i class="fa-solid fa-cart-shopping"></i> Purchase</a>
                <a href="{{url('/report/stock')}}"><i class="fa-solid fa-warehouse"></i> Stock</a>
            </div>
        </div>
    </div>

    <!-- Requisition Report Section -->
    <div class="mirsaige-report-section">
        <h4 class="mirsaige-section-header">
            <i class="fa-solid fa-clipboard-list"></i>
            Monthly Requisition Report
        </h4>
        <div class="mirsaige-report-table-wrapper">
            <div class="mirsaige-report-table-container">
                <table class="mirsaige-report-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Project Name</th>
                            <th>Product</th>
                            <th>Qty</th>
                            <th>UOM</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($requisitions as $key=>$requisition)
                        <tr>
                            <td data-label="#">{{++$key}}</td>
                            <td data-label="Project">{{$requisition->project->name}}</td>
                            <td data-label="Product">{{$requisition->product->name}}</td>
                            <td data-label="Qty" class="mirsaige-quantity">{{$requisition->total_qty}}</td>
                            <td data-label="UOM">{{$requisition->uom->name}}</td>
                            <td data-label="Status">
                                <span class="mirsaige-status {{ strtolower($requisition->requisition->status ?? 'pending') }}">
                                    {{ $requisition->requisition->status ?? 'Pending' }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Purchase Report Section -->
    <div class="mirsaige-report-section">
        <h4 class="mirsaige-section-header">
            <i class="fa-solid fa-cart-shopping"></i>
            Monthly Purchase Report
        </h4>
        <div class="mirsaige-report-table-wrapper">
            <div class="mirsaige-report-table-container">
                <table class="mirsaige-report-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Project Name</th>
                            <th>Product Name</th>
                            <th>Total Qty</th>
                            <th>Total Price</th>
                            <th>After Discount</th>
                            <th>UOM</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($purchasedetails as $key=>$purchasedetail)
                        <tr>
                            <td data-label="#">{{++$key}}</td>
                            <td data-label="Project">{{$purchasedetail->project->name}}</td>
                            <td data-label="Product">{{$purchasedetail->product->name}}</td>
                            <td data-label="Qty" class="mirsaige-quantity">{{$purchasedetail->total_qty}}</td>
                            <td data-label="Price" class="mirsaige-price">{{$purchasedetail->total_price}}</td>
                            <td data-label="Discount Price" class="mirsaige-price-discount">{{$purchasedetail->total_price_after_discount}}</td>
                            <td data-label="UOM">{{$purchasedetail->uom->name}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Stock Report Section -->
    <div class="mirsaige-report-section">
        <h4 class="mirsaige-section-header">
            <i class="fa-solid fa-warehouse"></i>
            Monthly Stock Report
        </h4>
        <div class="mirsaige-report-table-wrapper">
            <div class="mirsaige-report-table-container">
                <table class="mirsaige-report-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Project Name</th>
                            <th>Product Name</th>
                            <th>In Stock</th>
                            <th>Used</th>
                            <th>Damage</th>
                            <th>Current Stock</th>
                            <th>UOM</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($stockDetails as $key=>$stockDetail)
                        <tr>
                            <td data-label="#">{{++$key}}</td>
                            <td data-label="Project">{{ $stockDetail->project->name }}</td>
                            <td data-label="Product">{{ $stockDetail->product->name }}</td>
                            <td data-label="In Stock" class="mirsaige-stock-in">{{ $stockDetail->in_stock }}</td>
                            <td data-label="Used" class="mirsaige-stock-out">{{ $stockDetail->stock_out }}</td>
                            <td data-label="Damage" class="mirsaige-stock-damage">{{ $stockDetail->damage }}</td>
                            <td data-label="Current Stock" class="mirsaige-stock-current">{{ $stockDetail->current_stock }}</td>
                            <td data-label="UOM">{{ $stockDetail->uom->name }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    // Toggle report dropdown
    document.getElementById('reportDropdownBtn').addEventListener('click', function() {
        document.getElementById('reportDropdown').classList.toggle('show');
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.mirsaige-report-dropdown')) {
            document.getElementById('reportDropdown').classList.remove('show');
        }
    });
</script>
@endsection