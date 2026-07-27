@extends('layout.erp.app')
@section('title', 'Attendance Report')
@section('style')
<style>
    /* ===== Report Base Styles ===== */
    .mirsaige-report-container {
        padding: var(--mirsaige-space-md);
        color: var(--mirsaige-text);
        max-width: 100%;
        overflow-x: hidden;
        min-height: 100vh;
    }

    /* Header Section */
    .mirsaige-report-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: var(--mirsaige-space-sm);
        margin-bottom: var(--mirsaige-space-md);
    }

    /* Breadcrumbs */
    .mirsaige-report-breadcrumbs {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: var(--mirsaige-space-2xs);
        font-size: 0.85rem;
        padding: 10px 0;
        margin: 10px 0;
    }

    .mirsaige-report-breadcrumb {
        display: flex;
        align-items: center;
        gap: var(--mirsaige-space-2xs);
    }

    .mirsaige-report-breadcrumb a {
        color: var(--mirsaige-accent);
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: var(--mirsaige-space-3xs);
        padding: var(--mirsaige-space-3xs) var(--mirsaige-space-xs);
        border-radius: 4px;
        background: rgba(255, 178, 62, 0.1);
    }

    .mirsaige-report-breadcrumb a:hover {
        color: var(--mirsaige-gold);
        background: rgba(255, 178, 62, 0.2);
        transform: translateY(-1px);
    }

    .mirsaige-report-breadcrumb a.active {
        color: var(--mirsaige-text);
        pointer-events: none;
    }

    .mirsaige-report-breadcrumb.divider {
        color: var(--mirsaige-text);
        opacity: 0.7;
    }

    /* Report Title */
    .mirsaige-report-title {
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

    /* Report Summary Card */
    .mirsaige-report-summary {
        background: var(--mirsaige-dark-blue);
        border-radius: var(--mirsaige-radius-md);
        padding: var(--mirsaige-space-md);
        margin-bottom: var(--mirsaige-space-md);
        box-shadow: var(--mirsaige-shadow-sm);
        border: 1px solid rgba(255, 178, 62, 0.1);
    }

    .mirsaige-summary-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: var(--mirsaige-space-md);
    }

    .mirsaige-summary-item {
        text-align: center;
        padding: var(--mirsaige-space-sm);
        border-radius: var(--mirsaige-radius-sm);
        background: var(--mirsaige-darker-blue);
    }

    .mirsaige-summary-label {
        font-size: 0.85rem;
        color: var(--mirsaige-text);
        margin-bottom: var(--mirsaige-space-xs);
    }

    .mirsaige-summary-value {
        font-size: 1.5rem;
        font-weight: 600;
        color: var(--mirsaige-accent);
    }

    /* Status Badges */
    .mirsaige-report-status {
        display: inline-block;
        padding: var(--mirsaige-space-3xs) var(--mirsaige-space-sm);
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 500;
        text-transform: capitalize;
    }

    .status-present {
        background-color: rgba(40, 167, 69, 0.2);
        color: #28a745;
    }

    .status-absent {
        background-color: rgba(220, 53, 69, 0.2);
        color: #dc3545;
    }

    .status-late {
        background-color: rgba(255, 193, 7, 0.2);
        color: #ffc107;
    }

    .status-half_day {
        background-color: rgba(23, 162, 184, 0.2);
        color: #17a2b8;
    }

    .status-holiday {
        background-color: rgba(108, 117, 125, 0.2);
        color: #6c757d;
    }

    .status-leave {
        background-color: rgba(0, 123, 255, 0.2);
        color: #007bff;
    }

    /* Report Filter Form */
    .mirsaige-report-filter {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: var(--mirsaige-space-sm);
        margin-bottom: var(--mirsaige-space-md);
    }

    .mirsaige-report-filter .form-control {
        background: var(--mirsaige-darker-blue);
        border: 1px solid rgba(255, 178, 62, 0.2);
        color: var(--mirsaige-text);
        padding: var(--mirsaige-space-xs) var(--mirsaige-space-sm);
        border-radius: var(--mirsaige-radius-sm);
        width: 100%;
    }

    .mirsaige-report-filter .form-control:focus {
        border-color: var(--mirsaige-accent);
        box-shadow: 0 0 0 3px rgba(255, 178, 62, 0.2);
        outline: none;
    }

    /* Table Container */
    .mirsaige-report-table-wrapper {
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        position: relative;
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

    /* Export Buttons */
    .mirsaige-report-export {
        display: flex;
        gap: var(--mirsaige-space-sm);
        margin-top: var(--mirsaige-space-md);
        flex-wrap: wrap;
    }

    .mirsaige-export-btn {
        padding: var(--mirsaige-space-xs) var(--mirsaige-space-md);
        border-radius: var(--mirsaige-radius-sm);
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: var(--mirsaige-space-xs);
        white-space: nowrap;
        border: 1px solid rgba(255, 178, 62, 0.3);
        background: var(--mirsaige-dark-blue);
        color: var(--mirsaige-accent);
    }

    .mirsaige-export-btn:hover {
        background: rgba(255, 178, 62, 0.1);
        color: var(--mirsaige-accent);
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(221, 153, 51, 0.3);
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

    /* Print Styles */
    @media print {
        .mirsaige-report-table {
            width: 100%;
            border: 1px solid #ddd;
        }
        
        .mirsaige-report-table th {
            background: #f1f1f1 !important;
            color: #000 !important;
        }
        
        .mirsaige-report-table td {
            color: #000 !important;
        }
        
        .mirsaige-export-btn {
            display: none !important;
        }
    }

    /* ===== RESPONSIVE STYLES ===== */

    /* Medium Desktop Styles (992px - 1280px) */
    @media (min-width: 992px) and (max-width: 1280px) {
        .mirsaige-report-container {
            padding: var(--mirsaige-space-sm);
        }
        
        .mirsaige-summary-grid {
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: var(--mirsaige-space-sm);
        }
        
        .mirsaige-summary-value {
            font-size: 1.3rem;
        }
        
        .mirsaige-report-table th,
        .mirsaige-report-table td {
            padding: 0.6rem 0.8rem;
            font-size: 0.85rem;
        }
    }

    /* Tablet Styles (768px - 991px) */
    @media (min-width: 768px) and (max-width: 991px) {
        .mirsaige-report-container {
            padding: var(--mirsaige-space-sm);
        }
        
        .mirsaige-summary-grid {
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: var(--mirsaige-space-sm);
        }
        
        .mirsaige-summary-item {
            padding: var(--mirsaige-space-xs);
        }
        
        .mirsaige-summary-value {
            font-size: 1.2rem;
        }
        
        .mirsaige-report-filter {
            grid-template-columns: 1fr 1fr;
        }
        
        .mirsaige-report-title {
            font-size: 1rem;
        }
    }

    /* Mobile Table Styles (767px and below) */
    @media (max-width: 767px) {
        .mirsaige-report-container {
            padding: var(--mirsaige-space-sm);
        }
        
        .mirsaige-summary-grid {
            grid-template-columns: 1fr 1fr;
        }
        
        /* Stacked table layout for mobile */
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
        
        .mirsaige-report-filter {
            grid-template-columns: 1fr;
        }
        
        .mirsaige-report-export {
            justify-content: center;
        }
        
        .mirsaige-report-breadcrumb {
            display: none;
        }
    }

    /* Small Mobile Styles (575px and below) */
    @media (max-width: 575px) {
        .mirsaige-summary-grid {
            grid-template-columns: 1fr;
        }
        
        .mirsaige-report-table td {
            padding-left: 40%;
            font-size: 0.8rem;
        }
        
        .mirsaige-report-table td::before {
            width: 35%;
            font-size: 0.75rem;
        }
    }

    /* Extra Small Mobile Styles (430px and below) */
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
        
        .mirsaige-export-btn {
            padding: var(--mirsaige-space-xs) var(--mirsaige-space-sm);
            font-size: 0.9rem;
        }
    }
</style>
@endsection

@section('page')
<div class="mirsaige-report-container">
    <div class="mirsaige-report-header">
        <div>
            <h1 class="mirsaige-report-title">
                <i class="fa-solid fa-file-lines"></i> Attendance Report
            </h1>
            <div class="mirsaige-report-breadcrumbs">
                <div class="mirsaige-report-breadcrumb">
                    <a href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-house"></i> Home</a>
                </div>
                <div class="mirsaige-report-breadcrumb divider">
                    <i class="fa-solid fa-angle-right"></i>
                </div>
                <div class="mirsaige-report-breadcrumb">
                    <a href="{{ route('attendances.index') }}">Attendance</a>
                </div>
                <div class="mirsaige-report-breadcrumb divider">
                    <i class="fa-solid fa-angle-right"></i>
                </div>
                <div class="mirsaige-report-breadcrumb">
                    <a href="#" class="active">Report</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Report Summary -->
    <div class="mirsaige-report-summary">
        <div class="mirsaige-summary-grid">
            <div class="mirsaige-summary-item">
                <div class="mirsaige-summary-label">Month</div>
                <div class="mirsaige-summary-value">{{ date('F', mktime(0, 0, 0, $month, 1)) }} {{ $year }}</div>
            </div>
            <div class="mirsaige-summary-item">
                <div class="mirsaige-summary-label">Total Days</div>
                <div class="mirsaige-summary-value">{{ cal_days_in_month(CAL_GREGORIAN, $month, $year) }}</div>
            </div>
            <div class="mirsaige-summary-item">
                <div class="mirsaige-summary-label">Working Days</div>
                <div class="mirsaige-summary-value">{{ $working_days ?? 'N/A' }}</div>
            </div>
            @if($selected_employee)
            <div class="mirsaige-summary-item">
                <div class="mirsaige-summary-label">Employee</div>
                <div class="mirsaige-summary-value">{{ $attendances->first()->employee->name ?? 'N/A' }}</div>
            </div>
            @endif
        </div>
    </div>

    <!-- Report Filter Form -->
    <div class="mirsaige-report-summary">
        <form action="{{ route('attendance.report') }}" method="GET" class="mirsaige-report-filter">
            <div>
                <select name="month" class="form-control" required>
                    <option value="">Select Month</option>
                    @for($i = 1; $i <= 12; $i++)
                        <option value="{{ $i }}" {{ $i == $month ? 'selected' : '' }}>
                            {{ date('F', mktime(0, 0, 0, $i, 1)) }}
                        </option>
                    @endfor
                </select>
            </div>
            <div>
                <select name="year" class="form-control" required>
                    <option value="">Select Year</option>
                    @for($i = date('Y'); $i >= date('Y') - 5; $i--)
                        <option value="{{ $i }}" {{ $i == $year ? 'selected' : '' }}>{{ $i }}</option>
                    @endfor
                </select>
            </div>
            @if(in_array($user_role_id, [1, 2]))
            <div>
                <select name="employee_id" class="form-control">
                    <option value="">All Employees</option>
                    @foreach($employees as $employee)
                        <option value="{{ $employee->id }}" {{ $selected_employee == $employee->id ? 'selected' : '' }}>
                            {{ $employee->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            @endif
            <div>
                <button type="submit" class="mirsaige-export-btn w-100">
                    <i class="fa-solid fa-filter"></i> Filter Report
                </button>
            </div>
        </form>
    </div>

    <!-- Attendance Table -->
    <div class="mirsaige-report-summary">
        <div class="mirsaige-report-table-wrapper">
            <table class="mirsaige-report-table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Day</th>
                        <th>Status</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>Working Hours</th>
                        <th>Notes</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $total_present = 0;
                        $total_absent = 0;
                        $total_late = 0;
                        $total_half_day = 0;
                        $total_working_hours = 0;
                    @endphp

                    @for($day = 1; $day <= cal_days_in_month(CAL_GREGORIAN, $month, $year); $day++)
                        @php
                            $current_date = date('Y-m-d', strtotime("$year-$month-$day"));
                            $day_name = date('D', strtotime($current_date));
                            $attendance = $attendances->firstWhere('date', $current_date);
                            
                            $check_in = $attendance->check_in ?? null;
                            $check_out = $attendance->check_out ?? null;
                            $status = $attendance->status ?? 'Not Yet';
                            $notes = $attendance->notes ?? '';
                            
                            // Calculate working hours if both check-in and check-out exist
                            $working_hours = '--';
                            if ($check_in && $check_out) {
                                $start = \Carbon\Carbon::parse($check_in);
                                $end = \Carbon\Carbon::parse($check_out);
                                $diff = $start->diff($end);
                                $working_hours = $diff->format('%Hh %Im');
                                $total_working_hours += $diff->h + ($diff->i / 60);
                            }
                            
                            // Update counters
                            if ($status === 'present') $total_present++;
                            elseif ($status === 'absent') $total_absent++;
                            elseif ($status === 'late') $total_late++;
                            elseif ($status === 'half_day') $total_half_day++;
                        @endphp
                        
                        <tr>
                            <td data-label="Date">{{ date('d M Y', strtotime($current_date)) }}</td>
                            <td data-label="Day">{{ $day_name }}</td>
                            <td data-label="Status">
                                <span class="mirsaige-report-status status-{{ $status }}">
                                    {{ ucfirst(str_replace('_', ' ', $status)) }}
                                </span>
                            </td>
                            <td data-label="Check In">{{ $check_in ? date('h:i A', strtotime($check_in)) : '--' }}</td>
                            <td data-label="Check Out">{{ $check_out ? date('h:i A', strtotime($check_out)) : '--' }}</td>
                            <td data-label="Working Hours">{{ $working_hours }}</td>
                            <td data-label="Notes">{{ $notes }}</td>
                        </tr>
                    @endfor
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2"><strong>Totals</strong></td>
                        <td>
                            <span class="mirsaige-report-status status-present">{{ $total_present }} Present</span>
                            @if($total_late > 0)
                                <span class="mirsaige-report-status status-late">{{ $total_late }} Late</span>
                            @endif
                            @if($total_half_day > 0)
                                <span class="mirsaige-report-status status-half_day">{{ $total_half_day }} Half Day</span>
                            @endif
                            <span class="mirsaige-report-status status-absent">{{ $total_absent }} Absent</span>
                        </td>
                        <td colspan="2"></td>
                        <td><strong>{{ round($total_working_hours, 2) }} Hours</strong></td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <!-- Export Buttons -->
        
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        // Initialize any necessary scripts here
        // For example, you might want to add date pickers or other interactive elements
        
        // Example: Initialize a date picker if needed
        // $('.datepicker').datepicker({
        //     format: 'yyyy-mm-dd',
        //     autoclose: true
        // });
    });
</script>
@endsection