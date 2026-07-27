@extends('layout.erp.app')
@section('title', 'Manage Requisitions')
@section('style')
<style>
    /* Base Styles */
    .mirsaige-requisition-container {
        padding: var(--mirsaige-space-md);
        color: var(--mirsaige-text);
        max-width: 100%;
        overflow-x: hidden;
        min-height: 100vh;

    }

    /* Header Section */
    .mirsaige-requisition-header {
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
        height: 50px;
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
    .mirsaige-requisition-table-wrapper {
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        position: relative;
    }

    .mirsaige-requisition-table-container {
        background: var(--mirsaige-dark-blue);
        border-radius: 8px;
        border: 1px solid rgba(255, 178, 62, 0.1);
        min-width: 100%;
    }

    /* Table Styles */
    .mirsaige-requisition-table {
        width: 100%;
        border-collapse: collapse;
    }

    .mirsaige-requisition-table thead {
        background: var(--mirsaige-darker-blue);
    }

    .mirsaige-requisition-table th {
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

    .mirsaige-requisition-table td {
        padding: var(--mirsaige-space-sm);
        color: var(--mirsaige-text);
        border-bottom: 1px solid rgba(255, 178, 62, 0.05);
        font-size: 0.9rem;
        vertical-align: middle;
    }

    .mirsaige-requisition-table tr:last-child td {
        border-bottom: none;
    }

    .mirsaige-requisition-table tr:hover td {
        background: rgba(255, 178, 62, 0.05);
        color: var(--mirsaige-white);
    }

    /* Status Badges */
    .mirsaige-status-badge {
        padding: 0.25rem 0.5rem;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .mirsaige-status-pending {
        background-color: rgba(255, 193, 7, 0.2);
        color: #ffc107;
    }

    .mirsaige-status-processing {
        background-color: rgba(0, 123, 255, 0.2);
        color: #007bff;
    }

    .mirsaige-status-running {
        background-color: rgba(40, 167, 69, 0.2);
        color: #28a745;
    }

    .mirsaige-status-complete {
        background-color: rgba(108, 117, 125, 0.2);
        color: #6c757d;
    }

    /* Action Buttons */
    .mirsaige-requisition-actions {
        display: flex;
        gap: var(--mirsaige-space-xs);
        flex-wrap: wrap;
    }

    .mirsaige-requisition-action-btn {
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

    .mirsaige-requisition-action-btn.view {
        background: var(--mirsaige-primary);
        color: var(--mirsaige-accent);
    }

    .mirsaige-requisition-action-btn.edit {
        background: var(--mirsaige-secondary);
        color: var(--mirsaige-accent);
    }

    .mirsaige-requisition-action-btn.delete {
        background: #dc3545;
        color: var(--mirsaige-white);
    }

    .mirsaige-requisition-action-btn.purchase {
        background: #28a745;
        color: var(--mirsaige-white);
    }

    .mirsaige-requisition-action-btn:hover {
        opacity: 0.9;
        transform: translateY(-1px);
    }

    /* Action text visibility - replaces JavaScript functionality */
    .mirsaige-requisition-action-btn .action-text {
        display: inline;
        color: var(--mirsaige-white);

    }
    
    .mirsaige-app-breadcrumbs-btn .action-text {
        display: inline;
    }

    /* Scrollbar Styling */
    .mirsaige-requisition-table-wrapper::-webkit-scrollbar {
        height: 8px;
    }

    .mirsaige-requisition-table-wrapper::-webkit-scrollbar-track {
        background: var(--mirsaige-dark-blue);
        border-radius: 4px;
    }

    .mirsaige-requisition-table-wrapper::-webkit-scrollbar-thumb {
        background: var(--mirsaige-accent);
        border-radius: 4px;
    }

    .mirsaige-requisition-table-wrapper::-webkit-scrollbar-thumb:hover {
        background: var(--mirsaige-gold);
    }



    /* Medium Desktop Styles (992px - 1280px) */
    @media (min-width: 992px) and (max-width: 1280px) {
        .mirsaige-requisition-container {
            padding: var(--mirsaige-space-sm);
        }
        .mirsaige-app-breadcrumbs-btn{
            font-size: 1rem;
        }

        .mirsaige-app-breadcrumbs-title {
            font-size: 1rem;
        }
        
        .mirsaige-requisition-table th,
        .mirsaige-requisition-table td {
            padding: 0.6rem 0.8rem;
            font-size: 0.85rem;
        }
        
        .mirsaige-requisition-actions {
            gap: 0.4rem;
            flex-wrap: nowrap;
        }
        .mirsaige-requisition-action-btn {
            padding: 0.25rem 0.5rem;
            min-width: 32px;
            height: 32px;
        }
        
        .mirsaige-requisition-action-btn .action-text {
            display: inline;
            font-size: 0.75rem;
        }
        
        .mirsaige-requisition-actions {
            margin-right: 0.1rem;
        }
    }

    /* Tablet Styles (768px - 991px) */
    @media (min-width: 768px) and (max-width: 991px) {
        .mirsaige-requisition-container {
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
        
        .mirsaige-requisition-table th,
        .mirsaige-requisition-table td {
            padding: var(--mirsaige-space-2xs);
            font-size: 0.82rem;
        }
        
        .mirsaige-requisition-action-btn {
            padding: var(--mirsaige-space-4xs) var(--mirsaige-space-4xs);
            min-width: 28px;
        }
        
        .mirsaige-requisition-action-btn .action-text {
            display: none;
        }
        
        .mirsaige-requisition-actions {
            gap: var(--mirsaige-space-3xs);
        }


    }

    /* Mobile Table Styles (767px and below) */
    @media (max-width: 767px) {
        .mirsaige-requisition-container {
            padding: var(--mirsaige-space-sm);
        }
        
        .mirsaige-app-breadcrumbs-btn {
            font-size: 0.9rem;
        }
        .mirsaige-app-breadcrumbs-title {
            font-size: 0.9rem;
        }
        
        /* Stacked table layout for mobile */
        .mirsaige-requisition-table {
            display: block;
            width: 100%;
        }
        
        .mirsaige-requisition-table thead {
            display: none;
        }
        
        .mirsaige-requisition-table tbody {
            display: block;
            width: 100%;
        }
        
        .mirsaige-requisition-table tr {
            display: block;
            margin-bottom: var(--mirsaige-space-md);
            border: 1px solid rgba(255, 178, 62, 0.2);
            border-radius: 6px;
            overflow: hidden;
        }
        
        .mirsaige-requisition-table td {
            display: block;
            width: 100%;
            padding: var(--mirsaige-space-xs) var(--mirsaige-space-sm);
            padding-left: 45%;
            position: relative;
            text-align: right;
            white-space: normal;
            border-bottom: 1px solid rgba(255, 178, 62, 0.1);
        }
        
        .mirsaige-requisition-table td:last-child {
            border-bottom: none;
        }
        
        .mirsaige-requisition-table td::before {
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
        .mirsaige-requisition-actions {
            justify-content: flex-end;
        }
        
        .mirsaige-requisition-action-btn {
            padding: var(--mirsaige-space-4xs) var(--mirsaige-space-2xs);
            min-width: 26px;
        }
        
        .mirsaige-requisition-action-btn .action-text {
            display: none;
        }
        
        .mirsaige-app-breadcrumb {
            display: none;
        }
        

    }

    /* Small Mobile Styles (575px and below) */
    @media (max-width: 575px) {
        .mirsaige-requisition-table td {
            padding-left: 40%;
            font-size: 0.8rem;
        }
        
        .mirsaige-requisition-table td::before {
            width: 35%;
            font-size: 0.75rem;
        }
        
        .mirsaige-app-breadcrumb {
            display: none;
        }



        
    }

    /* Extra Small Mobile Styles (430px and below) */
    @media (max-width: 430px) {
        .mirsaige-requisition-table td {
            padding-left: 35%;
            padding-top: var(--mirsaige-space-2xs);
            padding-bottom: var(--mirsaige-space-2xs);
        }
        
        .mirsaige-requisition-table td::before {
            width: 30%;
            left: var(--mirsaige-space-xs);
        }
        
        .mirsaige-requisition-action-btn {
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


    }

    /* Print Styles */
    @media print {
        .mirsaige-requisition-table {
            width: 100%;
            border: 1px solid #ddd;
        }
        
        .mirsaige-requisition-table th {
            background: #f1f1f1 !important;
            color: #000 !important;
        }
        
        .mirsaige-requisition-table td {
            color: #000 !important;
        }
        
        .mirsaige-requisition-action-btn {
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
<div class="mirsaige-requisition-container">
    <div class="mirsaige-requisition-header">
        <div>
            <h1 class="mirsaige-app-breadcrumbs-title"> Requisitions List</h1>
            <div class="mirsaige-app-breadcrumbs">
                <div class="mirsaige-app-breadcrumb">
                    <a href="{{ route('admin.dashboard') }}"><i class='bx bx-home'></i> Home</a>
                </div>
                <div class="mirsaige-app-breadcrumb divider">
                    <i class='bx bx-chevron-right'></i>
                </div>
                <div class="mirsaige-app-breadcrumb">
                    <a href="{{ route('requisitions.index') }}">Requisition</a>
                </div>
                <div class="mirsaige-app-breadcrumb divider">
                    <i class='bx bx-chevron-right'></i>
                </div>
                <div class="mirsaige-app-breadcrumb">
                    <a href="{{ route('requisitions.index') }}" class="active">Manage Requisition</a>
                </div>
            </div>
        </div>
        @if (in_array($user_role_id, [1, 2,3,4,5]))

        <a href="{{ route('requisitions.create') }}" class="mirsaige-app-breadcrumbs-btn">
            <i class="fa-solid fa-square-plus"></i> <span class="action-text">Create</span>
        </a>
        @endif
    </div>

    <div class="mirsaige-requisition-table-wrapper">
        <div class="mirsaige-requisition-table-container">
            <table class="mirsaige-requisition-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Remark</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($requisitions as $requisition)
                    <tr>
                        <td data-label="ID">{{ $requisition->id }}</td>
                        <td data-label="User">{{ $requisition->user?->name ?? 'N/A' }}</td>
                        <td data-label="Date">{{ \Carbon\Carbon::parse($requisition->requisition_date)->format('Y-m-d') }}</td>
                        <td data-label="Status">
                            <span class="mirsaige-status-badge mirsaige-status-{{ strtolower($requisition->status) }}">
                                {{ $requisition->status }}
                            </span>
                        </td>
                        <td data-label="Remark">{{ $requisition->remark }}</td>
                        <td data-label="Actions">
                            <div class="mirsaige-requisition-actions">
                                @if (in_array($user_role_id, [1, 2,3,4]))
                                <a href="{{ route('requisitions.show', $requisition->id) }}" class="mirsaige-requisition-action-btn view">
                                    <i class='bx bx-show'></i> <span class="action-text">Show</span>
                                </a>
                                 @endif
                                   @if (in_array($user_role_id, [1, 2,3,]))
                                <span data-bs-toggle="modal" data-bs-target="#edit-{{ $requisition->id }}" class="mirsaige-requisition-action-btn edit">
                                    <i class='bx bx-edit'></i> <span class="action-text">Edit</span>
                                </span>
                                @endif


                                @if ($user_role_id == 1)
                                <form action="{{ route('requisitions.destroy', $requisition->id) }}" method="post" style="display: inline;">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="mirsaige-requisition-action-btn delete">
                                        <i class='bx bx-trash'></i> <span class="action-text">Delete</span>
                                    </button>
                                </form>
                                @endif
                                @if($requisition->status !== "Complete")
                                  @if (in_array($user_role_id, [1, 2,3]))
                                <a href="{{ url('requisition-purchase', $requisition->id) }}" class="mirsaige-requisition-action-btn purchase">
                                    <i class='bx bx-cart'></i> <span class="action-text">Purchase</span>
                                </a>
                                @endif
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
{!! pagination($requisitions) !!}

    <!-- Confirmation Dialog -->
    <div class="mirsaige-confirm-dialog" id="confirmDialog">
        <div class="mirsaige-confirm-content">
            <h3 class="mirsaige-confirm-title">Confirm Deletion</h3>
            <p>Are you sure you want to delete this requisition?</p>
            <div class="mirsaige-confirm-buttons">
                <button class="mirsaige-confirm-btn cancel">Cancel</button>
                <button class="mirsaige-confirm-btn confirm">Delete</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modals -->
@foreach($requisitions as $requisition)
    <div class="modal fade" id="edit-{{ $requisition->id }}" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModal">Edit Requisition</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{ Form::open(['route' => ['requisitions.update', $requisition->id], 'method' => 'PUT', 'files' => true]) }}
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                {{ Form::label('user_id', 'Requester Name', ['class' => 'required']) }}
                                <div class="input-group">
                                    {{ Form::select('user_id',$users->pluck('name','id'),$requisition->user_id, ['class' => 'form-select']) }}
                                </div>
                            </div>
                            <div class="col-6">
                                {{ Form::label('requisition_date', 'Request Date', ['class' => 'required']) }}
                                <div class="input-group">
                                    {{ Form::date('requisition_date', \Carbon\Carbon::parse($requisition->requisition_date)->format('Y-m-d'), ['class' => 'form-control']) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-5">
                        <div class="row">
                            <div class="col-4">
                                {{ Form::label('status', 'Status', ['class' => 'required']) }}
                                <div class="input-group">
                                    {{ Form::select('status',['Pending'=>'Pending','Processing'=>'Processing','Running'=>'Running','Complete'=>'Complete'],$requisition->status, ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="col-4">
                                {{ Form::label('remark', 'Remark', ['class' => 'required']) }}
                                <div class="input-group">
                                    {{ Form::text('remark',$requisition->remark, ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="col-4">
                                {{ Form::label('needed_date', 'Needed Date', ['class' => 'required']) }}
                                <div class="input-group">
                                    {{ Form::date('needed_date',\Carbon\Carbon::parse($requisition->needed_date)->format('Y-m-d'), ['class' => 'form-control']) }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <b>Edit Requisition Item</b>
                    <hr class="mt-2 mb-2" style="width: 30%">
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-md">
                                    <tbody>
                                    <tr>
                                        <th data-width="40" style="width: 40px;">#</th>
                                        <th>Project</th>
                                        <th>Task</th>
                                        <th>Product</th>
                                        <th>Request Qty</th>
                                        <th>Approved Qty</th>
                                        <th class="text-center">Request Unit</th>
                                    </tr>
                                    @php
                                        $sn=0;
                                        $items=[];
                                    @endphp
                                    @foreach($requisition->requisitionItems as $requisitionItem)
                                        <tr>
                                            <td>{{++$sn}}</td>
                                            <td>{{Form::select('items['.$loop->index.'][project_id]',$projects->pluck('name','id'),$requisitionItem->project_id ?? null,['class'=>'form-select'])}}</td>
                                            <td>{{Form::select('items['.$loop->index.'][task_id]',$tasks->pluck('name','id'),$requisitionItem->task_id ?? null,['class'=>'form-select'])}}</td>
                                            <td>{{Form::select('items['.$loop->index.'][product_id]',$products->pluck('name','id'),$requisitionItem->product_id ?? null,['class'=>'form-select'])}}</td>
                                            <td class="text-center">{{Form::text('items['.$loop->index.'][qty]',$requisitionItem->qty ?? null,['class'=>'form-control'])}}</td>
                                            <td class="text-center">{{Form::text('items['.$loop->index.'][approve_qty]',$requisitionItem->approve_qty ?? null,['class'=>'form-control'])}}</td>
                                            <td class="text-center">{{Form::select('items['.$loop->index.'][uom_id]',$units->pluck('name','id'),$requisitionItem->uom_id ?? null,['class'=>'form-select'])}}</td>
                                        </tr>
                                        @php
                                            $items[]=[
                                                'project_id'=> $requisitionItem->project_id ?? null,
                                                'task_id'=> $requisitionItem->task_id ?? null,
                                                'product_id'=> $requisitionItem->product_id ?? null,
                                                'qty'=>$requisitionItem->qty ?? null,
                                                'approve_qty'=>$requisitionItem->approve_qty ?? null,
                                                'uom_id'=>$requisitionItem->uom_id ?? null,
                                                ];
                                        @endphp
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        {{ Form::button('Close', ['class' => 'btn btn-danger m-t-15 weaves-effect', 'data-bs-dismiss' => 'modal']) }}
                        {{ Form::submit('Update', ['class' => 'btn btn-primary m-t-15 weaves-effect']) }}
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endforeach
@endsection

@section('script')
<script>
    // Confirm before delete
    const deleteButtons = document.querySelectorAll('.mirsaige-requisition-action-btn.delete');
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

    // Search functionality
    function search() {
        let search = document.getElementById('search').value.toLowerCase();
        let table = document.querySelector('.mirsaige-requisition-table');
        let tr = table.getElementsByTagName('tr');

        for (i = 0; i < tr.length; i++) {
            let td = tr[i].getElementsByTagName('td');

            for (l = 0; l < td.length; l++) {
                let content = td[l].textContent.toLowerCase();

                if (content.indexOf(search) > -1) {
                    tr[i].style.display = "";
                    tr[i].style.backgroundColor = "rgba(255, 178, 62, 0.05)";
                    break;
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
@endsection