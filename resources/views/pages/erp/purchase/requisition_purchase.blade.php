@extends('layout.erp.app')

@section('style')
<style>
    /* Override colors for visibility */
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
</style>
@endsection

@section('page')
    {{Form::open(['url'=>'/purchases','method'=>'POST','files'=>true])}}
        <div
            style="border:4px solid #2f5a63; box-shadow: rgba(245, 214, 214, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">

                        {{Form::hidden('requisition_purchase','Requisition Purchase')}}

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
                                        <table class="table" style="color:aliceblue">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Project</th>
                                                <th>Product</th>
                                                <th>Approved Qty</th>
                                                <th>Uom</th>
                                                <th>Price</th>
                                                <th>Discount %</th>
                                                <th>Discounted Price</th>
                                                <th>Subtotal</th>
                                                <th><input type="button" class="btn btn-primary" id="Cal" value="Cal"
                                                            /></th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            @foreach($requisitionPurchase as $key => $requisitionPurchaseItem)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ Form::select("requisitionPurchase[$key][project_id]", $projects->pluck('name', 'id'), $requisitionPurchaseItem->project_id ?? null, ['class' => 'form-select']) }}</td>
                                                    <td>{{ Form::select("requisitionPurchase[$key][product_id]", $products->pluck('name', 'id'), $requisitionPurchaseItem->product_id ?? null, ['class' => 'form-select']) }}</td>
                                                    <td class="text-center">{{ Form::text("requisitionPurchase[$key][qty]", $requisitionPurchaseItem->approve_qty ?? null, ['class' => 'form-control qty']) }}</td>
                                                    <td class="text-center">{{ Form::select("requisitionPurchase[$key][unit_id]", $units->pluck('name', 'id'), $requisitionPurchaseItem->uom_id ?? null, ['class' => 'form-select']) }}</td>
                                                    <td class="text-center">{{ Form::text("requisitionPurchase[$key][price]", null, ['class' => 'form-control price']) }}</td>
                                                    <td class="text-center">{{ Form::text("requisitionPurchase[$key][discount]", null, ['class' => 'form-control discount']) }}</td>
                                                    <td class="text-center">{{ Form::text("requisitionPurchase[$key][discount_price]", null, ['class' => 'form-control discount_price', 'readonly']) }}</td>
                                                    {{ Form::hidden("requisitionPurchase[$key][discount_value]", null, ['class' => 'form-control discount_value', 'readonly']) }}
                                                    <td class="text-center">{{ Form::text("requisitionPurchase[$key][subtotal]", null, ['class' => 'form-control subtotal', 'readonly']) }}</td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            @endforeach
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
                                                    <td id="sub-total">{{Form::text('subtotal', null,['class'=>'form-control subTotal','readonly'])}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Tax (5%):</th>
                                                    <td id="vat">{{Form::text('vat', null,['class'=>'form-control vat','readonly'])}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Total:</th>
                                                    <td >{{Form::text('purchase_total', null,['class'=>'form-control purchaseTotal','readonly'])}}</td>
                                                </tr>

                                                <tr>
                                                    <th>Paid:</th>
                                                    <td>{{Form::text('paid_amount', null,['class'=>'form-control PaidAmount'])}}
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
                                            <button type="submit" id="btnProcessOrder" class="btn btn float-right"
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
            {{Form::close()}}
    </div>
@endsection

@section('script')
    <script>
        $("#Cal").on("click",function () {
            let price= $(".price").val();
            let qty= $(".qty").val();
            var discount = 0;
            var discountValue = $(".discount").val();
            let totalPrice= price * qty;
            if (discountValue.includes('%')) {
                discountValue = parseFloat(discountValue.replace('%', ''));
                discount = (totalPrice * discountValue) / 100;
            }

            let subTotal = totalPrice - discount;
            $(".subtotal").val(subTotal);
            $(".discount_price").val(discount);
            $(".discount_value").val(discountValue);

            function calculateSum() {
                let total = 0;

                $('.subtotal').each(function() {
                    let value = parseFloat($(this).val());
                    if (!isNaN(value)) {
                        total += value;
                    }
                });
                $('.subTotal').val(total.toFixed(2));
                let vat = (total * 0.05).toFixed(2);
                $('.vat').val(vat);
                let purchaseTotal = (parseFloat(total) + parseFloat(vat)).toFixed(2);
                $('.purchaseTotal').val(purchaseTotal);
            }
            calculateSum();
            $('.subtotal').on('input', function() {
                calculateSum();
            });
        })
    </script>
@endsection