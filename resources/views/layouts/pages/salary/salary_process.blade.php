<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Salary Process </h4>
                    <h6 style="padding: 0px;margin:0px">

                        <h6 style="color: green;margin-right:167px">Salary Process: {{ now()->format('F') }} {{ now()->format('Y') }}</h6>
                    </h6>
                    <a href="" data-toggle="modal" data-target=".bd-example-modal-lg" class="btn btn-sm btn-success p-1 px-2"><i class="fa fa-plus"></i></i><span class="btn-icon-add"></span>Create</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display " style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>SL.#</th>
                                    <th>Employee Name</th>
                                    <th>Designation</th>
                                    <th>Salary</th>
                                    <th>Adv_Salary</th>
                                    <th>Month</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($salaryProcess as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->employee->name }}</td>
                                        <td>{{ $item->employee->designation->designation_name }}</td>
                                        <td>{{ $item->employee->salary }}</td>
                                        <td>{{ $item->advanced_salary }}</td>
                                        <td>{{ $item->month }}</td>
                                        <td>{{ $item->date }}</td>
                                        <td>
                                            <div>
                                                <button type="button"  class="btn btn-sm btn-success p-1 px-2 edit_data"   data-id="{{ $item->id }}" style="margin-left: -15px"><i class="fa fa-folder-open"></i></i><span class="btn-icon-add"></span>Edit</button>
                                                <button type="button"  class="btn btn-sm btn-info p-1 px-2 view_data"  data-id="{{ $item->id }}" style="float: right"><i class="fa fa-folder-open"></i></i><span class="btn-icon-add"></span>View</button>
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


    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">

                    </h5>
                    <div style="margin-right: 250px">
                        <h6 style="color: green">Create Salary Process: {{ now()->format('F') }} {{ now()->format('Y') }}</h6>

                    </div>

                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <form class="form-valide" action="{{ route('store_salary_process') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body py-2 px-4">
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label" for="emp_namee"> Employee Name: </label>
                                    <div class="col-md-7">
                                        <select name="emp_id" id="employeeName" required class="form-control">
                                            <option value="" selected disabled>Select Employee</option>
                                            @foreach ($allEmployee as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Current Salary : </label>
                                    <div class="col-md-7">
                                        <input type="number" readonly name="current_salary" class="form-control" id="currentSalary">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label" for="per_number"> Year</label>
                                    <div class="col-md-7">
                                        <input type="text" required class="form-control" readonly value="{{ date('Y') }}" name="year">
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Advanced Salary : </label>
                                    <div class="col-md-7">
                                        <input type="text" readonly class="form-control" id="advancedSalary" name="advanced_salary"  required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label"> Month: </label>
                                    <div class="col-md-7">
                                        <select name="month" id="month" required class="form-control dropdwon_select">
                                            <option value="" selected>Select a Month</option>
                                            <option value="January">January</option>
                                            <option value="February">February</option>
                                            <option value="March">March</option>
                                            <option value="April">April</option>
                                            <option value="May">May</option>
                                            <option value="June">June</option>
                                            <option value="July">July</option>
                                            <option value="August">August</option>
                                            <option value="September">September</option>
                                            <option value="October">October</option>
                                            <option value="November">November</option>
                                            <option value="December">December</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label" for="per_number"> Date :</label>
                                    <div class="col-md-7">
                                        <input type="date" id="date" required class="form-control" name="date" value="{{ date('Y-m-d') }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-4">
                                <div class="row">
                                    <label class="col-md-6 col-form-label" for="per_number"> Total vacation :</label>
                                    <div class="col-md-6">
                                        <input type="text" id="totalvacation" readonly required class="form-control" name="total_vacation">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="row">
                                    <label class="col-md-6 col-form-label" for="per_number"> Leave :</label>
                                    <div class="col-md-6">
                                        <input type="text" id="leave" readonly required class="form-control" name="leave" style="margin-left: -27px;width:103px">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="row">
                                    <label class="col-md-6 col-form-label" for="per_number">Without Pay Leave:</label>
                                    <div class="col-md-6">
                                        <input type="text" readonly id="withoutPay" required class="form-control" name="without_pay_leave">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <div class="row">
                                    <label class="col-md-3 col-form-label" for="per_number"> Remarks :</label>
                                    <div class="col-md-9">
                                        <textarea name="remarks" id="remarks" cols="30" rows="2" class="form-control" style="width:106%;margin-left:-30px"></textarea>
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


    <!--edit modal open-->
    <div class="modal fade edit_modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        {{-- Edit Salary Process --}}
                    </h5>
                    <div style="margin-right: 250px">
                        <h6 style="color: green" id="salaryText">Edit Salary Process: <span id="dynamicDate">{{ now()->format('F Y') }}</span></h6>
                    </div>

                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <form class="form-valide" action="{{ route('update_salary_process') }}" method="POST" enctype="multipart/form-data" id="salaryProcessform">
                    @csrf
                    <div class="modal-body py-2 px-4">
                        <input type="hidden" id="hiddenId" name="hiddenId">
                        <input type="hidden" id="hiddenempId" name="hiddenempId">
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label" for="emp_namee"> Employee Name: </label>
                                    <div class="col-md-7">
                                       <input type="text" readonly name="emp_id" class="form-control" id="employeeNamee">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Current Salary : </label>
                                    <div class="col-md-7">
                                        <input type="number" readonly name="current_salary" class="form-control" id="currentSalarye">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label" for="per_number"> Year</label>
                                    <div class="col-md-7">
                                        <input type="text" required class="form-control" readonly value="{{ date('Y') }}" name="year">
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Advanced Salary : </label>
                                    <div class="col-md-7">
                                        <input type="text" readonly class="form-control" id="advancedSalarye" name="advanced_salarye"  required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label"> Month: </label>
                                    <div class="col-md-7">
                                        <select name="monthe" id="monthe"  class="form-control">

                                            <option value="January">January</option>
                                            <option value="February">February</option>
                                            <option value="March">March</option>
                                            <option value="April">April</option>
                                            <option value="May">May</option>
                                            <option value="June">June</option>
                                            <option value="July">July</option>
                                            <option value="August">August</option>
                                            <option value="September">September</option>
                                            <option value="October">October</option>
                                            <option value="November">November</option>
                                            <option value="December">December</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label" for="per_number"> Date :</label>
                                    <div class="col-md-7">
                                        <input type="date" id="datee" required class="form-control" name="datee">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-4">
                                <div class="row">
                                    <label class="col-md-6 col-form-label" for="per_number"> Total vacation :</label>
                                    <div class="col-md-6">
                                        <input type="text" id="totalvacatione" readonly required class="form-control" name="total_vacation">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="row">
                                    <label class="col-md-6 col-form-label" for="per_number"> Leave :</label>
                                    <div class="col-md-6">
                                        <input type="text" id="leavee" readonly required class="form-control" name="leavee" style="margin-left: -27px;width:103px">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="row">
                                    <label class="col-md-6 col-form-label" for="per_number">Without Pay Leave:</label>
                                    <div class="col-md-6">
                                        <input type="text" readonly id="withoutPaye" required class="form-control" name="without_pay_leavee">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <div class="row">
                                    <label class="col-md-3 col-form-label" for="per_number"> Remarks :</label>
                                    <div class="col-md-9">
                                        <textarea name="remarkse" id="remarkse" cols="30" rows="2" class="form-control" style="width:106%;margin-left:-30px"></textarea>
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


<script>
     $(document).on('change', '#employeeName', function () {
        var employeeId = $(this).val();
        $.ajax({
            url: '{{ route('get_current_salary')}}',
            method: 'GET',
            dataType: "JSON",
            data: { 'id': employeeId },
            success: function (response) {
                console.log(response);
                $('#currentSalary').val(response.salary);
                $('#totalvacation').val(response.vacation);
            }
        });
    });


    $(document).on('change', '#month', function () {
        var employeeId = $('#employeeName').val();
        var selectedMonth = $(this).val();
        $.ajax({
            url: '{{ route('get_advanced_salary_for_leave')}}',
            method: 'GET',
            dataType: "JSON",
            data: { 'id': employeeId, 'month': selectedMonth },
            success: function (response) {
                if (response.advancedSalary) {
                    $('#advancedSalary').val(response.advancedSalary);
                } else {
                    $('#advancedSalary').val('No advanced salary');
                }

                // Calculate and update the 'leave' field
                var leaveDays = parseInt(response.countMonthDays);
                $('#leave').val(leaveDays);
                $('#withoutPay').val(response.withoutPayValue);
            }
        });
    });
</script>

<script>
    $(document).ready(function () {

        $(".edit_data").click(function () {
            $('.edit_modal').modal('show');
            var id = $(this).data('id');
            $.ajax({
                url:'{{ route('edit_salary_process') }}',
                method:'GET',
                dataType:"JSON",
                data:{'id':id},
                success:function(response){
                    console.log(response);
                    alert(response.month);
                    // alert(response.status);
                    $('#hiddenId').val(response.id);
                    $('#hiddenempId').val(response.emp_id);
                    $('#employeeNamee').val(response.employee.name);
                    $('#currentSalarye').val(response.current_salary);
                    $('#advancedSalarye').val(response.advanced_salary);
                    $('#monthe').val(response.month);
                    $('#datee').val(response.date);
                    $('#totalvacatione').val(response.total_vacation);
                    $('#leavee').val(response.leave);
                    $('#withoutPaye').val(response.without_pay_leave);
                    $('#remarkse').val(response.remarks);


                    $(document).on('change', '#monthe', function () {
                    var employeeId = $('#hiddenempId').val();
                    var selectedMonth = $(this).val();
                    $.ajax({
                        url: '{{ route('get_advanced_salary_for_leave')}}',
                        method: 'GET',
                        dataType: "JSON",
                        data: { 'id': employeeId, 'month': selectedMonth },
                        success: function (response) {

                            if (response.advancedSalary) {
                                $('#advancedSalarye').val(response.advancedSalary);
                            } else {
                                $('#advancedSalarye').val('No advanced salary');
                            }

                            // Calculate and update the 'leave' field
                            var leaveDays = parseInt(response.countMonthDays);
                            $('#leavee').val(leaveDays);
                            $('#withoutPaye').val(response.withoutPayValue);
                        }
                    });
                });


                }
            });


        });
    });
</script>

<script>
    $(document).ready(function () {

        $(".view_data").click(function () {
            $('.edit_modal').modal('show');
            var id = $(this).data('id');
            $.ajax({
                url:'{{ route('edit_salary_process') }}',
                method:'GET',
                dataType:"JSON",
                data:{'id':id},
                success:function(response){
                    console.log(response);
                    var h6Element = document.getElementById('salaryText');
                    var dynamicDateElement = document.getElementById('dynamicDate');
                    dynamicDateElement.textContent = '{{ now()->format("F Y") }}';
                    h6Element.innerHTML = 'View Salary Process: ' + dynamicDateElement.textContent;
                    // alert(response.status);
                    $('#hiddenId').val(response.id);
                    $('#hiddenempId').val(response.emp_id);
                    $('#employeeNamee').val(response.employee.name);
                    $('#currentSalarye').val(response.current_salary);
                    $('#advancedSalarye').val(response.advanced_salary);
                    $('#monthe').val(response.month).prop('disabled', true);
                    // $('#datee').val(response.date);
                    $('#datee').attr('type', 'text').val(response.date).prop('readonly', true);
                    $('#totalvacatione').val(response.total_vacation);
                    $('#leavee').val(response.leave);
                    $('#withoutPaye').val(response.without_pay_leave);
                    $('#remarkse').val(response.remarks).prop('readonly', true);
                    $('#salaryProcessform').find('button[type="submit"]').hide();
                }
            });


        });
    });
</script>















































