@extends('layout.erp.app')

@section('style')
@endsection

@section('page')
    <form id="purchaseForm" action="{{ route('purchases.update', $purchase) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div
            style="border:4px solid #2f5a63; box-shadow: rgba(245, 214, 214, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;">

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
                                                style="background-color: #10414b;color:aliceblue">Purchase Form</button><br>
                                        </h2>
                                    </div>
                                    <div class="col-6">
                                        <h2 style="text-align: right;">
                                            <a href="{{ route('purchases.index') }}" type="button" class="btn btn mt-1"
                                                style="background-color: #057388;color:aliceblue">Manage Purchase</a>
                                        </h2>
                                    </div>
                                    <hr style="border: 2px; color:#07353e">
                                    <!-- /.col -->
                                </div>
                                <!-- info row -->
                                <div class="row invoice-info" style="font-size:16px;">
                                    <div class="col-sm-3 invoice-col">
                                        From
                                        <address>
                                            <strong>Mirsaige-PMC</strong><br>
                                            House-30,Level-6<br>
                                            <b> Gareeb-E-Nawaz Avenue</b><br>
                                            Dhaka, Bangladesh<br>
                                            Mobile: 01707987202 <br>
                                            <b>www.mirsaige-bd.com</b> <br>
                                            Email: info@mirsaige-bd.com
                                        </address>
                                    </div>
                                    <div class="col-sm-3 invoice-col">

                                        <label for="supplier_id"
                                            style="display: block; margin-bottom: 5px;"><b>Supplier:</b></label>
                                        <select id="supplier_id" name="supplier_id"
                                            style="width: 100%; padding: 6px; border-radius: 5px;">
                                            @foreach ($suppliers as $supplier)
                                                <option value="{{ $supplier->id }}"
                                                    {{ $purchase->supplier_id == $supplier->id ? 'selected' : '' }}>
                                                    {{ $supplier->name }}</option>
                                            @endforeach
                                        </select>
                                        <div id="supplier-phone"></div>

                                        <div style="margin-top: 10px;">
                                            <label for="shipping_address" class="form-label"><b>Shipping
                                                    Address:</b></label>
                                            <input type="text" class="form-control"
                                                value="{{ $purchase->shipping_address }}" name="shipping_address"
                                                id="shipping_address"
                                                style="border-radius: 5px; border: 1px solid black;" />
                                        </div>
                                    </div>

                                    {{-- <table>
                                            <tr>
                                                <td style="text-align: right;"><b><i class="fa fa-circle  text-xs mr-1"
                                                            style="color:#00a7c7"></i> Purchase Date:</b></td>
                                                <td style="text-align: right;"><input type="text"
                                                        style="width:150px; border-radius: 5px; border: 1px solid black; text-align: right;"
                                                        id="purchase_date" name="purchase_date"
                                                        value="{{ $purchase->purchase_date }}" /></td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: right;"><b><i class="fa fa-circle  text-xs mr-1"
                                                            style="color:#00a7c7"></i> Delivery Date:</b></td>
                                                <td style="text-align: right;"><input type="text"
                                                        style="width:150px; border-radius: 5px; border: 1px solid black; text-align: right;"
                                                        id="delivery_date" name="delivery_date"
                                                        value="{{ $purchase->delivery_date }}" /></td>
                                            </tr>
                                        </table> --}}
                                    <div class="col-sm-4 invoice-col" style="text-align: right;">
                                        <div style="display: flex; flex-direction: column; align-items: flex-end;">
                                            <label for="purchase_date" style="margin-bottom: 5px;"><b>Purchase
                                                    Date:</b></label>
                                            <input type="text" id="purchase_date" name="purchase_date"
                                                value="{{ $purchase->purchase_date }}"
                                                style="width: 150px; border-radius: 5px; border: 1px solid black; text-align: right; padding-right: 4px;"
                                                value="<?php echo date('Y-m-d'); ?>">
                                        </div>
                                        <div
                                            style="display: flex; flex-direction: column; align-items: flex-end; margin-top: 10px;">
                                            <label for="delivery_date" style="margin-bottom: 5px;"><b>Delivery
                                                    Date:</b></label>
                                            <input type="text" id="delivery_date" name="delivery_date"
                                                value="{{ $purchase->delivery_date }}"
                                                style="width: 150px; border-radius: 5px; border: 1px solid black; text-align: right; padding-right: 4px;"
                                                value="<?php echo date('Y-m-d'); ?>">
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
                                                    <th>Product</th>
                                                    <th>Price</th>
                                                    <th>Qty</th>
                                                    <th>Uom</th>
                                                    <th>Discount</th>
                                                    <th>Subtotal</th>
                                                    <th><input type="button" id="clearAll" value="Clear" /></th>
                                                </tr>
                                                <tr>
                                                    <th></th>
                                                    <th>
                                                        <select id="product_id" value="{{ $purchase->product_id }}"
                                                            name="product_id" style="width: 150px;">
                                                            @foreach ($products as $product)
                                                                <option value="{{ $product->id }}">{{ $product->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </th>
                                                    <th><input type="text" value="{{ $purchase->price }}" name="price"
                                                            id="price" style="width: 150px;" /></th>
                                                    <th><input type="text" value="{{ $purchase->qty }}" name="qty"
                                                            id="qty" style="width: 150px;" /></th>
                                                    <th>
                                                        <select id="uom_id" name="uom_id"
                                                            value="{{ $purchase->uom_id }}" style="width: 150px;">
                                                            @foreach ($uoms as $uom)
                                                                <option value="{{ $uom->id }}">{{ $uom->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </th>
                                                    <th><input type="text" value="{{ $purchase->discount }}"
                                                            name="discount" id="discount" style="width: 150px;" /></th>
                                                    <th></th>
                                                    <th><input type="button" id="btnAddToCart" value=" + " /></th>
                                                </tr>
                                            </thead>
                                            <tbody id="items"></tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.row -->
                                <div class="row" style="margin-top: 30px;font-size:medium">
                                    <div class="col-6">
                                        <strong>Remark</strong><br>
                                        <input type="text" id="remark" value="{{ $purchase->remark }}"
                                            name="remark"
                                            style="width: 150px; padding-left: 5px; height:50px; border-radius: 5px; border: 1px solid black;" />
                                    </div>
                                    <div class="col-5">
                                        <div class="table-responsive">
                                            <table class="table"
                                                style="border-radius: 5px; border: 1px solid black; margin-top: 40px;">
                                                <tbody>
                                                    <tr>
                                                        <th>Subtotal:</th>
                                                        <td id="sub-total">0</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Tax (5%)</th>
                                                        <td id="vat">0</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Total:</th>
                                                        <td id="purchase_total">0</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Paid:</th>
                                                        <td><input type="text" value="{{ $purchase->paid_amount }}"
                                                                id="paid_amount" name="paid_amount"
                                                                style="width: 120px;  border-radius: 5px;" /></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->
                                <!-- this row will not appear when printing -->
                                <div class="row no-print" style="font-size: medium;margin-top:20px">
                                    <div class="col-12">
                                        <div style="float: right;">
                                            <button type="button" id="btnProcessOrder" class="btn btn float-right"
                                                style="background-color:#07414d;color:aliceblue"><i
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
        </div>
    </form>
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(function() {

            printCart();

            $("#btnProcessOrder").on("click", function() {

                let supplier_id = $("#supplier_id").val();
                console.log(supplier_id);
                var token = $("input[name='_token']").val();

                var method = $("input[name='_method']").val();

                let shipping_address = $("#shipping_address").val();

                let purchase_date = $("#purchase_date").val();

                let delivery_date = $("#delivery_date").val();



                let purchase_total = $("#purchase_total").text();

                let remark = $("#remark").val();

                let paid_amount = $("#paid_amount").val();



                let purchase = JSON.parse(localStorage.getItem("cart"));


                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ route('purchases.update', ['purchase' => $purchase->id]) }}",
                    type: "POST",
                    data: {
                        _token: token,
                        _method: 'PUT',
                        'supplier_id': supplier_id,
                        'shipping_address': shipping_address,
                        'purchase_date': purchase_date,
                        'delivery_date': delivery_date,
                        'purchase_total': purchase_total,
                        'remark': remark,
                        'paid_amount': paid_amount,
                        'purchase': purchase
                    },
                    success: function(res) {
                        clearCart();
                        $("#items").html("");
                        window.location.href = "{{ route('purchases.index') }}";
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
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
                let product_id = $("#product_id").val();
                let name = $("#product_id option:selected").text();
                let price = $("#price").val();
                let qty = $("#qty").val();
                let uom_id = $("#uom_id").val();
                let uname = $("#uom_id option:selected").text();

                let discount = $("#discount").val();
                let total_discount = discount * qty;
                let subtotal = price * qty - total_discount;

                let item = {
                    'product_id': product_id,
                    'name': name,
                    'price': price,
                    'qty': parseFloat(qty),
                    'uom_id': uom_id,
                    'uname': uname,
                    "discount": discount,
                    'total_discount': total_discount,
                    "subtotal": subtotal

                }

                save(item);
                printCart();

            }

            function printCart() {

                let cart = getCart();
                let sn = 1;
                let $bill = "";
                let subtotal = 0;
                $.each(cart, function(i, item) {
                    //console.log(item.name);
                    subtotal += item.price * item.qty - item.discount;
                    let $html = "<tr>";
                    $html += "<td>";
                    $html += sn;
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

                $("#items").html($bill);

                //Order Summary
                $("#sub-total").html(subtotal);
                let vat = (subtotal * 0.05).toFixed(2);
                $("#vat").html(vat);
                $("#purchase_total").html(parseFloat(subtotal) + parseFloat(vat));
            }



        });
    </script>
@endsection
