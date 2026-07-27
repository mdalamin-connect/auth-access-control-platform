@extends('layout.erp.app')

@section('style')
<style>
    .delete {
        background-color: #ff5b5b;
        color: white;
        border: none;
        padding: 2px 10px;
        border-radius: 3px;
        cursor: pointer;
    }
    #btnAddToCart, #clearAll, #btnProcessOrder {
        cursor: pointer;
    }
    #btnAddToCart {
        background-color: #28a745;
        color: white;
        border: none;
        padding: 5px 15px;
        border-radius: 3px;
    }
    #clearAll {
        background-color: #dc3545;
        color: white;
        border: none;
        padding: 5px 15px;
        border-radius: 3px;
    }
    #btnProcessOrder {
        padding: 8px 20px;
    }
</style>
@endsection

@section('page')
<form action="/store-use-product" method="post">
    @method('POST')
    @csrf

    <div style="border:2px solid #00a7c7; box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- Main content -->
                        <div class="invoice p-3 mb-3">
                            <!-- title row -->
                            <div class="row">
                                <div class="col-12">
                                    <h2 style="text-align: right;">
                                        <a href="{{route('use_product')}}" type="button" class="btn btn mt-1"
                                           style="background-color: #057388;color:aliceblue">Manage Used & Damaged Product
                                        </a>
                                    </h2>
                                </div>
                                <hr style="border: 5px; color:#00a7c7">
                            </div>

                            <!-- info row -->
                            <div class="row invoice-info" style="font-size:16px;">
                                <div class="col-sm-4 invoice-col">
                                    <address>
                                        <strong>Mirsaige-PMC</strong><br>
                                        House-30,Level-6<br>
                                        <b>Gareeb-E-Nawaz Avenue</b><br>
                                        Dhaka, Bangladesh<br>
                                        Mobile: 01707987202 <br>
                                        <b>www.mirsaige-bd.com</b> <br>
                                        <b>Email: info@mirsaige-bd.com</b>
                                    </address>
                                </div>

                                <div class="col-sm-4 invoice-col">
                                    <b>User</b><br>
                                    <address>
                                        <select id="user_id" name="user_id" style="width: 55%; padding: 6px; border-radius: 5px;">
                                            @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                        <div id="user-phone"></div>
                                    </address>
                                </div>

                                <div class="col-4 invoice-col">
                                    <div style="display: flex; flex-direction: column; align-items: flex-end; margin-top: 10px;">
                                        <label for="status" style="margin-bottom: 5px;"><b>Status:</b></label>
                                        {{Form::text('status',null,['class'=>'form-control','id'=>'status'])}}
                                    </div>
                                </div>
                            </div>

                            <!-- Table row -->
                            <div class="row" style="font-size:medium;margin-top:30px;background-color:#00a7c7;">
                                <div class="col-12 table-responsive">
                                    <table class="table table-striped" style="color:aliceblue">
                                        <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Project</th>
                                            <th>Task</th>
                                            <th>Product</th>
                                            <th>Qty</th>
                                            <th>UoM</th>
                                            <th></th>
                                            <th><input type="button" id="clearAll" value="Clear" class="btn btn-danger btn-sm" /></th>
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <th>
                                                <select id="project_id" name="project_id" style="width: 150px;">
                                                    @foreach ($projects as $project)
                                                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                                                    @endforeach
                                                </select>
                                            </th>
                                            <th>
                                                <select id="task_id" name="task_id" style="width: 150px;">
                                                    @foreach ($tasks as $task)
                                                    <option value="{{ $task->id }}">{{ $task->name }}</option>
                                                    @endforeach
                                                </select>
                                            </th>
                                            <th>
                                                <select id="product_id" name="product_id" style="width: 150px;">
                                                    @foreach ($products as $product)
                                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                                    @endforeach
                                                </select>
                                            </th>
                                            <th><input type="number" id="qty" name="qty" style="width: 150px;" min="1" value="1" /></th>
                                            <th>
                                                <select id="uom_id" name="uom_id" style="width: 150px;">
                                                    @foreach ($uoms as $uom)
                                                    <option value="{{ $uom->id }}">{{ $uom->name }}</option>
                                                    @endforeach
                                                </select>
                                            </th>
                                            <th></th>
                                            <th><input type="button" id="btnAddToCart" value=" + " class="btn btn-success btn-sm" /></th>
                                        </tr>
                                        </thead>
                                        <tbody id="items">
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="row no-print" style="font-size: medium;margin-top:20px">
                                <div class="col-12">
                                    <div style="float: right;">
                                        <button type="button" id="btnProcessOrder" class="btn btn float-right"
                                                style="background-color:#00a7c7;color:aliceblue">
                                            <i class="far fa-credit-card"></i> Save
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(function() {
        // Initialize cart if not exists
        if(localStorage.getItem("cart") === null) {
            localStorage.setItem("cart", JSON.stringify([]));
        }

        printCart();

        $("#btnProcessOrder").on("click", function(e) {
            e.preventDefault();

            let user_id = $("#user_id").val();
            let status = $("#status").val();
            let useProducts = JSON.parse(localStorage.getItem("cart"));

            if(useProducts.length === 0) {
                alert("Please add at least one product");
                return;
            }

            $.ajax({
                url: "{{ route('store_use_product') }}",
                type: "POST",
                data: {
                    _token: $("input[name='_token']").val(),
                    _method: $("input[name='_method']").val(),
                    'user_id': user_id,
                    'status': status,
                    'products': useProducts
                },
                success: function(res) {
                    alert("Product usage recorded successfully!");
                    clearCart();
                    $("#items").html("");
                    window.location.href = "{{ route('use_product') }}";
                },
                error: function(xhr) {
                    alert("Error: " + xhr.responseText);
                }
            });
        });

        $("#user_id").on("change", function() {
            $.ajax({
                url: "{{ url('getuser') }}",
                type: "GET",
                data: {
                    "id": $(this).val()
                },
                success: function(res) {
                    let user = JSON.parse(res);
                    $("#user-phone").html("<b>Mobile:</b> " + user.phone);
                }
            });
        });

        $("#btnAddToCart").on("click", function() {
            AddtoCart();
        });

        $("#items").on("click", ".delete", function() {
            let id = $(this).data("id");
            delItem(id);
            printCart();
        });

        $("#clearAll").on("click", function() {
            clearCart();
            printCart();
        });

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

            if(qty <= 0) {
                alert("Quantity must be greater than 0");
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
            $("#qty").val(1); // Reset quantity to 1 after adding
        }

        // Cart management functions
        function getCart() {
            return JSON.parse(localStorage.getItem("cart")) || [];
        }

        function save(item) {
            let cart = getCart();
            cart.push(item);
            localStorage.setItem("cart", JSON.stringify(cart));
        }

        function delItem(id) {
            let cart = getCart();
            let newCart = cart.filter(item => item.project_id != id);
            localStorage.setItem("cart", JSON.stringify(newCart));
        }

        function clearCart() {
            localStorage.setItem("cart", JSON.stringify([]));
        }

        function printCart() {
            let cart = getCart();
            let sn = 1;
            let $bill = "";
            
            if(cart.length === 0) {
                $bill = "<tr><td colspan='8' style='text-align:center'>No items added</td></tr>";
            } else {
                $.each(cart, function(i, item) {
                    let $html = "<tr>";
                    $html += "<td>" + sn + "</td>";
                    $html += "<td>" + item.name + "</td>";
                    $html += "<td>" + item.ptname + "</td>";
                    $html += "<td>" + item.mname + "</td>";
                    $html += "<td>" + item.qty + "</td>";
                    $html += "<td>" + item.uname + "</td>";
                    $html += "<td></td>";
                    $html += "<td><input type='button' class='delete' data-id='" + item.project_id + "' value='-'/></td>";
                    $html += "</tr>";
                    $bill += $html;
                    sn++;
                });
            }
            
            $("#items").html($bill);
        }
    });
</script>
@endsection