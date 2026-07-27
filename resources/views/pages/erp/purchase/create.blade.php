@extends('layout.erp.app')

@section('style')
<style>
    /* Override colors for visibility - Same as requisition-purchase page */
    .invoice-info,
    .invoice-info address,
    .invoice-info strong,
    .invoice-info b {
        color: rgba(255, 178, 62, 0.9) !important;
    }

    .table,
    .table th,
    .table td {
        color: rgba(255, 178, 62, 0.9) !important;
    }

    label,
    .form-label,
    strong {
        color: rgba(255, 178, 62, 0.9) !important;
    }

    .table-responsive th,
    .table-responsive td {
        color: rgba(255, 178, 62, 0.9) !important;
    }

    /* Form controls styling with your color */
    .form-control,
    .form-select {
        border: 1px solid rgba(255, 178, 62, 0.2) !important;
        background-color: rgba(0, 0, 0, 0.3) !important;
        color: rgba(255, 255, 255, 0.9) !important;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: rgba(255, 178, 62, 0.4) !important;
        box-shadow: 0 0 0 0.2rem rgba(255, 178, 62, 0.2) !important;
    }

    /* Textarea styling */
    textarea {
        color: rgba(255, 178, 62, 0.9) !important;
        background-color: rgba(0, 0, 0, 0.3) !important;
        border: 1px solid rgba(255, 178, 62, 0.2) !important;
    }

    /* Readonly fields */
    .form-control[readonly] {
        background-color: rgba(255, 178, 62, 0.1) !important;
        color: rgba(255, 178, 62, 0.9) !important;
    }

    /* Button styling */
    .btn {
        color: rgba(255, 178, 62, 0.9) !important;
    }

    /* Headers and titles */
    h2 {
        color: rgba(255, 178, 62, 0.9) !important;
    }

    /* Input fields in table */
    input[type="text"], 
    select {
        border: 1px solid rgba(255, 178, 62, 0.2) !important;
        background-color: rgba(0, 0, 0, 0.3) !important;
        color: rgba(255, 255, 255, 0.9) !important;
        border-radius: 5px !important;
        padding: 6px !important;
    }

    /* Table styling */
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(255, 178, 62, 0.05) !important;
    }

    /* Button colors */
    input[type="button"] {
        border: 1px solid rgba(255, 178, 62, 0.3) !important;
        border-radius: 5px !important;
        padding: 6px 12px !important;
        cursor: pointer !important;
    }
</style>
@endsection


