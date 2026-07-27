@extends('layout.erp.app')

@section('title', 'Leave Calendar')

@section('content')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col-md-12">
            <h2 class="page-title">Leave Calendar</h2>
            <div class="breadcrumb">
                <a href="{{ route('dashboard') }}">Home</a> > 
                <a href="{{ route('leaves.index') }}">Leaves</a> > 
                <span class="active">Calendar</span>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Leave Calendar View</h5>
                    <div class="btn-group">
                        <a href="{{ route('leaves.index') }}" class="btn btn-sm btn-secondary">
                            <i class="fas fa-list"></i> List View
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form method="GET" class="mb-4">
                        <div class="row">
                            @if($employees)
                            <div class="col-md-3">
                                <select name="employee" class="form-control form-control-sm">
                                    <option value="">All Employees</option>
                                    @foreach($employees as $emp)
                                        <option value="{{ $emp->id }}" {{ request('employee') == $emp->id ? 'selected' : '' }}>
                                            {{ $emp->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @endif
                            <div class="col-md-3">
                                <select name="type" class="form-control form-control-sm">
                                    <option value="">All Types</option>
                                    @foreach($leaveTypes as $type)
                                        <option value="{{ $type->id }}" {{ request('type') == $type->id ? 'selected' : '' }}>
                                            {{ $type->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @if($departments)
                            <div class="col-md-3">
                                <select name="department" class="form-control form-control-sm">
                                    <option value="">All Departments</option>
                                    @foreach($departments as $dept)
                                        <option value="{{ $dept->id }}" {{ request('department') == $dept->id ? 'selected' : '' }}>
                                            {{ $dept->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @endif
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-sm btn-primary">Filter</button>
                                <a href="{{ route('leaves.calendar') }}" class="btn btn-sm btn-secondary">Reset</a>
                            </div>
                        </div>
                    </form>

                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css">
<style>
    .fc-event {
        cursor: pointer;
    }
    .fc-event-approved {
        background-color: #28a745;
        border-color: #28a745;
    }
    .fc-event-pending {
        background-color: #ffc107;
        border-color: #ffc107;
        color: #212529;
    }
    .fc-event-rejected {
        background-color: #dc3545;
        border-color: #dc3545;
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var leaves = @json($leaves->map(function($leave) {
        return [
            'title' => $leave->employee->name . ' - ' . $leave->leaveType->name,
            'start' => $leave->start_date->format('Y-m-d'),
            'end' => $leave->end_date->addDay()->format('Y-m-d'), // Add one day for FullCalendar
            'color' => $leave->status == 'approved' ? '#28a745' : 
                     ($leave->status == 'pending' ? '#ffc107' : '#dc3545'),
            'extendedProps' => [
                'status' => $leave->status,
                'employee' => $leave->employee->name,
                'type' => $leave->leaveType->name,
                'days' => $leave->days_requested,
                'reason' => $leave->reason,
                'url' => "{{ route('leaves.show', ':id') }}".replace(':id', $leave->id)
            ]
        ];
    }));

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,dayGridWeek,dayGridDay'
        },
        events: leaves,
        eventDidMount: function(info) {
            // Add custom class based on status
            info.el.classList.add('fc-event-' + info.event.extendedProps.status);
            
            // Add tooltip
            $(info.el).tooltip({
                title: `
                    <strong>${info.event.extendedProps.employee}</strong><br>
                    <strong>Type:</strong> ${info.event.extendedProps.type}<br>
                    <strong>Status:</strong> ${info.event.extendedProps.status}<br>
                    <strong>Days:</strong> ${info.event.extendedProps.days}<br>
                    <strong>Reason:</strong> ${info.event.extendedProps.reason.substring(0, 50)}...
                `,
                html: true,
                placement: 'top'
            });
        },
        eventClick: function(info) {
            window.location.href = info.event.extendedProps.url;
        }
    });

    calendar.render();
});
</script>
@endpush