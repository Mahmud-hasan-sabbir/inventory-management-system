<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        All Employee List
                    </h4>
                    <a href="" data-toggle="modal" data-target=".bd-example-modal-lg" class="btn btn-sm btn-success p-1 px-2"><i class="fa fa-plus"></i></i><span class="btn-icon-add"></span>Create</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display " style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>SL.NO</th>
                                    <th>Employee Name</th>
                                    <th>Phone number</th>
                                    <th>Designation</th>
                                    <th>Salary</th>
                                    <th>Image</th>
                                    <th >Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allEmployee as $data )
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->perso_number }}</td>
                                        <td>{{ $data->designation->designation_name }}</td>
                                        <td>{{ $data->salary }}</td>
                                        <td>
                                            <img src="{{ asset($data->image) }}" alt="" style="width: 40px" height="40px">
                                        </td>
                                        <td>

                                            <a href="#" id="edit_employee" data-id="{{ $data->id }}" class="btn btn-sm btn-success p-1 px-2" style="margin-right:-13px">
                                                <i class="fa fa-pencil"></i><span class="btn-icon-add"></span>Edit
                                            </a>
                                            <a href="#" id="view_employee" data-id="{{ $data->id }}" class="btn btn-sm btn-danger p-1 px-2" style="margin-left: 19px">
                                                <i class="fa fa-pencil"></i><span class="btn-icon-add"></span>View
                                            </a>
                                            <a href="#" id="delete_employee" data-id="{{ $data->id }}" class="btn btn-sm btn-info p-1 px-2" style="float: right">
                                                <i class="fa fa-pencil"></i><span class="btn-icon-add"></span>Delete
                                            </a>
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

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Create New Employee
                    </h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <form class="form-valide" action="{{ route('store_employee') }}" method="POST" enctype="multipart/form-data" id="employeeForm">
                    @csrf
                    <div class="modal-body py-2 px-4">
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label" for="emp_namee"> Employee Name: </label>
                                    <div class="col-md-7">
                                        <input type="text" name="emp_name" id="emp_name" maxlength="30" class="form-control" placeholder="Enter a name" required oninput="validateInput(this)">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label" for="designation"> Designation: </label>
                                    <div class="col-md-7">
                                        <select name="designation" id="designation" class="form-control">
                                            <option value="">Select Designation</option>
                                            @foreach ($allDesignation as $data)
                                                <option value="{{ $data->id }}"> {{ $data->designation_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label" for="per_number"> Personal Number:</label>
                                    <div class="col-md-7">
                                        <input type="number" class="form-control" name="per_number" id="per_number" placeholder="Enter a personal Number" required oninput="validateNumberLength(this)">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Email : </label>
                                    <div class="col-md-7">
                                       <input type="email" class="form-control" id="email" name="email" placeholder="Enter a Email" required>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Work Experience </label>
                                    <div class="col-md-7" style="float:right">
                                        <input type="text" class="form-control" id="workExperience" name="work_experience" placeholder="Enter a Work Experience" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Salary : </label>
                                    <div class="col-md-7">
                                        <input type="number" name="salary" class="form-control" id="salary" placeholder="Enter a Salay" required oninput="validatesalaryLength(this)">
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Emergency-Contact-Name</label>
                                    <div class="col-md-7">
                                        <input type="text" name="emg_con_name" id="emConName" class="form-control" maxlength="30" placeholder="Emergency-Contact-Name" required oninput="validateInput(this)">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label"> Emergency-Contact-Number </label>
                                    <div class="col-md-7" style="float:right">
                                        <input type="number" class="form-control" id="emConNum" name="emg_con_number" placeholder="Emergency-Contact-Number" required oninput="validateNumberLength(this)">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label"> Relation_ship </label>
                                    <div class="col-md-7" style="float:right">
                                        <input type="text" class="form-control" id="relationship" name="relationship" maxlength="30" placeholder="Relation_ship" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label"> vacation : </label>
                                    <div class="col-md-7">
                                      <input type="number" class="form-control" id="vacation" name="vacation" placeholder="Enter a vacation" required oninput="validatevacationLength(this)">
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label"> Address : </label>
                                    <div class="col-md-7">
                                       <textarea name="address" id="address" cols="30" rows="2" class="form-control" placeholder="Present Address" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">NID Number</label>
                                    <div class="col-md-7">
                                        <input class="input form-control" id="NID" name="nid" placeholder="X-XXXX-XXXXX-XX-X" autocomplete="off" autofocus title="National ID Input" aria-labelledby="InputLabel" aria-invalid aria-required="true" required tabindex="1" />
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label"> Remarks : </label>
                                    <div class="col-md-7">
                                        <textarea name="remarks" id="remarks" cols="30" rows="2" class="form-control"  placeholder="Remarks"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row" id="viewImage" style="margin-top: -21px">
                                    <label class="col-md-5 col-form-label">Image </label>
                                    <div class="col-md-7">
                                        <input type="file" name="image" id="image" class="form-control"  onchange="previewImage(this)">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label"> status </label>
                                    <div class="col-md-7">
                                        <select class="form-control" id="status" name="status">
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div id="imagePreview" style="display: none;">
                                        <img id="preview" alt="Image Preview" class="img-fluid" style="width:130px; max-height: 86px; margin-left:256px; margin-top:-14px">
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer" style="height:50px">
                        <button type="button" class="btn btn-sm btn-danger light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-sm btn-danger light">Submit</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<script src="https://cdnjs.cloudflare.com/ajax/libs/imask/3.3.0/imask.min.js"></script>


<!-- input field only alpabatic hobe not numeric validation-->
<script>
    function validateInput(input) {
        input.value = input.value.replace(/[0-9]/g, '');

    }
   //input field only 20 digit hobe not more than 20 digit validation

   function validateNumberLength(input) {
        var inputLength = input.value.toString().length;
        if (inputLength > 20) {
            input.value = input.value.toString().slice(0, 20);
        }
    }

    //input field only 10 digit hobe not more than 10 digit validation
    function validatesalaryLength(input) {
        var inputLength = input.value.toString().length;
        if (inputLength > 10) {
            input.value = input.value.toString().slice(0, 10);
        }
    }

    //input field only 2 digit hobe not more than 2 digit validation
    function validatevacationLength(input) {
        var inputLength = input.value.toString().length;
        if (inputLength > 2) {
            input.value = input.value.toString().slice(0, 2);
        }
    }
    //nid validation
    document.addEventListener("DOMContentLoaded", () => {
       const input = document.getElementById("NID");
       const mask = new IMask(input, { mask: "0-0000-00000-00-0"
       });
       function validNationalID(id) {
       if (id.length != 13) return false;
       for (i = 0, sum = 0; i < 12; i++) {
         sum += parseInt(id.charAt(i)) * (13 - i);
       }
       let mod = sum % 11;
       let check = (11 - mod) % 10;
       if (check == parseInt(id.charAt(12))) {
         return true;
       }
       return false;
     }
   });

   //image input than show image
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
    $(document).on('click', '#edit_employee', function () {
        var employeeId = $(this).data('id');
        $('.bd-example-modal-lg').modal('show');
        $.ajax({
            url: '{{ route('edit_employee')}}',
            method: 'GET',
            dataType: "JSON",
            data: { 'id': employeeId },
            success: function (response) {
                console.log(response);
                $('#emp_name').empty();
                $('#emp_name').val(response.name);
                $('#designation').val(response.desig_id).prop('selected', true);
                $('#email').empty();
                $('#email').val(response.email);
                $('#workExperience').empty();
                $('#workExperience').val(response.experience);
                $('#salary').empty();
                $('#salary').val(response.salary);
                $('#emConName').empty();
                $('#emConName').val(response.em_con_name);
                $('#emConNum').empty();
                $('#emConNum').val(response.em_con_number);
                $('#relationship').empty();
                $('#relationship').val(response.relationship);
                 $('#NID').empty();
                $('#NID').val(response.nid);
                $('#per_number').empty();
                $('#per_number').val(response.perso_number);
                $('#vacation').empty();
                $('#vacation').val(response.vacation);
                $('#address').empty();
                $('#address').val(response.address);
                $('#remarks').empty();
                $('#remarks').val(response.remarks);
                $('#status').val(response.status).prop('selected', true);
                var imageUrl = response.image;
                var fullImageUrl = '{{ asset('') }}' + imageUrl;
                $('#preview').attr('src', fullImageUrl);
                $('#imagePreview').show();
                var updateRoute = '{{ route('update_employee', ['id' => ':id']) }}';
                updateRoute = updateRoute.replace(':id', response.id);
                $('#employeeForm').attr('action', updateRoute);
                $('#employeeForm').find('button[type="submit"]').text('Update');
            }
        });
    });

</script>


<script>
    $(document).on('click', '#view_employee', function () {
        var employeeId = $(this).data('id');
        $('.bd-example-modal-lg').modal('show');
        alert(employeeId);

        $.ajax({
            url: '{{ route('edit_employee')}}',
            method: 'GET',
            dataType: "JSON",
            data: { 'id': employeeId },
            success: function (response) {
                console.log(response);
                $('#emp_name').empty();
                $('#emp_name').val(response.name).prop('readonly', true);
                $('#email').empty();
                $('#email').val(response.email).prop('readonly', true);
                $('#workExperience').empty();
                $('#workExperience').val(response.experience).prop('readonly', true);
                $('#salary').empty();
                $('#salary').val(response.salary).prop('readonly', true);
                $('#emConName').empty();
                $('#emConName').val(response.em_con_name).prop('readonly', true);
                $('#emConNum').empty();
                $('#emConNum').val(response.em_con_number).prop('readonly', true);
                $('#relationship').empty();
                $('#relationship').val(response.relationship).prop('readonly', true);
                $('#NID').empty();
                $('#NID').val(response.nid).prop('readonly', true);
                $('#per_number').empty();
                $('#per_number').val(response.perso_number).prop('readonly', true);
                $('#vacation').empty();
                $('#vacation').val(response.vacation).prop('readonly', true);
                $('#address').empty();
                $('#address').val(response.address).prop('readonly', true);
                $('#remarks').empty();
                $('#remarks').val(response.remarks).prop('readonly', true);
                $('#status').val(response.status).prop('selected', true).prop('disabled', true);
                $('#viewImage').hide();
                var imageUrl = response.image;
                var fullImageUrl = '{{ asset('') }}' + imageUrl;
                $('#preview').attr('src', fullImageUrl);
                $('#imagePreview').show();
                $('#preview').attr('src', fullImageUrl).css({
                    'width': '200px',
                    'max-height': '137px',
                    'margin-left': '256px',
                    'margin-top': '-71px'
                });

                $('#employeeForm').find('button[type="submit"]').hide();
            }
        });
    });

</script>



<script>
    $(document).on('click', '#delete_employee', function(){
        Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to Employee this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
        }).then((result) => {
        if (result.isConfirmed) {
            var employeeId = $(this).data('id');
            $.ajax({
                url:'{{ route('delete_employee') }}',
                method:"GET",
                dataType:"JSON",
                data:{'id': employeeId},
                success:function (response) {
                    Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    );
                    $('.swal2-confirm').click(function(){
                        location.reload();
                    });

                }
        });
        }
        })
    });
 </script>




