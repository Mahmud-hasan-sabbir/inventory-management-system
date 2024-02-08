<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">All Category List</h4>
                    <a href="" data-toggle="modal" data-target=".bd-example-modal-lg" class="btn btn-sm btn-success p-1 px-2"><i class="fa fa-plus"></i></i><span class="btn-icon-add"></span>Create</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display " style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>SL.NO</th>
                                    <th>Category Name</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th class="">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allCategory as $item )
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->cat_name }}</td>
                                    <td>{{ $item->remarks }}</td>
                                    <td>{{ $item->status == 'Active' ? 'Active' : 'InActive' }}</td>
                                    <td style="width:210px;">
                                        <button type="button" class="btn btn-sm btn-success p-1 px-2 edit-data" data-id="{{ $item->id }}"><i class="fa fa-pencil"></i><span class="btn-icon-add"></span>Edit</button>
                                        <button type="button" class="btn btn-sm btn-info p-1 px-2 view-data"  data-id="{{ $item->id }}"><i class="fa fa-folder-open"></i></i><span class="btn-icon-add"></span>View</button>
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
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Create Category Name
                    </h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <form class="form-valide" action="{{ route('store_category') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body py-2 px-4">
                        <div class="row mt-2">
                             <label class="col-md-5 col-form-label">Category Name :
                                 <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-7">
                                 <input type="text" required  name="cat_name" class="form-control">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label for="" class="col-md-5 col-form-label">Remarks : </label>
                            <div class="col-md-7">
                                <textarea name="remarks"  cols="30" rows="2" class="form-control"></textarea>
                             </div>
                        </div>
                        <div class="row mt-2">
                            <label for="" class="col-md-5">Status:</label>
                                <div class="col-md-7">
                                <select name="status"  class="form-control">
                                        <option value="Active">Active</option>
                                        <option value="Inactive">InActive</option>
                                </select>
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
    <div class="modal fade bd-example" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Edit Category
                    </h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <form class="form-valide" id="updateForm" action="{{ route('update_category') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="" id="hiddenId" name="hideId" style="margin-left: 35px">
                    <div class="modal-body py-2 px-4">
                        <div class="row mt-2">
                             <label class="col-md-5 col-form-label">Category Name :
                                 <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-7">
                                 <input type="text" id="catName" name="cat_name" class="form-control" >
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label for="" class="col-md-5 col-form-label">Remarks : </label>
                            <div class="col-md-7">
                                <textarea name="remarks" id="remarksedit" cols="30" rows="2" class="form-control"></textarea>
                             </div>
                        </div>
                        <div class="row mt-2">
                            <label for="" class="col-md-5">Status:</label>
                                <div class="col-md-7">

                                <select name="status" id="editstatus" class="form-control">

                                </select>
                                </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="height:50px">
                        <button type="button" class="btn btn-sm btn-danger light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-sm btn-primary">update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <div class="modal fade view-modal-data" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        view Category
                    </h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <form class="form-valide" action="" method="POST" enctype="multipart/form-data">

                    <div class="modal-body py-2 px-4">
                        <div class="row mt-2">
                             <label class="col-md-5 col-form-label">Category Name :
                                 <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-7">
                                 <input type="text" id="categoryview" selected disabled  name="name" class="form-control" >
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label for="" class="col-md-5 col-form-label">Remarks : </label>
                            <div class="col-md-7">
                                <textarea name="description" selected disabled id="DesigviewRemarks"  cols="30" rows="2" class="form-control"></textarea>
                             </div>
                        </div>
                        <div class="row mt-2">
                            <label for="" class="col-md-5">Status:</label>
                                <div class="col-md-7">
                                    <input type="text" id="viewstatus" class="form-control" value="" disabled>
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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<!-- Include Axios (if not already included) -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

</x-app-layout>


<script>
$(document).ready(function () {

$(".edit-data").click(function () {
    $('.bd-example').modal('show');
    var id = $(this).data('id');
    alert(id);
    $.ajax({
        url:"{{ route('edit_category') }}",
        method:'GET',
        dataType:"JSON",
        data:{'id':id},
        success:function(response){
            console.log(response);
            // alert(response.status);
            $('#hiddenId').val(response.id);
            $('#catName').val(response.cat_name);
            $('#remarksedit').val(response.remarks);
            $('#editstatus').empty();
            $('#editstatus').append('<option value="InActive" ' + (response.status == 'InActive' ? 'selected' : '') + '>InActive</option>');
            $('#editstatus').append('<option value="Active" ' + (response.status == 'Active' ? 'selected' : '') + '>Active</option>');

        }
    });
});
});

</script>





// ============ view data show ====================//

<script>
    $(document).ready(function () {

        $(".view-data").click(function () {
            $('.view-modal-data').modal('show');
            var itemId = $(this).data('id');
            alert(itemId);
            $.ajax({
                url:"{{ route('edit_category') }}",
                method:'GET',
                dataType:"JSON",
                data:{'id':itemId},
                success:function(response){
                    console.log(response);
                    $('#categoryview').val(response.cat_name);
                    $('#DesigviewRemarks').val(response.remarks);
                    $('#viewstatus').val(response.status == 'Active' ? 'Active' : 'Inactive');
                }
            });


        });
    });
    </script>

<script>
    @if(session('success'))
        toastr.success("{{ session('success') }}");
    @endif
</script>







