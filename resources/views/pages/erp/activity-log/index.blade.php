@extends('layout.erp.app')
@section('title', 'Manage Activity Log')
@section('style')
<style>
    /* Base Styles */
    .mirsaige-activitylog-container {
        padding: var(--mirsaige-space-md);
        color: var(--mirsaige-text);
        max-width: 100%;
        overflow-x: hidden;
    }

    /* Header Section */
    .mirsaige-activitylog-header {
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
    }

    /* Table Container */
    .mirsaige-activitylog-table-wrapper {
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        position: relative;
    }

    .mirsaige-activitylog-table-container {
        background: var(--mirsaige-dark-blue);
        border-radius: 8px;
        border: 1px solid rgba(255, 178, 62, 0.1);
        min-width: 100%;
    }

    /* Table Styles */
    .mirsaige-activitylog-table {
        width: 100%;
        border-collapse: collapse;
    }

    .mirsaige-activitylog-table thead {
        background: var(--mirsaige-darker-blue);
    }

    .mirsaige-activitylog-table th {
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

    .mirsaige-activitylog-table td {
        padding: var(--mirsaige-space-sm);
        color: var(--mirsaige-text);
        border-bottom: 1px solid rgba(255, 178, 62, 0.05);
        font-size: 0.9rem;
        vertical-align: middle;
    }

    .mirsaige-activitylog-table tr:last-child td {
        border-bottom: none;
    }

    .mirsaige-activitylog-table tr:hover td {
        background: rgba(255, 178, 62, 0.05);
        color: var(--mirsaige-white);
    }

    /* Activity Type Badges */
    .mirsaige-activitylog-badge {
        display: inline-block;
        padding: var(--mirsaige-space-3xs) var(--mirsaige-space-xs);
        border-radius: 4px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .mirsaige-activitylog-badge.create {
        background: rgba(40, 167, 69, 0.1);
        color: #28a745;
        border: 1px solid rgba(40, 167, 69, 0.2);
    }

    .mirsaige-activitylog-badge.update {
        background: rgba(255, 193, 7, 0.1);
        color: #ffc107;
        border: 1px solid rgba(255, 193, 7, 0.2);
    }

    .mirsaige-activitylog-badge.delete {
        background: rgba(220, 53, 69, 0.1);
        color: #dc3545;
        border: 1px solid rgba(220, 53, 69, 0.2);
    }

    .mirsaige-activitylog-badge.login {
        background: rgba(0, 123, 255, 0.1);
        color: #007bff;
        border: 1px solid rgba(0, 123, 255, 0.2);
    }

    .mirsaige-activitylog-badge.logout {
        background: rgba(108, 117, 125, 0.1);
        color: #6c757d;
        border: 1px solid rgba(108, 117, 125, 0.2);
    }

    .mirsaige-activitylog-badge.other {
        background: rgba(111, 66, 193, 0.1);
        color: #6f42c1;
        border: 1px solid rgba(111, 66, 193, 0.2);
    }

    /* Timestamp */
    .mirsaige-activitylog-timestamp {
        font-size: 0.85rem;
        color: var(--mirsaige-text);
        opacity: 0.8;
    }

    /* Scrollbar Styling */
    .mirsaige-activitylog-table-wrapper::-webkit-scrollbar {
        height: 8px;
    }

    .mirsaige-activitylog-table-wrapper::-webkit-scrollbar-track {
        background: var(--mirsaige-dark-blue);
        border-radius: 4px;
    }

    .mirsaige-activitylog-table-wrapper::-webkit-scrollbar-thumb {
        background: var(--mirsaige-accent);
        border-radius: 4px;
    }

    .mirsaige-activitylog-table-wrapper::-webkit-scrollbar-thumb:hover {
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
        .mirsaige-activitylog-container {
            padding: var(--mirsaige-space-sm);
        }
        
        .mirsaige-app-breadcrumbs-title {
            font-size: 1rem;
        }
        
        .mirsaige-activitylog-table th,
        .mirsaige-activitylog-table td {
            padding: 0.6rem 0.8rem;
            font-size: 0.85rem;
        }
        
        .mirsaige-activitylog-badge {
            font-size: 0.7rem;
            padding: 0.15rem 0.5rem;
        }
        
        .mirsaige-activitylog-timestamp {
            font-size: 0.8rem;
        }
    }

    /* Tablet Styles (768px - 991px) */
    @media (min-width: 768px) and (max-width: 991px) {
        .mirsaige-activitylog-container {
            padding: var(--mirsaige-space-sm);
        }
        
        .mirsaige-app-breadcrumbs-title {
            font-size: 0.95rem;
        }
        
        .mirsaige-app-breadcrumbs {
            font-size: 0.8rem;
        }
        
        .mirsaige-activitylog-table th,
        .mirsaige-activitylog-table td {
            padding: var(--mirsaige-space-2xs);
            font-size: 0.82rem;
        }
        
        .mirsaige-activitylog-badge {
            font-size: 0.65rem;
            padding: 0.1rem 0.4rem;
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
        .mirsaige-activitylog-container {
            padding: var(--mirsaige-space-sm);
        }
        
        .mirsaige-app-breadcrumbs-title {
            font-size: 0.9rem;
        }
        
        /* Stacked table layout for mobile */
        .mirsaige-activitylog-table {
            display: block;
            width: 100%;
        }
        
        .mirsaige-activitylog-table thead {
            display: none;
        }
        
        .mirsaige-activitylog-table tbody {
            display: block;
            width: 100%;
        }
        
        .mirsaige-activitylog-table tr {
            display: block;
            margin-bottom: var(--mirsaige-space-md);
            border: 1px solid rgba(255, 178, 62, 0.2);
            border-radius: 6px;
            overflow: hidden;
        }
        
        .mirsaige-activitylog-table td {
            display: block;
            width: 100%;
            padding: var(--mirsaige-space-xs) var(--mirsaige-space-sm);
            padding-left: 45%;
            position: relative;
            text-align: right;
            white-space: normal;
            border-bottom: 1px solid rgba(255, 178, 62, 0.1);
        }
        
        .mirsaige-activitylog-table td:last-child {
            border-bottom: none;
        }
        
        .mirsaige-activitylog-table td::before {
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
        .mirsaige-activitylog-table td {
            padding-left: 40%;
            font-size: 0.8rem;
        }
        
        .mirsaige-activitylog-table td::before {
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
        .mirsaige-activitylog-table td {
            padding-left: 35%;
            padding-top: var(--mirsaige-space-2xs);
            padding-bottom: var(--mirsaige-space-2xs);
        }
        
        .mirsaige-activitylog-table td::before {
            width: 30%;
            left: var(--mirsaige-space-xs);
        }
        
        .mirsaige-app-breadcrumbs-title {
            font-size: 0.75rem;
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
        .mirsaige-activitylog-table {
            width: 100%;
            border: 1px solid #ddd;
        }
        
        .mirsaige-activitylog-table th {
            background: #f1f1f1 !important;
            color: #000 !important;
        }
        
        .mirsaige-activitylog-table td {
            color: #000 !important;
        }

        .mirsaige-pagination {
            display: none !important;
        }
    }
</style>
@endsection

@section('page')
<div class="mirsaige-activitylog-container">
    <div class="mirsaige-activitylog-header">
        <div>
            <h1 class="mirsaige-app-breadcrumbs-title">Activity Logs</h1>
            <div class="mirsaige-app-breadcrumbs">
                <div class="mirsaige-app-breadcrumb">
                    <a href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-house"></i> Home</a>
                </div>
                <div class="mirsaige-app-breadcrumb divider">
                    <i class="fa-solid fa-angle-right"></i>
                </div>
                <div class="mirsaige-app-breadcrumb">
                    <a href="{{ route('activity-log.index') }}" class="active">Activity Log</a>
                </div>
            </div>
        </div>
    </div>

    <div class="mirsaige-activitylog-table-wrapper">
        <div class="mirsaige-activitylog-table-container">
            <table class="mirsaige-activitylog-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Activity Type</th>
                        <th>IP Address</th>
                        <th>Timestamp</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($activitylogs as $activitylog)
                    <tr>
                        <td data-label="ID">{{ $activitylog->id }}</td>
                        <td data-label="User">
                            
                                {{ $activitylog->user_id }}
                           
                        </td>
                        <td data-label="Activity Type">
                            <span class="mirsaige-activitylog-badge {{ strtolower($activitylog->activity_type) }}">
                                {{ $activitylog->activity_type }}
                            </span>
                        </td>
                        <td data-label="IP Address">{{ $activitylog->ip_address }}</td>
                        <td data-label="Timestamp" class="mirsaige-activitylog-timestamp">
 {{ \Carbon\Carbon::parse($activitylog->created_at)->format('M d, Y h:i A') }}                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    @if ($activitylogs->hasPages())
    <div class="mirsaige-pagination">
        <ul class="mirsaige-pagination-list">
            {{-- First Page Link --}}
            @if (!$activitylogs->onFirstPage())
            <li class="mirsaige-pagination-item">
                <a href="{{ $activitylogs->url(1) }}" class="mirsaige-pagination-link" aria-label="First">
                    &laquo;
                </a>
            </li>
            @endif

            {{-- Previous Page Link --}}
            @if ($activitylogs->onFirstPage())
            <li class="mirsaige-pagination-item disabled">
                <span class="mirsaige-pagination-link disabled">&lsaquo;</span>
            </li>
            @else
            <li class="mirsaige-pagination-item">
                <a href="{{ $activitylogs->previousPageUrl() }}" class="mirsaige-pagination-link" rel="prev" aria-label="Previous">
                    &lsaquo;
                </a>
            </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($activitylogs->getUrlRange(max(1, $activitylogs->currentPage() - 2), min($activitylogs->lastPage(), $activitylogs->currentPage() + 2)) as $page => $url)
                @if ($page == $activitylogs->currentPage())
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
            @if ($activitylogs->hasMorePages())
            <li class="mirsaige-pagination-item">
                <a href="{{ $activitylogs->nextPageUrl() }}" class="mirsaige-pagination-link" rel="next" aria-label="Next">
                    &rsaquo;
                </a>
            </li>
            @else
            <li class="mirsaige-pagination-item disabled">
                <span class="mirsaige-pagination-link disabled">&rsaquo;</span>
            </li>
            @endif

            {{-- Last Page Link --}}
            @if ($activitylogs->currentPage() < $activitylogs->lastPage() - 2)
            <li class="mirsaige-pagination-item">
                <a href="{{ $activitylogs->url($activitylogs->lastPage()) }}" class="mirsaige-pagination-link" aria-label="Last">
                    &raquo;
                </a>
            </li>
            @endif
        </ul>

        {{-- Page Jump Form --}}
        <form class="mirsaige-pagination-form" method="GET" action="{{ url()->current() }}">
            <input type="number" name="page" class="mirsaige-pagination-input" 
                   min="1" max="{{ $activitylogs->lastPage() }}" 
                   value="{{ $activitylogs->currentPage() }}">
            <button type="submit" class="mirsaige-pagination-submit">Go</button>
        </form>
    </div>
    @endif
</div>
@endsection

@section('script')
<script>
    // You can add any specific JavaScript for the activity log page here
    document.addEventListener('DOMContentLoaded', function() {
        // Any initialization code can go here
    });
</script>
@endsection