{{-- <script>
    $(document).on('click', '#delete_employee', function (e) {
        e.preventDefault();
        var employeeId = $(this).data('id');
        var link = '{{ route('edit_employee', ['id' => ':id']) }}';
        link = link.replace(':id', employeeId);

        $.ajax({
            url: link,
            method: 'GET',
            dataType: "JSON",
            success: function (response) {
                console.log(response);

                swal({
                    title: "Are you sure you want to delete?",
                    text: "Once deleted, this will be permanently deleted!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: link,
                            method: 'DELETE',
                            dataType: "JSON",
                            success: function (deleteResponse) {
                                console.log(deleteResponse);
                                window.location.href = '{{ route('employee_index') }}';
                            },
                            error: function (error) {
                                console.error(error);
                            }
                        });
                    } else {
                        swal("Safe Data!");
                    }
                });
            },
            error: function (error) {
                console.error(error);
            }
        });
    });
</script> --}}

// <script>
//     $(document).on("click", "#delete_employee", function(e){
//         e.preventDefault();
//         var employeeId = $(this).data('id');
//         alert(employeeId);
//            swal({
//              title: "Are you Want to delete?",
//              text: "Once Delete, This will be Permanently Delete!",
//              icon: "warning",
//              buttons: true,
//              dangerMode: true,
//            })
//            .then((willDelete) => {
//              if (willDelete) {
//                   window.location.href = link;
//              } else {
//                // swal("Safe Data!");
//              }
//            });
//        });

// </script>
















