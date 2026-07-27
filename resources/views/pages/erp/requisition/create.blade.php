@extends('layout.erp.app')

@section('style')
<style>
    /* Custom styles for requisitions page */
    .mirsaige-requisition-card {
        background: var(--mirsaige-dark-blue);
        border-radius: var(--mirsaige-radius-lg);
        border: 1px solid rgba(255, 178, 62, 0.2);
        overflow: hidden;
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

 
    .mirsaige-requisition-header {
        background: var(--mirsaige-darker-blue);
        padding: var(--mirsaige-space-md);
        border-bottom: 1px solid rgba(255, 178, 62, 0.1);
    }
    
    .mirsaige-requisition-title {
        color: var(--mirsaige-accent);
        font-weight: 600;
        margin: 0;
        font-size: 1.25rem;
    }
    
    .mirsaige-requisition-body {
        padding: var(--mirsaige-space-md);
    }
    
    .mirsaige-requisition-info {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: var(--mirsaige-space-md);
        margin-bottom: var(--mirsaige-space-lg);
    }
    
    .mirsaige-info-card {
        background: var(--mirsaige-darker-blue);
        border-radius: var(--mirsaige-radius-md);
        padding: var(--mirsaige-space-md);
        border: 1px solid rgba(255, 178, 62, 0.1);
    }
    
    .mirsaige-info-title {
        color: var(--mirsaige-accent);
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: var(--mirsaige-space-xs);
        font-weight: 600;
    }
    
    .mirsaige-info-content {
        color: var(--mirsaige-white);
        font-size: 0.95rem;
    }
    
    .mirsaige-form-group {
        margin-bottom: var(--mirsaige-space-md);
    }
    
    .mirsaige-form-label {
        color: var(--mirsaige-text);
        font-size: 0.9rem;
        margin-bottom: var(--mirsaige-space-2xs);
        display: block;
        font-weight: 500;
    }
    
    .mirsaige-form-control {
        width: 100%;
        background: var(--mirsaige-darker-blue);
        border: 1px solid rgba(255, 178, 62, 0.2);
        border-radius: var(--mirsaige-radius-md);
        padding: var(--mirsaige-space-xs) var(--mirsaige-space-sm);
        color: var(--mirsaige-white);
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }
    
    .mirsaige-form-control:focus {
        border-color: var(--mirsaige-accent);
        box-shadow: 0 0 0 3px rgba(255, 178, 62, 0.2);
        outline: none;
    }
    
    .mirsaige-table-container {
        overflow-x: auto;
        margin-bottom: var(--mirsaige-space-md);
    }
    
    .mirsaige-requisition-table {
        width: 100%;
        border-collapse: collapse;
        color: var(--mirsaige-text);
        font-size: 0.9rem;
    }
    
    .mirsaige-requisition-table th {
        background: var(--mirsaige-darker-blue);
        color: var(--mirsaige-accent);
        font-weight: 600;
        padding: var(--mirsaige-space-sm);
        text-align: left;
        border-bottom: 1px solid rgba(255, 178, 62, 0.1);
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .mirsaige-requisition-table td {
        padding: var(--mirsaige-space-sm);
        border-bottom: 1px solid rgba(255, 178, 62, 0.1);
        vertical-align: middle;
    }
    
    .mirsaige-requisition-table tr:hover td {
        background: rgba(255, 178, 62, 0.05);
    }
    
    .mirsaige-action-btn {
        background: var(--mirsaige-accent);
        color: var(--mirsaige-dark);
        border: none;
        border-radius: var(--mirsaige-radius-md);
        padding: var(--mirsaige-space-2xs) var(--mirsaige-space-sm);
        font-size: 0.85rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }
    
    .mirsaige-action-btn:hover {
        opacity: 0.9;
        transform: translateY(-1px);
    }
    
    .mirsaige-secondary-btn {
        background: transparent;
        color: var(--mirsaige-text);
        border: 1px solid rgba(255, 178, 62, 0.3);
    }
    
    .mirsaige-secondary-btn:hover {
        background: rgba(255, 178, 62, 0.1);
        color: var(--mirsaige-accent);
    }
    
    .mirsaige-danger-btn {
        background: var(--mirsaige-danger);
        color: white;
    }
    
    .mirsaige-form-row {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: var(--mirsaige-space-sm);
        margin-bottom: var(--mirsaige-space-sm);
    }
    
    .mirsaige-remark-box {
        width: 100%;
        min-height: 100px;
        background: var(--mirsaige-darker-blue);
        border: 1px solid rgba(255, 178, 62, 0.2);
        border-radius: var(--mirsaige-radius-md);
        padding: var(--mirsaige-space-sm);
        color: var(--mirsaige-white);
        font-size: 0.9rem;
        resize: vertical;
    }
    
    .mirsaige-remark-box:focus {
        border-color: var(--mirsaige-accent);
        box-shadow: 0 0 0 3px rgba(255, 178, 62, 0.2);
        outline: none;
    }
    
    .mirsaige-footer-actions {
        display: flex;
        justify-content: flex-end;
        gap: var(--mirsaige-space-sm);
        margin-top: var(--mirsaige-space-lg);
        padding-top: var(--mirsaige-space-md);
        border-top: 1px solid rgba(255, 178, 62, 0.1);
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .mirsaige-requisition-info {
            grid-template-columns: 1fr;
        }
        
        .mirsaige-form-row {
            grid-template-columns: 1fr;
        }
        
        .mirsaige-footer-actions {
            flex-direction: column;
        }
        
        .mirsaige-footer-actions .mirsaige-action-btn {
            width: 100%;
        }
    }
    
    @media (max-width: 576px) {
        .mirsaige-requisition-body {
            padding: var(--mirsaige-space-sm);
        }
        
        .mirsaige-info-card {
            padding: var(--mirsaige-space-sm);
        }
        
        .mirsaige-requisition-table {
            font-size: 0.8rem;
        }
        
        .mirsaige-requisition-table th,
        .mirsaige-requisition-table td {
            padding: var(--mirsaige-space-xs);
        }
    }
</style>
@endsection

@section('page')
<div class="mirsaige-app-main">
        <div>
            <div class="mirsaige-app-breadcrumbs">
                <div class="mirsaige-app-breadcrumb">
                    <a href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-house"></i> Home</a>
                </div>
                <div class="mirsaige-app-breadcrumb divider">
                   <i class="fa-solid fa-angle-right"></i>
                </div>
                <div class="mirsaige-app-breadcrumb">
                    <a href="{{ route('requisitions.index') }}">Requisitions</a>
                </div>
                <div class="mirsaige-app-breadcrumb divider">
                    <i class="fa-solid fa-angle-right"></i>
                </div>
                <div class="mirsaige-app-breadcrumb">
                    <a href="{{ route('requisitions.create') }}" class="active">Create Department</a>
                </div>
            </div>
        </div>
        

    </div>

    <form action="/requisitions" method="post" id="requisitionForm">
        @method('POST')
        @csrf
        
        <div class="mirsaige-requisition-card">
            <div class="mirsaige-requisition-header">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <h2 class="mirsaige-requisition-title">Requisition Form</h2>
                    <a href="{{ url('/requisitions') }}" class="mirsaige-action-btn mirsaige-secondary-btn">
                        <i class="fas fa-list me-2"></i> Manage Requisitions
                    </a>
                </div>
            </div>
            
            <div class="mirsaige-requisition-body">
                <!-- Company and User Information -->
                <div class="mirsaige-requisition-info">
                    <div class="mirsaige-info-card">
                        <div class="mirsaige-info-title">Company Information</div>
                        <div class="mirsaige-info-content">
                            <strong>Mirsaige-PMC</strong><br>
                            House-30, Level-6<br>
                            <b>Gareeb-E-Nawaz Avenue</b><br>
                            Dhaka, Bangladesh<br>
                            Mobile: 01707987202<br>
                            <b>www.mirsaige-bd.com</b><br>
                            <b>Email: info@mirsaige-bd.com</b>
                        </div>
                    </div>
                    
                    <div class="mirsaige-info-card">
                        <div class="mirsaige-info-title">Requestor Information</div>
                        <div class="mirsaige-info-content">
                            @if (session('sess_user_id'))
                                <strong>User ID:</strong> {{ session('sess_user_id') }}<br>
                                <strong>Name:</strong> {{ session('sess_user_name') }}<br>
                                <strong>Phone:</strong> <span id="user-phone">{{ session('sess_user_phone') ?? 'Not available' }}</span>
                            @else
                                <span class="text-muted">No user session found</span>
                            @endif
                            
                            <div class="mirsaige-form-group mt-3">
                                <label class="mirsaige-form-label" for="needed_date">Needed Date</label>
                                <input type="date" class="mirsaige-form-control" id="needed_date" name="needed_date" style="width: 100%;">
                            </div>
                        </div>
                    </div>
                    
                    <div class="mirsaige-info-card">
                        <div class="mirsaige-info-title">Requisition Details</div>
                        <div class="mirsaige-info-content">
                            <div class="mirsaige-form-group">
                                <label class="mirsaige-form-label" for="requisition_date">Request Date</label>
                                <input type="text" class="mirsaige-form-control" id="requisition_date" name="requisition_date" value="{{ date('Y-m-d') }}" readonly>
                            </div>
                            
                            <div class="mirsaige-form-group">
                                <label class="mirsaige-form-label" for="status">Status</label>
                                <select class="mirsaige-form-control" id="status" name="status">
                                    <option value="Pending">Pending</option>
                                    <option value="Processing">Processing</option>
                                    <option value="Running">Running</option>
                                    <option value="Complete">Complete</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                

                
                <!-- Add Item Form -->
                <div class="mirsaige-form-row">
                    <div class="mirsaige-form-group">
                        <label class="mirsaige-form-label" for="project_id">Project</label>
                        <select class="mirsaige-form-control" id="project_id" name="project_id">
                             <option value="">select-</option>
                            @foreach ($projects as $project)
                           
                                <option value="{{ $project->id }}">{{ $project->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="mirsaige-form-group">
                        <label class="mirsaige-form-label" for="task_id">Task</label>
                        <select class="mirsaige-form-control" id="task_id" name="task_id">
                             <option value="">select-</option>
                            @foreach ($tasks as $task)
                           
                                <option value="{{ $task->id }}">{{ $task->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="mirsaige-form-group">
                        <label class="mirsaige-form-label" for="product_id">Product</label>
                        <select class="mirsaige-form-control" id="product_id" name="product_id">
                             <option value="">select-</option>
                            @foreach ($products as $product)
                           
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="mirsaige-form-group">
                        <label class="mirsaige-form-label" for="qty">Quantity</label>
                       
                        <input type="number" class="mirsaige-form-control" id="qty" name="qty" min="1" value="1">
                    </div>
                    
                    <div class="mirsaige-form-group">
                        <label class="mirsaige-form-label" for="uom_id">Unit of Measure</label>
                        <select class="mirsaige-form-control" id="uom_id" name="uom_id">
                             <option value="">select-</option>
                            @foreach ($uoms as $uom)
                           
                                <option value="{{ $uom->id }}">{{ $uom->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="mirsaige-form-group" style="display: flex; align-items: flex-end;">
                        <button type="button" id="btnAddToCart" class="mirsaige-action-btn" style="width: 100%;">
                            <i class="fas fa-plus-circle me-2"></i> Add Item
                        </button>
                    </div>
                </div>
                                <!-- Items Table -->
                <div class="mirsaige-table-container">
                    <table class="mirsaige-requisition-table">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Project</th>
                                <th>Task</th>
                                <th>Product</th>
                                <th>Qty</th>
                                <th>UoM</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="items">
                            <!-- Items will be populated by JavaScript -->
                        </tbody>
                    </table>
                </div>
                
                <div class="mirsaige-form-group">
                    <label class="mirsaige-form-label" for="remark">Remark</label>
                    <textarea class="mirsaige-remark-box" id="remark" name="remark" placeholder="Add any additional remarks here..."></textarea>
                </div>
                
                <div class="mirsaige-footer-actions">
                    <button type="button" id="clearAll" class="mirsaige-action-btn mirsaige-danger-btn">
                        <i class="fas fa-trash me-2"></i> Clear All
                    </button>
                    <button type="button" id="btnProcessOrder" class="mirsaige-action-btn">
                        <i class="fas fa-paper-plane me-2"></i> Send Requisition
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    $(function() {
        // Initialize the cart display
        printCart();

        // Process requisition order
        $("#btnProcessOrder").on("click", function(e) {
            e.preventDefault();

            // Validate required fields
            if (!validateForm()) {
                return;
            }

            let user_id = "{{ session('sess_user_id') }}";
            var token = $("input[name='_token']").val();
            var method = $("input[name='_method']").val();

            let requisition_date = $("#requisition_date").val();
            let needed_date = $("#needed_date").val();
            let status = $("#status").val();
            let remark = $("#remark").val();

            let requisition = JSON.parse(localStorage.getItem("cart")) || [];

            if (requisition.length === 0) {
                showNotification("Please add at least one item to the requisition", "error");
                return;
            }

            // Show loading state
            $(this).prop('disabled', true).html('<i class="fas fa-spinner fa-spin me-2"></i> Processing...');

            $.ajax({
                url: "{{ url('requisitions') }}",
                type: "POST",
                data: {
                    _token: token,
                    _method: method,
                    'user_id': user_id,
                    'requisition_date': requisition_date,
                    'needed_date': needed_date,
                    'status': status,
                    'remark': remark,
                    'requisition': requisition
                },
                success: function(res) {
                    clearCart();
                    $("#items").html("");
                    showNotification("Requisition submitted successfully!", "success");
                    setTimeout(function() {
                        window.location.href = "{{ route('requisitions.index') }}";
                    }, 1500);
                },
                error: function(xhr) {
                    console.error(xhr);
                    showNotification("Error submitting requisition. Please try again.", "error");
                    $("#btnProcessOrder").prop('disabled', false).html('<i class="fas fa-paper-plane me-2"></i> Send Requisition');
                }
            });
        });

        // Add item to cart
        $("#btnAddToCart").on("click", function() {
            AddtoCart();
        });

        // Remove item from cart
        $("#items").on("click", ".delete", function() {
            let id = $(this).data("id");
            delItem(id);
            printCart();
        });

        // Clear all items
        $("#clearAll").on("click", function() {
            if (confirm("Are you sure you want to clear all items?")) {
                clearCart();
                printCart();
            }
        });

        // Add item to cart function
        function AddtoCart() {
            let project_id = $("#project_id").val();
            let name = $("#project_id option:selected").text();
            let task_id = $("#task_id").val();
            let ptname = $("#task_id option:selected").text();
            let product_id = $("#product_id").val();
            let mname = $("#product_id option:selected").text();
            let qty = $("#qty").val();
            let uom_id = $("#uom_id").val();
            let uname = $("#uom_id option:selected").text();

            // Validate quantity
            if (!qty || qty <= 0) {
                showNotification("Please enter a valid quantity", "error");
                return;
            }

            let item = {
                'project_id': project_id,
                'name': name,
                'task_id': task_id,
                'ptname': ptname,
                'product_id': product_id,
                'mname': mname,
                'qty': qty,
                'uom_id': uom_id,
                'uname': uname
            };
            
            save(item);
            printCart();
            
            // Reset quantity field
            $("#qty").val(1);
            
            showNotification("Item added to requisition", "success");
        }

        // Print cart function
        function printCart() {
            let cart = getCart();
            let sn = 1;
            let $bill = "";
            
            if (cart.length === 0) {
                $bill = '<tr><td colspan="7" class="text-center">No items added to requisition</td></tr>';
            } else {
                $.each(cart, function(i, item) {
                    let $html = "<tr>";
                    $html += "<td>" + sn + "</td>";
                    $html += "<td>" + item.name + "</td>";
                    $html += "<td>" + item.ptname + "</td>";
                    $html += "<td>" + item.mname + "</td>";
                    $html += "<td>" + item.qty + "</td>";
                    $html += "<td>" + item.uname + "</td>";
                    $html += "<td>";
                    $html += '<button type="button" class="mirsaige-action-btn mirsaige-danger-btn delete" data-id="' + item.product_id + '" style="padding: 4px 8px; font-size: 0.8rem;">';
                    $html += '<i class="fas fa-trash"></i>';
                    $html += '</button>';
                    $html += "</td>";
                    $html += "</tr>";
                    $bill += $html;
                    sn++;
                });
            }
            
            $("#items").html($bill);
        }

        // Form validation
        function validateForm() {
            let needed_date = $("#needed_date").val();
            
            if (!needed_date) {
                showNotification("Please select a needed date", "error");
                $("#needed_date").focus();
                return false;
            }
            
            return true;
        }

        // Notification function
        function showNotification(message, type) {
            // Remove any existing notifications
            $(".mirsaige-notification").remove();
            
            let bgColor = type === "success" ? "var(--mirsaige-success)" : "var(--mirsaige-danger)";
            
            let notification = $('<div class="mirsaige-notification" style="position: fixed; top: 20px; right: 20px; padding: 12px 20px; background: ' + bgColor + '; color: white; border-radius: 6px; z-index: 9999; box-shadow: 0 4px 12px rgba(0,0,0,0.15); max-width: 300px; animation: slideIn 0.3s ease;">' + message + '</div>');
            
            $("body").append(notification);
            
            setTimeout(function() {
                notification.fadeOut(300, function() {
                    $(this).remove();
                });
            }, 3000);
        }

        // Add CSS for notification animation
        if (!$('#notification-style').length) {
            $('head').append('<style id="notification-style">@keyframes slideIn { from { transform: translateX(100%); opacity: 0; } to { transform: translateX(0); opacity: 1; } }</style>');
        }
    });
</script>
@endsection