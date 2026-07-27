@extends('layout.erp.app')
@section('title', 'Manage Roles')
@section('style')
<style>
    /* Base Styles */
    .mirsaige-role-container {
        padding: var(--mirsaige-space-md);
        color: var(--mirsaige-text);
        max-width: 100%;
        overflow-x: hidden;
        min-height: 100vh;
    }

    /* Header Section */
    .mirsaige-role-header {
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
    .mirsaige-role-table-wrapper {
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        position: relative;
    }

    .mirsaige-role-table-container {
        background: var(--mirsaige-dark-blue);
        border-radius: 8px;
        border: 1px solid rgba(255, 178, 62, 0.1);
        min-width: 100%;
    }

    /* Table Styles */
    .mirsaige-role-table {
        width: 100%;
        border-collapse: collapse;
    }

    .mirsaige-role-table thead {
        background: var(--mirsaige-darker-blue);
    }

    .mirsaige-role-table th {
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

    .mirsaige-role-table td {
        padding: var(--mirsaige-space-sm);
        color: var(--mirsaige-text);
        border-bottom: 1px solid rgba(255, 178, 62, 0.05);
        font-size: 0.9rem;

    }

    .mirsaige-role-table tr:last-child td {
        border-bottom: none;
    }

    .mirsaige-role-table tr:hover td {
        background: rgba(255, 178, 62, 0.05);
        color: var(--mirsaige-white);
    }

    /* Permissions Badges */
    .mirsaige-permissions-container {
        display: flex;
        flex-wrap: wrap;
        gap: var(--mirsaige-space-2xs);
    }

    .mirsaige-permission-badge {
        background: rgba(255, 178, 62, 0.2);
        color: var(--mirsaige-accent);
        padding: var(--mirsaige-space-4xs) var(--mirsaige-space-2xs);
        border-radius: 4px;
        font-size: 0.75rem;
        white-space: nowrap;
    }

    /* Action Buttons */
    .mirsaige-role-actions {
        display: flex;
        gap: var(--mirsaige-space-xs);
        flex-wrap: nowrap; /* Ensures buttons stay side by side */
    }

    .mirsaige-role-action-btn {
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
    }

    .mirsaige-role-action-btn.view {
        background: var(--mirsaige-primary);
        color: var(--mirsaige-accent);
    }

    .mirsaige-role-action-btn.edit {
        background: var(--mirsaige-secondary);
        color: var(--mirsaige-accent);
    }

    .mirsaige-role-action-btn.delete {
        background: #dc3545;
        color: var(--mirsaige-white);
    }

    .mirsaige-role-action-btn:hover {
        opacity: 0.9;
        transform: translateY(-1px);
    }
    .mirsaige-role-action-btn .action-text {
        display: inline;
        color: var(--mirsaige-white);
    }

    /* Scrollbar Styling */
    .mirsaige-role-table-wrapper::-webkit-scrollbar {
        height: 8px;
    }

    .mirsaige-role-table-wrapper::-webkit-scrollbar-track {
        background: var(--mirsaige-dark-blue);
        border-radius: 4px;
    }

    .mirsaige-role-table-wrapper::-webkit-scrollbar-thumb {
        background: var(--mirsaige-accent);
        border-radius: 4px;
    }

    .mirsaige-role-table-wrapper::-webkit-scrollbar-thumb:hover {
        background: var(--mirsaige-gold);
    }

    /* Large Desktop Styles (1171px and above) */
    @media (min-width: 1171px) {
        .mirsaige-role-table-container {
            min-width: auto;
        }
        
        .mirsaige-role-table {
            width: 100%;
        }
    }

    /* Medium Desktop Styles (992px - 1170px) */
    @media (min-width: 992px) and (max-width: 1270px) {
        .mirsaige-role-container {
            padding: var(--mirsaige-space-sm);
        }
        
        .mirsaige-app-breadcrumbs-title {
            font-size: 1.3rem;
        }
        
        .mirsaige-role-table th,
        .mirsaige-role-table td {
            padding: var(--mirsaige-space-xs);
            font-size: 0.85rem;
        }
        
        .mirsaige-role-action-btn .action-text {
            display: none;
        }
        
        .mirsaige-permission-badge {
            font-size: 0.7rem;
        }
    }

    /* Tablet Styles (768px - 991px) */
    @media (min-width: 768px) and (max-width: 991px) {
        .mirsaige-role-container {
            padding: var(--mirsaige-space-sm);
        }
        
        .mirsaige-app-breadcrumbs-title {
            font-size: 1.25rem;
        }
        
        .mirsaige-app-breadcrumbs {
            font-size: 0.8rem;
        }
        
        .mirsaige-role-table th,
        .mirsaige-role-table td {
            padding: var(--mirsaige-space-xs);
            font-size: 0.82rem;
        }
        
        .mirsaige-role-action-btn .action-text {
            display: none;
        }
        
        .mirsaige-permission-badge {
            font-size: 0.65rem;
        }
    }

    /* Mobile Table Styles (767px and below) */
    @media (max-width: 767px) {
        .mirsaige-role-container {
            padding: var(--mirsaige-space-sm);
        }
        
        .mirsaige-app-breadcrumbs-title {
            font-size: 1.2rem;
        }
        
        /* Stacked table layout for mobile */
        .mirsaige-role-table {
            display: block;
            width: 100%;
        }
        
        .mirsaige-role-table thead {
            display: none;
        }
        
        .mirsaige-role-table tbody {
            display: block;
            width: 100%;
        }
        
        .mirsaige-role-table tr {
            display: block;
            margin-bottom: var(--mirsaige-space-md);
            border: 1px solid rgba(255, 178, 62, 0.2);
            border-radius: 6px;
            overflow: hidden;
        }
        
        .mirsaige-role-table td {
            display: block;
            width: 100%;
            padding: var(--mirsaige-space-xs) var(--mirsaige-space-sm);
            padding-left: 45%;
            position: relative;
            text-align: right;
            white-space: normal;
            border-bottom: 1px solid rgba(255, 178, 62, 0.1);
        }
        
        .mirsaige-role-table td:last-child {
            border-bottom: none;
        }
        
        .mirsaige-role-table td::before {
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
        
        /* Adjust action buttons for mobile - keeps them side by side */
        .mirsaige-role-actions {
            justify-content: flex-end;
            flex-wrap: nowrap;
        }
        
        .mirsaige-role-action-btn {
            padding: var(--mirsaige-space-4xs) var(--mirsaige-space-2xs);
        }
        
        .mirsaige-role-action-btn .action-text {
            display: none;
        }
        
        /* Permissions adjustments */
        .mirsaige-permissions-container {
            justify-content: flex-end;
        }
    }

    /* Small Mobile Styles (575px and below) */
    @media (max-width: 575px) {
         .mirsaige-app-breadcrumbs-title,
    .mirsaige-app-breadcrumbs-btn {
        font-size: 1rem;
    }
        .mirsaige-app-breadcrumb {
            display: none;
        }
        
        .mirsaige-role-table td {
            padding-left: 40%;
            font-size: 0.8rem;
        }
        
        .mirsaige-role-table td::before {
            width: 35%;
            font-size: 0.75rem;
        }
    }

    /* Extra Small Mobile Styles (430px and below) */
    @media (max-width: 430px) {
      .mirsaige-app-breadcrumbs-title,
    .mirsaige-app-breadcrumbs-btn {
        font-size: 0.8rem;
    }
        .mirsaige-app-breadcrumb {
            display: none;
        }
        
        .mirsaige-role-table td {
            padding-left: 35%;
            padding-top: var(--mirsaige-space-2xs);
            padding-bottom: var(--mirsaige-space-2xs);
        }
        
        .mirsaige-role-table td::before {
            width: 30%;
            left: var(--mirsaige-space-xs);
        }
    }

    /* Print Styles */
    @media print {
        .mirsaige-role-table {
            width: 100%;
            border: 1px solid #ddd;
        }
        
        .mirsaige-role-table th {
            background: #f1f1f1 !important;
            color: #000 !important;
        }
        
        .mirsaige-role-table td {
            color: #000 !important;
        }
    }
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
<?php
$sessions = session()->all();
$user_id = session('sess_user_id');
$user_role_id = session('sess_user_role_id');
?>
<div class="mirsaige-role-container">
    <div class="mirsaige-role-header">
        <div>
            <h1 class="mirsaige-app-breadcrumbs-title"> Roles List</h1>
            <div class="mirsaige-app-breadcrumbs">
                <div class="mirsaige-app-breadcrumb">
                    <a href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-house"></i> Home</a>
                </div>
                <div class="mirsaige-app-breadcrumb divider">
                    <i class="fa-solid fa-angle-right"></i>
                </div>
                <div class="mirsaige-app-breadcrumb">
                    <a href="{{ route('roles.index') }}">Roles</a>
                </div>
                @if (in_array($user_role_id, [1, 2]))
                <div class="mirsaige-app-breadcrumb divider">
                    <i class="fa-solid fa-angle-right"></i>
                </div>
                <div class="mirsaige-app-breadcrumb">
                    <a href="{{ route('roles.index') }}" class="active">Manage Roles</a>
                </div>
                @endif
            </div>
        </div>
        
        @if (in_array($user_role_id, [1, 2]))
        <a href="{{ route('roles.create') }}" class="mirsaige-app-breadcrumbs-btn">
            <i class="fa-solid fa-square-plus"></i> Create
        </a>
        @endif
    </div>

    <div class="mirsaige-role-table-wrapper">
        <div class="mirsaige-role-table-container">
            <table class="mirsaige-role-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Permissions</th>
                        @if(in_array($user_role_id, [1, 2]))
                        <th>Created By</th>
                        <th>Updated By</th>
                        @endif
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                    <tr>
                        <td data-label="ID">{{ $role->id }}</td>
                        <td data-label="Name">{{ $role->name }}</td>
                        <td data-label="Permissions">
                            <div class="mirsaige-permissions-container">
                                @foreach($role->permissions as $permission)
                                    <span class="mirsaige-permission-badge">{{ $permission->name }}</span>
                                @endforeach
                            </div>
                        </td>
                        @if(in_array($user_role_id, [1, 2]))
                        <td data-label="Created By">{{ $role->creator->name ?? 'Unknown' }}</td>
                        <td data-label="Updated By">{{ $role->updater->name ?? 'Unknown' }}</td>
                        @endif
                        <td data-label="Actions">
                            <form action="{{ route('roles.destroy', $role->id) }}" method="post" class="mirsaige-role-actions">
                                @if (in_array($user_role_id, [1, 2]))
                                <a href="{{ route('roles.show', $role->id) }}" class="mirsaige-role-action-btn view">
                                    <i class="fa-solid fa-eye"></i> <span class="action-text">View</span>
                                </a>
                                <a href="{{ route('roles.edit', $role->id) }}" class="mirsaige-role-action-btn edit">
                                    <i class="fa-solid fa-pen-to-square"></i> <span class="action-text">Edit</span>
                                </a>
                                @endif
                                @if ($user_role_id == 1)
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="mirsaige-role-action-btn mirsaige-department-action-btn
                                delete">
                                    <i class="fa-solid fa-trash-can"></i> <span class="action-text">Delete</span>
                                </button>
                                @endif
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
        <!-- Pagination -->
{!! pagination($roles) !!}
      <!-- Confirmation Dialog -->
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
@endsection

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Improved touch scrolling for mobile devices
        const tableWrapper = document.querySelector('.mirsaige-role-table-wrapper');
        let isScrolling = false;
        let startX, scrollLeft;
        let momentumID;
        let velocityX = 0;
        let lastScrollLeft = 0;
        let lastTime = 0;

        // Touch event handlers for smoother scrolling
        if (tableWrapper) {
            tableWrapper.addEventListener('touchstart', function(e) {
                isScrolling = true;
                startX = e.touches[0].pageX - tableWrapper.offsetLeft;
                scrollLeft = tableWrapper.scrollLeft;
                cancelMomentumTracking();
            });

            tableWrapper.addEventListener('touchmove', function(e) {
                if (!isScrolling) return;
                e.preventDefault();
                const x = e.touches[0].pageX - tableWrapper.offsetLeft;
                const walk = (x - startX) * 2; // Scroll faster
                tableWrapper.scrollLeft = scrollLeft - walk;
            });

            tableWrapper.addEventListener('touchend', function() {
                isScrolling = false;
                beginMomentumTracking();
            });

            tableWrapper.addEventListener('scroll', function(e) {
                const now = performance.now();
                const timeDiff = now - lastTime;
                
                if (timeDiff > 0) {
                    const currentScrollLeft = tableWrapper.scrollLeft;
                    velocityX = (currentScrollLeft - lastScrollLeft) / timeDiff;
                    lastScrollLeft = currentScrollLeft;
                    lastTime = now;
                }
            });
        }

        // Momentum scrolling for smoother experience
        function beginMomentumTracking() {
            cancelMomentumTracking();
            momentumID = requestAnimationFrame(momentumLoop);
        }

        function cancelMomentumTracking() {
            cancelAnimationFrame(momentumID);
        }

        function momentumLoop() {
            if (Math.abs(velocityX) > 0.5) {
                tableWrapper.scrollLeft += velocityX * 16;
                velocityX *= 0.95;
                momentumID = requestAnimationFrame(momentumLoop);
            } else {
                cancelMomentumTracking();
            }
        }

 // Confirm before delete
    const deleteButtons = document.querySelectorAll('.mirsaige-department-action-btn.delete');
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
        // Handle responsive layout changes
        function handleResponsiveLayout() {
            const screenWidth = window.innerWidth;
            const actionTexts = document.querySelectorAll('.action-text');
            
            if (screenWidth < 992) {
                // Hide action text on tablet and mobile
                actionTexts.forEach(text => {
                    text.style.display = 'none';
                });
            } else {
                // Show action text on desktop
                actionTexts.forEach(text => {
                    text.style.display = 'inline';
                });
            }
        }

        // Initial call
        handleResponsiveLayout();
        
        // Call on window resize with debounce
        let resizeTimeout;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(handleResponsiveLayout, 100);
        });
    });
</script>
@endsection