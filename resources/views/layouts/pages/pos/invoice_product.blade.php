
<x-app-layout>

    <div class="row" id="print">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="invoice-title">
                        <div class="row">
                            <div class="col-12">
                                <h2 class="text-muted">Cubix Information System </h2>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-4">
                                <div class="" style="">
                                    <h5 class="mb-1 text-muted" style="text-align: center;text-decoration: underline;
                                    font-weight: revert;">Form: </h5>
                                    <h6 class="mb-1 text-muted" style="margin-top: 16px">Cubix information systems ltd, Suite 12/D , Confidence Centre Building -2 , Shahjadpur, Gulshan 1212 Dhaka, Dhaka Division, Bangladesh</h6>
                                    <h6 class="mb-1 text-muted"><i class="uil uil-envelope-alt me-1"></i> cubixisl@gmail.com</h6>
                                    <h6 class="text-muted"><i class="uil uil-phone me-1 text-muted"></i> ++8801714737532</h6>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="" style="float:inline-end">
                                    <h5 class="mb-1 text-muted" style="text-align: center;text-decoration: underline;
                                    font-weight: revert;">To: </h5>
                                    <h6 class="mb-1 text-muted" style="margin-top: 16px">Customer Name  :  {{ $invoice->customer->name }}</h6>
                                    <h6 class="mb-1 text-muted"><i class="uil uil-envelope-alt me-1"></i> Number  :  +88{{ $invoice->customer->number }}</h6>
                                    <h6 class="text-muted"><i class="uil uil-phone me-1 "></i> Address : {{ $invoice->customer->address }} </h6>
                                    <h6 class="text-muted"><i class="uil uil-phone me-1 "></i> Shop Name : {{ $invoice->customer->shop_name }}</h6>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="" style="float:inline-end;margin-top:24px">
                                    <h6 class="mb-1 text-muted">Invoice No  : {{ $invoice->invoice_no }}</h6>
                                    <h6 class="mb-1 text-muted"><i class="uil uil-envelope-alt me-1 text-muted"></i> Invoice Date:{{ $invoice->order_date }}</h6>
                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="py-2">
                        <h5 class="font-size-15 text-muted" style="font-size: 23px;text-decoration: underline;margin-bottom: 30px;margin-top: 15px;font-muted">Order Summary</h5>

                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap table-centered mb-0">
                                <thead>
                                    <tr>
                                        <th style="width: 70px;">No.</th>
                                        <th>Category</th>
                                        <th>Item</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                        <th class="text-end" style="width: 120px;">Total</th>
                                    </tr>
                                </thead><!-- end thead -->
                                <tbody>
                                    @foreach ($orderDetails as $item )
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->product->category->cat_name }}</td>
                                        <td>{{ $item->product->name }}</td>

                                        <td>{{ $item->qty }}</td>
                                        <td>{{ $item->unit_price }}</td>
                                        <td class="text-end">{{ $item->total }}</td>
                                    </tr>
                                    @endforeach

                                    <tr>
                                        <th scope="row" colspan="5" class="text-end">Sub Total</th>
                                        <td class="text-end">{{ $invoice->sub_total }}</td>
                                    </tr>
                                    <!-- end tr -->
                                    <tr>
                                        <th scope="row" colspan="5" class="border-0 text-end">
                                            Vat :</th>
                                        <td class="border-0 text-end">{{ $invoice->vat }} (10%)</td>
                                    </tr>
                                    <!-- end tr -->
                                    <tr>
                                        <th scope="row" colspan="5" class="border-0 text-end">
                                           Total Amount :</th>
                                           <td class="border-0 text-end"><h4 class="m-0 fw-semibold text-muted">{{ $invoice->total }} TK</h4></td>
                                    </tr>
                                    <!-- end tr -->

                                    <!-- end tr -->

                                    <!-- end tr -->
                                </tbody><!-- end tbody -->
                            </table><!-- end table -->
                        </div><!-- end table responsive -->
                        <div class="d-print-none mt-4">
                            <div class="float-end">
                                <a href="" id="printInvoice" class="btn btn-success me-1" ><i class="fa fa-print"></i> Print</a>
                                <a href="{{ route('pos_index') }}" class="btn btn-primary w-md">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end col -->
    </div>

</x-app-layout>

<script>
    $(document).ready(function () {
        $('#printInvoice').click(function () {
            // Append the 'print' class temporarily to include in print
            $('#print').addClass('print');
            window.print();
            $('#print').removeClass('print');
            return false;
        });
    });
</script>
