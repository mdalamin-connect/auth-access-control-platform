@extends('layout.erp.app')
@section('title', 'Task Details')
@section('style')
<style>
    /* Modern Design with App Blade Color Scheme */
    .mirsaige-details-container {
        margin: 0 auto;
        padding: 2rem;
    }

    .mirsaige-app-breadcrumbs {
        display: flex;
        align-items: center;
        gap: var(--mirsaige-space-2xs);
        flex-wrap: wrap;
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

    .mirsaige-app-breadcrumb.divider i {
        color: var(--mirsaige-text);
        opacity: 0.7;
        font-size: 0.9rem;
    }

    .mirsaige-app-breadcrumbs-title {
        background: var(--mirsaige-dark-blue);
        color: var(--mirsaige-accent);
        border: 1px solid rgba(255, 178, 62, 0.3);
        padding: var(--mirsaige-space-xs) var(--mirsaige-space-md);
        border-radius: 6px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: var(--mirsaige-space-xs);
        font-size: var(--mirsaige-space-sm);
    }

    .mirsaige-app-breadcrumbs-title:hover {
        background: rgba(255, 178, 62, 0.1);
        color: var(--mirsaige-accent);
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(221, 153, 51, 0.3);
    }

    .mirsaige-app-breadcrumbs-btn {
        background: var(--mirsaige-dark-blue);
        color: var(--mirsaige-accent);
        border: 1px solid rgba(255, 178, 62, 0.3);
        padding: var(--mirsaige-space-xs) var(--mirsaige-space-md);
        border-radius: 6px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: var(--mirsaige-space-xs);
        align-self: flex-start; 
        margin-top: 0;
    }

    .mirsaige-app-breadcrumbs-btn:hover {
        background: rgba(255, 178, 62, 0.1);
        color: var(--mirsaige-accent);
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(221, 153, 51, 0.3);
    }

    /* Header Section */
    .mirsaige-details-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: 2.5rem 0;
        padding-bottom: 1.5rem;
        border-bottom: 1px solid rgba(255, 178, 62, 0.1);
    }

    .mirsaige-details-title {
        font-size: 1.75rem;
        font-weight: 600;
        color: var(--mirsaige-white);
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .mirsaige-details-title-icon {
        color: var(--mirsaige-accent);
        font-size: 1.5rem;
    }

    .mirsaige-details-subtitle {
        font-size: 0.9rem;
        color: var(--mirsaige-text);
        opacity: 0.8;
        margin-top: 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    /* Details Grid */
    .mirsaige-details-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 1.5rem;
        margin-bottom: 3rem;
    }

    .mirsaige-detail-card {
        background: var(--mirsaige-dark-blue);
        border-radius: 10px;
        padding: 1.5rem;
        border: 1px solid rgba(255, 178, 62, 0.1);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .mirsaige-detail-card:hover {
        transform: translateY(-5px);
        border-color: rgba(255, 178, 62, 0.3);
    }

    .mirsaige-detail-label {
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: var(--mirsaige-accent);
        margin-bottom: 0.75rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .mirsaige-detail-value {
        font-size: 1.1rem;
        font-weight: 500;
        color: var(--mirsaige-white);
    }

    /* Task Profile Card */
    .mirsaige-task-profile-card {
        background: var(--mirsaige-dark-blue);
        border-radius: 10px;
        padding: 1.5rem;
        border: 1px solid rgba(255, 178, 62, 0.1);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        grid-column: 1 / -1;
        display: flex;
        align-items: center;
        gap: 2rem;
    }


    .mirsaige-task-profile-info {
        flex: 1;
    }

    .mirsaige-task-profile-name {
        font-size: 1.8rem;
        font-weight: 600;
        color: var(--mirsaige-white);
        margin-bottom: 0.5rem;
    }

    .mirsaige-task-profile-project {
        font-size: 1rem;
        color: var(--mirsaige-accent);
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .mirsaige-task-profile-dates {
        font-size: 0.9rem;
        color: var(--mirsaige-text);
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 0.5rem;
    }

    .mirsaige-task-profile-status {
        display: inline-block;
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 500;
    }

    .mirsaige-task-profile-status.active {
        background: rgba(40, 167, 69, 0.2);
        color: #28a745;
    }

    .mirsaige-task-profile-status.completed {
        background: rgba(13, 110, 253, 0.2);
        color: #0d6efd;
    }

    .mirsaige-task-profile-status.pending {
        background: rgba(255, 193, 7, 0.2);
        color: #ffc107;
    }

    .mirsaige-task-profile-status.cancelled {
        background: rgba(220, 53, 69, 0.2);
        color: #dc3545;
    }

    /* Progress Bar Styles */
    .mirsaige-progress-container {
        width: 100%;
        margin: 1rem 0;
    }

    .mirsaige-progress-label {
        display: flex;
        justify-content: space-between;
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
        color: var(--mirsaige-text);
    }

    .mirsaige-progress-bar {
        height: 10px;
        border-radius: 5px;
        background-color: var(--mirsaige-darker-blue);
        overflow: hidden;
    }

    .mirsaige-progress-fill {
        height: 100%;
        border-radius: 5px;
        background-color: var(--mirsaige-accent);
        transition: width 0.5s ease;
    }

    /* Action Buttons */
    .mirsaige-details-actions {
        display: flex;
        justify-content: flex-end;
        gap: 1rem;
        margin-top: 2.5rem;
        padding-top: 1.5rem;
        border-top: 1px solid rgba(255, 178, 62, 0.1);
    }

    .mirsaige-details-action-btn {
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

    .mirsaige-details-action-btn.back {
        background: transparent;
        color: var(--mirsaige-accent);
        border: 1px solid var(--mirsaige-accent);
    }

    .mirsaige-details-action-btn.back:hover {
        background: rgba(255, 178, 62, 0.1);
    }

    .mirsaige-details-action-btn.edit {
        background: var(--mirsaige-accent);
        color: var(--mirsaige-dark);
        border: 1px solid var(--mirsaige-accent);
    }

    .mirsaige-details-action-btn.edit:hover {
        background: #FFA01A;
        box-shadow: 0 4px 12px rgba(255, 178, 62, 0.3);
    }

    .mirsaige-details-action-btn.complete {
        background: var(--mirsaige-success);
        color: white;
        border: 1px solid var(--mirsaige-success);
    }

    .mirsaige-details-action-btn.complete:hover {
        background: #218838;
        box-shadow: 0 4px 12px rgba(40, 167, 69, 0.3);
    }

    /* Description Card Styles */
    .description-card {
        grid-column: span 2;
        padding: 1.5rem;
        height: auto;
    }

    .mirsaige-description-content {
        font-size: 1rem;
        line-height: 1.7;
        color: var(--mirsaige-text);
    }

    .mirsaige-description-content p {
        margin-bottom: 1rem;
    }

    /* No Description State */
    .no-description {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: var(--mirsaige-text);
        opacity: 0.7;
        font-style: italic;
    }

    .no-description i {
        font-size: 1.2rem;
    }

    /* Responsive Adjustments */
    @media (min-width: 992px) and (max-width: 1270px) {
        .mirsaige-app-breadcrumbs-title {
            font-size: 1.3rem;
        }
    }

    @media (min-width: 768px) and (max-width: 991px) {
        .mirsaige-app-breadcrumbs-title {
            font-size: 1.25rem;
        }
        
        .mirsaige-app-breadcrumbs {
            font-size: 0.8rem;
        }
        
        .mirsaige-task-profile-card {
            flex-direction: column;
            text-align: center;
        }
        

    }

    @media (max-width: 768px) {
        .mirsaige-details-container {
            padding: 1.25rem;
        }
        .mirsaige-app-breadcrumbs-title {
            font-size: 1.2rem;
        }
        .mirsaige-app-breadcrumb {
            display: none;
        }
        .mirsaige-details-grid {
            grid-template-columns: 1fr;
        }
        .mirsaige-details-title {
            font-size: 1.2rem;
        }
        .mirsaige-details-actions {
            flex-direction: column;
            gap: 0.75rem;
        }
        
        .mirsaige-details-action-btn {
            width: 100%;
            justify-content: center;
        }
    }

    /* Animation */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .mirsaige-detail-card {
        animation: fadeIn 0.4s ease-out forwards;
    }

    .mirsaige-detail-card:nth-child(1) { animation-delay: 0.1s; }
    .mirsaige-detail-card:nth-child(2) { animation-delay: 0.2s; }
    .mirsaige-detail-card:nth-child(3) { animation-delay: 0.3s; }
    .mirsaige-detail-card:nth-child(4) { animation-delay: 0.4s; }
    .mirsaige-detail-card:nth-child(5) { animation-delay: 0.5s; }
    .mirsaige-detail-card:nth-child(6) { animation-delay: 0.6s; }

    @media (max-width: 575.98px) {
        .mirsaige-app-breadcrumbs-title {
            display: none;
        }
        .mirsaige-app-breadcrumb {
            display: none;
        }
        .mirsaige-details-title {
            display: none;
        }
    }

    /* Extra Small Mobile Styles (430px and below) */
    @media (max-width: 430px) {
        .mirsaige-app-breadcrumbs-title {
            display: none;
        }
        .mirsaige-app-breadcrumb {
            display: none;
        }
        .mirsaige-details-title {
            display: none;
        }
        

    }
</style>
@endsection

@section('page')
<div class="mirsaige-details-container">
    <!-- Breadcrumb Navigation -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="mirsaige-app-breadcrumbs-title">Task Details</h1>
            <div class="mirsaige-app-breadcrumbs">
                <div class="mirsaige-app-breadcrumb">
                    <a href="{{ route('admin.dashboard') }}"><i class='bx bx-home'></i> Home</a>
                </div>
                <div class="mirsaige-app-breadcrumb divider">
                    <i class='bx bx-chevron-right'></i>
                </div>
                <div class="mirsaige-app-breadcrumb">
                    <a href="{{ route('tasks.index') }}">Tasks</a>
                </div>
                <div class="mirsaige-app-breadcrumb divider">
                    <i class='bx bx-chevron-right'></i>
                </div>
                <div class="mirsaige-app-breadcrumb">
                    <a href="{{ route('tasks.show', $task->id) }}" class="active">{{ $task->name }}</a>
                </div>
            </div>
        </div>

        <a href="{{ route('tasks.index') }}" class="mirsaige-app-breadcrumbs-btn">
            <i class="bx bx-arrow-back"></i>
            Back to Tasks
        </a>
    </div>

    <!-- Task Profile Card -->
    <div class="mirsaige-task-profile-card">
        <div class="mirsaige-task-profile-info">
            <h2 class="mirsaige-task-profile-name">{{ $task->name }}</h2>
            <div class="mirsaige-task-profile-project">
                <i class='bx bx-folder'></i>
                Project: {{ $task->project->name ?? 'No Project' }}
            </div>
            
            <div class="mirsaige-task-profile-dates">
                <span><i class='bx bx-calendar'></i> Start: {{ $task->start_time }}</span>
                <span><i class='bx bx-calendar-check'></i> End: {{ $task->end_time }}</span>
            </div>
            
            <div class="mirsaige-progress-container">
                <div class="mirsaige-progress-label">
                    <span>Progress</span>
                    <span>{{ $task->progress ?? 0 }}%</span>
                </div>
                <div class="mirsaige-progress-bar">
                    <div class="mirsaige-progress-fill" style="width: {{ $task->progress ?? 0 }}%"></div>
                </div>
            </div>
            
            <span class="mirsaige-task-profile-status {{ strtolower($task->status) }}">
                <i class='bx bx-badge-check'></i> {{ $task->status }}
            </span>
        </div>
    </div>

    <!-- Header Section -->
    <div class="mirsaige-details-header">
        <div>
            <h1 class="mirsaige-details-title">
                <i class='bx bxs-detail mirsaige-details-title-icon'></i>
                Task Information
            </h1>
            <p class="mirsaige-details-subtitle">
                <i class='bx bx-time-five'></i>
                Last updated: {{ $task->updated_at->format('M d, Y \a\t h:i A') }} by {{ $task->updater->name ?? 'System' }}
            </p>
        </div>
    </div>

    <!-- Details Grid -->
    <div class="mirsaige-details-grid">
        <div class="mirsaige-detail-card">
            <div class="mirsaige-detail-label">
                <i class='bx bx-id-card'></i>
                Task ID
            </div>
            <div class="mirsaige-detail-value">#{{ str_pad($task->id, 5, '0', STR_PAD_LEFT) }}</div>
        </div>
        
        <div class="mirsaige-detail-card">
            <div class="mirsaige-detail-label">
                <i class='bx bx-map'></i>
                Locations
            </div>
            <div class="mirsaige-detail-value">{{ $task->locations ?? 'Not specified' }}</div>
        </div>
        
        <div class="mirsaige-detail-card">
            <div class="mirsaige-detail-label">
                <i class='bx bx-user'></i>
                Assignee
            </div>
            <div class="mirsaige-detail-value">{{ $task->assignee->name ?? 'Unassigned' }}</div>
        </div>
        
        <div class="mirsaige-detail-card">
            <div class="mirsaige-detail-label">
                <i class='bx bx-time'></i>
                Estimated Time
            </div>
            <div class="mirsaige-detail-value">{{ $task->estimated_time ?? 'Not specified' }}</div>
        </div>
        
        <div class="mirsaige-detail-card">
            <div class="mirsaige-detail-label">
                <i class='bx bx-user-plus'></i>
                Created By
            </div>
            <div class="mirsaige-detail-value">{{ $task->creator->name ?? 'System' }}</div>
        </div>
        
        <div class="mirsaige-detail-card">
            <div class="mirsaige-detail-label">
                <i class='bx bx-user-check'></i>
                Updated By
            </div>
            <div class="mirsaige-detail-value">{{ $task->updater->name ?? 'System' }}</div>
        </div>
        
        <div class="mirsaige-detail-card">
            <div class="mirsaige-detail-label">
                <i class='bx bx-calendar-plus'></i>
                Created At
            </div>
            <div class="mirsaige-detail-value">{{ $task->created_at->format('M d, Y') }}</div>
        </div>
        
        <div class="mirsaige-detail-card">
            <div class="mirsaige-detail-label">
                <i class='bx bx-calendar-edit'></i>
                Last Updated
            </div>
            <div class="mirsaige-detail-value">{{ $task->updated_at->format('M d, Y') }}</div>
        </div>
    </div>

    <!-- Description Card -->
    <div class="mirsaige-detail-card description-card">
        <div class="mirsaige-detail-label">
            <i class='bx bx-detail'></i>
            Description
        </div>
        <div class="mirsaige-description-content">
            @if($task->description)
                {!! $task->description !!}
            @else
                <div class="no-description">
                    <i class='bx bx-info-circle'></i>
                    <span>No description provided</span>
                </div>
            @endif
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="mirsaige-details-actions">
        @if (in_array(session('sess_user_role_id'), [1, 2, 3]))
        <a href="{{ route('tasks.edit', $task->id) }}" class="mirsaige-details-action-btn edit">
            <i class='bx bx-edit'></i> Edit Task
        </a>
        @endif
        

        
        <a href="{{ route('tasks.index') }}" class="mirsaige-details-action-btn back">
            <i class='bx bx-arrow-back'></i> Back to Tasks
        </a>
    </div>
</div>
@endsection

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add any interactive functionality here
        console.log('Task details page loaded');
        
        // Example: Animate progress bar
        const progressFill = document.querySelector('.mirsaige-progress-fill');
        if (progressFill) {
            // Trigger animation by setting width again
            const progress = progressFill.style.width;
            progressFill.style.width = '0';
            setTimeout(() => {
                progressFill.style.width = progress;
            }, 100);
        }
    });
</script>
@endsection