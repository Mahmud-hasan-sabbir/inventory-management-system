<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Setting List</h4>
                    <a href="" data-toggle="modal" data-target=".bd-example-modal-lg" class="btn btn-sm btn-success p-1 px-2"><i class="fa fa-plus"></i></i><span class="btn-icon-add"></span>Create</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display " style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>Com-Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>City</th>
                                    <th>Country</th>
                                    <th>Zip-Code</th>
                                    <th>Logo</th>
                                    <th class="">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allSetting as $item )
                                <tr>
                                    <td>{{ $item->com_name }}</td>
                                    <td>{{ $item->com_email }}</td>
                                    <td>{{ $item->com_phone }}</td>
                                    <td>{{ $item->com_city }}</td>
                                    <td>{{ $item->com_country }}</td>
                                    <td>{{ $item->com_zipcode }}</td>
                                    <td>
                                        <img src="{{ asset($item->com_logo) }}" alt="" style="width: 40px" height="40px">
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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                       Setting Details
                    </h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <form class="form-valide" action="{{ route('store_setting_info') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body py-2 px-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Company Name :
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="text" required name="com_name" class="form-control">
                                   </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Company Email:</label>
                                    <div class="col-md-7">
                                        <input type="email" required name="com_email" class="form-control">
                                     </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Company Phone :
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="number" required name="com_phone" class="form-control">
                                   </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Company Mobile:</label>
                                    <div class="col-md-7">
                                        <input type="number" required  name="com_mobile" value="" class="form-control" >
                                     </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Company City :
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="text" required name="com_city" class="form-control">
                                   </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Company Country:</label>
                                    <div class="col-md-7">
                                        <input type="text" required name="com_country" class="form-control" >
                                     </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Company Zip Code :
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-md-7">
                                        <input type="text" required name="com_zipcode" id="buyPrice" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Company Address</label>
                                    <div class="col-md-7">
                                        <textarea id="" name="com_address" cols="30" rows="2" class="form-control"></textarea>
                                        {{-- <input type="text" required name="com_address" class="form-control"> --}}
                                     </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row" id="viewImage" >
                                    <label class="col-md-5 col-form-label">Company Logo</label>
                                    <div class="col-md-7">
                                        <input type="file" required name="image" id="image" class="form-control"  onchange="previewImage(this)">
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
                    <div class="modal-footer" style="height:50px">
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
                        Edit Setting Details
                    </h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <form class="form-valide" action="{{ route('update_setting_info') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body py-2 px-4">
                        <input type="hidden" name="hiddenId" id="hideId">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Company Name :
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="text" id="comName" required name="com_name" class="form-control">
                                   </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Company Email:</label>
                                    <div class="col-md-7">
                                        <input type="email" id="comEmail" required name="com_email" class="form-control">
                                     </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Company Phone :
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="number" id="comPhone" required name="com_phone" class="form-control">
                                   </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Company Mobile:</label>
                                    <div class="col-md-7">
                                        <input type="number" required id="comMobile"  name="com_mobile" value="" class="form-control" >
                                     </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Company City :
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="text" id="comCity" required name="com_city" class="form-control">
                                   </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Company Country:</label>
                                    <div class="col-md-7">
                                        <input type="text" id="comcountry" required name="com_country" class="form-control" >
                                     </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Company Zip Code :
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-md-7">
                                        <input type="text" required name="com_zipcode" id="comZipcode" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Company Address</label>
                                    <div class="col-md-7">
                                        {{-- <input type="text" required name="com_address" id="comaddress" class="form-control"> --}}
                                        <textarea  name="com_address" cols="30" rows="2" id="comaddress" class="form-control"></textarea>
                                     </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row" id="viewImage" >
                                    <label class="col-md-5 col-form-label">Company Logo</label>
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
                    <div class="modal-footer" style="height:50px">
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
                                    <label class="col-md-5 col-form-label"> Company Name :

                                   </label>
                                   <div class="col-md-7">
                                        <label for="" id="companyName" style="margin-top: 7px"></label>
                                   </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Company Email:</label>
                                    <div class="col-md-7">
                                        <label for="" id="companyEmail" style="margin-top: 7px"></label>
                                     </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Company Phone :

                                   </label>
                                   <div class="col-md-7">
                                        <label for="" id="companyPhone" style="margin-top: 7px"></label>
                                   </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Company Mobile:</label>
                                    <div class="col-md-7">
                                        <label for="" id="companyMobile" style="margin-top: 7px"></label>
                                     </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Company City :

                                   </label>
                                   <div class="col-md-7">
                                        <label for="" id="companyCity" style="margin-top: 7px"></label>
                                   </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Company Country:</label>
                                    <div class="col-md-7">
                                        <label for="" id="companyCountry" style="margin-top: 7px"></label>
                                     </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Company Zip Code :

                                   </label>
                                   <div class="col-md-7">
                                        <label for="" id="companyzipcode" style="margin-top: 7px"></label>
                                   </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Company Address</label>
                                    <div class="col-md-7">
                                        <label for="" id="companyaddress"style="margin-top: 7px"></label>
                                     </div>
                                </div>
                            </div>
                        </div>   
                    <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row" >
                                    <label class="col-md-5 col-form-label">Company Logo</label>
                                    <div class="col-md-7">
                                        <label for="" id="companylogo" style="margin-top: 7px"></label>
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
                url: '{{ route('edit_setting_info') }}',
                method: 'GET',
                dataType: "JSON",
                data: { 'id': itemId },
                success: function (response) {
                 console.log(response);
                 $('#hideId').val(response.id);

                 $('#comName').val(response.com_name);

                 $('#comEmail').val(response.com_email);
                 $('#comPhone').val(response.com_phone);
                 $('#comMobile').val(response.com_mobile);
                    $('#comCity').val(response.com_city);
                 $('#comcountry').val(response.com_country);
                    $('#comZipcode').val(response.com_zipcode);
                 $('#comaddress').val(response.com_address);

                 var imageUrl = response.com_logo;
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
                url: '{{ route('setting_info_view') }}',
                method: 'GET',
                dataType: "JSON",
                data: { 'id': itemId },
                success: function (response) {
                 console.log(response);
                 $('#companyName').text(response.com_name);
                 $('#companyEmail').text(response.com_email);
                 $('#companyPhone').text(response.com_phone);
                 $('#companyMobile').text(response.com_mobile);

                 $('#companyCity').text(response.com_city);

                 $('#companyCountry').text(response.com_country);
                 $('#companyzipcode').text(response.com_zipcode);
                 $('#companyaddress').text(response.com_address);
                 var imageUrl = response.com_logo;
                var fullImageUrl = '{{ asset('') }}' + imageUrl;

            // Update the preview with the new image
            $('#previewview').attr('src', fullImageUrl);
            $('#imagePreviewview').show();

            },
        });
    });
</script>











