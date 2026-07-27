@extends('layout.erp.app')
@section('title', 'Holiday Calendar')
@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css">
<style>
    .mirsaige-holiday-calendar-container {
        padding: var(--mirsaige-space-md);
    }

    .mirsaige-holiday-calendar-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: var(--mirsaige-space-md);
    }

    .mirsaige-holiday-calendar-card {
        background: var(--mirsaige-dark-blue);
        border-radius: var(--mirsaige-radius-md);
        padding: var(--mirsaige-space-md);
        box-shadow: var(--mirsaige-shadow-sm);
        border: 1px solid rgba(255, 178, 62, 0.1);
        height: calc(100vh - 200px);
    }

    #holidayCalendar {
        height: 100%;
    }

    .fc-event {
        cursor: pointer;
    }

    .fc-daygrid-event-dot {
        border-color: #f39c12 !important;
    }

    .fc-event-title {
        white-space: normal;
    }

    @media (max-width: 768px) {
        .mirsaige-holiday-calendar-header {
            flex-direction: column;
            align-items: flex-start;
            gap: var(--mirsaige-space-sm);
        }

        .mirsaige-holiday-calendar-card {
            height: auto;
            min-height: 500px;
        }
    }
</style>
@endsection

@section('page')
<div class="mirsaige-holiday-calendar-container">
    <div class="mirsaige-holiday-calendar-header">
        <div>
            <h1 class="mirsaige-app-breadcrumbs-title">Holiday Calendar</h1>
            <div class="mirsaige-app-breadcrumbs">
                <div class="mirsaige-app-breadcrumb">
                    <a href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-house"></i> Home</a>
                </div>
                <div class="mirsaige-app-breadcrumb divider">
                    <i class="fa-solid fa-angle-right"></i>
                </div>
                <div class="mirsaige-app-breadcrumb">
                    <a href="{{ route('holidays.index') }}">Holidays</a>
                </div>
                <div class="mirsaige-app-breadcrumb divider">
                    <i class="fa-solid fa-angle-right"></i>
                </div>
                <div class="mirsaige-app-breadcrumb">
                    <a href="{{ route('holiday.calendar') }}" class="active">Calendar View</a>
                </div>
            </div>
        </div>
        
        <div>
            <a href="{{ route('holidays.index') }}" class="mirsaige-app-breadcrumbs-btn">
                <i class="fa-solid fa-list"></i> <span class="action-text">List View</span>
            </a>
            @if(session('sess_user_role_id') == 1)
                <a href="{{ route('holidays.create') }}" class="mirsaige-app-breadcrumbs-btn">
                    <i class="fa-solid fa-plus"></i> <span class="action-text">Add Holiday</span>
                </a>
            @endif
        </div>
    </div>

    <div class="mirsaige-holiday-calendar-card">
        <div id="holidayCalendar"></div>
    </div>
</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const calendarEl = document.getElementById('holidayCalendar');
        const holidays = @json($holidays);

        const calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,dayGridWeek,dayGridDay'
            },
            events: holidays,
            eventClick: function(info) {
                const eventId = info.event.id;
                window.location.href = `/holidays/${eventId}`;
            },
            eventContent: function(arg) {
                // Custom event rendering
                const eventEl = document.createElement('div');
                eventEl.classList.add('fc-event-main-frame');
                
                const dotEl = document.createElement('div');
                dotEl.classList.add('fc-event-dot');
                dotEl.style.backgroundColor = arg.event.backgroundColor;
                
                const titleEl = document.createElement('div');
                titleEl.classList.add('fc-event-title');
                titleEl.innerText = arg.event.title;
                
                eventEl.appendChild(dotEl);
                eventEl.appendChild(titleEl);
                
                const arrayOfDomNodes = [eventEl];
                return { domNodes: arrayOfDomNodes };
            },
            eventDidMount: function(info) {
                // Add tooltip
                if (info.event.extendedProps.description) {
                    new bootstrap.Tooltip(info.el, {
                        title: info.event.extendedProps.description,
                        placement: 'top',
                        trigger: 'hover',
                        container: 'body'
                    });
                }
            }
        });

        calendar.render();
    });
</script>
@endsection