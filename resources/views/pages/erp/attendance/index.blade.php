@extends('layout.erp.app')
@section('title', 'Attendance Management')
@section('style')
<style>
    /* ===== Attendance Base Styles ===== */
    .mirsaige-attendance-container {
        padding: var(--mirsaige-space-md);
        color: var(--mirsaige-text);
        max-width: 100%;
        overflow-x: hidden;
        min-height: 100vh;
    }

    /* Header Section */
    .mirsaige-attendance-header {
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
        height: 50px;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: var(--mirsaige-space-xs);
    }
    
    .mirsaige-app-breadcrumbs-title:hover,
    .mirsaige-app-breadcrumbs-btn:hover {
        background: rgba(255, 178, 62, 0.1);
        color: var(--mirsaige-accent);
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(221, 153, 51, 0.3);
    }

    /* Attendance Card */
    .mirsaige-attendance-card {
        background: var(--mirsaige-dark-blue);
        border-radius: var(--mirsaige-radius-md);
        padding: var(--mirsaige-space-md);
        margin-bottom: var(--mirsaige-space-md);
        box-shadow: var(--mirsaige-shadow-sm);
        border: 1px solid rgba(255, 178, 62, 0.1);
    }

    /* Status Badges */
    .mirsaige-attendance-status {
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

    /* Mark Attendance Button */
    .mirsaige-attendance-mark-btn {
        background: var(--mirsaige-accent);
        color: var(--mirsaige-dark);
        border: none;
        padding: var(--mirsaige-space-sm) var(--mirsaige-space-md);
        border-radius: var(--mirsaige-radius-sm);
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: var(--mirsaige-space-xs);
        white-space: nowrap;
    }

    .mirsaige-attendance-mark-btn:hover {
        background: var(--mirsaige-gold);
        transform: translateY(-2px);
        box-shadow: var(--mirsaige-shadow-md);
    }

    /* Report Form */
    .mirsaige-report-form {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: var(--mirsaige-space-sm);
        margin-bottom: var(--mirsaige-space-md);
    }

    .mirsaige-report-form .form-control {
        background: var(--mirsaige-darker-blue);
        border: 1px solid rgba(255, 178, 62, 0.2);
        color: var(--mirsaige-text);
        padding: var(--mirsaige-space-xs) var(--mirsaige-space-sm);
        border-radius: var(--mirsaige-radius-sm);
        width: 100%;
    }

    .mirsaige-report-form .form-control:focus {
        border-color: var(--mirsaige-accent);
        box-shadow: 0 0 0 3px rgba(255, 178, 62, 0.2);
        outline: none;
    }

    /* Table Container */
    .mirsaige-attendance-table-wrapper {
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        position: relative;
    }

    /* Table Styles */
    .mirsaige-attendance-table {
        width: 100%;
        border-collapse: collapse;
    }

    .mirsaige-attendance-table thead {
        background: var(--mirsaige-darker-blue);
    }

    .mirsaige-attendance-table th {
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

    .mirsaige-attendance-table td {
        padding: var(--mirsaige-space-sm);
        color: var(--mirsaige-text);
        border-bottom: 1px solid rgba(255, 178, 62, 0.05);
        font-size: 0.9rem;
        vertical-align: middle;
    }

    .mirsaige-attendance-table tr:last-child td {
        border-bottom: none;
    }

    .mirsaige-attendance-table tr:hover td {
        background: rgba(255, 178, 62, 0.05);
        color: var(--mirsaige-white);
    }

    /* Action Buttons */
    .mirsaige-attendance-actions {
        display: flex;
        gap: var(--mirsaige-space-2xs);
        flex-wrap: nowrap;
    }

    .mirsaige-attendance-action-btn {
        padding: var(--mirsaige-space-3xs) var(--mirsaige-space-2xs);
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

    .mirsaige-attendance-action-btn.edit {
        background: var(--mirsaige-secondary);
        color: var(--mirsaige-accent);
    }

    .mirsaige-attendance-action-btn.delete {
        background: #dc3545;
        color: var(--mirsaige-white);
    }

    .mirsaige-attendance-action-btn:hover {
        opacity: 0.9;
        transform: translateY(-1px);
    }

    /* Action text visibility */
    .mirsaige-attendance-action-btn .action-text {
        display: inline;
    }

    /* Scrollbar Styling */
    .mirsaige-attendance-table-wrapper::-webkit-scrollbar {
        height: 8px;
    }

    .mirsaige-attendance-table-wrapper::-webkit-scrollbar-track {
        background: var(--mirsaige-dark-blue);
        border-radius: 4px;
    }

    .mirsaige-attendance-table-wrapper::-webkit-scrollbar-thumb {
        background: var(--mirsaige-accent);
        border-radius: 4px;
    }

    .mirsaige-attendance-table-wrapper::-webkit-scrollbar-thumb:hover {
        background: var(--mirsaige-gold);
    }

    /* Toast Notification */
    #liveToast {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 9999;
        background: var(--mirsaige-dark-blue);
        border: 1px solid var(--mirsaige-accent);
        color: var(--mirsaige-text);
    }

    /* ===== RESPONSIVE STYLES ===== */

    /* Medium Desktop Styles (992px - 1280px) */
    @media (min-width: 992px) and (max-width: 1280px) {
        .mirsaige-attendance-container {
            padding: var(--mirsaige-space-sm);
        }
        
        .mirsaige-app-breadcrumbs-btn {
            font-size: 1rem;
        }

        .mirsaige-app-breadcrumbs-title {
            font-size: 1rem;
        }
        
        .mirsaige-attendance-table th,
        .mirsaige-attendance-table td {
            padding: 0.6rem 0.8rem;
            font-size: 0.85rem;
        }
        
        .mirsaige-attendance-actions {
            gap: 0.4rem;
        }
        
        .mirsaige-attendance-action-btn {
            padding: 0.25rem 0.5rem;
            min-width: 32px;
            height: 32px;
        }
        
        .mirsaige-attendance-action-btn .action-text {
            display: inline;
            font-size: 0.75rem;
        }
    }

    /* Tablet Styles (768px - 991px) */
    @media (min-width: 768px) and (max-width: 991px) {
        .mirsaige-attendance-container {
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
        
        .mirsaige-attendance-table th,
        .mirsaige-attendance-table td {
            padding: var(--mirsaige-space-2xs);
            font-size: 0.82rem;
        }
        
        .mirsaige-attendance-action-btn {
            padding: var(--mirsaige-space-4xs) var(--mirsaige-space-4xs);
            min-width: 28px;
        }
        
        .mirsaige-attendance-action-btn .action-text {
            display: none;
        }
        
        .mirsaige-attendance-actions {
            gap: var(--mirsaige-space-3xs);
        }
    }

    /* Mobile Table Styles (767px and below) */
    @media (max-width: 767px) {
        .mirsaige-attendance-container {
            padding: var(--mirsaige-space-sm);
        }
        
        .mirsaige-app-breadcrumbs-btn {
            font-size: 0.9rem;
        }
        
        .mirsaige-app-breadcrumbs-title {
            font-size: 0.9rem;
        }
        
        /* Stacked table layout for mobile */
        .mirsaige-attendance-table {
            display: block;
            width: 100%;
        }
        
        .mirsaige-attendance-table thead {
            display: none;
        }
        
        .mirsaige-attendance-table tbody {
            display: block;
            width: 100%;
        }
        
        .mirsaige-attendance-table tr {
            display: block;
            margin-bottom: var(--mirsaige-space-md);
            border: 1px solid rgba(255, 178, 62, 0.2);
            border-radius: 6px;
            overflow: hidden;
        }
        
        .mirsaige-attendance-table td {
            display: block;
            width: 100%;
            padding: var(--mirsaige-space-xs) var(--mirsaige-space-sm);
            padding-left: 45%;
            position: relative;
            text-align: right;
            white-space: normal;
            border-bottom: 1px solid rgba(255, 178, 62, 0.1);
        }
        
        .mirsaige-attendance-table td:last-child {
            border-bottom: none;
        }
        
        .mirsaige-attendance-table td::before {
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
        .mirsaige-attendance-actions {
            justify-content: flex-end;
        }
        
        .mirsaige-attendance-action-btn {
            padding: var(--mirsaige-space-4xs) var(--mirsaige-space-2xs);
            min-width: 26px;
        }
        
        .mirsaige-attendance-action-btn .action-text {
            display: none;
        }
        
        .mirsaige-app-breadcrumb {
            display: none;
        }
        
        /* Report form adjustments */
        .mirsaige-report-form {
            grid-template-columns: 1fr;
        }
    }

    /* Small Mobile Styles (575px and below) */
    @media (max-width: 575px) {
        .mirsaige-attendance-table td {
            padding-left: 40%;
            font-size: 0.8rem;
        }
        
        .mirsaige-attendance-table td::before {
            width: 35%;
            font-size: 0.75rem;
        }
        
        .mirsaige-app-breadcrumb {
            display: none;
        }
    }

    /* Extra Small Mobile Styles (430px and below) */
    @media (max-width: 430px) {
        .mirsaige-attendance-table td {
            padding-left: 35%;
            padding-top: var(--mirsaige-space-2xs);
            padding-bottom: var(--mirsaige-space-2xs);
        }
        
        .mirsaige-attendance-table td::before {
            width: 30%;
            left: var(--mirsaige-space-xs);
        }
        
        .mirsaige-attendance-action-btn {
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
        
        .mirsaige-attendance-mark-btn {
            padding: var(--mirsaige-space-xs) var(--mirsaige-space-sm);
            font-size: 0.9rem;
        }
    }

    /* Print Styles */
    @media print {
        .mirsaige-attendance-table {
            width: 100%;
            border: 1px solid #ddd;
        }
        
        .mirsaige-attendance-table th {
            background: #f1f1f1 !important;
            color: #000 !important;
        }
        
        .mirsaige-attendance-table td {
            color: #000 !important;
        }
        
        .mirsaige-attendance-action-btn {
            display: none !important;
        }

        .mirsaige-pagination {
            display: none !important;
        }
        
        .mirsaige-attendance-mark-btn,
        .mirsaige-app-breadcrumbs-btn {
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
<div class="mirsaige-attendance-container">
    <div class="mirsaige-attendance-header">
        <div>
            <h1 class="mirsaige-app-breadcrumbs-title">Attendance List</h1>
            <div class="mirsaige-app-breadcrumbs">
                <div class="mirsaige-app-breadcrumb">
                    <a href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-house"></i> Home</a>
                </div>
                <div class="mirsaige-app-breadcrumb divider">
                    <i class="fa-solid fa-angle-right"></i>
                </div>
                <div class="mirsaige-app-breadcrumb">
                    <a href="{{ route('attendances.index') }}" class="active">Attendance</a>
                </div>
            </div>
        </div>
        
        @if(in_array($user_role_id, [1, 2, 6]))
            <a href="{{ route('attendances.create') }}" class="mirsaige-app-breadcrumbs-btn">
                <i class="fa-solid fa-plus"></i> <span class="action-text">Add Attendance</span>
            </a>
        @else
            <button id="markAttendanceBtn" class="mirsaige-attendance-mark-btn">
                <i class="fa-solid fa-fingerprint"></i> <span id="attendanceBtnText">Mark Attendance</span>
            </button>
        @endif
    </div>

    @if(in_array($user_role_id, [1, 2,6]))
    <div class="mirsaige-attendance-card">
        <form action="{{ route('attendance.report') }}" method="GET" class="mirsaige-report-form">
            <div>
                <select name="month" class="form-control" required>
                    <option value="">Select Month</option>
                    @for($i = 1; $i <= 12; $i++)
                        <option value="{{ $i }}" {{ $i == date('n') ? 'selected' : '' }}>
                            {{ date('F', mktime(0, 0, 0, $i, 1)) }}
                        </option>
                    @endfor
                </select>
            </div>
            <div>
                <select name="year" class="form-control" required>
                    <option value="">Select Year</option>
                    @for($i = date('Y'); $i >= date('Y') - 5; $i--)
                        <option value="{{ $i }}" {{ $i == date('Y') ? 'selected' : '' }}>{{ $i }}</option>
                    @endfor
                </select>
            </div>
            <div>
                <select name="employee_id" class="form-control">
                    <option value="">All Employees</option>
                    @isset($employees)
                        @foreach($employees as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    @endisset
                </select>
            </div>
            <div>
                <button type="submit" class="mirsaige-attendance-mark-btn w-100">
                    <i class="fa-solid fa-file-lines"></i> <span class="action-text">Generate Report</span>
                </button>
            </div>
        </form>
    </div>
    @endif

    <div class="mirsaige-attendance-card">
        <div class="mirsaige-attendance-table-wrapper">
            <table class="mirsaige-attendance-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Employee</th>
                        <th>Date</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>Status</th>
                        <th>Notes</th>
                        @if(in_array($user_role_id, [1, 2,6]))
                        <th>Actions</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @forelse($attendances as $attendance)
                    <tr>
                        <td data-label="ID">{{ $loop->iteration }}</td>
                        <td data-label="Employee">{{ $attendance->user ? $attendance->user->name : '--' }}</td>
                        <td data-label="Date">{{ date('d M Y', strtotime($attendance->date)) }}</td>
                        <td data-label="Check In">{{ $attendance->check_in ? date('h:i A', strtotime($attendance->check_in)) : '--' }}</td>
                        <td data-label="Check Out">{{ $attendance->check_out ? date('h:i A', strtotime($attendance->check_out)) : '--' }}</td>
                        <td data-label="Status">
                            <span class="mirsaige-attendance-status status-{{ $attendance->status }}">
                                {{ ucfirst(str_replace('_', ' ', $attendance->status)) }}
                            </span>
                        </td>
                        <td data-label="Notes">{{ $attendance->notes ?? '--' }}</td>
                        @if(in_array($user_role_id, [1, 2]))
                        <td data-label="Actions">
                            <div class="mirsaige-attendance-actions">
                                <a href="{{ route('attendances.edit', $attendance->id) }}" class="mirsaige-attendance-action-btn edit">
                                    <i class="fa-solid fa-pen-to-square"></i> <span class="action-text">Edit</span>
                                </a>
                                <form action="{{ route('attendances.destroy', $attendance->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="mirsaige-attendance-action-btn delete">
                                        <i class="fa-solid fa-trash-can"></i> <span class="action-text">Delete</span>
                                    </button>
                                </form>
                            </div>
                        </td>
                        @endif
                    </tr>
                    @empty
                    <tr>
                        <td colspan="{{ in_array($user_role_id, [1, 2, 6]) ? 8 : 7 }}" class="text-center">No attendance records found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        {!! pagination($attendances) !!}
    </div>
    <div class="mirsaige-confirm-dialog" id="confirmDialog">
        <div class="mirsaige-confirm-content">
            <h3 class="mirsaige-confirm-title">Confirm Deletion</h3>
            <p>Are you sure you want to delete this department?</p>
            <div class="mirsaige-confirm-buttons">
                <button class="mirsaige-confirm-btn cancel">Cancel</button>
                <button class="mirsaige-confirm-btn confirm">Delete</button>
            </div>
        </div>
    </div>
</div>

<!-- Toast Notification -->
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="me-auto">Attendance System</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body" id="toastBody">
            Attendance recorded successfully
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        // Initialize toast
        const toastEl = document.getElementById('liveToast');
        const toast = new bootstrap.Toast(toastEl, { autohide: true, delay: 3000 });
        
        // Mark attendance button click handler
        $('#markAttendanceBtn').click(function() {
            $.ajax({
                url: "{{ route('attendance.mark') }}",
                method: 'POST',
                data: {
                    _token: "{{ csrf_token() }}"
                },
                beforeSend: function() {
                    $('#markAttendanceBtn').prop('disabled', true);
                    $('#markAttendanceBtn').html('<i class="fas fa-spinner fa-spin"></i> Processing...');
                },
                success: function(response) {
                    if (response.success) {
                        const toastBody = document.getElementById('toastBody');
                        
                        if (response.action === 'check_in') {
                            toastBody.textContent = 'Check-in recorded successfully at ' + response.time;
                            $('#attendanceBtnText').text('Check Out');
                        } else {
                            toastBody.textContent = 'Check-out recorded successfully at ' + response.time;
                            $('#attendanceBtnText').text('Mark Attendance');
                        }
                        
                        toast.show();
                        setTimeout(() => {
                            location.reload();
                        }, 2000);
                    } else {
                        toastBody.textContent = response.message;
                        toast.show();
                    }
                },
                error: function(xhr) {
                    const toastBody = document.getElementById('toastBody');
                    toastBody.textContent = 'An error occurred. Please try again.';
                    toast.show();
                },
                complete: function() {
                    $('#markAttendanceBtn').prop('disabled', false);
                    $('#markAttendanceBtn').html('<i class="fa-solid fa-fingerprint"></i> <span id="attendanceBtnText">' + $('#attendanceBtnText').text() + '</span>');
                }
            });
        });
        
        // Check current attendance status on page load
        @if(!in_array($user_role_id, [1, 2, 3]))
        function checkAttendanceStatus() {
            $.ajax({
                url: "{{ route('attendance.status') }}",
                method: 'GET',
                success: function(response) {
                    if (response.checked_in && !response.checked_out) {
                        $('#attendanceBtnText').text('Check Out');
                    }
                }
            });
        }
        
        checkAttendanceStatus();
        @endif
    });

    // Confirm before delete
    const deleteButtons = document.querySelectorAll('.mirsaige-attendance-action-btn.delete');
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