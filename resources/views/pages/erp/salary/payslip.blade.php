@extends('layout.erp.app')

@section('title', 'Payslip')

@section('style')
<style>
    /* Modern Payslip Styles with Mirsaige Color Scheme */
    .mirsaige-payslip-container {
        margin: 0 auto;
        padding: 2rem;

    }

    /* Breadcrumbs */
    .mirsaige-app-breadcrumbs {
        display: flex;
        align-items: center;
        gap: var(--mirsaige-space-2xs);
        flex-wrap: wrap;
        font-size: 0.85rem;
        padding: 10px 0;
        margin-bottom: 1.5rem;
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

    /* Payslip Card */
    .mirsaige-payslip-card {
        background: var(--mirsaige-dark-blue);
        border-radius: 12px;
        border: 1px solid rgba(255, 178, 62, 0.1);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        overflow: hidden;
        margin-bottom: 2rem;
    }

    .mirsaige-payslip-header {
        background: linear-gradient(135deg, var(--mirsaige-secondary), var(--mirsaige-darker-blue));
        padding: 1.5rem 2rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid rgba(255, 178, 62, 0.2);
    }

    .mirsaige-payslip-title {
        color: var(--mirsaige-white);
        font-size: 1.5rem;
        font-weight: 600;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .mirsaige-payslip-actions {
        display: flex;
        gap: 0.75rem;
    }

    .mirsaige-payslip-btn {
        padding: 0.5rem 1rem;
        border-radius: 6px;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
        text-decoration: none;
        font-size: 0.9rem;
        border: 1px solid rgba(255, 178, 62, 0.3);
        background: rgba(255, 178, 62, 0.1);
        color: var(--mirsaige-accent);
        cursor: pointer;
    }

    .mirsaige-payslip-btn:hover {
        background: rgba(255, 178, 62, 0.2);
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(221, 153, 51, 0.3);
    }

    .mirsaige-payslip-btn.primary {
        background: var(--mirsaige-accent);
        color: var(--mirsaige-dark);
        border-color: var(--mirsaige-accent);
    }

    .mirsaige-payslip-btn.primary:hover {
        background: #FFA01A;
        box-shadow: 0 4px 12px rgba(255, 178, 62, 0.3);
    }

    /* Payslip Content */
    .mirsaige-payslip-content {
        padding: 2rem;
    }

    /* Company Header */
    .mirsaige-payslip-company {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 2rem;
        padding-bottom: 1.5rem;
        border-bottom: 1px solid rgba(255, 178, 62, 0.1);
    }

    .mirsaige-payslip-company-info {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .mirsaige-payslip-logo {
        width: 80px;
        height: 80px;
        object-fit: contain;
        border-radius: 8px;
        border: 2px solid rgba(255, 178, 62, 0.3);
        padding: 5px;
        background: var(--mirsaige-white);
    }

    .mirsaige-payslip-company-details h3 {
        color: var(--mirsaige-white);
        margin: 0 0 0.25rem 0;
        font-size: 1.5rem;
    }

    .mirsaige-payslip-company-details p {
        color: var(--mirsaige-text);
        margin: 0;
        font-size: 0.9rem;
    }

    .mirsaige-payslip-document-info {
        text-align: right;
    }

    .mirsaige-payslip-document-title {
        color: var(--mirsaige-accent);
        font-size: 2rem;
        font-weight: 700;
        margin: 0 0 0.5rem 0;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .mirsaige-payslip-document-details {
        color: var(--mirsaige-text);
        font-size: 0.9rem;
    }

    .mirsaige-payslip-document-details strong {
        color: var(--mirsaige-white);
    }

    /* Employee and Payment Info */
    .mirsaige-payslip-info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        margin-bottom: 2rem;
    }

    .mirsaige-payslip-info-card {
        background: rgba(17, 19, 31, 0.5);
        border-radius: 8px;
        padding: 1.5rem;
        border: 1px solid rgba(255, 178, 62, 0.1);
    }

    .mirsaige-payslip-info-title {
        color: var(--mirsaige-accent);
        font-size: 1rem;
        font-weight: 600;
        margin: 0 0 1rem 0;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding-bottom: 0.5rem;
        border-bottom: 1px solid rgba(255, 178, 62, 0.2);
    }

    .mirsaige-payslip-info-details p {
        margin: 0.5rem 0;
        display: flex;
        justify-content: space-between;
    }

    .mirsaige-payslip-info-label {
        color: var(--mirsaige-text);
        font-size: 0.9rem;
    }

    .mirsaige-payslip-info-value {
        color: var(--mirsaige-white);
        font-weight: 500;
    }

    .mirsaige-payslip-status-badge {
        display: inline-block;
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 500;
    }

    .mirsaige-payslip-status-badge.paid {
        background: rgba(40, 167, 69, 0.2);
        color: #28a745;
    }

    .mirsaige-payslip-status-badge.pending {
        background: rgba(255, 193, 7, 0.2);
        color: #ffc107;
    }

    /* Salary Breakdown */
    .mirsaige-payslip-breakdown {
        margin-bottom: 2rem;
    }

    .mirsaige-payslip-breakdown-title {
        color: var(--mirsaige-accent);
        font-size: 1.1rem;
        font-weight: 600;
        margin: 0 0 1rem 0;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .mirsaige-payslip-table {
        width: 100%;
        border-collapse: collapse;
        color: var(--mirsaige-text);
        font-size: 0.9rem;
    }

    .mirsaige-payslip-table th,
    .mirsaige-payslip-table td {
        padding: 0.75rem;
        text-align: left;
        border-bottom: 1px solid rgba(255, 178, 62, 0.1);
    }

    .mirsaige-payslip-table th {
        background: rgba(17, 19, 31, 0.7);
        color: var(--mirsaige-accent);
        font-weight: 600;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .mirsaige-payslip-table tr:hover td {
        background: rgba(255, 178, 62, 0.05);
    }

    .mirsaige-payslip-table .text-right {
        text-align: right;
    }

    .mirsaige-payslip-table .total-row {
        background: rgba(255, 178, 62, 0.1);
        font-weight: 600;
    }

    .mirsaige-payslip-table .total-row td {
        color: var(--mirsaige-white);
        border-bottom: none;
    }

    /* Net Salary */
    .mirsaige-payslip-net {
        background: linear-gradient(135deg, var(--mirsaige-secondary), var(--mirsaige-darker-blue));
        border-radius: 10px;
        padding: 1.5rem;
        text-align: center;
        margin-bottom: 2rem;
        border: 1px solid rgba(255, 178, 62, 0.3);
    }

    .mirsaige-payslip-net-label {
        color: var(--mirsaige-text);
        font-size: 1rem;
        margin: 0 0 0.5rem 0;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .mirsaige-payslip-net-amount {
        color: var(--mirsaige-accent);
        font-size: 2.5rem;
        font-weight: 700;
        margin: 0 0 0.5rem 0;
    }

    .mirsaige-payslip-net-words {
        color: var(--mirsaige-text);
        font-size: 0.9rem;
        font-style: italic;
        margin: 0;
    }

    /* Notes */
    .mirsaige-payslip-notes {
        background: rgba(255, 193, 7, 0.1);
        border-radius: 8px;
        padding: 1.5rem;
        margin-bottom: 2rem;
        border-left: 4px solid var(--mirsaige-accent);
    }

    .mirsaige-payslip-notes-title {
        color: var(--mirsaige-accent);
        font-size: 1rem;
        font-weight: 600;
        margin: 0 0 0.5rem 0;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .mirsaige-payslip-notes-content {
        color: var(--mirsaige-text);
        margin: 0;
        font-size: 0.9rem;
    }

    /* Signatures */
    .mirsaige-payslip-signatures {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 2rem;
        margin-bottom: 2rem;
        padding-top: 1.5rem;
        border-top: 1px solid rgba(255, 178, 62, 0.1);
    }

    .mirsaige-payslip-signature {
        text-align: center;
    }

    .mirsaige-payslip-signature-line {
        height: 1px;
        background: var(--mirsaige-text);
        margin: 2rem 0 0.5rem;
        position: relative;
    }

    .mirsaige-payslip-signature-line:after {
        content: '';
        position: absolute;
        top: -10px;
        left: 0;
        right: 0;
        height: 20px;
        background: transparent;
    }

    .mirsaige-payslip-signature-label {
        color: var(--mirsaige-text);
        font-size: 0.9rem;
        margin: 0;
    }

    /* Footer */
    .mirsaige-payslip-footer {
        text-align: center;
        color: var(--mirsaige-text);
        font-size: 0.8rem;
        font-style: italic;
        padding-top: 1rem;
        border-top: 1px solid rgba(255, 178, 62, 0.1);
    }

    /* Action Buttons */
    .mirsaige-payslip-actions-footer {
        display: flex;
        justify-content: center;
        gap: 1rem;
        margin-top: 2rem;
        flex-wrap: wrap;
    }

    .mirsaige-payslip-action-btn {
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

    .mirsaige-payslip-action-btn.secondary {
        background: transparent;
        color: var(--mirsaige-accent);
        border: 1px solid var(--mirsaige-accent);
    }

    .mirsaige-payslip-action-btn.secondary:hover {
        background: rgba(255, 178, 62, 0.1);
    }

    .mirsaige-payslip-action-btn.info {
        background: rgba(23, 162, 184, 0.2);
        color: #17a2b8;
        border: 1px solid rgba(23, 162, 184, 0.3);
    }

    .mirsaige-payslip-action-btn.info:hover {
        background: rgba(23, 162, 184, 0.3);
    }

    /* Print Styles */
    @media print {
        body * {
            visibility: hidden;
            background: white !important;
            color: black !important;
        }
        
        .mirsaige-payslip-card,
        .mirsaige-payslip-card * {
            visibility: visible;
            box-shadow: none !important;
        }
        
        .mirsaige-payslip-card {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            margin: 0;
            padding: 0;
        }
        
        .mirsaige-payslip-header,
        .mirsaige-app-breadcrumbs,
        .mirsaige-payslip-actions-footer {
            display: none !important;
        }
        
        .mirsaige-payslip-content {
            padding: 1rem;
        }
        
        .mirsaige-payslip-net-amount {
            color: #000 !important;
        }
        
        /* Ensure good print contrast */
        .mirsaige-payslip-card {
            background: white !important;
            color: black !important;
        }
        
        .mirsaige-payslip-table th {
            background: #f5f5f5 !important;
            color: #000 !important;
        }
        
        .mirsaige-payslip-info-card {
            background: #f9f9f9 !important;
            border: 1px solid #ddd !important;
        }
        
        .mirsaige-payslip-net {
            background: #f5f5f5 !important;
            border: 1px solid #ddd !important;
        }
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .mirsaige-payslip-container {
            padding: 1rem;
        }
        
        .mirsaige-payslip-header {
            flex-direction: column;
            gap: 1rem;
            align-items: flex-start;
        }
        
        .mirsaige-payslip-actions {
            width: 100%;
            justify-content: flex-end;
        }
        
        .mirsaige-payslip-company {
            flex-direction: column;
            gap: 1.5rem;
        }
        
        .mirsaige-payslip-document-info {
            text-align: left;
        }
        
        .mirsaige-payslip-info-grid {
            grid-template-columns: 1fr;
        }
        
        .mirsaige-payslip-table {
            font-size: 0.8rem;
        }
        
        .mirsaige-payslip-table th,
        .mirsaige-payslip-table td {
            padding: 0.5rem;
        }
        
        .mirsaige-payslip-net-amount {
            font-size: 2rem;
        }
        
        .mirsaige-payslip-signatures {
            grid-template-columns: 1fr;
        }
        
        .mirsaige-payslip-actions-footer {
            flex-direction: column;
        }
        
        .mirsaige-payslip-action-btn {
            width: 100%;
            justify-content: center;
        }
    }

    @media (max-width: 576px) {
        .mirsaige-payslip-content {
            padding: 1rem;
        }
        
        .mirsaige-payslip-company-info {
            flex-direction: column;
            text-align: center;
        }
        
        .mirsaige-payslip-document-title {
            font-size: 1.5rem;
        }
        
        .mirsaige-payslip-table {
            display: block;
            overflow-x: auto;
        }
        
        .mirsaige-payslip-net-amount {
            font-size: 1.75rem;
        }
    }

    @media (max-width: 430px) {
        .mirsaige-payslip-actions {
            flex-direction: column;
            width: 100%;
        }
        
        .mirsaige-payslip-btn {
            width: 100%;
            justify-content: center;
        }
        
        .mirsaige-payslip-info-details p {
            flex-direction: column;
            gap: 0.25rem;
        }
    }
</style>
@endsection

@section('page')
<div class="mirsaige-payslip-container">
    <!-- Breadcrumbs -->
    <div class="mirsaige-app-breadcrumbs">
        <div class="mirsaige-app-breadcrumb">
            <a href="{{ route('admin.dashboard') }}"><i class='bx bx-home'></i> Dashboard</a>
        </div>
        <div class="mirsaige-app-breadcrumb divider">
            <i class='bx bx-chevron-right'></i>
        </div>
        <div class="mirsaige-app-breadcrumb">
            <a href="{{ route('salaries.index') }}">Salaries</a>
        </div>
        <div class="mirsaige-app-breadcrumb divider">
            <i class='bx bx-chevron-right'></i>
        </div>
        <div class="mirsaige-app-breadcrumb">
            <a href="#" class="active">Payslip</a>
        </div>
    </div>

    <!-- Payslip Card -->
    <div class="mirsaige-payslip-card">
        <div class="mirsaige-payslip-header">
            <h2 class="mirsaige-payslip-title">
                <i class='bx bx-receipt'></i>
                Salary Payslip
            </h2>
            <div class="mirsaige-payslip-actions">
                <button onclick="downloadPayslip()" class="mirsaige-payslip-btn">
                    <i class='bx bx-download'></i> Download PDF
                </button>
                <button onclick="window.print()" class="mirsaige-payslip-btn primary">
                    <i class='bx bx-printer'></i> Print
                </button>
            </div>
        </div>

        <div class="mirsaige-payslip-content" id="payslipContent">
            <!-- Company Header -->
            <div class="mirsaige-payslip-company">
                <div class="mirsaige-payslip-company-info">
                    <img src="{{ asset('img/Logo_Transparent.webp') }}" alt="Mirsaige Construction" class="mirsaige-payslip-logo">
                    <div class="mirsaige-payslip-company-details">
                        <h3>Mirsaige Construction</h3>
                        <p>Management System</p>
                        <p>Plot# 30, Level# 6, Gareeb-E-Nawaz Avenue, Sector-13, Uttara, Dhaka.</p>
                        <p>Phone: +88 017 8282 9191 | Email: contact@mirsage-bd.com</p>
                    </div>
                </div>
                <div class="mirsaige-payslip-document-info">
                    <h2 class="mirsaige-payslip-document-title">PAYSLIP</h2>
                    <p class="mirsaige-payslip-document-details">
                        <strong>Payment Date:</strong> {{ \Carbon\Carbon::parse($salary->payment_date)->format('d M, Y') }}<br>
                        <strong>Payment ID:</strong> #{{ str_pad($salary->id, 6, '0', STR_PAD_LEFT) }}<br>
                        <strong>Period:</strong> {{ \Carbon\Carbon::create()->month($salary->month)->format('F') }}, {{ $salary->year }}
                    </p>
                </div>
            </div>

            <!-- Employee and Payment Information -->
            <div class="mirsaige-payslip-info-grid">
                <div class="mirsaige-payslip-info-card">
                    <h4 class="mirsaige-payslip-info-title">
                        <i class='bx bx-user'></i>
                        EMPLOYEE INFORMATION
                    </h4>
                    <div class="mirsaige-payslip-info-details">
                        <p><span class="mirsaige-payslip-info-label">Name:</span> <span class="mirsaige-payslip-info-value">{{ $salary->employee->name }}</span></p>
                        <p><span class="mirsaige-payslip-info-label">Employee ID:</span> <span class="mirsaige-payslip-info-value">{{ $salary->employee->username }}</span></p>
                        <p><span class="mirsaige-payslip-info-label">Department:</span> <span class="mirsaige-payslip-info-value">{{ $salary->employee->department->name ?? 'N/A' }}</span></p>
                        <p><span class="mirsaige-payslip-info-label">Designation:</span> <span class="mirsaige-payslip-info-value">{{ $salary->employee->designation->name ?? 'N/A' }}</span></p>
                        <p><span class="mirsaige-payslip-info-label">Joining Date:</span> <span class="mirsaige-payslip-info-value">{{ $salary->employee->joining_date ? \Carbon\Carbon::parse($salary->employee->joining_date)->format('d M, Y') : 'N/A' }}</span></p>
                    </div>
                </div>

                <div class="mirsaige-payslip-info-card">
                    <h4 class="mirsaige-payslip-info-title">
                        <i class='bx bx-credit-card'></i>
                        PAYMENT DETAILS
                    </h4>
                    <div class="mirsaige-payslip-info-details">
                        <p><span class="mirsaige-payslip-info-label">Payment Method:</span> <span class="mirsaige-payslip-info-value">{{ ucfirst(str_replace('_', ' ', $salary->payment_method)) }}</span></p>
                        @if($salary->transaction_reference)
                        <p><span class="mirsaige-payslip-info-label">Transaction Ref:</span> <span class="mirsaige-payslip-info-value">{{ $salary->transaction_reference }}</span></p>
                        @endif
                        <p><span class="mirsaige-payslip-info-label">Status:</span> <span class="mirsaige-payslip-info-value"><span class="mirsaige-payslip-status-badge {{ $salary->status }}">{{ ucfirst($salary->status) }}</span></span></p>
                        <p><span class="mirsaige-payslip-info-label">Processed By:</span> <span class="mirsaige-payslip-info-value">{{ $salary->creator->name ?? 'System' }}</span></p>
                    </div>
                </div>
            </div>

            <!-- Salary Breakdown -->
            <div class="mirsaige-payslip-breakdown">
                <h4 class="mirsaige-payslip-breakdown-title">
                    <i class='bx bx-pie-chart-alt'></i>
                    SALARY BREAKDOWN
                </h4>
                <div class="table-responsive">
                    <table class="mirsaige-payslip-table">
                        <thead>
                            <tr>
                                <th>EARNINGS</th>
                                <th class="text-right">Amount (BDT)</th>
                                <th>DEDUCTIONS</th>
                                <th class="text-right">Amount (BDT)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Basic Salary</td>
                                <td class="text-right">{{ number_format($salary->salaryStructure->basic_salary, 2) }}</td>
                                <td>Total Deductions</td>
                                <td class="text-right">{{ number_format($salary->deductions, 2) }}</td>
                            </tr>
                            <tr>
                                <td>House Rent</td>
                                <td class="text-right">{{ number_format($salary->salaryStructure->house_rent, 2) }}</td>
                                <td></td>
                                <td class="text-right"></td>
                            </tr>
                            <tr>
                                <td>Medical Allowance</td>
                                <td class="text-right">{{ number_format($salary->salaryStructure->medical_allowance, 2) }}</td>
                                <td></td>
                                <td class="text-right"></td>
                            </tr>
                            <tr>
                                <td>Transport Allowance</td>
                                <td class="text-right">{{ number_format($salary->salaryStructure->transport_allowance, 2) }}</td>
                                <td></td>
                                <td class="text-right"></td>
                            </tr>
                            <tr>
                                <td>Other Allowance</td>
                                <td class="text-right">{{ number_format($salary->salaryStructure->other_allowance, 2) }}</td>
                                <td></td>
                                <td class="text-right"></td>
                            </tr>
                            <tr>
                                <td><strong>Bonus</strong></td>
                                <td class="text-right"><strong>{{ number_format($salary->bonus, 2) }}</strong></td>
                                <td></td>
                                <td class="text-right"></td>
                            </tr>
                            <tr class="total-row">
                                <td><strong>Total Earnings</strong></td>
                                <td class="text-right"><strong>{{ number_format($salary->gross_salary + $salary->bonus, 2) }}</strong></td>
                                <td><strong>Total Deductions</strong></td>
                                <td class="text-right"><strong>{{ number_format($salary->deductions, 2) }}</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Net Salary -->
            <div class="mirsaige-payslip-net">
                <h5 class="mirsaige-payslip-net-label">NET SALARY</h5>
                <div class="mirsaige-payslip-net-amount">BDT {{ number_format($salary->net_salary, 2) }}</div>
                <p class="mirsaige-payslip-net-words">In Words: {{ $salaryInWords }}</p>
            </div>

            <!-- Notes -->
            @if($salary->notes)
            <div class="mirsaige-payslip-notes">
                <h5 class="mirsaige-payslip-notes-title">
                    <i class='bx bx-note'></i>
                    Notes
                </h5>
                <p class="mirsaige-payslip-notes-content">{{ $salary->notes }}</p>
            </div>
            @endif

            <!-- Signatures -->
            <div class="mirsaige-payslip-signatures">
                <div class="mirsaige-payslip-signature">
                    <div class="mirsaige-payslip-signature-line"></div>
                    <p class="mirsaige-payslip-signature-label">Employee Signature</p>
                </div>
                <div class="mirsaige-payslip-signature">
                    <div class="mirsaige-payslip-signature-line"></div>
                    <p class="mirsaige-payslip-signature-label">Authorized Signature</p>
                </div>
            </div>

            <!-- Footer -->
            <div class="mirsaige-payslip-footer">
                <p><em>This is a computer-generated payslip and does not require a signature. Please keep this document confidential.</em></p>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="mirsaige-payslip-actions-footer">
        <a href="{{ route('salaries.index') }}" class="mirsaige-payslip-action-btn secondary">
            <i class='bx bx-arrow-back'></i> Back to Salaries
        </a>
        @if(in_array($user_role_id, [1, 2]))
        <a href="{{ route('salaries.show', $salary->id) }}" class="mirsaige-payslip-action-btn info">
            <i class='bx bx-show'></i> View Details
        </a>
        @endif
        <button onclick="window.print()" class="mirsaige-payslip-action-btn primary">
            <i class='bx bx-printer'></i> Print Payslip
        </button>
    </div>
</div>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
<script>
function downloadPayslip() {
    const element = document.getElementById('payslipContent');
    const options = {
        margin: 10,
        filename: 'payslip-{{ $salary->employee->username }}-{{ $salary->month }}-{{ $salary->year }}.pdf',
        image: { type: 'jpeg', quality: 0.98 },
        html2canvas: { scale: 2, useCORS: true, logging: true },
        jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
    };

    // Optionally, show a loading spinner elsewhere (not by replacing the content)
    // Example: document.getElementById('loadingSpinner').style.display = 'block';

    html2pdf().set(options).from(element).save().then(() => {
        // Optionally, hide the loading spinner here
        // Example: document.getElementById('loadingSpinner').style.display = 'none';
    });
}

// Auto-print if requested
@if(request()->has('print'))
window.onload = function() {
    setTimeout(() => {
        window.print();
    }, 500);
}
@endif

// Add print-specific class to body when printing
window.addEventListener('beforeprint', function() {
    document.body.classList.add('printing');
});

window.addEventListener('afterprint', function() {
    document.body.classList.remove('printing');
});
</script>
@endsection