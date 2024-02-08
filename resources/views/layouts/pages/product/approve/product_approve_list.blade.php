<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Product Approve List</h4>
                    <h6 style="padding: 0px;margin:0px">
                        {{-- <span style="font-size: 25px;color:green">TODAY : <?php echo date('m-d-Y'); ?></span> --}}
                    </h6>
                    {{-- <a href="" data-toggle="modal" data-target=".bd-example-modal-lg" class="btn btn-sm btn-success p-1 px-2"><i class="fa fa-plus"></i></i><span class="btn-icon-add"></span>Create</a> --}}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display " style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Code</th>
                                    <th>Sell-Price</th>
                                    <th>Godown</th>
                                    <th>Rack</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Total Amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allProduct as $item )
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->code }}</td>
                                    <td>{{ $item->selling_price }}</td>
                                    <td>{{ $item->godown }}</td>
                                    <td>{{ $item->rack }}</td>
                                    <td>{{ $item->status == 'Active' ? 'Active' : 'InActive' }}</td>
                                    <td>
                                        <img src="{{ asset($item->image) }}" alt="" style="width: 40px" height="40px">
                                    </td>
                                    <td>{{ $item->total_amount }}</td>
                                    <td>
                                        <div style="width: 100%;margin-left:-22px">
                                            <form action="{{ route('product_approve',['id' => $item->id]) }}" method="post" >
                                                <button class="btn btn-sm btn-success" style="padding: 3px">Approve</i></button>
                                                @csrf
                                                @method('PATCH')
                                            </form>
                                            <form action="{{ route('product_approve_cancale',['id' => $item->id]) }}" method="post" >
                                                <button class="btn btn-sm btn-danger" style="padding: 3px;float: left;margin-left:58px;margin-top:-27px">Cancale</i></button>
                                                @csrf
                                                @method('PATCH')
                                            </form>
                                            <button class="btn btn-sm btn-danger" id="viewApprove" data-id="{{ $item->id }}" class="btn btn-sm btn-info" style="padding: 4px 10px;float: left;margin-left:117px;margin-top:-29px">View</button>
                                        </div>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


   <!--view modal-->
   <div class="modal fade view-modal-data" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    view Approve Details
                </h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form class="form-valide" action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body py-2 px-4">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <label class="col-md-5 col-form-label">Supplier Name :

                               </label>
                               <div class="col-md-7">
                                    <label for="" id="supNameview" style="margin-top: 7px"></label>
                               </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <label for="" class="col-md-5 col-form-label">Category Name:</label>
                                <div class="col-md-7">
                                    <label for="" id="catNameview" style="margin-top: 7px"></label>
                                 </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <label class="col-md-5 col-form-label">Product Name :

                               </label>
                               <div class="col-md-7">
                                    <label for="" id="productNameview" style="margin-top: 7px"></label>
                               </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <label for="" class="col-md-5 col-form-label">Product Code:</label>
                                <div class="col-md-7">
                                    <label for="" id="codeview" style="margin-top: 7px"></label>
                                 </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <label class="col-md-5 col-form-label">Godown Name :

                               </label>
                               <div class="col-md-7">
                                    <label for="" id="godownview" style="margin-top: 7px"></label>
                               </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <label for="" class="col-md-5 col-form-label">Product rack:</label>
                                <div class="col-md-7">
                                    <label for="" id="rackview" style="margin-top: 7px"></label>
                                 </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <label class="col-md-5 col-form-label">Buying Price :

                               </label>
                               <div class="col-md-7">
                                    <label for="" id="buyingPriceview" style="margin-top: 7px"></label>
                               </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <label for="" class="col-md-5 col-form-label">Selling price:</label>
                                <div class="col-md-7">
                                    <label for="" id="sellingPriceview"style="margin-top: 7px"></label>
                                 </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <label class="col-md-5 col-form-label">Quantity :
                                    <span class="text-danger">*</span>
                               </label>
                               <div class="col-md-7">
                                    <label for="" id="qtyview" style="margin-top: 7px"></label>
                               </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <label for="" class="col-md-5 col-form-label">Status</label>
                                <div class="col-md-7">
                                    <label for="" id="statusview" style="margin-top: 7px"></label>
                                 </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <label class="col-md-5 col-form-label">Buy Date :

                               </label>
                               <div class="col-md-7">
                                <label for="" id="buydateview" style="margin-top: 7px"></label>
                               </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <label for="" class="col-md-5 col-form-label">Expired Date:</label>
                                <div class="col-md-7">
                                    <label for="" id="expiredateview" style="margin-top: 7px"></label>
                                 </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <label class="col-md-5 col-form-label">Unit Name :
                                    <span class="text-danger">*</span>
                               </label>
                               <div class="col-md-7">

                                    <label for="" id="unitNameview" style="margin-top: 7px"></label>
                               </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="row">
                                <label for="" class="col-md-5 col-form-label">Remarks:</label>
                                <div class="col-md-7">
                                    <label for="" id="remarksview" style="margin-top: 7px"></label>
                                 </div>
                            </div>
                        </div>
                    </div>

                <div class="row mt-2">
                        <div class="col-md-6">
                            <div class="row" >
                                <label class="col-md-5 col-form-label">Total Amount</label>
                                <div class="col-md-7">
                                    <label for="" id="totalAmountview" style="margin-top: 7px"></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div id="imagePreviewview" style="display: none;">
                                    <img id="previewview" alt="Image Preview" class="img-fluid" style="max-width: 130px; max-height: 130px; margin-left:163px; margin-top:6px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="height:50px">
                    <button type="button" class="btn btn-sm btn-danger light" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

</x-app-layout>


<script>
    $(document).on('click','#viewApprove',function(){
        var itemId = $(this).data('id');
        $('.view-modal-data').modal('show');
        alert(itemId);
        $.ajax({
                url: '{{ route('get_product_edit')}}',
                method: 'GET',
                dataType: "JSON",
                data: { 'id': itemId },
                success: function (response) {
                 console.log(response);
                 $('#supNameview').text(response.supplier.name);
                 $('#catNameview').text(response.category.cat_name);
                 $('#productNameview').text(response.name);
                 $('#codeview').text(response.code);
                 $('#godownview').text(response.godown);
                 $('#rackview').text(response.rack);
                 $('#buyingPriceview').text(response.buying_price);
                 $('#sellingPriceview').text(response.selling_price);
                 $('#qtyview').text(response.quantity);
                 $('#buydateview').text(response.buying_date);
                 $('#expiredateview').text(response.expire_date);
                 $('#unitNameview').text(response.unit.name);
                 $('#statusview').text(response.status);
                 $('#remarksview').text(response.remarks);
                 $('#totalAmountview').text(response.total_amount);
                 var imageUrl = response.image;
                var fullImageUrl = '{{ asset('') }}' + imageUrl;

            // Update the preview with the new image
            $('#previewview').attr('src', fullImageUrl);
            $('#imagePreviewview').show();

            },
        });
    });
</script>

