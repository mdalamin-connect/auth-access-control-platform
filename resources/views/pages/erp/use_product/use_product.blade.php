@extends('layout.erp.app')
@section('title', 'Manage Use Product')
@section('style')
<style>


    /* Base Container */
    .mirsaige-use-product-container {
        padding: var(--mirsaige-space-md);
        color: var(--mirsaige-text);
        max-width: 100%;
        overflow-x: hidden;
        background-color: var(--mirsaige-dark);
        min-height: 100vh;
    }

    /* Header Section */
    .mirsaige-use-product-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
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
        transition: all var(--mirsaige-transition-fast);
        display: inline-flex;
        align-items: center;
        gap: var(--mirsaige-space-3xs);
        padding: var(--mirsaige-space-3xs) var(--mirsaige-space-xs);
        border-radius: var(--mirsaige-radius-sm);
        background: rgba(255, 178, 62, 0.1);
        text-decoration: none;
    }

    .mirsaige-app-breadcrumb a:hover {
        color: var(--mirsaige-gold);
        background: rgba(255, 178, 62, 0.2);
        transform: translateY(-1px);
    }

    .mirsaige-app-breadcrumb a.active {
        color: var(--mirsaige-text-muted);
        pointer-events: none;
        background: transparent;
    }

    .mirsaige-app-breadcrumb.divider {
        color: var(--mirsaige-text-muted);
        opacity: 0.7;
    }
    
    /* Title and Action Button */
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
    

    /* Search and Filter Section */
    .mirsaige-search-filter-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: var(--mirsaige-space-md);
        margin-bottom: var(--mirsaige-space-lg);
        background: var(--mirsaige-dark-blue);
        padding: var(--mirsaige-space-md);
        border-radius: var(--mirsaige-radius-md);
        border: 1px solid rgba(255, 178, 62, 0.1);
    }

    .mirsaige-search-box {
        flex: 1;
        min-width: 100px;
        position: relative;
    }

    .mirsaige-search-input {
        width: 100%;
        padding: var(--mirsaige-space-sm) var(--mirsaige-space-md);
        background: var(--mirsaige-darker-blue);
        border: 1px solid rgba(255, 178, 62, 0.2);
        border-radius: var(--mirsaige-radius-md);
        color: var(--mirsaige-text);
        font-size: 0.95rem;
        transition: all var(--mirsaige-transition-fast);
    }

    .mirsaige-search-input:focus {
        border-color: var(--mirsaige-accent);
        outline: none;
        box-shadow: 0 0 0 2px rgba(255, 178, 62, 0.2);
    }

    .mirsaige-search-box::before {
        content: "\f002";
        font-family: "Font Awesome 6 Free";
        font-weight: 900;
        position: absolute;
        left: var(--mirsaige-space-md);
        top: 50%;
        transform: translateY(-50%);
        color: var(--mirsaige-text-muted);
    }

    .mirsaige-search-input {
        padding-left: calc(var(--mirsaige-space-md) * 2.5);
    }

    .mirsaige-per-page-selector {
        display: flex;
        align-items: center;
        gap: var(--mirsaige-space-sm);
    }

    .mirsaige-per-page-selector label {
        color: var(--mirsaige-text-muted);
        font-size: 0.9rem;
    }

    .mirsaige-per-page-selectors {
        background: var(--mirsaige-darker-blue);
        color: var(--mirsaige-text);
        border: 1px solid rgba(255, 178, 62, 0.2);
        border-radius: var(--mirsaige-radius-md);
        padding: var(--mirsaige-space-sm) var(--mirsaige-space-md);
        font-size: 0.9rem;
        transition: all var(--mirsaige-transition-fast);
    }

    .mirsaige-per-page-selectors:focus {
        border-color: var(--mirsaige-accent);
        outline: none;
        box-shadow: 0 0 0 2px rgba(255, 178, 62, 0.2);
    }

    /* Table Container */
    .mirsaige-use-product-table-wrapper {
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        margin-bottom: var(--mirsaige-space-lg);
        background: var(--mirsaige-dark-blue);
        border-radius: var(--mirsaige-radius-md);
        border: 1px solid rgba(255, 178, 62, 0.1);
        box-shadow: var(--mirsaige-shadow-md);
    }

    /* Table Styles */
    .mirsaige-use-product-table {
        width: 100%;
        border-collapse: collapse;
    }

    .mirsaige-use-product-table thead {
        background: var(--mirsaige-darker-blue);
    }

    .mirsaige-use-product-table th {
        color: var(--mirsaige-accent);
        padding: var(--mirsaige-space-md);
        text-align: left;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.8rem;
        letter-spacing: 0.5px;
        border-bottom: 1px solid rgba(255, 178, 62, 0.1);
        white-space: nowrap;
    }

    .mirsaige-use-product-table td {
        padding: var(--mirsaige-space-md);
        color: var(--mirsaige-text);
        border-bottom: 1px solid rgba(255, 178, 62, 0.05);
        font-size: 0.9rem;
        vertical-align: middle;
    }

    .mirsaige-use-product-table tr:last-child td {
        border-bottom: none;
    }

    .mirsaige-use-product-table tr:hover td {
        background: rgba(255, 178, 62, 0.05);
    }

    /* Status Badges */
    .mirsaige-status-badge {
        display: inline-block;
        padding: var(--mirsaige-space-3xs) var(--mirsaige-space-sm);
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 500;
    }

    .mirsaige-status-active {
        background-color: rgba(40, 167, 69, 0.2);
        color: #28a745;
    }

    .mirsaige-status-inactive {
        background-color: rgba(220, 53, 69, 0.2);
        color: #dc3545;
    }

    .mirsaige-status-pending {
        background-color: rgba(255, 193, 7, 0.2);
        color: #ffc107;
    }

    /* Action Buttons */
    .mirsaige-use-product-actions {
        display: flex;
        gap: var(--mirsaige-space-xs);
        flex-wrap: nowrap;
    }

    .mirsaige-use-product-action-btn {
        padding: var(--mirsaige-space-3xs) var(--mirsaige-space-sm);
        border-radius: var(--mirsaige-radius-sm);
        font-size: 0.8rem;
        font-weight: 500;
        transition: all var(--mirsaige-transition-fast);
        border: none;
        display: inline-flex;
        align-items: center;
        gap: var(--mirsaige-space-3xs);
        cursor: pointer;
        white-space: nowrap;
        min-width: 30px;
        justify-content: center;
        text-decoration: none;
    }

    .mirsaige-use-product-action-btn.view {
        background: var(--mirsaige-primary);
        color: var(--mirsaige-accent);
    }



    .mirsaige-use-product-action-btn.delete {
        background: var(--mirsaige-danger);
        color: var(--mirsaige-white);
    }

    .mirsaige-use-product-action-btn:hover {
        opacity: 0.9;
        transform: translateY(-1px);
        box-shadow: var(--mirsaige-shadow-sm);
    }

    /* Action text visibility */
    .mirsaige-use-product-action-btn .action-text {
        display: inline;
        color: var(--mirsaige-white);
    }
    
    /* Scrollbar Styling */
    .mirsaige-use-product-table-wrapper::-webkit-scrollbar {
        height: 8px;
    }

    .mirsaige-use-product-table-wrapper::-webkit-scrollbar-track {
        background: var(--mirsaige-dark-blue);
        border-radius: 4px;
    }

    .mirsaige-use-product-table-wrapper::-webkit-scrollbar-thumb {
        background: var(--mirsaige-accent);
        border-radius: 4px;
    }

    .mirsaige-use-product-table-wrapper::-webkit-scrollbar-thumb:hover {
        background: var(--mirsaige-gold);
    }



    /* Responsive Styles */
    @media (max-width: 992px) {
        .mirsaige-use-product-header {
            flex-direction: row;

        }
        
        .mirsaige-app-breadcrumbs-btn {
            justify-content: center;
        }
    }

    @media (max-width: 768px) {
        /* Stacked table layout for mobile */
        .mirsaige-use-product-table {
            display: block;
            width: 100%;
        }
        
        .mirsaige-use-product-table thead {
            display: none;
        }
        
        .mirsaige-use-product-table tbody {
            display: block;
            width: 100%;
        }
        
        .mirsaige-use-product-table tr {
            display: block;
            margin-bottom: var(--mirsaige-space-md);
            border: 1px solid rgba(255, 178, 62, 0.2);
            border-radius: var(--mirsaige-radius-md);
            overflow: hidden;
        }
        
        .mirsaige-use-product-table td {
            display: block;
            width: 100%;
            padding: var(--mirsaige-space-sm);
            padding-left: 45%;
            position: relative;
            text-align: right;
            white-space: normal;
            border-bottom: 1px solid rgba(255, 178, 62, 0.1);
        }
        
        .mirsaige-use-product-table td:last-child {
            border-bottom: none;
        }
        
        .mirsaige-use-product-table td::before {
            content: attr(data-label);
            position: absolute;
            left: var(--mirsaige-space-sm);
            top: 50%;
            transform: translateY(-50%);
            width: 40%;
            padding-right: var(--mirsaige-space-sm);
            text-align: left;
            font-weight: 600;
            color: var(--mirsaige-accent);
            white-space: nowrap;
        }
        .mirsaige-per-page-label{
            display: none;
        }
        /* Adjust action buttons for mobile */
        .mirsaige-use-product-actions {
            justify-content: flex-end;
        }
        
        .mirsaige-use-product-action-btn {
            padding: var(--mirsaige-space-4xs) var(--mirsaige-space-2xs);
            min-width: 26px;
        }
        
        .mirsaige-use-product-action-btn .action-text {
            display: none;
        }
        
        .mirsaige-app-breadcrumb {
            display: none;
        }
        

    }

    @media (max-width: 480px) {
        .mirsaige-search-filter-container {
            flex-direction: row;
            align-items: stretch;
        }
        

        
        .mirsaige-per-page-selector {
            justify-content: space-between;
        }
        .mirsaige-app-breadcrumbs-title,
        .mirsaige-app-breadcrumbs-btn {
            font-size: 0.75rem;
        }
    }

    /* Print Styles */
    @media print {
        .mirsaige-use-product-container {
            padding: 0;
            background: none;
        }
        
        .mirsaige-use-product-table {
            width: 100%;
            border: 1px solid #ddd;
        }
        
        .mirsaige-use-product-table th {
            background: #f1f1f1 !important;
            color: #000 !important;
        }
        
        .mirsaige-use-product-table td {
            color: #000 !important;
        }
        
        .mirsaige-use-product-action-btn {
            display: none !important;
        }

        .mirsaige-pagination,
        .mirsaige-search-filter-container,
        .mirsaige-use-product-header {
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
        background-color: rgba(0, 0, 0, 0.7);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
        opacity: 0;
        visibility: hidden;
        transition: all var(--mirsaige-transition-normal);
    }

    .mirsaige-confirm-dialog.show {
        opacity: 1;
        visibility: visible;
    }

    .mirsaige-confirm-content {
        background-color: var(--mirsaige-dark-blue);
        padding: var(--mirsaige-space-lg);
        border-radius: var(--mirsaige-radius-lg);
        box-shadow: var(--mirsaige-shadow-lg);
        border: 1px solid rgba(255, 178, 62, 0.3);
        max-width: 450px;
        width: 90%;
        text-align: center;
        transform: translateY(20px);
        transition: transform var(--mirsaige-transition-normal);
    }

    .mirsaige-confirm-dialog.show .mirsaige-confirm-content {
        transform: translateY(0);
    }

    .mirsaige-confirm-title {
        color: var(--mirsaige-accent);
        margin-bottom: var(--mirsaige-space-md);
        font-size: 1.3rem;
    }

    .mirsaige-confirm-message {
        color: var(--mirsaige-text);
        margin-bottom: var(--mirsaige-space-lg);
        line-height: 1.5;
    }

    .mirsaige-confirm-buttons {
        display: flex;
        justify-content: center;
        gap: var(--mirsaige-space-md);
    }

    .mirsaige-confirm-btn {
        padding: var(--mirsaige-space-sm) var(--mirsaige-space-lg);
        border-radius: var(--mirsaige-radius-md);
        font-weight: 600;
        cursor: pointer;
        transition: all var(--mirsaige-transition-fast);
        border: none;
        min-width: 100px;
    }

    .mirsaige-confirm-btn.confirm {
        background-color: var(--mirsaige-danger);
        color: white;
    }

    .mirsaige-confirm-btn.cancel {
        background-color: var(--mirsaige-darker-blue);
        color: var(--mirsaige-text);
        border: 1px solid rgba(255, 178, 62, 0.3);
    }

    .mirsaige-confirm-btn:hover {
        opacity: 0.9;
        transform: translateY(-2px);
        box-shadow: var(--mirsaige-shadow-sm);
    }
</style>
@endsection

@section('page')
<div class="mirsaige-use-product-container">
    <div class="mirsaige-use-product-header">
        <div>
            <h1 class="mirsaige-app-breadcrumbs-title">Products Uses</h1>
            <div class="mirsaige-app-breadcrumbs">
                <div class="mirsaige-app-breadcrumb">
                    <a href="{{ route('admin.dashboard') }}"><i class='bx bx-home'></i> Home</a>
                </div>
                <div class="mirsaige-app-breadcrumb divider">
                    <i class='bx bx-chevron-right'></i>
                </div>
                <div class="mirsaige-app-breadcrumb">
                    <a href="{{ route('use_product') }}">Use Product</a>
                </div>
                <div class="mirsaige-app-breadcrumb divider">
                    <i class='bx bx-chevron-right'></i>
                </div>
                <div class="mirsaige-app-breadcrumb">
                    <a href="{{ route('use_product') }}" class="active">Manage Use Product</a>
                </div>
            </div>
        </div>
        
        <a href="{{ route('create_use_product') }}" class="mirsaige-app-breadcrumbs-btn">
            <i class="fa-solid fa-square-plus"></i> <span class="action-text">Create</span>
        </a>
    </div>

    <!-- Search and Filter Section -->
    <div class="mirsaige-search-filter-container">
        <div class="mirsaige-search-box">
            <input type="text" id="search" class="mirsaige-search-input" placeholder="Search by user, project, or product..." onkeyup="searchTable()">
        </div>
        
        <div class="mirsaige-per-page-selector">
            <label for="perPage" class="mirsaige-per-page-label">Items per page:</label>
            <select id="perPage" class="mirsaige-per-page-selectors" onchange="changePerPage(this)">
                <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
                <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100</option>
            </select>
        </div>
    </div>

    <!-- Table Section -->
    <div class="mirsaige-use-product-table-wrapper">
        <div class="mirsaige-use-product-table-container">
            <table class="mirsaige-use-product-table" id="dataTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Project</th>
                        <th>Product</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>QTY</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($useProducts as $useProduct)
                    <tr>
                        <td data-label="ID">{{ $useProduct->id }}</td>
                        <td data-label="User">{{ $useProduct->user }}</td>
                        <td data-label="Project">{{ $useProduct->project }}</td>
                        <td data-label="Product">{{ $useProduct->product }}</td>
                        <td data-label="Status">
                            <span class="mirsaige-status-badge mirsaige-status-{{ strtolower($useProduct->status) }}">
                                {{ $useProduct->status }}
                            </span>
                        </td>
                        <td data-label="Date">{{ \Carbon\Carbon::parse($useProduct->created_at)->format('M d, Y') }}</td>
                        <td data-label="QTY">{{ $useProduct->qty }}</td>
                        <td data-label="Actions">
                            <div class="mirsaige-use-product-actions">
                                <a href="{{ route('show_use_product', $useProduct->id) }}" class="mirsaige-use-product-action-btn view">
                                    <i class="fa-solid fa-eye"></i> <span class="action-text">View</span>
                                </a>
                                 @if ($user_role_id == 1)
                                <form action="{{ route('destroy_use_product', $useProduct->id) }}" method="post" class="delete-form">
                                    @method('DELETE')
                                    @csrf
                                    <button type="button" class="mirsaige-use-product-action-btn delete" onclick="confirmDelete(this)">
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
{!! pagination($useProducts) !!}

    <!-- Confirmation Dialog -->
    <div class="mirsaige-confirm-dialog" id="confirmDialog">
        <div class="mirsaige-confirm-content">
            <h3 class="mirsaige-confirm-title">Confirm Deletion</h3>
            <p class="mirsaige-confirm-message">Are you sure you want to delete this use product record? This action cannot be undone.</p>
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
    const confirmDialog = document.getElementById('confirmDialog');
    const confirmBtn = confirmDialog.querySelector('.confirm');
    const cancelBtn = confirmDialog.querySelector('.cancel');
    let currentForm = null;

    function confirmDelete(button) {
        currentForm = button.closest('form');
        confirmDialog.classList.add('show');
    }

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

    // Search function
    function searchTable() {
        const searchTerm = document.getElementById('search').value.toLowerCase();
        const table = document.getElementById('dataTable');
        const rows = table.getElementsByTagName('tr');

        for (let i = 1; i < rows.length; i++) { // Skip header row
            const cells = rows[i].getElementsByTagName('td');
            let rowMatches = false;

            // Skip the last cell (actions column)
            for (let j = 0; j < cells.length - 1; j++) {
                if (cells[j].textContent.toLowerCase().includes(searchTerm)) {
                    rowMatches = true;
                    break;
                }
            }

            if (rowMatches) {
                rows[i].style.display = "";
                rows[i].style.backgroundColor = "rgba(255, 178, 62, 0.05)";
            } else {
                rows[i].style.display = "none";
            }
        }
    }

    // Change per page limit
    function changePerPage(select) {
        const perPage = select.value;
        const url = new URL(window.location.href);
        url.searchParams.set('per_page', perPage);
        window.location.href = url.toString();
    }

    // Debounce search input
    let searchTimeout;
    document.getElementById('search').addEventListener('keyup', function() {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(searchTable, 300);
    });
</script>
@endsection