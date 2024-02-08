<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Pay Salary Approve List</h4>
                    <h6 style="padding: 0px;margin:0px">
                        {{-- <span style="font-size: 25px;color:green">TODAY : <?php echo date('m-d-Y'); ?></span> --}}
                    </h6>
                    {{-- <a href="" data-toggle="modal" data-target=".bd-example-modal-lg" class="btn btn-sm btn-success p-1 px-2"><i class="fa fa-plus"></i></i><span class="btn-icon-add"></span>Create</a> --}}
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
                                @foreach ($paidSalary as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->employee->name }}</td>
                                        <td>{{ $item->current_salary }}</td>
                                        <td>{{ $item->advanced_salary }}</td>
                                        <td>{{ $item->paid_salary }}</td>
                                        <td>{{ $item->month }}</td>
                                        <td>{{ $item->year }}</td>
                                        <td>{{ $item->date }}</td>

                                        <td>
                                            <div style="width: 100%;margin-left:-22px">
                                                <form action="{{ route('salary_approve',['id' => $item->id]) }}" method="post" >
                                                    <button class="btn btn-sm btn-success" style="padding: 3px">Approve</i></button>
                                                    @csrf
                                                    @method('PATCH')
                                                </form>
                                                <form action="{{ route('salary_approve_cancale',['id' => $item->id]) }}" method="post" >
                                                    <button class="btn btn-sm btn-danger" style="padding: 3px;float: left;margin-left:58px;margin-top:-27px">Cancale</i></button>
                                                    @csrf
                                                    @method('PATCH')
                                                </form>
                                                <button class="btn btn-sm btn-danger" id="viewApprove" data-id="{{ $item->id }}" class="btn btn-sm btn-info" style="padding: 4px 10px;float: left;margin-left:117px;margin-top:-29px">View</button>
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
                        View Approve Paid Salary
                    </h5>
                    <div style="margin-right: 250px">
                        {{-- <h6 style="color: green">Pay Month: {{ now()->format('F') }} {{ now()->format('Y') }}</h6> --}}

                    </div>

                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <form class="form-valide" action="" method="POST" enctype="multipart/form-data" id="viewform">
                    @csrf
                    <div class="modal-body py-2 px-4">
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5"> Employee Name: </label>
                                    <div class="col-md-7">
                                      <label id="employee_name"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 ">Current Salary : </label>
                                    <div class="col-md-7">
                                        <label id="currentSalary"></label>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5"> Year</label>
                                    <div class="col-md-7">
                                        <label id="year"></label>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5">Advanced Salary : </label>
                                    <div class="col-md-7">
                                        <label id="advancedSalary"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5"> Month: </label>
                                    <div class="col-md-7">
                                        <label id="month"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5"> Paid Salary  :</label>
                                    <div class="col-md-7">
                                        <label id="paidSalary"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5"> Date :</label>
                                    <div class="col-md-7">
                                        <label id="date"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="row">
                                    <label class="col-md-6" style="margin-left: -86px"> Leave :</label>
                                    <div class="col-md-6">
                                        <label id="leave"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="row">
                                    <label class="col-md-10 " style="margin-left: -110px">With out pay leave:</label>
                                    <div class="col-md-2">
                                        <label id="without_pay_leave"></label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-12">
                                <div class="row">
                                    <label class="col-md-3"> Remarks :</label>
                                    <div class="col-md-9">
                                        <label id="remarks"></label>
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
    $(document).on('click','#viewApprove',function(){
        var id = $(this).data('id');
        alert(id);
        $('.bd-example-modal-lg').modal('show');
        $.ajax({
            url:"{{ route('approve_paid_salary_view') }}",
            method:"GET",
            data:{id:id},
            dataType:"json",
            success:function(data){
                $('#employee_name').text(data.employeeName);
                $('#currentSalary').text(data.approvePaidSalary.current_salary);
                $('#advancedSalary').text(data.approvePaidSalary.advanced_salary);
                $('#year').text(data.approvePaidSalary.year);
                $('#month').text(data.approvePaidSalary.month);
                $('#paidSalary').text(data.approvePaidSalary.paid_salary);
                $('#date').text(data.approvePaidSalary.date);
                $('#leave').text(data.approvePaidSalary.leave);
                $('#without_pay_leave').text(data.approvePaidSalary.with_out_pay_leave);
                $('#remarks').text(data.approvePaidSalary.remarks);
                $('#viewform').find('button[type="submit"]').hide();
           

            }
        })
    })
</script>