@section('page')
    <form action="/purchases" method="post">
        @method('POST')
        @csrf

        <div style="border:4px solid #2f5a63; box-shadow: rgba(245, 214, 214, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;">
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

                                            <a href="{{ url('/purchases') }}" type="button" class="btn btn mt-1"
                                               style="background-color: #057388;color:aliceblue">Manage Purchase
                                            </a>

                                        </h2>
                                    </div>
                                    <hr style="border: 5px; color:#00a7c7">
                                    <!-- /.col -->
                                </div>

                                <!-- info row -->
                                <div class="row invoice-info" style="font-size:16px;">
                                    <div class="col-sm-4 invoice-col">
                                        From
                                        <address>
                                            <strong>Mirsaige-PMC</strong><br>
                                            House-30,Level-6<br>
                                            Gareeb-E-Nawaz Avenue<br>
                                            Dhaka, Bangladesh<br>
                                            Mobile: 01707987202 <br>
                                            <b> www.mirsaige-bd.com</b> <br>
                                            Email: info@mirsaige-bd.com
                                        </address>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col">

                                        <label for="supplier_id"
                                               style="display: block; margin-bottom: 5px;"><b>Supplier:</b></label>
                                        <select id="supplier_id" name="supplier_id"
                                                style="width: 100%; padding: 6px; border-radius: 5px;">
                                            @foreach ($suppliers as $supplier)
                                                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                            @endforeach
                                        </select>


                                        <div id="supplier-phone"></div>
                                        </address>
                                    </div>

                                    <div class="col-sm-4 invoice-col" style="text-align: right;">

                                        <div style="display: flex; flex-direction: column; align-items: flex-end;">
                                            <label for="purchase_date" style="margin-bottom: 5px;"><b>Purchase
                                                    Date:</b></label>
                                            <input type="text" id="purchase_date" name="purchase_date"
                                                   style="width: 150px; border-radius: 5px; border: 1px solid black; text-align: right; padding-right: 4px;"
                                                   value="<?php echo date('Y-m-d'); ?>">
                                        </div>
                                        <div
                                            style="display: flex; flex-direction: column; align-items: flex-end; margin-top: 10px;">
                                            <label for="delivery_date" style="margin-bottom: 5px;"><b>Delivery
                                                    Date:</b></label>
                                            <input type="text" id="delivery_date" name="delivery_date"
                                                   style="width: 150px; border-radius: 5px; border: 1px solid black; text-align: right; padding-right: 4px;"
                                                   value="<?php echo date('Y-m-d'); ?>">
                                        </div>
                                        <div style="margin-top: 10px; text-align:-webkit-right;">
                                            <label for="shipping_address" class="form-label"><b>Shipping
                                                    Address:</b></label>
                                            <textarea class="form-control" name="shipping_address" id="shipping_address" rows="1"
                                                      style="height:40px; width:150px; border-radius: 5px; border: 1px solid black;"></textarea>
                                        </div>
                                    </div>


                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <!-- Table row -->
                                <div class="row" style="font-size:medium; margin-top:40px;">
                                    <div class="col-12 table-responsive">
                                        <table class="table table-striped" style="color:aliceblue">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Project</th>
                                                    <th>Product</th>
                                                    <th>Price</th>
                                                    <th>Qty</th>
                                                    <th>Uom</th>
                                                    <th>Discount %</th>
                                                    <th>Subtotal</th>
                                                    <th><input type="button" id="clearAll" value="Clear"
                                                            style="background-color: rgb(231, 95, 95)" /></th>
                                                </tr>
                                                <tr>
                                                    <th></th>
                                                    <th>
                                                        <select id="project_id" name="project_id"
                                            style="width: 150px;">
                                            @foreach ($projects as $project)
                                                <option value="{{ $project->id }}">{{ $project->name }}</option>
                                            @endforeach
                                        </select>
                                                    </th>
                                                    <th>
                                                        <select id="product_id" name="product_id"
                                                            style="width: 150px;">
                                                            @foreach ($products as $product)
                                                                <option value="{{ $product->id }}">{{ $product->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </th>
                                                    <th><input type="text" name="price" id="price"
                                                            style="width: 150px;" /></th>

                                                    <th><input type="text" name="qty" id="qty"
                                                            style="width: 150px;" /></th>
                                                    <th>
                                                        <select id="uom_id" name="uom_id"
                                                            style="width: 150px;">
                                                            @foreach ($uoms as $uom)
                                                                <option value="{{ $uom->id }}">{{ $uom->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>

                                                    </th>

                                                    <th><input type="text" name="discount" id="discount"
                                                            style="width: 150px;" /></th>


                                                    <th></th>
                                                    <th><input type="button" style="background-color: rgb(142, 216, 154)"
                                                            id="btnAddToCart" value=" + " /></th>
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
                                        <textarea id="remark" name="remark" style="width: 150px; height:50px; border-radius: 5px; border: 1px solid black;"></textarea>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-5">

                                        <div class="table-responsive">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <th>Subtotal:</th>
                                                        <td id="sub-total"></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Tax (5%):</th>
                                                        <td id="vat">0</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Total:</th>
                                                        <td id="purchase_total">0</td>
                                                    </tr>

                                                    <tr>
                                                        <th>Paid:</th>
                                                        <td><input type="text" id="paid_amount" name="paid_amount"
                                                                style="width: 120px; border-radius: 5px;" />
                                                        </td>
                                                    </tr>


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

                    $("#btnProcessOrder").on("click", function() {

                        let supplier_id = $("#supplier_id").val();
                        var token = $("input[name='_token']").val();

                        var method = $("input[name='_method']").val();

                        let shipping_address = $("#shipping_address").val();

                        let purchase_date = $("#purchase_date").val();

                        let delivery_date = $("#delivery_date").val();



                        let purchase_total = $("#purchase_total").text();

                        let remark = $("#remark").val();

                        let paid_amount = $("#paid_amount").val();
                        let vat=$("#vat").text()


                        let purchase = JSON.parse(localStorage.getItem("cart"));


                        $.ajax({
                            url: "{{ url('/purchases') }}",
                            type: "POST",
                            data: {
                                _token: token,
                                _method: method,
                                'supplier_id': supplier_id,
                                'shipping_address': shipping_address,
                                'purchase_date': purchase_date,
                                'delivery_date': delivery_date,

                                'purchase_total': purchase_total,
                                'vat':vat,
                                'remark': remark,
                                'paid_amount': paid_amount,

                                'purchase': purchase
                            },
                            success: function(res) {
                                console.log(res)
                                clearCart();
                                $("#items").html("");
                                {{--window.location.href = "{{ route('purchases.index') }}";--}}
                            }
                        });


                    });


                    $("#supplier_id").on("change", function() {

                        $.ajax({
                            url: "<?php echo url('getsupplier'); ?>",
                            type: "GET",
                            data: {
                                "id": $(this).val()
                            },
                            success: function(res) {
                                console.log(res);
                                let supplier = JSON.parse(res);

                                $("#supplier-phone").html("<b>Mobile:</b>" + supplier.phone);
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
                    });

                    $("#clearAll").on("click", function() {
                        clearCart();
                        printCart();
                    })

                    function AddtoCart() {
                        let project_id=$("#project_id").val();
                        let pname=$("#project_id option:selected").text();
                        let product_id = $("#product_id").val();
                        let name = $("#product_id option:selected").text();
                        let price = $("#price").val();
                        let qty = $("#qty").val();
                        let uom_id = $("#uom_id").val();
                        let uname = $("#uom_id option:selected").text();
                        var discount = 0;
                        var discountValue = $("#discount").val();
                        let totalPrice= price * qty;
                    if (discountValue.includes('%')) {
                        discountValue = parseFloat(discountValue.replace('%', ''));
                     discount = (totalPrice * discountValue) / 100;
                    }

                    let subTotal = totalPrice - discount;

                        let item = {
                            'project_id':project_id,
                            'pname':pname,
                            'product_id': product_id,
                            'name': name,
                            'price': price,
                            'qty': parseFloat(qty),
                            'uom_id': uom_id,
                            'uname': uname,
                            'discount': discountValue,
                            'total_discount': discount,
                            'subtotal': subTotal

                        }
                        save(item);
                        printCart();

                    }

                    function printCart() {

                        let cart = getCart();
                        console.log(cart);
                        let sn = 1;
                        let $bill = "";
                        let subtotal = 0;
                        $.each(cart, function(i, item) {
                            //console.log(item.name);
                            subtotal += item.price * item.qty - item.total_discount;
                            let $html = "<tr>";
                            $html += "<td>";
                            $html += sn;
                            $html += "</td>";
                            $html += "<td>";
                            $html += item.pname;
                            $html += "</td>";
                            $html += "<td>";
                            $html += item.name;
                            $html += "</td>";
                            $html += "<td data-field='price'>";
                            $html += item.price;
                            $html += "</td>";
                            $html += "<td data-field='qty'>";
                            $html += item.qty;
                            $html += "</td>";
                            $html += "<td data-field='uname'>";
                            $html += item.uname;
                            $html += "</td>";
                            $html += "<td data-field='discount'>";
                            $html += item.total_discount;
                            $html += "</td>";
                            $html += "<td data-field='subtotal'>";
                            $html += item.subtotal;
                            $html += "</td>";

                            $html += "<td>";
                            $html += "<input type='button' class='delete' data-id='" + item.product_id +
                                "' value='-' />";
                            $html += "</td>";
                            $html += "</tr>";
                            $bill += $html;
                            sn++;
                        });
                        console.log(subtotal);
                        $("#items").html($bill);

                        //Order Summary
                        $("#sub-total").html(subtotal);
                        let vat = (subtotal * 0.05).toFixed(2);
                        $("#vat").html(vat);
                        $("#purchase_total").html(parseFloat(subtotal) + parseFloat(vat));
                    }



                });
            </script>

    </form>
    </div>
@endsection

@section('script')
@endsection