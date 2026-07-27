@extends('layout.erp.app')
@section('style')
    <style>
        body {
            color: rgba(255, 178, 62, 0.9) !important;
        }

        .text-secondary-d1 {
            color: rgba(255, 178, 62, 0.9) !important;
        }

        .page-header {
            margin: 0 0 1rem;
            padding-bottom: 1rem;
            padding-top: .5rem;
            border-bottom: 1px dotted rgba(255, 178, 62, 0.2);
            display: -ms-flexbox;
            display: flex;
            -ms-flex-pack: justify;
            justify-content: space-between;
            -ms-flex-align: center;
            align-items: center;
        }

        .page-title {
            padding: 0;
            margin: 0;
            font-size: 1.75rem;
            font-weight: 300;
            color: rgba(255, 178, 62, 0.9) !important;
        }

        .brc-default-l1 {
            border-color: rgba(255, 178, 62, 0.2) !important;
        }

        .ml-n1,
        .mx-n1 {
            margin-left: .25rem !important;
        }

        .mr-n1,
        .mx-n1 {
            margin-right: -.25rem !important;
        }

        .mb-4,
        .my-4 {
            margin-bottom: 1.5rem !important;
        }

        hr {
            margin-top: 1rem;
            margin-bottom: 1rem;
            border: 0;
            border-top: 1px solid rgba(255, 178, 62, 0.2);
        }

        .text-grey-m2 {
            color: rgba(255, 178, 62, 0.9) !important;
        }

        .text-success-m2 {
            color: rgba(255, 178, 62, 0.9) !important;
        }

        .font-bolder,
        .text-600 {
            font-weight: 600 !important;
        }

        .text-110 {
            font-size: 110% !important;
        }

        .text-blue {
            color: rgba(255, 178, 62, 0.9) !important;
        }

        .pb-25,
        .py-25 {
            padding-bottom: .75rem !important;
        }

        .pt-25,
        .py-25 {
            padding-top: .75rem !important;
        }

        .bgc-default-tp1 {
            background-color: rgba(255, 178, 62, 0.2) !important;
        }

        .bgc-default-l4,
        .bgc-h-default-l4:hover {
            background-color: rgba(255, 178, 62, 0.1) !important;
        }

        .page-header .page-tools {
            -ms-flex-item-align: end;
            align-self: flex-end;
        }

        .btn-light {
            color: rgba(255, 178, 62, 0.9);
            background-color: rgba(255, 178, 62, 0.1);
            border-color: rgba(255, 178, 62, 0.2);
        }

        .w-2 {
            width: 1rem;
        }

        .text-120 {
            font-size: 120% !important;
        }

        .text-primary-m1 {
            color: rgba(255, 178, 62, 0.9) !important;
        }

        .text-danger-m1 {
            color: rgba(255, 178, 62, 0.9) !important;
        }

        .text-blue-m2 {
            color: rgba(255, 178, 62, 0.9) !important;
        }

        .text-150 {
            font-size: 150% !important;
        }

        .text-60 {
            font-size: 60% !important;
        }

        .text-grey-m1 {
            color: rgba(255, 178, 62, 0.9) !important;
        }

        .align-bottom {
            vertical-align: bottom !important;
        }

        /* Additional color overrides for visibility */
        .text-black,
        .text-95,
        .text-90,
        .text-105,
        .text-110,
        .text-150,
        .page-info,
        .text-secondary-d1,
        .text-600,
        b,
        strong,
        th,
        td,
        .text-m2,
        .text-white {
            color: rgba(255, 178, 62, 0.9) !important;
        }

        /* Table borders with your color */
        table,
        th,
        td {
            border-color: rgba(255, 178, 62, 0.2) !important;
        }

        /* Background colors for better contrast */
        .bgc-default-tp1 {
            color: rgba(255, 178, 62, 0.9) !important;
        }
    </style>
@endsection


