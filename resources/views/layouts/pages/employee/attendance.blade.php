<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Attendance </h4>
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
                                    <th>SL.NO</th>
                                    <th>Employee Name</th>
                                    <th>Image</th>
                                    <th>Designation</th>
                                    <th>Salary</th>
                                    <th>Attendance</th>
                                </tr>
                            </thead>
                            <tbody>
                                <form class="form-valide" action="{{ route('store_attendance') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @foreach ($allEmployee as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>
                                                <img src="{{ asset($data->image) }}" alt="" style="width: 40px" height="40px">
                                            </td>
                                            <td>{{ $data->designation->designation_name }}</td>
                                            <td>{{ $data->salary }}</td>
                                            <td>
                                                <input type="radio" id="present" required name="attendance[{{ $data->id }}]" value="Present" style="margin-left: 20px"> Present
                                                <input type="radio" id="absence" name="attendance[{{ $data->id }}]" value="Absence" style="margin-left: 21px"> Absence
                                            </td>
                                            <input type="hidden" name="emp_id[]" value="{{ $data->id }}">
                                            <input type="hidden" name="att_date" value="{{ date("Y-m-d") }}">
                                            <input type="hidden" name="att_year" value="{{ date("Y") }}">
                                            <input type="hidden" name="att_month" value="{{ date("F") }}">
                                        </tr>
                                    @endforeach

                                    <tr>
                                        <td colspan="6">
                                            <button type="submit" class="btn btn-sm btn-success" style="float: right">Take attendance</button>
                                        </td>
                                    </tr>
                                </form>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Create New Employee
                    </h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <form class="form-valide" action="" method="POST" enctype="multipart/form-data" id="employeeForm">
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
    </div> --}}
</x-app-layout>

























