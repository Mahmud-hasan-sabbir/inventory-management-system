<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">All Product List</h4>
                    <a href="" data-toggle="modal" data-target=".bd-example-modal-lg" class="btn btn-sm btn-success p-1 px-2"><i class="fa fa-plus"></i></i><span class="btn-icon-add"></span>Create</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display " style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>SL.NO</th>
                                    <th>Cateory</th>
                                    <th>Name</th>
                                    <th>Code</th>
                                    <th>Sell-Price</th>
                                    <th>Godown</th>
                                    <th>Rack</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th class="" style="width: 210px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allProduct as $item )
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->category->cat_name }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->code }}</td>
                                    <td>{{ $item->selling_price }}</td>
                                    <td>{{ $item->godown }}</td>
                                    <td>{{ $item->rack }}</td>
                                    <td>{{ $item->status == 'Active' ? 'Active' : 'InActive' }}</td>
                                    <td>
                                        <img src="{{ asset($item->image) }}" alt="" style="width: 40px" height="40px">
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-success p-1 px-2 edit-data" id="editData" data-id="{{ $item->id }}"><i class="fa fa-pencil"></i><span class="btn-icon-add"></span>Edit</button>
                                        <button type="button" class="btn btn-sm btn-info p-1 px-2 view-data" id="viewDate" data-id="{{ $item->id }}"><i class="fa fa-folder-open"></i></i><span class="btn-icon-add"></span>View</button>
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

  <!-- create modal open -->

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Create Product Details
                    </h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <form class="form-valide" action="{{ route('store_product') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body py-2 px-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Supplier Name :
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <select name="sup_id" id="" class="form-control">
                                            <option value="" selected disabled>Select Supplier</option>
                                          @foreach ($allSupplierName as $item )
                                              <option value="{{$item->id}}">{{ $item->name }}</option>
                                          @endforeach
                                        </select>
                                   </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Category Name:</label>
                                    <div class="col-md-7">
                                        <select name="cat_id" id="" class="form-control">
                                            <option value="" selected disabled>Select Category</option>
                                            @foreach ($allCategory as $item )
                                            <option value="{{$item->id}}">{{ $item->cat_name }}</option>
                                            @endforeach
                                        </select>
                                     </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Product Name :
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="text" name="name" class="form-control" >
                                   </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Product Code:</label>
                                    <div class="col-md-7">
                                        <input type="text" readonly name="code" value="{{$IDGenarator}}" class="form-control" >
                                     </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Godown Name :
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <select name="godown" id="" class="form-control">
                                            <option value="" selected disabled>Select Godown</option>
                                            <option value="Shop">Shop</option>
                                        </select>
                                   </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Product rack:</label>
                                    <div class="col-md-7">
                                        <input type="text" name="rack" class="form-control" >
                                     </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Buying Price :
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-md-7">
                                        <input type="text" name="buying_price" id="buyPrice" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Selling price:</label>
                                    <div class="col-md-7">
                                        <input type="text" name="selling_price" class="form-control">
                                     </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Quantity :
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-md-7">
                                        <input type="text" name="quantity" id="qty" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Status</label>
                                    <div class="col-md-7">
                                        <select name="status" id="" class="form-control">
                                            <option value="Active">Active</option>
                                            <option value="InActive">InActive</option>
                                        </select>
                                     </div>
                                </div>
                            </div>

                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Buy Date :
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="date" name="buying_date" class="form-control">
                                   </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Expired Date:</label>
                                    <div class="col-md-7">
                                        <input type="date" name="expire_date" class="form-control" >
                                     </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Unit Name :
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <select name="unit_id" id="" class="form-control">
                                            <option value="" selected disabled>Select Unit</option>
                                            @foreach ($allUnits as $item )
                                            <option value="{{$item->id}}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                   </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Remarks:</label>
                                    <div class="col-md-7">
                                        <textarea name="remarks" id="" cols="30" rows="2" class="form-control"></textarea>
                                     </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2" >
                                <div class="col-md-6">
                                    <div class="row" style="margin-top: -23px">
                                        <label class="col-md-5 col-form-label">Total Amount :</label>
                                        <div class="col-md-7">
                                            <input type="text" name="total_amount" id="totalAmount" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row" id="viewImage" >
                                    <label class="col-md-5 col-form-label">Image </label>
                                    <div class="col-md-7">
                                        <input type="file" name="image" id="image" class="form-control"  onchange="previewImage(this)">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div id="imagePreview" style="display: none;">
                                        <img id="preview" alt="Image Preview" class="img-fluid" style="max-width: 115px; max-height: 86px; margin-left:245px; margin-top:6px">
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