@section('page')
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

    <div class="page-content container">
        <div class="page-header text-blue-d2">
            <h1 class="page-title text-secondary-d1">
                Purchase Invoice
                <small class="page-info" style="font-size: large;">
                    <i class="fa fa-angle-double-right text-40"></i>
                    ID: #{{ $purchase->id }}
                </small>
            </h1>

            <div class="page-tools">
                <div class="action-buttons">
                    <span class="btn bg-white btn-light mx-1px text-95" onclick="printInvoice()">
                        <i class="mr-1 fa fa-print text-primary-m1 text-120 w-2"></i>
                        Print
                    </span>
                    {{-- <a class="btn bg-white btn-light mx-1px text-95" id="generatePDF" href="#" data-title="PDF">
                    <i class="mr-1 fa fa-file-pdf-o text-danger-m1 text-120 w-2"></i>
                    Export
                </a> --}}
                </div>
            </div>
        </div>

        <div class="container px-0" id="purchase-document">
            <div class="row mt-4" style="">
                <div class="col-12 col-lg-12 mt-3">
                    <div class="row d-flex">
                        <div class="col-6 col-lg-6">
                            <div>
                                <img src="{{ asset('assets/logo/log.png') }}" alt="mirsaige">
                            </div>
                        </div>
                        <div class="col-6 col-lg-6">
                            <div class="text-end">
                                <b><span class="text-black text-150" style="font-weight: bold">Mirsaige-PMC.</span><br>
                                    <span class="text-black" style="font-size: 13pt">House-30, Level-6,
                                        <br>Gareeb-E-Nawaz Avenue,Uttara <br>
                                        Dhaka,Bangladesh.</span><br>
                                    <span class="text-black" style="font-size: 12pt">| Mobile: 01707987202 |<br>
                                        www.mirsaige-bd.com </span><br>
                                    <span class="text-black" style="font-size: 11pt">|Email:info@mirsaige-bd.com|</span>
                                </b>
                            </div>
                        </div>
                        <div style="border-bottom: 2px solid rgba(255, 178, 62, 0.2);margin-top:10px"></div>
                        
                        <div class="row mt-5" style="font-size:medium">
                            <div class="col-sm-6">
                                <div>
                                    <span class="text-black" style="font-weight: bold"><u>Supplier/Vendor:</u></span><br>

                                    <span class="text-600 text-110 text-black align-middle">{{ $supplier->name }}</span>

                                    <div class="my-1"><i class="fa fa-phone" style="font-size:24px">
                                        </i> <b class="text-600">{{ $supplier ? $supplier->phone : 'N/A' }}</b></div>

                                </div>
                                <div class="text-m2 text-black" style="font-weight: bold">
                                    <div class="my-1">
                                        <u>Shipping Address:</u> <br>{{ $purchase->shipping_address }}
                                    </div>
                                </div>
                            </div>
                            <!-- /.col -->

                            <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                                <hr class="d-sm-none" />
                                <div class="text-black">
                                    <div class="my-2"><i class="fa fa-square text-xs mr-1" style="color:rgba(255, 178, 62, 0.9)"></i> <span
                                            class="text-600 text-90">Invoice ID:</span> {{ $purchase->id }}</div>

                                    <div class="my-2"><i class="fa fa-square text-xs mr-1" style="color:rgba(255, 178, 62, 0.9)"></i> <span
                                            class="text-600 text-90">Purchase Date:</span>
                                        {{ \Carbon\Carbon::parse($purchase->purchase_date)->format('d F Y') }}</div>

                                    <div class="my-2"><i class="fa fa-square text-xs mr-1" style="color:rgba(255, 178, 62, 0.9)"></i> <span
                                            class="text-600 text-90">Delivery Date:</span>
                                        {{ \Carbon\Carbon::parse($purchase->delivery_date)->format('d F Y') }}</div>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>

                        <div class="row border-b-2 brc-default-l2"></div>

                        <!-- or use a table instead -->

                        <div class="table-responsive mt-5">
                            <table  style="min-height: 100px" class="table table-striped table-borderless border-0 border-b-2 brc-default-l1">
                                <thead class="bg-none bgc-default-tp1"
                                       style="border-top: 2px solid rgba(255, 178, 62, 0.2);border-bottom:2px solid rgba(255, 178, 62, 0.2)">

                                <tr class="text-white">
                                    <th style="border: 1px solid rgba(255, 178, 62, 0.2)" class="opacity-2">SL</th>
                                    <th style="border: 1px solid rgba(255, 178, 62, 0.2)">Project</th>
                                    <th style="border: 1px solid rgba(255, 178, 62, 0.2)">Products</th>
                                    <th style="border: 1px solid rgba(255, 178, 62, 0.2)">Qty</th>
                                    <th style="border: 1px solid rgba(255, 178, 62, 0.2)">Price</th>
                                    <th style="border: 1px solid rgba(255, 178, 62, 0.2)">Discount Price</th>
                                    <th style="border: 1px solid rgba(255, 178, 62, 0.2)" width="140">Uom</th>
                                </tr>

                                </thead>

                                <tbody style="border: 1px solid rgba(255, 178, 62, 0.2)" class="text-95 text-black">
                                @php
                                    $sn = 0;
                                    $subtotal = 0;
                                @endphp

                                @foreach ($detailspurchases as $detailspurchase)
                                    @php
                                        $totalPrice = $detailspurchase->price * $detailspurchase->qty;
                                        $discountAmount = $totalPrice * ($detailspurchase->discount / 100);
                                        $totalAmount = $totalPrice - $discountAmount;
                                        $subtotal += $totalAmount;

                                    @endphp

                                    <tr>
                                        <td style="border: 1px solid rgba(255, 178, 62, 0.2)">{{ ++$sn }}</td>
                                        <td style="border: 1px solid rgba(255, 178, 62, 0.2)">{{ $detailspurchase->prname }}</td>
                                        <td style="border: 1px solid rgba(255, 178, 62, 0.2)">{{ $detailspurchase->mname }}</td>
                                        <td style="border: 1px solid rgba(255, 178, 62, 0.2)">{{ $detailspurchase->qty }}</td>
                                        <td style="border: 1px solid rgba(255, 178, 62, 0.2)"class="text-95">{{ $detailspurchase->price }}</td>
                                        <td style="border: 1px solid rgba(255, 178, 62, 0.2)"class="text-95">{{ $discountAmount }}</td>
                                        <td style="border: 1px solid rgba(255, 178, 62, 0.2)"class="text-secondary-d2">{{ $detailspurchase->uname }}</td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        @php
                            $fixedSubtotal = intval($subtotal);
                        @endphp
                        <div class="row mt-3">
                            <div class="col-12 col-sm-7 text-black-d2 text-95 mt-2 mt-lg-0">
                            </div>

                            <div class="col-12 col-sm-5 text-black text-90 order-first order-sm-last" style="font-size:medium">
                                <div class="row my-2">

                                </div>

                                <table>
                                    <div class="row my-2 ">
                                        <div class="col-7 text-right">
                                            <b> Subtotal:</b>
                                        </div>

                                        <div class="col-5">
                                            <span class="text-110 text-black">{{ $fixedSubtotal }}</span>
                                        </div>
                                        <hr style="background-color: rgba(255, 178, 62, 0.2); width:80%">
                                        <div class="col-7 text-right">
                                            <b> Tax (5%):</b>
                                        </div>

                                        <div class="col-5">
                                            <span class="text-110 text-black">{{ $purchase->vat }}</span>
                                        </div>
                                        <hr style="background-color: rgba(255, 178, 62, 0.2); width:80%">

                                        <?php $total = $fixedSubtotal + $purchase->vat; ?>
                                        <div class="col-7 text-right">
                                            <b> Total:</b>
                                        </div>
                                        <div class="col-5">
                                            <span class="text-110 text-black">{{ $total }}</span>
                                        </div>
                                        <hr style="background-color: rgba(255, 178, 62, 0.2); width:80%">
                                        <div class="col-7 text-right">
                                            <b> Paid Amount:</b>
                                        </div>
                                        <div class="col-5">
                                            <span class="text-110 text-black">{{ $purchase->paid_amount }}</span>
                                        </div>
                                        <hr style="background-color: rgba(255, 178, 62, 0.2); width:80%">
                                        <?php $due = $total - $purchase->paid_amount; ?>
                                        <div class="col-7 text-right">
                                            <b> Due Amount:</b>
                                        </div>

                                        <div class="col-5">
                                            <span class="text-110 text-black">{{ $due }}</span>
                                        </div>
                                        <hr style="background-color: rgba(255, 178, 62, 0.2); width:80%">
                                    </div>

                                </table>

                                <div class="row my-2 ">

                                </div>
                            </div>
                        </div>
                        <hr class="mt-5" />
                        <div style="text-align:center;">
                            <span class="text-black text-105">Thank you </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function printInvoice() {
            var printContents = document.getElementById('purchase-document').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
@endsection