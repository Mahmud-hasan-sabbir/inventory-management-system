<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Change Attendance </h4>
                    <h6 style="padding: 0px;margin:0px">
                        <span style="font-size: 25px;color:green">TODAY : <?php echo date('m-d-Y'); ?></span>
                    </h6>
                    <a href="{{ route('all_attendance') }}"  class="btn btn-sm btn-success p-1 px-2"><i class="fa fa-plus"></i></i><span class="btn-icon-add"></span>All Attendance</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display " style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>SL.#</th>
                                    <th>Employee Name</th>
                                    <th>Image</th>
                                    <th>Designation</th>
                                    <th>Salary</th>
                                    <th>Attendance</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($changeEmployee as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->employee->name }}</td>
                                        <td>
                                            <img src="{{ asset($item->employee->image) }}" alt="" width="50px" height="50px">
                                        </td>
                                        <td>{{ $item->employee->designation->designation_name }}</td>
                                        <td>{{ $item->employee->salary }}</td>
                                        <td>
                                            <input type="radio" id="present" required name="" {{ $item->attendance == 'Present' ? 'checked' : '' }} value="Present" style="margin-left: 20px"> Present
                                            <input type="radio" id="absence" name="" {{ $item->attendance == 'Absence' ? 'checked' : '' }} value="Absence" style="margin-left: 21px"> Absence
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-success p-1 px-2 edit_data"  data-id="{{ $item->id }}"><i class="fa fa-folder-open"></i></i><span class="btn-icon-add"></span>Edit</button>
                                            <button type="button" class="btn btn-sm btn-info p-1 px-2 view_data"  data-id="{{ $item->id }}"><i class="fa fa-folder-open"></i></i><span class="btn-icon-add"></span>View</button>
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


    <div class="modal fade edit-modal-data" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Edit Employee Attendance
                    </h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <form class="form-valide" action="{{ route('update_change_attendance') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body py-2 px-4">
                        <input type="hidden" id="hiddenId" name="changeAttendanceId">
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Employee Name :
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                      <label for="" id="employeeName"></label>
                                   </div>
                                </div>
                               
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Designation :
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                       <label for="" id="designation"></label>
                                   </div>
                                </div>
                            </div>
                             
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Image :
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                    <img src="" id="image" alt="" style="width: 40px; height:40px">
                                   </div>
                                </div>
                               
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Attendance :
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="radio" id="presentedit" required name="newattendance" value="Present" style="margin-left: 20px"> Present
                                        <input type="radio" id="absenceedit" name="newattendance" value="Absence" style="margin-left: 21px"> Absence
                                   </div>
                                </div>
                            </div>
                             
                        </div>
                    </div>
                    <div class="modal-footer" style="height:50px">
                        <button type="submit" class="btn btn-sm btn-danger success">Update</button>
                        <button type="button" class="btn btn-sm btn-danger light" data-dismiss="modal">Close</button>

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
                        View Employee Attendance
                    </h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <form class="form-valide" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body py-2 px-4">
                        <input type="hidden" id="hiddenId" name="changeAttendanceId">
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Employee Name :
                                       
                                   </label>
                                   <div class="col-md-7">
                                      <label for="" id="employeeNameview"></label>
                                   </div>
                                </div>
                               
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Designation :
                                       
                                   </label>
                                   <div class="col-md-7">
                                       <label for="" id="designationview"></label>
                                   </div>
                                </div>
                            </div>
                             
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Image :
                                       
                                   </label>
                                   <div class="col-md-7">
                                    <img src="" id="imageview" alt="" style="width: 40px; height:40px">
                                   </div>
                                </div>
                               
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Attendance :
                                       
                                    </label>
                                    <div class="col-md-7"> 
                                        <label id="attendance"></label>
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
$(document).ready(function () {
    $(".edit_data").click(function () {
        $('.edit-modal-data').modal('show');
        var itemId = $(this).data('id');
        $.ajax({
            url: '{{ route('get_attendance_edit') }}',
            method: 'GET',
            dataType: "JSON",
            data: { 'id': itemId },
            success: function (response) {
                console.log(response);
                $('#hiddenId').val(response.id);
                $('#designation').text(response.employee.designation.designation_name);
                $('#employeeName').text(response.employee.name);
                $('#image').attr('src', response.employee.image);

                if (response.attendance === 'Present') {
                    $('#presentedit').prop('checked', true);
                    $('#absenceedit').prop('checked', false);
                } else if (response.attendance === 'Absence') {
                    $('#presentedit').prop('checked', false);
                    $('#absenceedit').prop('checked', true);
                } else {
                    $('#presentedit').prop('checked', false);
                    $('#absenceedit').prop('checked', false);
                }
            }
        });
    });
});
</script>


<script>
$(document).ready(function () {
    $(".view_data").click(function () {
        $('.view-modal-data').modal('show');
        var itemId = $(this).data('id');
        alert(itemId);
        $.ajax({
            url: '{{ route('get_attendance_view') }}',
            method: 'GET',
            dataType: "JSON",
            data: { 'id': itemId },
            success: function (response) {
                console.log(response);

                $('#designationview').text(response.employee.designation.designation_name);
                $('#employeeNameview').text(response.employee.name);
                $('#imageview').attr('src', response.employee.image);
                $('#attendance').text(response.attendance);
            }
        });
    });
});
</script>

























