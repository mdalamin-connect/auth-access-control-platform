@extends('layout.erp.app')
@section('title', 'Manage UOM')
@section('style')
<style>
    /* Base Styles */
    .mirsaige-uom-container {
        padding: var(--mirsaige-space-md);
        color: var(--mirsaige-text);
        max-width: 100%;
        overflow-x: hidden;
    }

    /* Header Section */
    .mirsaige-uom-header {
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
    .mirsaige-uom-table-wrapper {
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        position: relative;
    }

    .mirsaige-uom-table-container {
        background: var(--mirsaige-dark-blue);
        border-radius: 8px;
        border: 1px solid rgba(255, 178, 62, 0.1);
        min-width: 100%;
    }

    /* Table Styles */
    .mirsaige-uom-table {
        width: 100%;
        border-collapse: collapse;
    }

    .mirsaige-uom-table thead {
        background: var(--mirsaige-darker-blue);
    }

    .mirsaige-uom-table th {
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

    .mirsaige-uom-table td {
        padding: var(--mirsaige-space-sm);
        color: var(--mirsaige-text);
        border-bottom: 1px solid rgba(255, 178, 62, 0.05);
        font-size: 0.9rem;
        vertical-align: middle;
    }

    .mirsaige-uom-table tr:last-child td {
        border-bottom: none;
    }

    .mirsaige-uom-table tr:hover td {
        background: rgba(255, 178, 62, 0.05);
        color: var(--mirsaige-white);
    }

    /* Action Buttons */
    .mirsaige-uom-actions {
        display: flex;
        gap: var(--mirsaige-space-xs);
        flex-wrap: nowrap;
    }

    .mirsaige-uom-action-btn {
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

    .mirsaige-uom-action-btn.view {
        background: var(--mirsaige-primary);
        color: var(--mirsaige-accent);
    }

    .mirsaige-uom-action-btn.edit {
        background: var(--mirsaige-secondary);
        color: var(--mirsaige-accent);
    }

    .mirsaige-uom-action-btn.delete {
        background:rgb(220, 51, 68);
        color:rgb(137, 3, 3);
    }

    .mirsaige-uom-action-btn:hover {
        opacity: 0.9;
        transform: translateY(-1px);
    }

    /* Action text visibility - replaces JavaScript functionality */
    .mirsaige-uom-action-btn .action-text {
        display: inline;
        color: var(--mirsaige-white);
    }
    
    .mirsaige-app-breadcrumbs-btn .action-text {
        display: inline;
    }

    /* Scrollbar Styling */
    .mirsaige-uom-table-wrapper::-webkit-scrollbar {
        height: 8px;
    }

    .mirsaige-uom-table-wrapper::-webkit-scrollbar-track {
        background: var(--mirsaige-dark-blue);
        border-radius: 4px;
    }

    .mirsaige-uom-table-wrapper::-webkit-scrollbar-thumb {
        background: var(--mirsaige-accent);
        border-radius: 4px;
    }

    .mirsaige-uom-table-wrapper::-webkit-scrollbar-thumb:hover {
        background: var(--mirsaige-gold);
    }

    /* Pagination Styles */
    .mirsaige-pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: var(--mirsaige-space-md);
        flex-wrap: wrap;
        gap: var(--mirsaige-space-xs);
    }

    .mirsaige-pagination-list {
        display: flex;
        list-style: none;
        padding: 0;
        margin: 0;
        gap: var(--mirsaige-space-2xs);
        flex-wrap: wrap;
        justify-content: center;
    }

    .mirsaige-pagination-item {
        margin: 0;
    }

    .mirsaige-pagination-link {
        display: flex;
        align-items: center;
        justify-content: center;
        min-width: 36px;
        height: 36px;
        padding: 0 var(--mirsaige-space-xs);
        border-radius: 6px;
        background: var(--mirsaige-dark-blue);
        color: var(--mirsaige-text);
        border: 1px solid rgba(255, 178, 62, 0.2);
        font-size: 0.9rem;
        font-weight: 500;
        transition: all 0.2s ease;
        text-decoration: none;
    }

    .mirsaige-pagination-link:hover {
        background: rgba(255, 178, 62, 0.1);
        color: var(--mirsaige-accent);
        border-color: var(--mirsaige-accent);
    }

    .mirsaige-pagination-link.active {
        background: var(--mirsaige-accent);
        color: var(--mirsaige-dark);
        border-color: var(--mirsaige-accent);
        font-weight: 600;
    }

    .mirsaige-pagination-link.disabled {
        opacity: 0.5;
        pointer-events: none;
    }

    .mirsaige-pagination-ellipsis {
        display: flex;
        align-items: center;
        justify-content: center;
        min-width: 36px;
        height: 36px;
        color: var(--mirsaige-text);
        font-size: 0.9rem;
    }

    .mirsaige-pagination-form {
        display: flex;
        align-items: center;
        gap: var(--mirsaige-space-xs);
        margin-left: var(--mirsaige-space-sm);
    }

    .mirsaige-pagination-input {
        width: 50px;
        height: 36px;
        padding: 0 var(--mirsaige-space-xs);
        background: var(--mirsaige-dark-blue);
        border: 1px solid rgba(255, 178, 62, 0.2);
        border-radius: 6px;
        color: var(--mirsaige-text);
        text-align: center;
        font-size: 0.9rem;
    }

    .mirsaige-pagination-input:focus {
        border-color: var(--mirsaige-accent);
        outline: none;
    }

    .mirsaige-pagination-submit {
        padding: 0 var(--mirsaige-space-sm);
        height: 36px;
        background: var(--mirsaige-accent);
        color: var(--mirsaige-dark);
        border: none;
        border-radius: 6px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .mirsaige-pagination-submit:hover {
        opacity: 0.9;
    }

    /* Medium Desktop Styles (992px - 1280px) */
    @media (min-width: 992px) and (max-width: 1280px) {
        .mirsaige-uom-container {
            padding: var(--mirsaige-space-sm);
        }
        .mirsaige-app-breadcrumbs-btn{
            font-size: 1rem;
        }

        .mirsaige-app-breadcrumbs-title {
            font-size: 1rem;
        }
        
        .mirsaige-uom-table th,
        .mirsaige-uom-table td {
            padding: 0.6rem 0.8rem;
            font-size: 0.85rem;
        }
        
        .mirsaige-uom-actions {
            gap: 0.4rem;
            flex-wrap: nowrap;
        }
        .mirsaige-uom-action-btn {
            padding: 0.25rem 0.5rem;
            min-width: 32px;
            height: 32px;
        }
        
        .mirsaige-uom-action-btn .action-text {
            display: inline;
            font-size: 0.75rem;
        }
        
        .mirsaige-uom-actions {
            margin-right: 0.1rem;
        }
    }

    /* Tablet Styles (768px - 991px) */
    @media (min-width: 768px) and (max-width: 991px) {
        .mirsaige-uom-container {
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
        
        .mirsaige-uom-table th,
        .mirsaige-uom-table td {
            padding: var(--mirsaige-space-2xs);
            font-size: 0.82rem;

        }
        
        .mirsaige-uom-action-btn {
            padding: var(--mirsaige-space-4xs) var(--mirsaige-space-4xs);
            min-width: 28px;
        }
        
        .mirsaige-uom-action-btn .action-text {
            display: none;
        }
        
        .mirsaige-uom-actions {
            gap: var(--mirsaige-space-3xs);
        }

        .mirsaige-pagination-link {
            min-width: 32px;
            height: 32px;
            font-size: 0.85rem;
        }

        .mirsaige-pagination-input {
            height: 32px;
            width: 40px;
        }

        .mirsaige-pagination-submit {
            height: 32px;
        }
    }

    /* Mobile Table Styles (767px and below) */
    @media (max-width: 767px) {
        .mirsaige-uom-container {
            padding: var(--mirsaige-space-sm);
        }
        
        .mirsaige-app-breadcrumbs-btn {
            font-size: 0.9rem;
        }
        .mirsaige-app-breadcrumbs-title {
            font-size: 0.9rem;
        }
        
        /* Stacked table layout for mobile */
        .mirsaige-uom-table {
            display: block;
            width: 100%;
        }
        
        .mirsaige-uom-table thead {
            display: none;
        }
        
        .mirsaige-uom-table tbody {
            display: block;
            width: 100%;
        }
        
        .mirsaige-uom-table tr {
            display: block;
            margin-bottom: var(--mirsaige-space-md);
            border: 1px solid rgba(255, 178, 62, 0.2);
            border-radius: 6px;
            overflow: hidden;
        }
        
        .mirsaige-uom-table td {
            display: block;
            width: 100%;
            padding: var(--mirsaige-space-xs) var(--mirsaige-space-sm);
            padding-left: 45%;
            position: relative;
            text-align: right;
            white-space: normal;
            border-bottom: 1px solid rgba(255, 178, 62, 0.1);
        }
        
        .mirsaige-uom-table td:last-child {
            border-bottom: none;
        }
        
        .mirsaige-uom-table td::before {
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
        .mirsaige-uom-actions {
            justify-content: flex-end;
        }
        
        .mirsaige-uom-action-btn {
            padding: var(--mirsaige-space-4xs) var(--mirsaige-space-2xs);
            min-width: 26px;
        }
        
        .mirsaige-uom-action-btn .action-text {
            display: none;
        }
        
        .mirsaige-app-breadcrumb {
            display: none;
        }
        
        /* Pagination adjustments for mobile */
        .mirsaige-pagination {
            flex-direction: column;
            gap: var(--mirsaige-space-sm);
        }

        .mirsaige-pagination-form {
            margin-left: 0;
            width: 100%;
            justify-content: center;
        }

        .mirsaige-pagination-link {
            min-width: 30px;
            height: 30px;
            font-size: 0.8rem;
        }

        .mirsaige-pagination-input {
            height: 30px;
            width: 60px;
        }

        .mirsaige-pagination-submit {
            height: 30px;
        }
    }

    /* Small Mobile Styles (575px and below) */
    @media (max-width: 575px) {
        .mirsaige-uom-table td {
            padding-left: 40%;
            font-size: 0.8rem;
        }
        
        .mirsaige-uom-table td::before {
            width: 35%;
            font-size: 0.75rem;
        }
        
        .mirsaige-app-breadcrumb {
            display: none;
        }

        .mirsaige-pagination-list {
            gap: var(--mirsaige-space-3xs);
        }

        .mirsaige-pagination-link {
            min-width: 28px;
            height: 28px;
            font-size: 0.75rem;
        }
    }

    /* Extra Small Mobile Styles (430px and below) */
    @media (max-width: 430px) {
        .mirsaige-uom-table td {
            padding-left: 35%;
            padding-top: var(--mirsaige-space-2xs);
            padding-bottom: var(--mirsaige-space-2xs);
        }
        
        .mirsaige-uom-table td::before {
            width: 30%;
            left: var(--mirsaige-space-xs);
        }
        
        .mirsaige-uom-action-btn {
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

        .mirsaige-pagination-link {
            min-width: 26px;
            height: 26px;
            padding: 0 5px;
        }

        .mirsaige-pagination-ellipsis {
            min-width: 26px;
            height: 26px;
        }
    }

    /* Print Styles */
    @media print {
        .mirsaige-uom-table {
            width: 100%;
            border: 1px solid #ddd;
        }
        
        .mirsaige-uom-table th {
            background: #f1f1f1 !important;
            color: #000 !important;
        }
        
        .mirsaige-uom-table td {
            color: #000 !important;
        }
        
        .mirsaige-uom-action-btn {
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
<div class="mirsaige-uom-container">
    <div class="mirsaige-uom-header">
        <div>
            <h1 class="mirsaige-app-breadcrumbs-title">UOM List</h1>
            <div class="mirsaige-app-breadcrumbs">
                <div class="mirsaige-app-breadcrumb">
                    <a href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-house"></i> Home</a>
                </div>
                <div class="mirsaige-app-breadcrumb divider">
                    <i class="fa-solid fa-angle-right"></i>
                </div>
                <div class="mirsaige-app-breadcrumb">
                    <a href="{{ route('uoms.index') }}">UOM</a>
                </div>
                @if (in_array($user_role_id, [1, 2]))
                <div class="mirsaige-app-breadcrumb divider">
                    <i class="fa-solid fa-angle-right"></i>
                </div>
                <div class="mirsaige-app-breadcrumb">
                    <a href="{{ route('uoms.index') }}" class="active">Manage UOM</a>
                </div>
                @endif
            </div>
        </div>
        
        @if (in_array($user_role_id, [1, 2,3]))
        <a href="{{ route('uoms.create') }}" class="mirsaige-app-breadcrumbs-btn">
            <i class="fa-solid fa-square-plus"></i> <span class="action-text">Create</span>
        </a>
        @endif
    </div>

    <div class="mirsaige-uom-table-wrapper">
        <div class="mirsaige-uom-table-container">
            <table class="mirsaige-uom-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        {{-- <th>Created At</th>
                        <th>Updated At</th> --}}
                        @if(in_array($user_role_id, [1, 2]))
                        <th>Created By</th>
                        <th>Updated By</th>
                        @endif
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($uoms as $uom)
                    <tr>
                        <td data-label="ID">{{ $uom->id }}</td>
                        <td data-label="Name">{{ $uom->name }}</td>
                        {{-- <td data-label="Created At">{{ $uom->created_at }}</td>
                        <td data-label="Updated At">{{ $uom->updated_at }}</td> --}}
                        @if(in_array($user_role_id, [1, 2]))
                        <td data-label="Created By">{{ $uom->creator->name ?? 'Unknown' }}</td>
                        <td data-label="Updated By">{{ $uom->updater->name ?? 'Unknown' }}</td>
                        @endif
                        <td data-label="Actions">
                            <div class="mirsaige-uom-actions">
                                @if (in_array($user_role_id, [1, 2,3]))
                                <a href="{{ route('uoms.show', $uom->id) }}" class="mirsaige-uom-action-btn view">
                                    <i class="fa-solid fa-eye"></i> <span class="action-text">View</span>
                                </a>
                                <a href="{{ route('uoms.edit', $uom->id) }}" class="mirsaige-uom-action-btn edit">
                                    <i class="fa-solid fa-pen-to-square"></i> <span class="action-text">Edit</span>
                                </a>
                                @endif
                                @if ($user_role_id == 1)
                                <form action="{{ route('uoms.destroy', $uom->id) }}" method="post" style="display: inline;">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="mirsaige-uom-action-btn delete">
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
    @if ($uoms->hasPages())
    <div class="mirsaige-pagination">
        <ul class="mirsaige-pagination-list">
            {{-- First Page Link --}}
            @if (!$uoms->onFirstPage())
            <li class="mirsaige-pagination-item">
                <a href="{{ $uoms->url(1) }}" class="mirsaige-pagination-link" aria-label="First">
                    &laquo;
                </a>
            </li>
            @endif

            {{-- Previous Page Link --}}
            @if ($uoms->onFirstPage())
            <li class="mirsaige-pagination-item disabled">
                <span class="mirsaige-pagination-link disabled">&lsaquo;</span>
            </li>
            @else
            <li class="mirsaige-pagination-item">
                <a href="{{ $uoms->previousPageUrl() }}" class="mirsaige-pagination-link" rel="prev" aria-label="Previous">
                    &lsaquo;
                </a>
            </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($uoms->getUrlRange(max(1, $uoms->currentPage() - 2), min($uoms->lastPage(), $uoms->currentPage() + 2)) as $page => $url)
                @if ($page == $uoms->currentPage())
                <li class="mirsaige-pagination-item active">
                    <span class="mirsaige-pagination-link active">{{ $page }}</span>
                </li>
                @else
                <li class="mirsaige-pagination-item">
                    <a href="{{ $url }}" class="mirsaige-pagination-link">{{ $page }}</a>
                </li>
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($uoms->hasMorePages())
            <li class="mirsaige-pagination-item">
                <a href="{{ $uoms->nextPageUrl() }}" class="mirsaige-pagination-link" rel="next" aria-label="Next">
                    &rsaquo;
                </a>
            </li>
            @else
            <li class="mirsaige-pagination-item disabled">
                <span class="mirsaige-pagination-link disabled">&rsaquo;</span>
            </li>
            @endif

            {{-- Last Page Link --}}
            @if ($uoms->currentPage() < $uoms->lastPage() - 2)
            <li class="mirsaige-pagination-item">
                <a href="{{ $uoms->url($uoms->lastPage()) }}" class="mirsaige-pagination-link" aria-label="Last">
                    &raquo;
                </a>
            </li>
            @endif
        </ul>

        {{-- Page Jump Form --}}
        <form class="mirsaige-pagination-form" method="GET" action="{{ url()->current() }}">
            <input type="number" name="page" class="mirsaige-pagination-input" 
                   min="1" max="{{ $uoms->lastPage() }}" 
                   value="{{ $uoms->currentPage() }}">
            <button type="submit" class="mirsaige-pagination-submit">Go</button>
        </form>
    </div>
    @endif

    <!-- Confirmation Dialog -->
    <div class="mirsaige-confirm-dialog" id="confirmDialog">
        <div class="mirsaige-confirm-content">
            <h3 class="mirsaige-confirm-title">Confirm Deletion</h3>
            <p>Are you sure you want to delete this UOM?</p>
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
    const deleteButtons = document.querySelectorAll('.mirsaige-uom-action-btn.delete');
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
</script>
@endsection