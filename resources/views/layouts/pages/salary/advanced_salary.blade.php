<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Advanced Salary </h4>
                    <h6 style="padding: 0px;margin:0px">
                        {{-- <span style="font-size: 25px;color:green">TODAY : <?php echo date('m-d-Y'); ?></span> --}}
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
                                    <th>Year</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($advancedSalary as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->employee->name }}</td>
                                        <td>{{ $item->employee->designation->designation_name }}</td>
                                        <td>{{ $item->employee->salary }}</td>
                                        <td>{{ $item->advanced_salary }}</td>
                                        <td>{{ $item->month }}</td>
                                        <td>{{ $item->year }}</td>
                                        <td>{{ $item->date }}</td>
                                        <td>
                                            <div>
                                                <button type="button"  class="btn btn-sm btn-success p-1 px-2" id="edit_data"  data-id="{{ $item->id }}" style="margin-left: -15px"><i class="fa fa-folder-open"></i></i><span class="btn-icon-add"></span>Edit</button>
                                                <button type="button"  class="btn btn-sm btn-info p-1 px-2" id="view_data"  data-id="{{ $item->id }}" style="float: right"><i class="fa fa-folder-open"></i></i><span class="btn-icon-add"></span>View</button>
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
                        Create Advanced Salary
                    </h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <form class="form-valide" action="{{ route('store_advanced_salary') }}" method="POST" enctype="multipart/form-data" id="advancedsalaryform">
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
                                        <input type="number" name="current_salary" class="form-control" id="currentSalary">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label" for="designation"> Month: </label>
                                    <div class="col-md-7">
                                        <select name="month" id="month" required class="form-control">
                                            <option value="" selected disabled >Select a Month</option>
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
                                    <label class="col-md-5 col-form-label">Advanced Salary : </label>
                                    <div class="col-md-7">
                                       <input type="number" required class="form-control" id="advancedSalary" name="advanced_salary" placeholder="advanced salary" required>
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
                                    <label class="col-md-5 col-form-label" for="per_number"> Date :</label>
                                    <div class="col-md-7">
                                        <input type="date" id="date" required class="form-control" name="date">
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

</x-app-layout>

<script>
    $(document).on('change', '#employeeName', function () {
        var employeeId = $(this).val();
        $.ajax({
            url: '{{ route('get_adv_current_salary')}}',
            method: 'GET',
            dataType: "JSON",
            data: { 'id': employeeId },
            success: function (response) {
                console.log(response);
                $('#currentSalary').val(response.salary);
            }
        });
    });
</script>


<script>
   $(document).on('click', '#edit_data', function () {
        var itemId = $(this).data('id');
        $('.bd-example-modal-lg').modal('show');
        $.ajax({
            url: '{{ route('get_adv_salary_edit')}}',
            method: 'GET',
            dataType: "JSON",
            data: { 'id': itemId },
            success: function (response) {
                console.log(response);
                $('#employeeName').val(response.editAdvancedSalary.emp_id).prop('selected', true);
                $('#employeeName').prop('disabled', true);
                $('#currentSalary').val(response.currentSalary).prop('disabled', true);
                $('#remarks').val(response.editAdvancedSalary.remarks);
                $('#month').val(response.editAdvancedSalary.month).prop('selected', true);
                $('#month').prop('disabled', true);
                $('#advancedSalary').val(response.editAdvancedSalary.advanced_salary);
                $('#date').val(response.editAdvancedSalary.date);
                var updateRoute = '{{ route('update_adv_salary', ['id' => ':id']) }}';
                updateRoute = updateRoute.replace(':id', response.editAdvancedSalary.id);
                $('#advancedsalaryform').attr('action', updateRoute);
                $('#advancedsalaryform').find('button[type="submit"]').text('Update');

            }
        });
    });
</script>


<script>
    $(document).on('click', '#view_data', function () {
         var itemId = $(this).data('id');
         $('.bd-example-modal-lg').modal('show');
         $.ajax({
             url: '{{ route('get_adv_salary_edit')}}',
             method: 'GET',
             dataType: "JSON",
             data: { 'id': itemId },
             success: function (response) {
                 console.log(response);
                 $('#employeeName').val(response.editAdvancedSalary.emp_id).prop('selected', true);
                 $('#employeeName').prop('disabled', true);
                 $('#currentSalary').val(response.currentSalary).prop('disabled', true);
                 $('#remarks').val(response.editAdvancedSalary.remarks).prop('disabled', true);
                 $('#month').val(response.editAdvancedSalary.month).prop('disabled', true);
                 $('#month').prop('disabled', true);
                 $('#advancedSalary').val(response.editAdvancedSalary.advanced_salary).prop('disabled', true);
                 $('#date').val(response.editAdvancedSalary.date).prop('disabled', true);
                 $('#advancedsalaryform').find('button[type="submit"]').hide();

             }
         });
     });
 </script>






























