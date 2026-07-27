@extends('layout.erp.app')
@section('title', 'Stock Reports')
@section('style')
<style>
    /* Stock Report Specific Styles */
    .mirsaige-stock-container {
        padding: var(--mirsaige-space-md);
        color: var(--mirsaige-text);
        max-width: 100%;
        overflow-x: hidden;
        min-height: 100vh;
    }

    /* Header Section */
    .mirsaige-stock-header {
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

    /* Search Box */
    .mirsaige-search-box {
        position: relative;
        margin-bottom: var(--mirsaige-space-md);
        max-width: 400px;
    }

    .mirsaige-search-input {
        width: 100%;
        padding: var(--mirsaige-space-sm) var(--mirsaige-space-md);
        padding-left: 40px;
        background: var(--mirsaige-dark-blue);
        border: 1px solid rgba(255, 178, 62, 0.2);
        border-radius: var(--mirsaige-radius-md);
        color: var(--mirsaige-text);
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }

    .mirsaige-search-input:focus {
        outline: none;
        border-color: var(--mirsaige-accent);
        box-shadow: 0 0 0 3px rgba(255, 178, 62, 0.1);
    }

    .mirsaige-search-icon {
        position: absolute;
        left: var(--mirsaige-space-md);
        top: 50%;
        transform: translateY(-50%);
        color: var(--mirsaige-accent);
    }

    /* Table Container */
    .mirsaige-stock-table-wrapper {
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        position: relative;
        margin-bottom: var(--mirsaige-space-md);
        border-radius: var(--mirsaige-radius-md);
        background: var(--mirsaige-dark-blue);
        border: 1px solid rgba(255, 178, 62, 0.1);
        box-shadow: var(--mirsaige-shadow-sm);
    }

    .mirsaige-stock-table-container {
        border-radius: 8px;
        min-width: 100%;
    }

    /* Table Styles */
    .mirsaige-stock-table {
        width: 100%;
        border-collapse: collapse;
    }

    .mirsaige-stock-table thead {
        background: var(--mirsaige-darker-blue);
    }

    .mirsaige-stock-table th {
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

    .mirsaige-stock-table td {
        padding: var(--mirsaige-space-sm);
        color: var(--mirsaige-text);
        border-bottom: 1px solid rgba(255, 178, 62, 0.05);
        font-size: 0.9rem;
        vertical-align: middle;
    }

    .mirsaige-stock-table tr:last-child td {
        border-bottom: none;
    }

    .mirsaige-stock-table tr:hover td {
        background: rgba(255, 178, 62, 0.05);
        color: var(--mirsaige-white);
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

    /* Highlight matching search results */
    .mirsaige-stock-table tr.highlight td {
        background: rgba(255, 178, 62, 0.1);
        color: var(--mirsaige-white);
    }

    /* Pagination Styles */
    .mirsaige-pagination {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: var(--mirsaige-space-sm);
        padding: var(--mirsaige-space-sm) 0;
    }

    .mirsaige-pagination-info {
        color: var(--mirsaige-text);
        font-size: 0.9rem;
        font-weight: 500;
    }

    .mirsaige-pagination-links {
        display: flex;
        gap: var(--mirsaige-space-2xs);
    }

    .mirsaige-pagination-links .pagination {
        margin: 0;
    }

    .mirsaige-pagination-links .page-item .page-link {
        background: var(--mirsaige-dark-blue);
        border: 1px solid rgba(255, 178, 62, 0.2);
        color: var(--mirsaige-text);
        padding: var(--mirsaige-space-2xs) var(--mirsaige-space-sm);
        border-radius: var(--mirsaige-radius-sm);
        transition: all 0.2s ease;
    }

    .mirsaige-pagination-links .page-item.active .page-link {
        background: var(--mirsaige-accent);
        border-color: var(--mirsaige-accent);
        color: var(--mirsaige-dark-blue);
    }

    .mirsaige-pagination-links .page-item:not(.active) .page-link:hover {
        background: rgba(255, 178, 62, 0.1);
        color: var(--mirsaige-accent);
    }

    /* Scrollbar Styling */
    .mirsaige-stock-table-wrapper::-webkit-scrollbar {
        height: 8px;
    }

    .mirsaige-stock-table-wrapper::-webkit-scrollbar-track {
        background: var(--mirsaige-dark-blue);
        border-radius: 4px;
    }

    .mirsaige-stock-table-wrapper::-webkit-scrollbar-thumb {
        background: var(--mirsaige-accent);
        border-radius: 4px;
    }

    .mirsaige-stock-table-wrapper::-webkit-scrollbar-thumb:hover {
        background: var(--mirsaige-gold);
    }

    /* Responsive Styles */
    @media (max-width: 768px) {
        .mirsaige-stock-header {
            flex-direction: column;
            align-items: flex-start;
            gap: var(--mirsaige-space-md);
        }
        
        .mirsaige-search-box {
            width: 100%;
            max-width: 100%;
        }
        
        .mirsaige-pagination {
            flex-direction: column;
            align-items: flex-start;
            gap: var(--mirsaige-space-sm);
        }
        
        .mirsaige-stock-table {
            display: block;
            width: 100%;
        }
        
        .mirsaige-stock-table thead {
            display: none;
        }
        
        .mirsaige-stock-table tbody {
            display: block;
            width: 100%;
        }
        
        .mirsaige-stock-table tr {
            display: block;
            margin-bottom: var(--mirsaige-space-md);
            border: 1px solid rgba(255, 178, 62, 0.2);
            border-radius: 6px;
            overflow: hidden;
        }
        
        .mirsaige-stock-table td {
            display: block;
            width: 100%;
            padding: var(--mirsaige-space-xs) var(--mirsaige-space-sm);
            padding-left: 45%;
            position: relative;
            text-align: right;
            white-space: normal;
            border-bottom: 1px solid rgba(255, 178, 62, 0.1);
        }
        
        .mirsaige-stock-table td:last-child {
            border-bottom: none;
        }
        
        .mirsaige-stock-table td::before {
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
        .mirsaige-stock-table td {
            padding-left: 40%;
            font-size: 0.8rem;
        }
        
        .mirsaige-stock-table td::before {
            width: 35%;
            font-size: 0.75rem;
        }
    }

    @media (max-width: 430px) {
        .mirsaige-stock-table td {
            padding-left: 35%;
            padding-top: var(--mirsaige-space-2xs);
            padding-bottom: var(--mirsaige-space-2xs);
        }
        
        .mirsaige-stock-table td::before {
            width: 30%;
            left: var(--mirsaige-space-xs);
        }
    }
</style>
@endsection

@section('page')
<div class="mirsaige-stock-container">
    <div class="mirsaige-stock-header">
        <div>
            <h1 class="mirsaige-app-breadcrumbs-title">Stock Reports</h1>
            <div class="mirsaige-app-breadcrumbs">
                <div class="mirsaige-app-breadcrumb">
                    <a href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-house"></i> Home</a>
                </div>
                <div class="mirsaige-app-breadcrumb divider">
                    <i class="fa-solid fa-angle-right"></i>
                </div>
                <div class="mirsaige-app-breadcrumb">
                    <a href="#" class="active">Stock Reports</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Search Box -->
    <div class="mirsaige-search-box">
        <i class="fa-solid fa-search mirsaige-search-icon"></i>
        <input type="text" id="searchInput" class="mirsaige-search-input" placeholder="Search stock records..." onkeyup="search()">
    </div>

    <!-- Table Container -->
    <div class="mirsaige-stock-table-wrapper">
        <div class="mirsaige-stock-table-container">
            <table class="mirsaige-stock-table" id="stockTable">
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

    <!-- Pagination -->
    <div class="mirsaige-pagination">
        <div class="mirsaige-pagination-info">
            Total: {{ $stockDetails->total() }} records
        </div>
        <div class="mirsaige-pagination-links">
            {!! $stockDetails->withQueryString()->links() !!}
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    function search() {
        let searchText = document.getElementById('searchInput').value.toLowerCase();
        let table = document.getElementById('stockTable');
        let tr = table.getElementsByTagName('tr');
        
        // Skip the header row
        for (let i = 1; i < tr.length; i++) {
            let td = tr[i].getElementsByTagName('td');
            let matchFound = false;
            
            for (let j = 0; j < td.length; j++) {
                let content = td[j].textContent || td[j].innerText;
                
                if (content.toLowerCase().indexOf(searchText) > -1) {
                    matchFound = true;
                    break;
                }
            }
            
            if (matchFound) {
                tr[i].style.display = "";
                tr[i].classList.add('highlight');
            } else {
                tr[i].style.display = "none";
                tr[i].classList.remove('highlight');
            }
        }
    }
    
    // Remove highlight when search is cleared
    document.getElementById('searchInput').addEventListener('input', function() {
        if (this.value === '') {
            let tr = document.getElementById('stockTable').getElementsByTagName('tr');
            for (let i = 1; i < tr.length; i++) {
                tr[i].classList.remove('highlight');
            }
        }
    });
</script>
@endsection