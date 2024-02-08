<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">All Designation List</h4>
                    <a href="" data-toggle="modal" data-target=".bd-example-modal-lg" class="btn btn-sm btn-success p-1 px-2"><i class="fa fa-plus"></i></i><span class="btn-icon-add"></span>Create</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display " style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>SL.NO</th>
                                    <th>Designation Name</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th class="">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allDesignation as $item )
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->designation_name }}</td>
                                    <td>{{ $item->remarks }}</td>
                                    <td>{{ $item->status == 'Active' ? 'Active' : 'InActive' }}</td>
                                    <td style="width:210px;">
                                        <button type="button" class="btn btn-sm btn-success p-1 px-2 edit-data" data-id="{{ $item->id }}"><i class="fa fa-pencil"></i>Edit</button>
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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Create Employee Designation
                    </h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <form class="form-valide" action="{{ route('store_designation') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body py-2 px-4">
                        <div class="row mt-2">
                             <label class="col-md-5 col-form-label">Designation Name :
                                 <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-7">
                                 <input type="text" required  name="designation_name" class="form-control">
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
                        <button type="submit" class="btn btn-sm btn-primary submit_btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <div class="modal fade bd-example" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Edit Employee Designation
                    </h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <form class="form-valide" action="{{ route('update_designation') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="" id="hiddenId" name="hideId" style="margin-left: 35px">
                    <div class="modal-body py-2 px-4">
                        <div class="row mt-2">
                             <label class="col-md-5 col-form-label">Designation Name :
                                 <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-7">
                                 <input type="text" id="DesigName" name="newName" class="form-control" >
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label for="" class="col-md-5 col-form-label">Remarks : </label>
                            <div class="col-md-7">
                                <textarea name="newRemarks" id="DesigRemarks" cols="30" rows="2" class="form-control"></textarea>
                             </div>
                        </div>
                        <div class="row mt-2">
                            <label for="" class="col-md-5">Status:</label>
                                <div class="col-md-7">

                                <select name="newStatus" id="editstatus" class="form-control">

                                </select>
                                </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="height:50px">
                        <button type="button" class="btn btn-sm btn-danger light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-sm btn-primary submit_btn">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <div class="modal fade view-modal-data" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        view Employee Designation
                    </h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <form class="form-valide" action="" method="POST" enctype="multipart/form-data">

                    <div class="modal-body py-2 px-4">
                        <div class="row mt-2">
                             <label class="col-md-5 col-form-label">Designation Name :
                                 <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-7">
                                 <input type="text" id="DesigviewName" selected disabled  name="name" class="form-control" >
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

</x-app-layout>

<script>
$(document).ready(function () {

    $(".edit-data").click(function () {
        $('.bd-example').modal('show');
        var desigId = $(this).data('id');
        $.ajax({
            url:'{{ route('designation_edit') }}',
            method:'GET',
            dataType:"JSON",
            data:{'id':desigId},
            success:function(response){
                console.log(response);
                // alert(response.status);
                $('#hiddenId').val(response.id);
                $('#DesigName').val(response.designation_name);
                $('#DesigRemarks').val(response.remarks);
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
                url:'{{ route('get_designation_view') }}',
                method:'GET',
                dataType:"JSON",
                data:{'id':itemId},
                success:function(response){
                    console.log(response);
                    $('#DesigviewName').val(response.designation_name);
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