<!--edit modal open-->
    <div class="modal fade bd-example-edit" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Edit Product Details
                    </h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <form class="form-valide" action="{{ route('update_product_details') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body py-2 px-4">
                        <input type="hidden" name="hiddenId" id="hiddenId">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Supplier Name :
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <select name="sup_id" id="sup_id" class="form-control">

                                          @foreach ($allSupplierName as $item )
                                              <option value="{{$item->id}}">{{ $item->name }}</option>
                                          @endforeach
                                        </select>
                                   </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Category Name:</label>
                                    <div class="col-md-7">
                                        <select name="cat_id" id="cat_id" class="form-control">

                                            @foreach ($allCategory as $item )
                                            <option value="{{$item->id}}">{{ $item->cat_name }}</option>
                                            @endforeach
                                        </select>
                                     </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Product Name :
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="text" id="productName" name="name" class="form-control" >
                                   </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Product Code:</label>
                                    <div class="col-md-7">
                                        <input type="text" readonly name="code" id="code" value="" class="form-control" >
                                     </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Godown Name :
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <select name="godown" id="godown" class="form-control">
                                            <option value="Shop">Shop</option>
                                        </select>
                                   </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Product rack:</label>
                                    <div class="col-md-7">
                                        <input type="text" name="rack" id="rack" class="form-control" >
                                     </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Buying Price :
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-md-7">
                                        <input type="text" name="buying_price" id="buyingPrice" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Selling price:</label>
                                    <div class="col-md-7">
                                        <input type="text" name="selling_price" id="sellingPrice" class="form-control">
                                     </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Quantity :
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-md-7">
                                        <input type="text" name="quantity" id="qtyEdit" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Status</label>
                                    <div class="col-md-7">
                                        <select name="status" id="status" class="form-control">
                                            <option value="Active">Active</option>
                                            <option value="InActive">InActive</option>
                                        </select>
                                     </div>
                                </div>
                            </div>

                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Buy Date :
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                    <input type="date" id="editbuydate" required class="form-control" name="buying_date">
                                   </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Expired Date:</label>
                                    <div class="col-md-7">
                                        <input type="date" id="expiredDate" name="expire_date" class="form-control" >
                                     </div>
                                </div>
                            </div>
                        </div>


                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Unit Name :
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <select name="unit_id" id="unit_id" class="form-control">
                                            @foreach ($allUnits as $item )
                                            <option value="{{$item->id}}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                   </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Remarks:</label>
                                    <div class="col-md-7">
                                        <textarea name="remarks" id="remarksedit" cols="30" rows="2" class="form-control"></textarea>
                                     </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2" >
                            <div class="col-md-6">
                                <div class="row" style="margin-top: -21px">
                                    <label class="col-md-5 col-form-label">Total Amount :</label>
                                    <div class="col-md-7">
                                        <input type="text" name="total_amount_edit" id="totalAmountedit" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row" id="">
                                    <label class="col-md-5 col-form-label">Image </label>
                                    <div class="col-md-7">
                                        <input type="file" name="image" id="image" class="form-control"  onchange="previewImageedit(this)">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div id="imagePreviewedit" style="display: none;">
                                        <img id="previewedit" alt="Image Preview" class="img-fluid" style="max-width: 115px; max-height: 86px; margin-left:245px; margin-top:6px">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!--view modal-->
    <div class="modal fade view-modal-data" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        view Product Details
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger light" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</x-app-layout>


<script>
   function previewImage(input) {
        const preview = document.getElementById('preview');
        const imagePreview = document.getElementById('imagePreview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
                imagePreview.style.display = 'block';
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<script>
     function previewImageedit(input) {
        const preview = document.getElementById('previewedit');
        const imagePreview = document.getElementById('imagePreviewedit');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
                imagePreview.style.display = 'block';
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<script>
    $(document).on('click','#editData',function(){
        var itemId = $(this).data('id');
        $('.bd-example-edit').modal('show');
        alert(itemId);
        $.ajax({
                url: '{{ route('get_product_edit')}}',
                method: 'GET',
                dataType: "JSON",
                data: { 'id': itemId },
                success: function (response) {
                 console.log(response);
                 $('#hiddenId').val(response.id);
                 $('#sup_id').val(response.sup_id).prop('selected', true);
                 $('#cat_id').val(response.cat_id).prop('selected', true);
                 $('#productName').val(response.name);
                 $('#code').val(response.code);
                 $('#godown').val(response.godown).prop('selected', true);
                 $('#rack').val(response.rack);
                 $('#qtyEdit').val(response.quantity);
                 $('#buyingPrice').val(response.buying_price);
                 $('#sellingPrice').val(response.selling_price);
                 $('#totalAmountedit').val(response.total_amount);
                 $('#editbuydate').val(response.buying_date);
                 $('#expiredDate').val(response.expire_date);
                 $('#unit_id').val(response.unit_id).prop('selected', true);
                 $('#status').val(response.status == 'Active' ? 'Active' : 'InActive').prop('selected', true);
                 $('#remarksedit').val(response.remarks);
                 var imageUrl = response.image;
                 var fullImageUrl = '{{ asset('') }}' + imageUrl;
                $('#previewedit').attr('src', fullImageUrl);
                $('#imagePreviewedit').show();

            },
        });
    });
</script>

<script>
    $(document).on('click','#viewDate',function(){
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

<script>
    // Attach event listeners to quantity and buying price inputs
    document.getElementById('qty').addEventListener('input', updateTotalAmount);
    document.getElementById('buyPrice').addEventListener('input', updateTotalAmount);

    function updateTotalAmount() {
        var qty = parseFloat(document.getElementById('qty').value) || 0;
        var buyingPrice = parseFloat(document.getElementById('buyPrice').value) || 0;
        var totalAmount = qty * buyingPrice;
        document.getElementById('totalAmount').value = totalAmount.toFixed(2);
    }
</script>

<script>

//edit quantity * buying price = total amount
    document.getElementById('qtyEdit').addEventListener('input', updateTotalAmount);
    document.getElementById('buyingPrice').addEventListener('input', updateTotalAmount);
    function updateTotalAmount() {
        var qtyEdit = parseFloat(document.getElementById('qtyEdit').value) || 0;
        var buyingPrice = parseFloat(document.getElementById('buyingPrice').value) || 0;
        var totalAmount = qtyEdit * buyingPrice;
        document.getElementById('totalAmountedit').value = totalAmount.toFixed(2);
    }
</script>









