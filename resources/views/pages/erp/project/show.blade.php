@extends('layout.erp.app')
@section('title', 'Project Details')
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

    /* Project Profile Card */
    .mirsaige-project-profile-card {
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

    .mirsaige-project-profile-img {
        width: 200px;
        height: 150px;
        border-radius: 8px;
        object-fit: cover;
        border: 3px solid var(--mirsaige-accent);
    }

    .mirsaige-project-profile-info {
        flex: 1;
    }

    .mirsaige-project-profile-name {
        font-size: 1.8rem;
        font-weight: 600;
        color: var(--mirsaige-white);
        margin-bottom: 0.5rem;
    }

    .mirsaige-project-profile-department {
        font-size: 1rem;
        color: var(--mirsaige-accent);
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .mirsaige-project-profile-dates {
        font-size: 0.9rem;
        color: var(--mirsaige-text);
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 0.5rem;
    }

    .mirsaige-project-profile-status {
        display: inline-block;
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 500;
    }

    .mirsaige-project-profile-status.active {
        background: rgba(40, 167, 69, 0.2);
        color: #28a745;
    }

    .mirsaige-project-profile-status.completed {
        background: rgba(13, 110, 253, 0.2);
        color: #0d6efd;
    }

    .mirsaige-project-profile-status.pending {
        background: rgba(255, 193, 7, 0.2);
        color: #ffc107;
    }

    .mirsaige-project-profile-status.cancelled {
        background: rgba(220, 53, 69, 0.2);
        color: #dc3545;
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

    .mirsaige-details-action-btn.tasks {
        background: var(--mirsaige-darker-blue);
        color: var(--mirsaige-accent);
        border: 1px solid var(--mirsaige-accent);
    }

    .mirsaige-details-action-btn.tasks:hover {
        background: rgba(255, 178, 62, 0.1);
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

.mirsaige-description-content h1,
.mirsaige-description-content h2,
.mirsaige-description-content h3,
.mirsaige-description-content h4,
.mirsaige-description-content h5,
.mirsaige-description-content h6 {
    color: var(--mirsaige-white);
    margin: 1.5rem 0 1rem;
    line-height: 1.3;
}

.mirsaige-description-content ul,
.mirsaige-description-content ol {
    margin: 1rem 0;
    padding-left: 2rem;
}

.mirsaige-description-content li {
    margin-bottom: 0.5rem;
}

.mirsaige-description-content blockquote {
    border-left: 3px solid var(--mirsaige-accent);
    padding: 0.5rem 1rem;
    margin: 1.5rem 0;
    background-color: rgba(255, 178, 62, 0.05);
    color: var(--mirsaige-text);
    font-style: italic;
}

.mirsaige-description-content pre {
    background-color: var(--mirsaige-darker-blue);
    padding: 1rem;
    border-radius: 6px;
    overflow-x: auto;
    margin: 1.5rem 0;
    font-family: 'Courier New', Courier, monospace;
}

.mirsaige-description-content code {
    font-family: 'Courier New', Courier, monospace;
    background-color: var(--mirsaige-darker-blue);
    padding: 0.2rem 0.4rem;
    border-radius: 3px;
    font-size: 0.9em;
}

.mirsaige-description-content img {
    max-width: 100%;
    height: auto;
    border-radius: 6px;
    margin: 1rem 0;
}

.mirsaige-description-content table {
    width: 100%;
    border-collapse: collapse;
    margin: 1.5rem 0;
}

.mirsaige-description-content table th,
.mirsaige-description-content table td {
    padding: 0.75rem;
    border: 1px solid rgba(255, 178, 62, 0.2);
}

.mirsaige-description-content table th {
    background-color: rgba(255, 178, 62, 0.1);
    color: var(--mirsaige-accent);
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
        
        .mirsaige-project-profile-card {
            flex-direction: column;
            text-align: center;
        }
        
        .mirsaige-project-profile-img {
            width: 100%;
            height: 200px;
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
        
        .mirsaige-project-profile-img {
            width: 100%;
            height: 150px;
        }
    }
</style>
@endsection

@section('page')
<div class="mirsaige-details-container">
    <!-- Breadcrumb Navigation -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="mirsaige-app-breadcrumbs-title">Project Details</h1>
            <div class="mirsaige-app-breadcrumbs">
                <div class="mirsaige-app-breadcrumb">
                    <a href="{{ route('admin.dashboard') }}"><i class='bx bx-home'></i> Home</a>
                </div>
                <div class="mirsaige-app-breadcrumb divider">
                    <i class='bx bx-chevron-right'></i>
                </div>
                <div class="mirsaige-app-breadcrumb">
                    <a href="{{ route('projects.index') }}">Projects</a>
                </div>
                <div class="mirsaige-app-breadcrumb divider">
                    <i class='bx bx-chevron-right'></i>
                </div>
                <div class="mirsaige-app-breadcrumb">
                    <a href="{{ route('projects.show', $project->id) }}" class="active">{{ $project->name }}</a>
                </div>
            </div>
        </div>

        <a href="{{ route('projects.index') }}" class="mirsaige-app-breadcrumbs-btn">
            <i class="bx bx-arrow-back"></i>
            Back to Projects
        </a>
    </div>

    <!-- Project Profile Card -->
    <div class="mirsaige-project-profile-card">
        <img src="{{ asset('img/projects/' . $project->photo) }}" class="mirsaige-project-profile-img" alt="Project Image">
        <div class="mirsaige-project-profile-info">
            <h2 class="mirsaige-project-profile-name">{{ $project->name }}</h2>
            <div class="mirsaige-project-profile-department">
                <i class='bx bx-building'></i>
                {{ $project->department_name }}
            </div>
            
            <div class="mirsaige-project-profile-dates">
                <span><i class='bx bx-calendar'></i> Start: {{ $project->start_date }}</span>
                <span><i class='bx bx-calendar-check'></i> End: {{ $project->end_date }}</span>
            </div>
            
            
            
            <span class="mirsaige-project-profile-status {{ strtolower($project->status) }}">
                <i class='bx bx-badge-check'></i> {{ $project->status }}
            </span>
        </div>
    </div>

    <!-- Header Section -->
    <div class="mirsaige-details-header">
        <div>
            <h1 class="mirsaige-details-title">
                <i class='bx bxs-detail mirsaige-details-title-icon'></i>
                Project Information
            </h1>
            <p class="mirsaige-details-subtitle">
                <i class='bx bx-time-five'></i>
                Last updated: {{ $project->updated_at->format('M d, Y \a\t h:i A') }} by {{ $project->updater->name ?? 'System' }}
            </p>
        </div>
    </div>

    <!-- Details Grid -->
    <div class="mirsaige-details-grid">
        <div class="mirsaige-detail-card">
            <div class="mirsaige-detail-label">
                <i class='bx bx-id-card'></i>
                Project ID
            </div>
            <div class="mirsaige-detail-value">#{{ str_pad($project->id, 5, '0', STR_PAD_LEFT) }}</div>
        </div>
        
        <div class="mirsaige-detail-card">
            <div class="mirsaige-detail-label">
                <i class='bx bx-map'></i>
                Locations
            </div>
            <div class="mirsaige-detail-value">{{ $project->locations ?? 'Not specified' }}</div>
        </div>
        
        <div class="mirsaige-detail-card">
            <div class="mirsaige-detail-label">
                <i class='bx bx-calendar-star'></i>
                Start Date
            </div>
            <div class="mirsaige-detail-value">{{ $project->start_date }}</div>
        </div>
        
        <div class="mirsaige-detail-card">
            <div class="mirsaige-detail-label">
                <i class='bx bx-calendar-check'></i>
                End Date
            </div>
            <div class="mirsaige-detail-value">{{ $project->end_date }}</div>
        </div>
        
        <div class="mirsaige-detail-card">
            <div class="mirsaige-detail-label">
                <i class='bx bx-user-plus'></i>
                Created By
            </div>
            <div class="mirsaige-detail-value">{{ $project->creator->name ?? 'System' }}</div>
        </div>
        
        <div class="mirsaige-detail-card">
            <div class="mirsaige-detail-label">
                <i class='bx bx-user-check'></i>
                Updated By
            </div>
            <div class="mirsaige-detail-value">{{ $project->updater->name ?? 'System' }}</div>
        </div>
        
        <div class="mirsaige-detail-card">
            <div class="mirsaige-detail-label">
                <i class='bx bx-calendar-plus'></i>
                Created At
            </div>
            <div class="mirsaige-detail-value">{{ $project->created_at->format('M d, Y \a\t h:i A') }}</div>
        </div>
        
        <div class="mirsaige-detail-card">
            <div class="mirsaige-detail-label">
                <i class='bx bx-calendar-edit'></i>
                Last Updated
            </div>
            <div class="mirsaige-detail-value">{{ $project->updated_at->format('M d, Y \a\t h:i A') }}</div>
        </div>
        

    </div>
        <div class="mirsaige-detail-card description-card" width="100%">
            <div class="mirsaige-detail-label">
                <i class='bx bx-detail'></i>
                Description
            </div>
            <div class="mirsaige-description-content" width="100%">
                @if($project->descriptions)
                    {!! $project->descriptions !!}
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
        @if (in_array(session('sess_user_role_id'), [1, 2]))
        <a href="{{ route('projects.edit', $project->id) }}" class="mirsaige-details-action-btn edit">
            <i class='bx bx-edit'></i> Edit Project
        </a>
        @endif
        
        <a href="{{ route('tasks.index', ['project_id' => $project->id]) }}" class="mirsaige-details-action-btn tasks">
            <i class='bx bx-task'></i> View Tasks
        </a>
        
        <a href="{{ route('projects.index') }}" class="mirsaige-details-action-btn back">
            <i class='bx bx-arrow-back'></i> Back to Projects
        </a>
    </div>
</div>
@endsection

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add any interactive functionality here
        console.log('Project details page loaded');
        
        // Example: Animate progress bar

    });
</script>
@endsection