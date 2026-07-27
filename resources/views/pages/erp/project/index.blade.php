@extends('layout.erp.app')
@section('title', 'Manage Project')
@section('style')
<style>
    /* Base Styles */
    .mirsaige-project-container {
        padding: var(--mirsaige-space-md);
        color: var(--mirsaige-text);
        max-width: 100%;
        overflow-x: hidden;
        min-height: 100vh;

    }

    /* Header Section */
    .mirsaige-project-header {
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
    .mirsaige-project-table-wrapper {
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        margin-bottom: var(--mirsaige-space-lg);
        background: var(--mirsaige-dark-blue);
        border-radius: var(--mirsaige-radius-md);
        border: 1px solid rgba(255, 178, 62, 0.1);
        box-shadow: var(--mirsaige-shadow-md);
        position: relative;
    }

    .mirsaige-project-table-container {
        
        border-radius: 8px;
       
        min-width: 100%;
    }

    /* Table Styles */
    .mirsaige-project-table {
        width: 100%;
        border-collapse: collapse;
    }

    .mirsaige-project-table thead {
        background: var(--mirsaige-darker-blue);
    }

    .mirsaige-project-table th {
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

    .mirsaige-project-table td {
        padding: var(--mirsaige-space-sm);
        color: var(--mirsaige-text);
        border-bottom: 1px solid rgba(255, 178, 62, 0.05);
        font-size: 0.9rem;
        vertical-align: middle;
    }

    .mirsaige-project-table tr:last-child td {
        border-bottom: none;
    }

    .mirsaige-project-table tr:hover td {
        background: rgba(255, 178, 62, 0.05);
        color: var(--mirsaige-white);
    }

    /* Project Image */
    .mirsaige-project-image {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 20px;
        border: 1px solid rgba(255, 178, 62, 0.1);
        transition: all 0.3s ease;
    }

    .mirsaige-project-image:hover {
        transform: scale(1.5);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        z-index: 10;
        position: relative;
    }

    /* Status Badges */
    .mirsaige-status-badge {
        display: inline-block;
        padding: 4px 8px;
        border-radius: 12px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .mirsaige-status-active {
        background-color: rgba(40, 167, 69, 0.2);
        color: #28a745;
    }

    .mirsaige-status-completed {
        background-color: rgba(108, 117, 125, 0.2);
        color: #6c757d;
    }

    .mirsaige-status-pending {
        background-color: rgba(255, 193, 7, 0.2);
        color: #ffc107;
    }

    .mirsaige-status-cancelled {
        background-color: rgba(220, 53, 69, 0.2);
        color: #dc3545;
    }

    /* Action Buttons */
    .mirsaige-project-actions {
        display: flex;
        gap: var(--mirsaige-space-xs);
        flex-wrap: nowrap;
    }

    .mirsaige-project-action-btn {
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

    .mirsaige-project-action-btn.view {
        background: var(--mirsaige-primary);
        color: var(--mirsaige-accent);
    }

    .mirsaige-project-action-btn.edit {
        background: var(--mirsaige-secondary);
        color: var(--mirsaige-accent);
    }

    .mirsaige-project-action-btn.delete {
        background: #dc3545;
        color: var(--mirsaige-white);
    }

    .mirsaige-project-action-btn:hover {
        opacity: 0.9;
        transform: translateY(-1px);
    }

    /* Action text visibility - replaces JavaScript functionality */
    .mirsaige-project-action-btn .action-text {
        display: inline;
        color: var(--mirsaige-white);
    }
    
    .mirsaige-app-breadcrumbs-btn .action-text {
        display: inline;
    }

    /* Scrollbar Styling */
    .mirsaige-project-table-wrapper::-webkit-scrollbar {
        height: 8px;
    }

    .mirsaige-project-table-wrapper::-webkit-scrollbar-track {
        background: var(--mirsaige-dark-blue);
        border-radius: 4px;
    }

    .mirsaige-project-table-wrapper::-webkit-scrollbar-thumb {
        background: var(--mirsaige-accent);
        border-radius: 4px;
    }

    .mirsaige-project-table-wrapper::-webkit-scrollbar-thumb:hover {
        background: var(--mirsaige-gold);
    }



    /* Date Styling */
    .mirsaige-date {
        white-space: nowrap;
    }

    /* Medium Desktop Styles (992px - 1280px) */
    @media (min-width: 992px) and (max-width: 1280px) {
        .mirsaige-project-container {
            padding: var(--mirsaige-space-sm);
        }
        .mirsaige-app-breadcrumbs-btn{
            font-size: 1rem;
        }

        .mirsaige-app-breadcrumbs-title {
            font-size: 1rem;
        }
        
        .mirsaige-project-table th,
        .mirsaige-project-table td {
            padding: 0.6rem 0.8rem;
            font-size: 0.85rem;
        }
        
        .mirsaige-project-actions {
            gap: 0.4rem;
            flex-wrap: nowrap;
        }
        .mirsaige-project-action-btn {
            padding: 0.25rem 0.5rem;
            min-width: 32px;
            height: 32px;
        }
        
        .mirsaige-project-action-btn .action-text {
            display: inline;
            font-size: 0.75rem;
        }
        
        .mirsaige-project-actions {
            margin-right: 0.1rem;
        }

        .mirsaige-project-image {
            width: 50px;
            height: 50px;
        }
    }

    /* Tablet Styles (768px - 991px) */
    @media (min-width: 768px) and (max-width: 991px) {
        .mirsaige-project-container {
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
        
        .mirsaige-project-table th,
        .mirsaige-project-table td {
            padding: var(--mirsaige-space-2xs);
            font-size: 0.82rem;
        }
        
        .mirsaige-project-action-btn {
            padding: var(--mirsaige-space-4xs) var(--mirsaige-space-4xs);
            min-width: 28px;
        }
        
        .mirsaige-project-action-btn .action-text {
            display: none;
        }
        
        .mirsaige-project-actions {
            gap: var(--mirsaige-space-3xs);
        }

  

        .mirsaige-project-image {
            width: 40px;
            height: 40px;
        }
    }

    /* Mobile Table Styles (767px and below) */
    @media (max-width: 767px) {
        .mirsaige-project-container {
            padding: var(--mirsaige-space-sm);
        }
        
        .mirsaige-app-breadcrumbs-btn {
            font-size: 0.9rem;
        }
        .mirsaige-app-breadcrumbs-title {
            font-size: 0.9rem;
        }
        
        /* Stacked table layout for mobile */
        .mirsaige-project-table {
            display: block;
            width: 100%;
        }
        
        .mirsaige-project-table thead {
            display: none;
        }
        
        .mirsaige-project-table tbody {
            display: block;
            width: 100%;
        }
        
        .mirsaige-project-table tr {
            display: block;
            margin-bottom: var(--mirsaige-space-md);
            border: 1px solid rgba(255, 178, 62, 0.2);
            border-radius: 6px;
            overflow: hidden;
        }
        
        .mirsaige-project-table td {
            display: block;
            width: 100%;
            padding: var(--mirsaige-space-xs) var(--mirsaige-space-sm);
            padding-left: 45%;
            position: relative;
            text-align: right;
            white-space: normal;
            border-bottom: 1px solid rgba(255, 178, 62, 0.1);
        }
        
        .mirsaige-project-table td:last-child {
            border-bottom: none;
        }
        
        .mirsaige-project-table td::before {
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
        .mirsaige-project-actions {
            justify-content: flex-end;
        }
        
        .mirsaige-project-action-btn {
            padding: var(--mirsaige-space-4xs) var(--mirsaige-space-2xs);
            min-width: 26px;
        }
        
        .mirsaige-project-action-btn .action-text {
            display: none;
        }
        
        .mirsaige-app-breadcrumb {
            display: none;
        }
        
 

        .mirsaige-project-image {
            width: 60px;
            height: 60px;
            position: absolute;
            right: 10px;
            top: 10px;
        }

        .mirsaige-project-table td[data-label="Photo"] {
            padding-left: 10px;
            height: 80px;
            text-align: left;
        }

        .mirsaige-project-table td[data-label="Photo"]::before {
            display: none;
        }
    }

    /* Small Mobile Styles (575px and below) */
    @media (max-width: 575px) {
        .mirsaige-project-table td {
            padding-left: 40%;
            font-size: 0.8rem;
        }
        
        .mirsaige-project-table td::before {
            width: 35%;
            font-size: 0.75rem;
        }
        
        .mirsaige-app-breadcrumb {
            display: none;
        }



        .mirsaige-project-image {
            width: 50px;
            height: 50px;
        }
    }

    /* Extra Small Mobile Styles (430px and below) */
    @media (max-width: 430px) {
        .mirsaige-project-table td {
            padding-left: 35%;
            padding-top: var(--mirsaige-space-2xs);
            padding-bottom: var(--mirsaige-space-2xs);
        }
        
        .mirsaige-project-table td::before {
            width: 30%;
            left: var(--mirsaige-space-xs);
        }
        
        .mirsaige-project-action-btn {
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



        .mirsaige-project-image {
            width: 40px;
            height: 40px;
        }
    }

    /* Print Styles */
    @media print {
        .mirsaige-project-table {
            width: 100%;
            border: 1px solid #ddd;
        }
        
        .mirsaige-project-table th {
            background: #f1f1f1 !important;
            color: #000 !important;
        }
        
        .mirsaige-project-table td {
            color: #000 !important;
        }
        
        .mirsaige-project-action-btn {
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
<div class="mirsaige-project-container">
    <div class="mirsaige-project-header">
        <div>
            <h1 class="mirsaige-app-breadcrumbs-title">Projects List</h1>
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
                @if (in_array($user_role_id, [1, 2]))
                <div class="mirsaige-app-breadcrumb divider">
                    <i class='bx bx-chevron-right'></i>
                </div>
                <div class="mirsaige-app-breadcrumb">
                    <a href="{{ route('projects.index') }}" class="active">Manage Projects</a>
                </div>
                @endif
            </div>
        </div>
        
        @if (in_array($user_role_id, [1, 2,3,4,5]))
        <a href="{{ route('projects.create') }}" class="mirsaige-app-breadcrumbs-btn">
            <i class="fa-solid fa-square-plus"></i> <span class="action-text">Create </span>
        </a>
        @endif
    </div>

    <div class="mirsaige-project-table-wrapper">
        <div class="mirsaige-project-table-container">
            <table class="mirsaige-project-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        {{-- <th>Department</th> --}}
                        <th>Start Date</th>
                        <th>End Date</th>
                        {{-- <th>Status</th> --}}
                        <th>Locations</th>
                        <th>Photo</th>
                        @if(in_array($user_role_id, [1, 2]))
                        <th>Created By</th>
                        {{-- <th>Updated By</th> --}}
                        @endif
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                    <tr>
                        <td data-label="ID">{{ $project->id }}</td>
                        <td data-label="Name">{{ $project->name }}</td>
                        {{-- <td data-label="Department">{{ $project->department_name }}</td> --}}
                        <td data-label="Start Date" class="mirsaige-date">{{ $project->start_date }}</td>
                        <td data-label="End Date" class="mirsaige-date">{{ $project->end_date }}</td>
                        {{-- <td data-label="Status">
                            <span class="mirsaige-status-badge mirsaige-status-{{ strtolower($project->status) }}">
                                {{ $project->status }}
                            </span>
                        </td> --}}
                        <td data-label="Locations">{{ $project->locations }}</td>
                        <td data-label="Photo">
                            <img src="{{ asset('img/projects/' . $project->photo) }}" class="mirsaige-project-image" alt="Project Image">
                        </td>
                        @if(in_array($user_role_id, [1, 2]))
                        <td data-label="Created By">{{ $project->creator->name ?? 'Unknown' }}</td>
                        {{-- <td data-label="Updated By">{{ $project->updater->name ?? 'Unknown' }}</td> --}}
                        @endif
                        <td data-label="Actions">
                            <div class="mirsaige-project-actions">
                                @if (in_array($user_role_id, [1, 2,3,4,5]))
                                <a href="{{ route('projects.show', $project->id) }}" class="mirsaige-project-action-btn view">
                                    <i class='bx bx-show'></i> <span class="action-text">View</span>
                                </a>
                                <a href="{{ route('projects.edit', $project->id) }}" class="mirsaige-project-action-btn edit">
                                    <i class='bx bx-edit'></i> <span class="action-text">Edit</span>
                                </a>
                                @endif
                                @if ($user_role_id == 1)
                                <form action="{{ route('projects.destroy', $project->id) }}" method="post" style="display: inline;">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="mirsaige-project-action-btn delete">
                                        <i class='bx bx-trash'></i> <span class="action-text">Delete</span>
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
{!! pagination($projects) !!}

    <!-- Confirmation Dialog -->
    <div class="mirsaige-confirm-dialog" id="confirmDialog">
        <div class="mirsaige-confirm-content">
            <h3 class="mirsaige-confirm-title">Confirm Deletion</h3>
            <p>Are you sure you want to delete this project?</p>
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
    const deleteButtons = document.querySelectorAll('.mirsaige-project-action-btn.delete');
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

    // Enhance project image hover effect on desktop
    if (window.innerWidth > 767) {
        const projectImages = document.querySelectorAll('.mirsaige-project-image');
        
        projectImages.forEach(img => {
            img.addEventListener('mouseenter', function() {
                this.style.zIndex = '10';
            });
            
            img.addEventListener('mouseleave', function() {
                this.style.zIndex = '';
            });
        });
    }
</script>
@endsection