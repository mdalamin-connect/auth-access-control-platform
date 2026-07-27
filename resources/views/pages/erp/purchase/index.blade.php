@extends('layout.erp.app')
@section('title', 'Manage Purchases')
@section('style')
<style>
    /* Base Styles */
    .mirsaige-purchase-container {
        padding: var(--mirsaige-space-md);
        color: var(--mirsaige-text);
        max-width: 100%;
        overflow-x: hidden;
    }

    /* Header Section */
    .mirsaige-purchase-header {
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

    /* Table Container */
    .mirsaige-purchase-table-wrapper {
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        position: relative;
    }

    .mirsaige-purchase-table-container {
        background: var(--mirsaige-dark-blue);
        border-radius: 8px;
        border: 1px solid rgba(255, 178, 62, 0.1);
        min-width: 100%;
    }

    /* Table Styles */
    .mirsaige-purchase-table {
        width: 100%;
        border-collapse: collapse;
    }

    .mirsaige-purchase-table thead {
        background: var(--mirsaige-darker-blue);
    }

    .mirsaige-purchase-table th {
        color: var(--mirsaige-accent);
        padding: var(--mirsaige-space-sm);
        text-align: center;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.8rem;
        letter-spacing: 0.5px;
        border-bottom: 1px solid rgba(255, 178, 62, 0.1);
        white-space: nowrap;
    }

    .mirsaige-purchase-table td {
        padding: var(--mirsaige-space-sm);
        color: var(--mirsaige-text);
        border-bottom: 1px solid rgba(255, 178, 62, 0.05);
        font-size: 0.9rem;
        vertical-align: middle;
    }

    .mirsaige-purchase-table tr:last-child td {
        border-bottom: none;
    }

    .mirsaige-purchase-table tr:hover td {
        background: rgba(255, 178, 62, 0.05);
        color: var(--mirsaige-white);
    }

    /* Numeric cells alignment */
    .mirsaige-purchase-table td.numeric {
        text-align: right;
        font-family: 'Courier New', monospace;
    }

    /* Status badges */
    .mirsaige-status-badge {
        display: inline-block;
        padding: var(--mirsaige-space-3xs) var(--mirsaige-space-xs);
        border-radius: 12px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .mirsaige-status-paid {
        background: rgba(40, 167, 69, 0.2);
        color: #28a745;
    }

    .mirsaige-status-partial {
        background: rgba(255, 193, 7, 0.2);
        color: #ffc107;
    }

    .mirsaige-status-unpaid {
        background: rgba(220, 53, 69, 0.2);
        color: #dc3545;
    }

    /* Action Buttons */
    .mirsaige-purchase-actions {
        display: flex;
        gap: var(--mirsaige-space-xs);
        flex-wrap: nowrap;
    }

    .mirsaige-purchase-action-btn {
        padding: var(--mirsaige-space-3xs) var(--mirsaige-space-xs);
        border-radius: 4px;
        font-size: 0.8rem;
        font-weight: 500;
        transition: all 0.2s ease;
        border: none;
        display: inline-flex;
        align-items: center;
        gap: var(--mirsaige-space-3xs);
        cursor: pointer;
        white-space: nowrap;
        min-width: 30px;
        justify-content: center;
    }

    .mirsaige-purchase-action-btn.view {
        background: var(--mirsaige-primary);
        color: var(--mirsaige-accent);
    }

    .mirsaige-purchase-action-btn.edit {
        background: var(--mirsaige-secondary);
        color: var(--mirsaige-accent);
    }

    .mirsaige-purchase-action-btn.delete {
        background:rgb(220, 51, 68);
        color:rgb(137, 3, 3);
    }

    .mirsaige-purchase-action-btn:hover {
        opacity: 0.9;
        transform: translateY(-1px);
    }

    /* Action text visibility - replaces JavaScript functionality */
    .mirsaige-purchase-action-btn .action-text {
        display: inline;
        color: var(--mirsaige-white);
    }
    
    .mirsaige-app-breadcrumbs-btn .action-text {
        display: inline;
    }

    /* Scrollbar Styling */
    .mirsaige-purchase-table-wrapper::-webkit-scrollbar {
        height: 8px;
    }

    .mirsaige-purchase-table-wrapper::-webkit-scrollbar-track {
        background: var(--mirsaige-dark-blue);
        border-radius: 4px;
    }

    .mirsaige-purchase-table-wrapper::-webkit-scrollbar-thumb {
        background: var(--mirsaige-accent);
        border-radius: 4px;
    }

    .mirsaige-purchase-table-wrapper::-webkit-scrollbar-thumb:hover {
        background: var(--mirsaige-gold);
    }

 

    /* Search Box */
    .mirsaige-search-box {
        margin-bottom: var(--mirsaige-space-md);
        max-width: 400px;
    }

    .mirsaige-search-input {
        width: 100%;
        padding: var(--mirsaige-space-xs) var(--mirsaige-space-sm);
        background: var(--mirsaige-dark-blue);
        border: 1px solid rgba(255, 178, 62, 0.2);
        border-radius: 4px;
        color: var(--mirsaige-text);
        font-size: 0.9rem;
    }

    .mirsaige-search-input:focus {
        border-color: var(--mirsaige-accent);
        outline: none;
        box-shadow: 0 0 0 3px rgba(255, 178, 62, 0.2);
    }

    /* Medium Desktop Styles (992px - 1280px) */
    @media (min-width: 992px) and (max-width: 1280px) {
        .mirsaige-purchase-container {
            padding: var(--mirsaige-space-sm);
        }
        .mirsaige-app-breadcrumbs-btn{
            font-size: 1rem;
        }

        .mirsaige-app-breadcrumbs-title {
            font-size: 1rem;
        }
        
        .mirsaige-purchase-table th,
        .mirsaige-purchase-table td {
            padding: 0.6rem 0.8rem;
            font-size: 0.85rem;
        }
        
        .mirsaige-purchase-actions {
            gap: 0.4rem;
            flex-wrap: nowrap;
        }
        .mirsaige-purchase-action-btn {
            padding: 0.25rem 0.5rem;
            min-width: 32px;
            height: 32px;
        }
        
        .mirsaige-purchase-action-btn .action-text {
            display: inline;
            font-size: 0.75rem;
        }
        
        .mirsaige-purchase-actions {
            margin-right: 0.1rem;
        }
    }

    /* Tablet Styles (768px - 991px) */
    @media (min-width: 768px) and (max-width: 991px) {
        .mirsaige-purchase-container {
            padding: var(--mirsaige-space-sm);
        }
        
        .mirsaige-app-breadcrumbs-title {
            font-size: 0.95rem;
        }
        .mirsaige-app-breadcrumbs-btn {
            font-size: 0.95rem;
        }
        .mirsaige-app-breadcrumbs {
            font-size: 0.8rem;
        }
        
        .mirsaige-purchase-table th,
        .mirsaige-purchase-table td {
            padding: var(--mirsaige-space-2xs);
            font-size: 0.82rem;

        }
        
        .mirsaige-purchase-action-btn {
            padding: var(--mirsaige-space-4xs) var(--mirsaige-space-4xs);
            min-width: 28px;
        }
        
        .mirsaige-purchase-action-btn .action-text {
            display: none;
        }
        
        .mirsaige-purchase-actions {
            gap: var(--mirsaige-space-3xs);
        }

     
    }

    /* Mobile Table Styles (767px and below) */
    @media (max-width: 767px) {
        .mirsaige-purchase-container {
            padding: var(--mirsaige-space-sm);
        }
        
        .mirsaige-app-breadcrumbs-btn {
            font-size: 0.9rem;
        }
        .mirsaige-app-breadcrumbs-title {
            font-size: 0.9rem;
        }
        
        /* Stacked table layout for mobile */
        .mirsaige-purchase-table {
            display: block;
            width: 100%;
        }
        
        .mirsaige-purchase-table thead {
            display: none;
        }
        
        .mirsaige-purchase-table tbody {
            display: block;
            width: 100%;
        }
        
        .mirsaige-purchase-table tr {
            display: block;
            margin-bottom: var(--mirsaige-space-md);
            border: 1px solid rgba(255, 178, 62, 0.2);
            border-radius: 6px;
            overflow: hidden;
        }
        
        .mirsaige-purchase-table td {
            display: block;
            width: 100%;
            padding: var(--mirsaige-space-xs) var(--mirsaige-space-sm);
            padding-left: 45%;
            position: relative;
            text-align: right;
            white-space: normal;
            border-bottom: 1px solid rgba(255, 178, 62, 0.1);
        }
        
        .mirsaige-purchase-table td:last-child {
            border-bottom: none;
        }
        
        .mirsaige-purchase-table td::before {
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
        
        /* Adjust action buttons for mobile */
        .mirsaige-purchase-actions {
            justify-content: flex-end;
        }
        
        .mirsaige-purchase-action-btn {
            padding: var(--mirsaige-space-4xs) var(--mirsaige-space-2xs);
            min-width: 26px;
        }
        
        .mirsaige-purchase-action-btn .action-text {
            display: none;
        }
        
        .mirsaige-app-breadcrumb {
            display: none;
        }
        
    
    }

    /* Small Mobile Styles (575px and below) */
    @media (max-width: 575px) {
        .mirsaige-purchase-table td {
            padding-left: 40%;
            font-size: 0.8rem;
        }
        
        .mirsaige-purchase-table td::before {
            width: 35%;
            font-size: 0.75rem;
        }
        
        .mirsaige-app-breadcrumb {
            display: none;
        }

   
    }

    /* Extra Small Mobile Styles (430px and below) */
    @media (max-width: 430px) {
        .mirsaige-purchase-table td {
            padding-left: 35%;
            padding-top: var(--mirsaige-space-2xs);
            padding-bottom: var(--mirsaige-space-2xs);
        }
        
        .mirsaige-purchase-table td::before {
            width: 30%;
            left: var(--mirsaige-space-xs);
        }
        
        .mirsaige-purchase-action-btn {
            min-width: 24px;
            font-size: 0.95rem;
        }
        .mirsaige-app-breadcrumbs-title,
        .mirsaige-app-breadcrumbs-btn {
            font-size: 0.75rem;
        }
        .mirsaige-app-breadcrumbs-btn .action-text {
            display: inline;
        }

    }

    /* Print Styles */
    @media print {
        .mirsaige-purchase-table {
            width: 100%;
            border: 1px solid #ddd;
        }
        
        .mirsaige-purchase-table th {
            background: #f1f1f1 !important;
            color: #000 !important;
        }
        
        .mirsaige-purchase-table td {
            color: #000 !important;
        }
        
        .mirsaige-purchase-action-btn {
            display: none !important;
        }

        .mirsaige-pagination {
            display: none !important;
        }
    }

    /* Custom Confirmation Dialog Styles */
    .mirsaige-confirm-dialog {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
    }

    .mirsaige-confirm-dialog.show {
        opacity: 1;
        visibility: visible;
    }

    .mirsaige-confirm-content {
        background-color: var(--mirsaige-dark-blue);
        padding: var(--mirsaige-space-md);
        border-radius: 8px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        border: 1px solid rgba(255, 178, 62, 0.2);
        max-width: 400px;
        width: 90%;
        text-align: center;
        transform: translateY(20px);
        transition: transform 0.3s ease;
    }

    .mirsaige-confirm-dialog.show .mirsaige-confirm-content {
        transform: translateY(0);
    }

    .mirsaige-confirm-title {
        color: var(--mirsaige-accent);
        margin-bottom: var(--mirsaige-space-md);
        font-size: 1.2rem;
    }

    .mirsaige-confirm-buttons {
        display: flex;
        justify-content: center;
        gap: var(--mirsaige-space-sm);
        margin-top: var(--mirsaige-space-md);
    }

    .mirsaige-confirm-btn {
        padding: var(--mirsaige-space-xs) var(--mirsaige-space-md);
        border-radius: 4px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s ease;
        border: none;
        min-width: 80px;
    }

    .mirsaige-confirm-btn.confirm {
        background-color: #dc3545;
        color: white;
    }

    .mirsaige-confirm-btn.cancel {
        background-color: var(--mirsaige-darker-blue);
        color: var(--mirsaige-text);
        border: 1px solid rgba(255, 178, 62, 0.2);
    }

    .mirsaige-confirm-btn:hover {
        opacity: 0.9;
        transform: translateY(-1px);
    }
</style>
@endsection

@section('page')
<div class="mirsaige-purchase-container">
    <div class="mirsaige-purchase-header">
        <div>
            <h1 class="mirsaige-app-breadcrumbs-title">Purchases List</h1>
            <div class="mirsaige-app-breadcrumbs">
                <div class="mirsaige-app-breadcrumb">
                    <a href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-house"></i> Home</a>
                </div>
                <div class="mirsaige-app-breadcrumb divider">
                    <i class="fa-solid fa-angle-right"></i>
                </div>
                <div class="mirsaige-app-breadcrumb">
                    <a href="#">Inventory</a>
                </div>
                @if (in_array($user_role_id, [1, 2]))
                <div class="mirsaige-app-breadcrumb divider">
                    <i class="fa-solid fa-angle-right"></i>
                </div>
                <div class="mirsaige-app-breadcrumb">
                    <a href="{{ route('purchases.index') }}" class="active">Manage Purchases</a>
                </div>
                @endif
            </div>
        </div>
        
        @if (in_array($user_role_id, [1, 2,3,4]))
        <a href="{{ route('purchases.create') }}" class="mirsaige-app-breadcrumbs-btn">
            <i class="fa-solid fa-square-plus"></i> <span class="action-text">Create Purchase</span>
        </a>
        @endif
    </div>

    <!-- Search Box -->
    <div class="mirsaige-search-box">
        <input type="text" id="searchInput" class="mirsaige-search-input" placeholder="Search purchases..." onkeyup="searchPurchases()">
    </div>

    <div class="mirsaige-purchase-table-wrapper">
        <div class="mirsaige-purchase-table-container">
            <table class="mirsaige-purchase-table" id="purchasesTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product</th>
                        <th>Project</th>
                        <th>Supplier</th>
                        <th>Total Amount</th>
                        <th>Paid Amount</th>
                        <th>Due Amount</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($purchases as $purchase)
                    @php
                        $due_amount = $purchase->purchase_total - $purchase->paid_amount;
                        $status_class = ($due_amount <= 0) ? 'mirsaige-status-paid' : 
                                       (($purchase->paid_amount > 0) ? 'mirsaige-status-partial' : 'mirsaige-status-unpaid');
                        $status_text = ($due_amount <= 0) ? 'Paid' : 
                                      (($purchase->paid_amount > 0) ? 'Partial' : 'Unpaid');
                         // Get all product names as comma-separated string
                        $product_names = $purchase->purchaseDetails->map(function($detail) {
                            return $detail->product->name;
                        })->implode(', ');
                        
                        // Get all project names as comma-separated string
                        $project_names = $purchase->purchaseDetails->map(function($detail) {
                            return $detail->project->name ?? 'N/A';
                        })->implode(', ');
                    @endphp
                    <tr>
                        <td data-label="ID">{{ $purchase->id }}</td>
                        <td data-label="Product">{{ $product_names }}</td>
                        <td data-label="Project">{{ $project_names }}</td>
                        <td data-label="Supplier">{{ $purchase->supplier->name }}</td>
                        <td data-label="Total Amount" class="numeric">{{ number_format($purchase->purchase_total, 2) }}</td>
                        <td data-label="Paid Amount" class="numeric">{{ number_format($purchase->paid_amount, 2) }}</td>
                        <td data-label="Due Amount" class="numeric">{{ number_format($due_amount, 2) }}</td>
                        <td data-label="Status">
                            <span class="mirsaige-status-badge {{ $status_class }}">{{ $status_text }}</span>
                        </td>
                        <td data-label="Actions">
                            <div class="mirsaige-purchase-actions">
                                <a href="{{ route('purchases.show', $purchase->id) }}" class="mirsaige-purchase-action-btn view">
                                    <i class="fa-solid fa-eye"></i> <span class="action-text">View</span>
                                </a>
                                {{-- @if (in_array($user_role_id, [1, 2,3]))
                                <a href="{{ route('purchases.edit', $purchase->id) }}" class="mirsaige-purchase-action-btn edit">
                                    <i class="fa-solid fa-pen-to-square"></i> <span class="action-text">Edit</span>
                                </a>
                                @endif --}}
                                @if ($user_role_id == 1)
                                <form action="{{ route('purchases.destroy', $purchase->id) }}" method="post" style="display: inline;">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="mirsaige-purchase-action-btn delete">
                                        <i class="fa-solid fa-trash-can"></i> <span class="action-text">Delete</span>
                                    </button>
                                </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
{!! pagination($purchases) !!}

    <!-- Confirmation Dialog -->
    <div class="mirsaige-confirm-dialog" id="confirmDialog">
        <div class="mirsaige-confirm-content">
            <h3 class="mirsaige-confirm-title">Confirm Deletion</h3>
            <p>Are you sure you want to delete this purchase record?</p>
            <div class="mirsaige-confirm-buttons">
                <button class="mirsaige-confirm-btn cancel">Cancel</button>
                <button class="mirsaige-confirm-btn confirm">Delete</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    // Confirm before delete
    const deleteButtons = document.querySelectorAll('.mirsaige-purchase-action-btn.delete');
    const confirmDialog = document.getElementById('confirmDialog');
    const confirmBtn = confirmDialog.querySelector('.confirm');
    const cancelBtn = confirmDialog.querySelector('.cancel');
    let currentForm = null;

    deleteButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            currentForm = this.closest('form');
            confirmDialog.classList.add('show');
        });
    });

    // Handle confirm button click
    confirmBtn.addEventListener('click', function() {
        if (currentForm) {
            currentForm.submit();
        }
        confirmDialog.classList.remove('show');
    });

    // Handle cancel button click
    cancelBtn.addEventListener('click', function() {
        confirmDialog.classList.remove('show');
        currentForm = null;
    });

    // Close dialog when clicking outside
    confirmDialog.addEventListener('click', function(e) {
        if (e.target === this) {
            confirmDialog.classList.remove('show');
            currentForm = null;
        }
    });

    // Search functionality
    function searchPurchases() {
        const input = document.getElementById('searchInput');
        const filter = input.value.toUpperCase();
        const table = document.getElementById('purchasesTable');
        const tr = table.getElementsByTagName('tr');

        // Loop through all table rows, hide those that don't match the search query
        for (let i = 1; i < tr.length; i++) {
            let found = false;
            const td = tr[i].getElementsByTagName('td');
            
            for (let j = 0; j < td.length; j++) {
                if (td[j]) {
                    const txtValue = td[j].textContent || td[j].innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        found = true;
                        break;
                    }
                }
            }
            
            tr[i].style.display = found ? '' : 'none';
        }
    }
</script>
@endsection