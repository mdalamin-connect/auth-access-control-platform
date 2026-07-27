@extends('layout.erp.app')

@section('style')
@endsection


@section('page')
    <form id="requisitionForm" action="{{ route('requisitions.update', $requisition) }}" method="post"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')


        <div
            style="border:2px solid #00a7c7;box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;">


            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">



                            <!-- Main content -->
                            <div class="invoice p-3 mb-3">
                                <!-- title row -->
                                <div class="row">
                                    <div class="col-6">
                                        <h2 style="text-align: left;">

                                            <button type="button" class="btn btn mt-1"
                                                style="background-color: #00a7c7;color:aliceblue">Requisition
                                                Form</button><br>

                                        </h2>
                                    </div>
                                    <div class="col-6">
                                        <h2 style="text-align: right;">

                                            <a href="{{ url('/requisitions') }}" type="button" class="btn btn mt-1"
                                                style="background-color: #057388;color:aliceblue">Manage Requisition
                                            </a>

                                        </h2>
                                    </div>
                                    <hr style="border: 5px; color:#00a7c7">
                                    <!-- /.col -->
                                </div>

                                <!-- info row -->
                                <div class="row invoice-info" style="font-size:16px;">
                                    <div class="col-sm-4 invoice-col">

                                        <address>
                                            <strong>Mirsaige-PMC</strong><br>
                                            House-30,Level-6<br>
                                            <b> Gareeb-E-Nawaz Avenue</b><br>
                                            Dhaka, Bangladesh<br>
                                            Mobile: 01707987202 <br>
                                            <b> www.mirsaige-bd.com</b> <br>
                                            <b>Email: info@mirsaige-bd.com</b>
                                        </address>
                                    </div>
                                    <!-- /.col -->

                                    <div class="col-sm-4 invoice-col">
                                        <b>Requestor</b><br>

                                        <address>
                                            <select id="user_id" name="user_id"
                                                style="width: 55%; padding: 6px; border-radius: 5px;" readonly>
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}" readonly>{{ $user->name }}</option>
                                                @endforeach
                                            </select>

                                            <div id="user-phone"></div>

                                        </address>

                                    </div>
                                    <!-- /.col -->
                                    <div class="col-4 invoice-col">
                                        <div style="display: flex; flex-direction: column; align-items: flex-end;">
                                            <label for="requisition_date" style="margin-bottom: 5px;"><b>Date:</b></label>
                                            <input type="text" id="requisition_date" name="requisition_date"
                                                style="width: 170px; border-radius: 5px; border: 1px solid black; text-align: left; padding-left: 4px;"
                                                value="{{ date('Y-m-d') }}">
                                        </div>
                                        <div
                                            style="display: flex; flex-direction: column; align-items: flex-end; margin-top: 10px;">
                                            <label for="status" style="margin-bottom: 5px;"><b>Status:</b></label>
                                            <input type="text" id="status" name="status"
                                                style="width: 170px; border-radius: 5px; border: 1px solid black; text-align: left; padding-left: 4px;"
                                                value="{{ $requisition->status }}">
                                        </div>
                                    </div>
                                    <!-- /.row -->

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



                                                        <th><input type="button" id="clearAll" value="Clear" /></th>
                                                    </tr>
                                                    <tr>
                                                        <th></th>
                                                        <th>
                                                            <select id="project_id" name="project_id" style="width: 150px;">
                                                                @foreach ($projects as $project)
                                                                    <option value="{{ $project->id }}">{{ $project->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </th>

                                                        <th>

                                                            <select id="task_id" name="task_id" style="width: 150px;">
                                                                @foreach ($tasks as $task)
                                                                    <option value="{{ $task->id }}">{{ $task->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>

                                                        </th>
                                                        <th>
                                                            <select id="product_id" name="product_id" style="width: 150px;">
                                                                @foreach ($products as $product)
                                                                    <option value="{{ $product->id }}">
                                                                        {{ $product->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>


                                                        </th>
                                                        <th><input type="text" id="qty" name="qty"
                                                                style="width: 150px;" /></th>

                                                        <th>
                                                            <select id="uom_id" name="uom_id" style="width: 150px;">
                                                                @foreach ($uoms as $uom)
                                                                    <option value="{{ $uom->id }}">
                                                                        {{ $uom->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </th>
                                                        <th></th>
                                                        <th><input type="button" id="btnAddToCart" value=" + " /></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="items">

                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->

                                    <div class="row" style="margin-top: 30px;font-size:medium">
                                        <!-- accepted payments column -->
                                        <div class="col-6">
                                            <strong>Remark</strong><br>
                                            <input type="text" id="remark" value="{{ $requisition->remark }}"
                                                name="remark"
                                                style="width: 150px; height:50px; padding-left:4px; border-radius: 5px; border: 1px solid black;" />
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-6">


                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->

                                    <!-- this row will not appear when printing -->
                                    <div class="row no-print" style="font-size: medium;margin-top:20px">
                                        <div class="col-12">
                                            <!-- <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-success"><i class="fas fa-print"></i> Print</a> -->
                                            <div style="float: right;">
                                                <button type="button" id="btnProcessOrder" class="btn btn float-right"
                                                    style="background-color:#00a7c7;color:aliceblue"><i
                                                        class="far fa-credit-card"></i>Save</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.invoice -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
            <script>
                $(function() {

                    printCart();

                    $("#btnProcessOrder").on("click", function(e) {

                        e.preventDefault();

                        let user_id = $("#user_id").val();
                        console.log(user_id)
                        var token = $("input[name='_token']").val();

                        var method = $("input[name='_method']").val();

                        let requisition_date = $("#requisition_date").val();


                        let status = $("#status").val();


                        let remark = $("#remark").val();


                        let requisition = JSON.parse(localStorage.getItem("cart"));

                        $.ajax({

                            url: "{{ route('requisitions.update', $requisition->id) }}",
                            type: "POST",
                            data: {
                                _token: token,
                                _method: 'PUT',
                                'user_id': user_id,
                                'requisition_date': requisition_date,
                                'status': status,
                                'remark': remark,
                                'requisition': requisition
                            },
                            success: function(res) {
                                clearCart();
                                $("#items").html("");
                                window.location.href = "{{ route('requisitions.index') }}";
                            }

                        });
                    });


                    $("#user_id").on("change", function() {

                        $.ajax({
                            url: "<?php echo url('getuser'); ?>",
                            type: "GET",
                            data: {
                                "id": $(this).val()
                            },
                            success: function(res) {
                                console.log(res);
                                let user = JSON.parse(res);
                                $("#user-phone").html("<b>Mobile:</b>" + user.phone);
                            }
                        });

                    });



                    $("#btnAddToCart").on("click", function() {

                        AddtoCart();

                    })

                    $("#items").on("click", ".delete", function() {
                        let id = $(this).data("id");
                        delItem(id);
                        printCart();

                    })

                    $("#clearAll").on("click", function() {
                        clearCart();
                        printCart();
                    })

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
                        }
                        save(item);
                        printCart();
                    }

                    function printCart() {

                        let cart = getCart();
                        let sn = 1;
                        let $bill = "";
                        $.each(cart, function(i, item) {


                            let $html = "<tr>";
                            $html += "<td>";
                            $html += sn;
                            $html += "</td>";
                            $html += "<td>";
                            $html += item.name;
                            $html += "</td>";
                            $html += "<td data-field='project_task'>";
                            $html += item.ptname;
                            $html += "</td>";

                            $html += "<td data-field='product'>";
                            $html += item.mname;
                            $html += "</td>";
                            $html += "<td data-field='qty'>";
                            $html += item.qty;
                            $html += "</td>";
                            $html += "<td data-field='uom'>";
                            $html += item.uname;
                            $html += "</td>";
                            $html += "<td>";

                            $html += "</td>";
                            $html += "<td>";
                            $html += "<input type='button' class='delete' data-id='" + item.project_id +
                                "' value='-'/>";
                            $html += "</td>";




                            $html += "</tr>";
                            $bill += $html;
                            sn++;
                        });

                        $("#items").html($bill);

                    }


                });
            </script>

    </form>
    </div>
@endsection
