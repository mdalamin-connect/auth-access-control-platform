@extends('layout.erp.app')
@section('title', 'Requisition Reports')
@section('style')
<style>
    /* Requisition Report Specific Styles */
    .mirsaige-requisition-container {
        padding: var(--mirsaige-space-md);
        color: var(--mirsaige-text);
        max-width: 100%;
        overflow-x: hidden;
        min-height: 100vh;
    }

    /* Header Section */
    .mirsaige-requisition-header {
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
    .mirsaige-requisition-table-wrapper {
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

    .mirsaige-requisition-table-container {
        border-radius: 8px;
        min-width: 100%;
    }

    /* Table Styles */
    .mirsaige-requisition-table {
        width: 100%;
        border-collapse: collapse;
    }

    .mirsaige-requisition-table thead {
        background: var(--mirsaige-darker-blue);
    }

    .mirsaige-requisition-table th {
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

    .mirsaige-requisition-table td {
        padding: var(--mirsaige-space-sm);
        color: var(--mirsaige-text);
        border-bottom: 1px solid rgba(255, 178, 62, 0.05);
        font-size: 0.9rem;
        vertical-align: middle;
    }

    .mirsaige-requisition-table tr:last-child td {
        border-bottom: none;
    }

    .mirsaige-requisition-table tr:hover td {
        background: rgba(255, 178, 62, 0.05);
        color: var(--mirsaige-white);
    }

    /* Highlight matching search results */
    .mirsaige-requisition-table tr.highlight td {
        background: rgba(255, 178, 62, 0.1);
        color: var(--mirsaige-white);
    }

    /* Quantity styling */
    .mirsaige-quantity {
        color: var(--mirsaige-info);
        font-weight: 500;
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
    .mirsaige-requisition-table-wrapper::-webkit-scrollbar {
        height: 8px;
    }

    .mirsaige-requisition-table-wrapper::-webkit-scrollbar-track {
        background: var(--mirsaige-dark-blue);
        border-radius: 4px;
    }

    .mirsaige-requisition-table-wrapper::-webkit-scrollbar-thumb {
        background: var(--mirsaige-accent);
        border-radius: 4px;
    }

    .mirsaige-requisition-table-wrapper::-webkit-scrollbar-thumb:hover {
        background: var(--mirsaige-gold);
    }

    /* Responsive Styles */
    @media (max-width: 768px) {
        .mirsaige-requisition-header {
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
        
        .mirsaige-requisition-table {
            display: block;
            width: 100%;
        }
        
        .mirsaige-requisition-table thead {
            display: none;
        }
        
        .mirsaige-requisition-table tbody {
            display: block;
            width: 100%;
        }
        
        .mirsaige-requisition-table tr {
            display: block;
            margin-bottom: var(--mirsaige-space-md);
            border: 1px solid rgba(255, 178, 62, 0.2);
            border-radius: 6px;
            overflow: hidden;
        }
        
        .mirsaige-requisition-table td {
            display: block;
            width: 100%;
            padding: var(--mirsaige-space-xs) var(--mirsaige-space-sm);
            padding-left: 45%;
            position: relative;
            text-align: right;
            white-space: normal;
            border-bottom: 1px solid rgba(255, 178, 62, 0.1);
        }
        
        .mirsaige-requisition-table td:last-child {
            border-bottom: none;
        }
        
        .mirsaige-requisition-table td::before {
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
        .mirsaige-requisition-table td {
            padding-left: 40%;
            font-size: 0.8rem;
        }
        
        .mirsaige-requisition-table td::before {
            width: 35%;
            font-size: 0.75rem;
        }
    }

    @media (max-width: 430px) {
        .mirsaige-requisition-table td {
            padding-left: 35%;
            padding-top: var(--mirsaige-space-2xs);
            padding-bottom: var(--mirsaige-space-2xs);
        }
        
        .mirsaige-requisition-table td::before {
            width: 30%;
            left: var(--mirsaige-space-xs);
        }
    }
</style>
@endsection

@section('page')
<div class="mirsaige-requisition-container">
    <div class="mirsaige-requisition-header">
        <div>
            <h1 class="mirsaige-app-breadcrumbs-title">Requisition Reports</h1>
            <div class="mirsaige-app-breadcrumbs">
                <div class="mirsaige-app-breadcrumb">
                    <a href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-house"></i> Home</a>
                </div>
                <div class="mirsaige-app-breadcrumb divider">
                    <i class="fa-solid fa-angle-right"></i>
                </div>
                <div class="mirsaige-app-breadcrumb">
                    <a href="{{ route('requisitions.index') }}">Manage Requisitions</a>
                </div>
                <div class="mirsaige-app-breadcrumb divider">
                    <i class="fa-solid fa-angle-right"></i>
                </div>
                <div class="mirsaige-app-breadcrumb">
                    <a href="#" class="active">Requisition Reports</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Search Box -->
    <div class="mirsaige-search-box">
        <i class="fa-solid fa-search mirsaige-search-icon"></i>
        <input type="text" id="searchInput" class="mirsaige-search-input" placeholder="Search requisition records..." onkeyup="search()">
    </div>

    <!-- Table Container -->
    <div class="mirsaige-requisition-table-wrapper">
        <div class="mirsaige-requisition-table-container">
            <table class="mirsaige-requisition-table" id="requisitionTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Project</th>
                        <th>Product</th>
                        <th>Qty</th>
                        <th>UOM</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($results as $key=>$result)
                        <tr>
                            <td data-label="#">{{ ++$key }}</td>
                            <td data-label="Project">{{ $result->project->name }}</td>
                            <td data-label="Product">{{ $result->product->name }}</td>
                            <td data-label="Qty" class="mirsaige-quantity">{{ $result->total_qty }}</td>
                            <td data-label="UOM">{{ $result->uom->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    <div class="mirsaige-pagination">
        <div class="mirsaige-pagination-info">
            Total: {{ $results->total() }} records
        </div>
        <div class="mirsaige-pagination-links">
            {!! $results->withQueryString()->links() !!}
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    function search() {
        let searchText = document.getElementById('searchInput').value.toLowerCase();
        let table = document.getElementById('requisitionTable');
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
            let tr = document.getElementById('requisitionTable').getElementsByTagName('tr');
            for (let i = 1; i < tr.length; i++) {
                tr[i].classList.remove('highlight');
            }
        }
    });
</script>
@endsection