@extends('layout.erp.app')
@section('title', 'Requisition Details')
@section('style')
<style>


    /* Modern Container with Gradient Background */
    .mirsaige-details-container {
        margin: 0 auto;
        padding: var(--mirsaige-space-lg);
        background: linear-gradient(135deg, var(--mirsaige-dark) 0%, var(--mirsaige-darker-blue) 100%);
        border-radius: var(--mirsaige-radius-lg);
        box-shadow: var(--mirsaige-shadow-lg);
        color: var(--mirsaige-text);
    }

    /* Breadcrumb Navigation */
    .mirsaige-breadcrumb-wrapper {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: var(--mirsaige-space-sm);
        margin-bottom: var(--mirsaige-space-md);
    }

    .mirsaige-breadcrumbs {
        display: flex;
        align-items: center;
        gap: var(--mirsaige-space-xs);
        font-size: 0.9rem;
    }

    .mirsaige-breadcrumb-item {
        display: flex;
        align-items: center;
        gap: var(--mirsaige-space-xs);
    }

    .mirsaige-breadcrumb-link {
        color: var(--mirsaige-accent);
        text-decoration: none;
        transition: all 0.2s ease;
        padding: var(--mirsaige-space-3xs) var(--mirsaige-space-xs);
        border-radius: var(--mirsaige-radius-sm);
        display: flex;
        align-items: center;
        gap: var(--mirsaige-space-3xs);
    }

    .mirsaige-breadcrumb-link:hover {
        background: rgba(255, 178, 62, 0.1);
        transform: translateY(-1px);
    }

    .mirsaige-breadcrumb-link.active {
        color: var(--mirsaige-light-text);
        pointer-events: none;
    }

    .mirsaige-breadcrumb-divider {
        color: var(--mirsaige-light-text);
        opacity: 0.7;
    }

    /* Header Section */
    .mirsaige-details-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: var(--mirsaige-space-xl);
        padding-bottom: var(--mirsaige-space-md);
        border-bottom: 1px solid #334155;
    }

    .mirsaige-details-title {
        font-size: 1.8rem;
        font-weight: 600;
        color: var(--mirsaige-white);
        display: flex;
        align-items: center;
        gap: var(--mirsaige-space-sm);
        margin: 0;
    }

    .mirsaige-details-title-icon {
        color: var(--mirsaige-accent);
        font-size: 1.8rem;
    }

    /* Company Info Section */
    .mirsaige-company-section {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: var(--mirsaige-space-xl);
        padding-bottom: var(--mirsaige-space-md);
        border-bottom: 1px solid #334155;
    }

    .mirsaige-company-logo {
        max-width: 120px;
        height: auto;
        filter: brightness(0) invert(1);
    }

    .mirsaige-company-info {
        text-align: right;
    }

    .mirsaige-company-name {
        font-size: 1.2rem;
        font-weight: 600;
        color: var(--mirsaige-white);
        margin-bottom: var(--mirsaige-space-xs);
    }

    .mirsaige-company-address {
        font-size: 0.9rem;
        color: var(--mirsaige-light-text);
        line-height: 1.5;
    }

    /* Requisition Info Section - Modern Flex Layout */
    .mirsaige-requisition-info-container {
        display: flex;
        gap: var(--mirsaige-space-lg);
        margin-bottom: var(--mirsaige-space-xl);
    }

    .mirsaige-requisition-card {
        flex: 1;
        background: rgba(30, 41, 59, 0.5);
        border-radius: var(--mirsaige-radius-md);
        padding: var(--mirsaige-space-md);
        border: 1px solid #334155;
        box-shadow: var(--mirsaige-shadow-sm);
        transition: all 0.3s ease;
    }

    .mirsaige-requisition-card:hover {
        transform: translateY(-3px);
        box-shadow: var(--mirsaige-shadow-md);
        border-color: var(--mirsaige-accent);
    }

    .mirsaige-card-title {
        font-size: 1rem;
        font-weight: 600;
        color: var(--mirsaige-accent);
        margin-bottom: var(--mirsaige-space-md);
        padding-bottom: var(--mirsaige-space-xs);
        border-bottom: 1px solid #334155;
        display: flex;
        align-items: center;
        gap: var(--mirsaige-space-xs);
    }

    .mirsaige-info-grid {
        display: grid;
        grid-template-columns: max-content 1fr;
        gap: var(--mirsaige-space-sm) var(--mirsaige-space-md);
    }

    .mirsaige-info-label {
        font-size: 0.85rem;
        color: var(--mirsaige-light-text);
        font-weight: 500;
    }

    .mirsaige-info-value {
        font-size: 0.95rem;
        color: var(--mirsaige-white);
        font-weight: 500;
    }

    /* Status Badge */
    .mirsaige-status-badge {
        display: inline-block;
        padding: var(--mirsaige-space-3xs) var(--mirsaige-space-sm);
        border-radius: var(--mirsaige-radius-sm);
        font-size: 0.8rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .status-pending {
        background-color: rgba(245, 158, 11, 0.2);
        color: var(--mirsaige-warning);
    }

    .status-approved {
        background-color: rgba(16, 185, 129, 0.2);
        color: var(--mirsaige-success);
    }

    .status-rejected {
        background-color: rgba(239, 68, 68, 0.2);
        color: var(--mirsaige-danger);
    }

    /* Table Styles */
    .mirsaige-table-container {
        margin-bottom: var(--mirsaige-space-xl);
        overflow-x: auto;
    }

    .mirsaige-requisition-table {
        width: 100%;
        border-collapse: collapse;
        background: rgba(30, 41, 59, 0.5);
        border-radius: var(--mirsaige-radius-md);
        overflow: hidden;
    }

    .mirsaige-requisition-table th {
        background: var(--mirsaige-primary);
        color: var(--mirsaige-white);
        padding: var(--mirsaige-space-sm);
        text-align: left;
        font-weight: 600;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .mirsaige-requisition-table td {
        padding: var(--mirsaige-space-sm);
        border-bottom: 1px solid #334155;
        color: var(--mirsaige-text);
        font-size: 0.9rem;
    }

    .mirsaige-requisition-table tr:last-child td {
        border-bottom: none;
    }

    .mirsaige-requisition-table tr:hover td {
        background: rgba(255, 178, 62, 0.05);
    }

    /* Remarks Section */
    .mirsaige-remarks-section {
        background: rgba(30, 41, 59, 0.5);
        border-radius: var(--mirsaige-radius-md);
        padding: var(--mirsaige-space-md);
        margin-bottom: var(--mirsaige-space-xl);
        border: 1px solid #334155;
    }

    .mirsaige-remarks-title {
        font-size: 1rem;
        font-weight: 600;
        color: var(--mirsaige-accent);
        margin-bottom: var(--mirsaige-space-sm);
    }

    .mirsaige-remarks-content {
        color: var(--mirsaige-text);
        line-height: 1.6;
    }

    /* Approval Section */
    .mirsaige-approval-section {
        display: flex;
        justify-content: space-between;
        gap: var(--mirsaige-space-md);
        margin-top: var(--mirsaige-space-xl);
        padding-top: var(--mirsaige-space-lg);
        border-top: 1px solid #334155;
    }

    .mirsaige-approval-box {
        flex: 1;
        text-align: center;
        padding: var(--mirsaige-space-md);
        background: rgba(30, 41, 59, 0.5);
        border-radius: var(--mirsaige-radius-md);
        border: 1px solid #334155;
    }

    .mirsaige-approval-line {
        border-top: 1px solid var(--mirsaige-accent);
        width: 80%;
        margin: 0 auto;
        padding-top: var(--mirsaige-space-xl);
        position: relative;
    }

    .mirsaige-approval-line:after {
        content: "";
        position: absolute;
        top: -5px;
        left: 50%;
        transform: translateX(-50%);
        width: 10px;
        height: 10px;
        background: var(--mirsaige-accent);
        border-radius: 50%;
    }

    .mirsaige-approval-title {
        color: var(--mirsaige-accent);
        font-size: 0.9rem;
        font-weight: 600;
        margin-top: var(--mirsaige-space-sm);
    }

    /* Action Buttons */
    .mirsaige-actions-section {
        display: flex;
        justify-content: flex-end;
        gap: var(--mirsaige-space-sm);
        margin-top: var(--mirsaige-space-xl);
    }

    .mirsaige-action-btn {
        padding: var(--mirsaige-space-sm) var(--mirsaige-space-md);
        border-radius: var(--mirsaige-radius-md);
        font-weight: 500;
        display: inline-flex;
        align-items: center;
        gap: var(--mirsaige-space-xs);
        transition: all 0.3s ease;
        text-decoration: none;
        font-size: 0.95rem;
        border: none;
        cursor: pointer;
    }

    .mirsaige-action-btn.back {
        background: transparent;
        color: var(--mirsaige-accent);
        border: 1px solid var(--mirsaige-accent);
    }

    .mirsaige-action-btn.back:hover {
        background: rgba(255, 178, 62, 0.1);
        transform: translateY(-2px);
    }

    .mirsaige-action-btn.print {
        background: var(--mirsaige-accent);
        color: var(--mirsaige-dark);
        border: 1px solid var(--mirsaige-accent);
    }

    .mirsaige-action-btn.print:hover {
        background: #FFA01A;
        box-shadow: 0 4px 12px rgba(255, 178, 62, 0.3);
        transform: translateY(-2px);
    }

    /* Responsive Adjustments */
    @media (max-width: 992px) {
        .mirsaige-requisition-info-container {
            flex-direction: column;
        }
        
        .mirsaige-company-section {
            flex-direction: column;
            align-items: center;
            gap: var(--mirsaige-space-md);
        }
        
        .mirsaige-company-info {
            text-align: center;
        }
    }

    @media (max-width: 768px) {
        .mirsaige-details-container {
            padding: var(--mirsaige-space-md);
        }
        
        .mirsaige-breadcrumb-wrapper {
            flex-direction: column;
            align-items: flex-start;
            gap: var(--mirsaige-space-sm);
        }
        
        .mirsaige-approval-section {
            flex-direction: column;
        }
        
        .mirsaige-actions-section {
            flex-direction: column;
            align-items: flex-end;
        }
        
        .mirsaige-action-btn {
            width: 100%;
            justify-content: center;
        }
    }

    /* Advanced Print Styles */
    @media print {
        @page {
            size: A4;
            margin: 1cm;
        }

        body {
            background: white !important;
            color: #333 !important;
            font-size: 12pt;
            line-height: 1.4;
        }

        /* Hide unnecessary elements */
        .mirsaige-app-sidebar,
        .mirsaige-app-navbar,
        .mirsaige-app-overlay,
        .no-print, 
        .mirsaige-actions-section {
            display: none !important;
        }

        /* Adjust layout for print */
        .mirsaige-details-container {
            padding: 0 !important;
            margin: 0 !important;
            max-width: 100% !important;
            background: white !important;
            box-shadow: none !important;
            border-radius: 0 !important;
        }

        /* Company section for print */
        .mirsaige-company-section {
            display: flex !important;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5cm !important;
            padding-bottom: 0.5cm !important;
            border-bottom: 2px solid #ddd !important;
        }

        .mirsaige-company-logo {
            max-width: 150px !important;
            filter: brightness(0) !important;
        }

        .mirsaige-company-info {
            text-align: right !important;
            color: #333 !important;
        }

        .mirsaige-company-name {
            color: #111 !important;
            font-size: 1.4rem !important;
        }

        .mirsaige-company-address {
            color: #555 !important;
            font-size: 0.9rem !important;
        }

        /* Requisition info cards for print */
        .mirsaige-requisition-info-container {
            display: flex !important;
            flex-direction: row !important;
            gap: 1cm !important;
            margin-bottom: 1cm !important;
            page-break-inside: avoid;
        }

        .mirsaige-requisition-card {
            flex: 1 !important;
            background: white !important;
            border: 1px solid #eee !important;
            box-shadow: none !important;
            padding: 0.5cm !important;
            page-break-inside: avoid;
        }

        .mirsaige-card-title {
            color: #222 !important;
            border-bottom: 1px solid #ddd !important;
        }

        .mirsaige-info-label {
            color: #666 !important;
        }

        .mirsaige-info-value {
            color: #333 !important;
            font-weight: normal !important;
        }

        /* Table styles for print */
        .mirsaige-table-container {
            margin-bottom: 1cm !important;
            page-break-inside: avoid;
        }

        .mirsaige-requisition-table {
            width: 100% !important;
            border-collapse: collapse !important;
            background: white !important;
        }

        .mirsaige-requisition-table th {
            background: #f5f5f5 !important;
            color: #333 !important;
            padding: 0.3cm 0.5cm !important;
            border: 1px solid #ddd !important;
        }

        .mirsaige-requisition-table td {
            color: #333 !important;
            padding: 0.3cm 0.5cm !important;
            border: 1px solid #eee !important;
        }

        /* Remarks section for print */
        .mirsaige-remarks-section {
            background: white !important;
            border: 1px solid #eee !important;
            margin-bottom: 1cm !important;
            page-break-inside: avoid;
        }

        .mirsaige-remarks-title {
            color: #222 !important;
        }

        .mirsaige-remarks-content {
            color: #333 !important;
        }

        /* Approval section for print */
        .mirsaige-approval-section {
            display: flex !important;
            justify-content: space-between;
            margin-top: 1.5cm !important;
            padding-top: 0.5cm !important;
            border-top: 2px solid #ddd !important;
            page-break-inside: avoid;
        }

        .mirsaige-approval-box {
            background: white !important;
            border: none !important;
        }

        .mirsaige-approval-line {
            border-top: 1px solid #999 !important;
        }

        .mirsaige-approval-line:after {
            background: #999 !important;
        }

        .mirsaige-approval-title {
            color: #555 !important;
        }

        /* Force colors for print */
        * {
            color: #333 !important;
            background: transparent !important;
            text-shadow: none !important;
            box-shadow: none !important;
        }

        /* Ensure links don't appear in print */
        a {
            text-decoration: none !important;
        }

        /* Prevent page breaks inside critical elements */
        .mirsaige-details-header,
        .mirsaige-requisition-info-container,
        .mirsaige-table-container,
        .mirsaige-remarks-section,
        .mirsaige-approval-section {
            page-break-inside: avoid;
        }
    }
</style>
@endsection

@section('page')
<div class="mirsaige-details-container">
    <!-- Breadcrumb Navigation -->
    <div class="mirsaige-breadcrumb-wrapper no-print">
        <div class="mirsaige-breadcrumbs">
            <div class="mirsaige-breadcrumb-item">
                <a href="{{ route('admin.dashboard') }}" class="mirsaige-breadcrumb-link">
                    <i class='bx bx-home'></i> Home
                </a>
                <span class="mirsaige-breadcrumb-divider">/</span>
            </div>
            <div class="mirsaige-breadcrumb-item">
                <a href="{{ route('requisitions.index') }}" class="mirsaige-breadcrumb-link">
                    Requisitions
                </a>
                <span class="mirsaige-breadcrumb-divider">/</span>
            </div>
            <div class="mirsaige-breadcrumb-item">
                <span class="mirsaige-breadcrumb-link active">
                    Requisition #{{ $requisition->id }}
                </span>
            </div>
        </div>

        <a href="{{ route('requisitions.index') }}" class="mirsaige-action-btn back">
            <i class="bx bx-arrow-back"></i>
            Back to List
        </a>
    </div>

    <!-- Header Section -->
    <div class="mirsaige-details-header">
        <h1 class="mirsaige-details-title">
            <i class='bx bxs-detail mirsaige-details-title-icon'></i>
            Product Requisition
        </h1>
    </div>

    <!-- Company Information -->
    <div class="mirsaige-company-section">
        <div>
            <img src="{{ asset('img/Logo_Transparent.webp') }}" alt="Company Logo" class="mirsaige-company-logo">
        </div>
        <div class="mirsaige-company-info">
            <div class="mirsaige-company-name">Mirsaige-PMC</div>
            <div class="mirsaige-company-address">
                House-30, Level-6, Gareeb-E-Nawaz Avenue<br>
                Uttara, Dhaka, Bangladesh<br>
                Mobile: 01707987202 | www.mirsaige-bd.com<br>
                Email: info@mirsaige-bd.com
            </div>
        </div>
    </div>

    <!-- Requisition Information - Modern Flex Layout -->
    <div class="mirsaige-requisition-info-container">
        <!-- Requester Card -->
        <div class="mirsaige-requisition-card">
            <div class="mirsaige-card-title">
                <i class='bx bx-user'></i> Requester Information
            </div>
            <div class="mirsaige-info-grid">
                <div class="mirsaige-info-label">Name:</div>
                <div class="mirsaige-info-value">
                    @if ($user)
                        {{ $user->name }}
                    @else
                        User Not Found
                    @endif
                </div>
                
                <div class="mirsaige-info-label">Address:</div>
                <div class="mirsaige-info-value">{{ $user ? $user->address : 'N/A' }}</div>
                
                <div class="mirsaige-info-label">Phone:</div>
                <div class="mirsaige-info-value">{{ $user ? $user->phone : 'N/A' }}</div>
            </div>
        </div>

        <!-- Requisition Meta Card -->
        <div class="mirsaige-requisition-card">
            <div class="mirsaige-card-title">
                <i class='bx bx-info-circle'></i> Requisition Details
            </div>
            <div class="mirsaige-info-grid">
                <div class="mirsaige-info-label">Requisition ID:</div>
                <div class="mirsaige-info-value">#{{ $requisition->id }}</div>
                
                <div class="mirsaige-info-label">Request Date:</div>
                <div class="mirsaige-info-value">{{ \Carbon\Carbon::parse($requisition->requisition_date)->format('d F Y') }}</div>
                
                <div class="mirsaige-info-label">Needed By:</div>
                <div class="mirsaige-info-value">{{ \Carbon\Carbon::parse($requisition->needed_date)->format('d F Y') }}</div>
                
                <div class="mirsaige-info-label">Status:</div>
                <div class="mirsaige-info-value">
                    <span class="mirsaige-status-badge status-{{ strtolower($requisition->status) }}">
                        {{ $requisition->status }}
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Requisition Items Table -->
    <div class="mirsaige-table-container">
        <table class="mirsaige-requisition-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Project</th>
                    <th>Task</th>
                    <th>Product</th>
                    <th>Requested Qty</th>
                    <th>Approved Qty</th>
                    <th>Unit</th>
                </tr>
            </thead>
            <tbody>
                @php $sn = 0; @endphp
                @foreach ($detailrequs as $detailrequ)
                    <tr>
                        <td>{{ ++$sn }}</td>
                        <td>{{ $detailrequ->pname }}</td>
                        <td>{{ $detailrequ->tname }}</td>
                        <td>{{ $detailrequ->mname }}</td>
                        <td>{{ $detailrequ->qty }}</td>
                        <td>{{ $detailrequ->approve_qty }}</td>
                        <td>{{ $detailrequ->uname }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Remarks Section -->
    @if($requisition->remark)
    <div class="mirsaige-remarks-section">
        <div class="mirsaige-remarks-title">
            <i class='bx bx-note'></i> Additional Remarks
        </div>
        <div class="mirsaige-remarks-content">
            {{ $requisition->remark }}
        </div>
    </div>
    @endif

    <!-- Approval Section -->
    <div class="mirsaige-approval-section">
        <div class="mirsaige-approval-box">
            <div class="mirsaige-approval-line"></div>
            <div class="mirsaige-approval-title">Prepared By</div>
        </div>
        <div class="mirsaige-approval-box">
            <div class="mirsaige-approval-line"></div>
            <div class="mirsaige-approval-title">Checked By</div>
        </div>
        <div class="mirsaige-approval-box">
            <div class="mirsaige-approval-line"></div>
            <div class="mirsaige-approval-title">Approved By</div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="mirsaige-actions-section no-print">
        <a href="javascript:window.print()" class="mirsaige-action-btn print">
            <i class='bx bx-printer'></i> Print Requisition
        </a>
        <a href="{{ route('requisitions.index') }}" class="mirsaige-action-btn back">
            <i class='bx bx-arrow-back'></i> Back to List
        </a>
    </div>
</div>
@endsection

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Print button functionality
        document.querySelector('.mirsaige-action-btn.print').addEventListener('click', function() {
            window.print();
        });
        
        // Add any additional interactive functionality here
        console.log('Requisition details page loaded');
        
        // Enhance table rows with hover effects
        const tableRows = document.querySelectorAll('.mirsaige-requisition-table tbody tr');
        tableRows.forEach(row => {
            row.addEventListener('mouseenter', function() {
                this.style.transition = 'all 0.2s ease';
            });
        });
    });
</script>
@endsection