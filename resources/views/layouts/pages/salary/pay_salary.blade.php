<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Pay Salary </h4>
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
                                    <th> Salary</th>
                                    <th>Advance</th>
                                    <th>Paid Salary</th>
                                    <th>Month</th>
                                    <th>Year</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($paidsalary as $item)
                                    <tr style="{{ $item->is_approve == 1 ? 'background-color: #cfad57 !important; color: black' : '' }}">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->employee->name }}</td>
                                        <td>{{ $item->current_salary }}</td>
                                        <td>{{ $item->advanced_salary }}</td>
                                        <td>{{ $item->paid_salary }}</td>
                                        <td>{{ $item->month }}</td>
                                        <td>{{ $item->year }}</td>
                                        <td>{{ $item->date }}</td>
                                        <td>
                                            <div>

                                                <button type="button"  class="btn btn-sm btn-info p-1 px-2" id="view_data"  data-id="{{ $item->id }}" ><i class="fa fa-folder-open"></i></i><span class="btn-icon-add"></span>View</button>
                                                <button type="button" {{ $item->is_approve == 1 ? 'disabled' : '' }} class="btn btn-sm btn-danger p-1 px-2" id="delete_data"  data-id="{{ $item->id }}" ><i class="fa fa-folder-open"></i></i><span class="btn-icon-add"></span>Delete</button>
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
                        Create Pay Salary
                    </h5>
                    <div style="margin-right: 250px">
                        {{-- <h6 style="color: green">Pay Month: {{ now()->format('F') }} {{ now()->format('Y') }}</h6> --}}

                    </div>

                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <form class="form-valide" action="{{ route('store_paidsalary') }}" method="POST" enctype="multipart/form-data" id="paidSalaryFrom">
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
                                        <input type="text" id="year" required class="form-control"  value="{{ date('Y') }}" name="year">
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
                                        <select name="month" id="month" required class="form-control">
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
                                    <label class="col-md-5 col-form-label" for="per_number"> Paid Salary  :</label>
                                    <div class="col-md-7">
                                        <input type="text" id="paidSalary" required class="form-control" name="paidSalary">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label" for="per_number"> Date :</label>
                                    <div class="col-md-7">
                                        <input type="date" id="date" required class="form-control" value="" name="date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="row">
                                    <label class="col-md-6 col-form-label" for="per_number"> Leave :</label>
                                    <div class="col-md-6">
                                        <input type="text" id="leave" readonly required class="form-control" name="leave" style="margin-left: -35px">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="row">
                                    <label class="col-md-8 col-form-label" for="per_number" style="padding:0px; margin:0px;margin-top:9px;margin-left:-36px">With out pay leave:</label>
                                    <div class="col-md-4">
                                        <input type="text" readonly id="withoutpayleave" required class="form-control" name="withoutpaysalary" style="width:71px">
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-sm btn-danger light">Submit</button>

                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>





<script>
    var cumulativeLeaveDays = 0;

    $(document).on('change', '#month', function () {
    var employeeId = $('#employeeName').val();
    var year = $('#year').val();
    var selectedMonth = $(this).val();

    $.ajax({
        url: '{{ route('get_advance_leave_withoutpay')}}',
        method: 'GET',
        dataType: 'JSON',
        data: { 'id': employeeId, 'month': selectedMonth, 'year': year },
        success: function (response) {
            console.log(response);

            if (response.existingRecord) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Already Paid',
                    text: 'This employee has already been paid for the selected month.',
                });
            } else if (response.paySalary && Object.keys(response.paySalary).length > 0) {
                $('#currentSalary').val(response.paySalary.current_salary);

                if (response.paySalary.advanced_salary) {
                    $('#advancedSalary').val(response.paySalary.advanced_salary);
                } else {
                    $('#advancedSalary').val('No advanced salary');
                }

                $('#leave').val(response.paySalary.leave);
                $('#withoutpayleave').val(response.paySalary.without_pay_leave);

                // Calculate and update the 'paidSalary' field
                var salary = parseInt(response.paySalary.current_salary);
                var oneDaySalary = parseInt(response.paySalary.current_salary / 30);
                var advancedSalary = parseInt(response.paySalary.advanced_salary) || 0;
                var withoutPayLeave = parseInt(response.paySalary.without_pay_leave) || 0;

                var paidSalary = salary - advancedSalary;

                // If there is without pay leave, deduct the corresponding amount
                paidSalary -= withoutPayLeave * oneDaySalary;

                $('#paidSalary').val(paidSalary.toFixed(2));
            } else {
                Swal.fire({
                    title: "No Salary Process?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "OK",
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Reset the form
                        $('#currentSalary').val('');
                        $('#advancedSalary').val('');
                        $('#leave').val('');
                        $('#withoutpayleave').val('');
                        $('#paidSalary').val('');
                    }
                });

            }
        },
        error: function (error) {
            console.log(error);
        }
    });
});


</script>


<script>
    $(document).on('click','#view_data',function(){
        var id = $(this).data('id');
        $('.bd-example-modal-lg').modal('show');
        alert(id);
        $.ajax({
            url:"{{ route('paid_salary_view') }}",
            method:"GET",
            data:{id:id},
            dataType:"json",
            success:function(data){
                $('.modal-title').text('View Paid Salary');
                $('#employeeName').val(data.emp_id).prop('selected', true).prop('disabled', true);
                $('#currentSalary').val(data.current_salary).prop('readonly', true);
                $('#advancedSalary').val(data.advanced_salary).prop('readonly', true);
                $('#paidSalary').val(data.paid_salary).prop('readonly', true);
                $('#month').val(data.month).prop('selected', true).prop('disabled', true);;
                $('#year').val(data.year).prop('readonly', true);
                $('#date').val(data.date).prop('readonly', true);
                $('#leave').val(data.leave).prop('readonly', true);
                $('#withoutpayleave').val(data.with_out_pay_leave).prop('readonly', true);
                $('#remarks').val(data.remarks).prop('readonly', true);
                $('#paidSalaryFrom').find('button[type="submit"]').hide();

            }
        })
    })
</script>




<script>
      $(document).on('click', '#delete_data', function(){
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.isConfirmed) {
            var employeeId = $(this).data('id');
            $.ajax({
                url:"{{ route('paid_salary_delete') }}",
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















































