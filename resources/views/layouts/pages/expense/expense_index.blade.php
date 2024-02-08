<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">All Expense List</h4>
                    <a href="" data-toggle="modal" data-target=".bd-example-modal-lg" class="btn btn-sm btn-success p-1 px-2"><i class="fa fa-plus"></i></i><span class="btn-icon-add"></span>Create</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display " style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>SL.NO</th>
                                    <th>Details</th>
                                    <th>Amount</th>
                                    <th>Month</th>
                                    <th>Year</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th class="">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allExpense as $item )
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->expense_name }}</td>
                                    <td>{{ $item->amount }}</td>
                                    <td>{{ $item->month }}</td>
                                    <td>{{ $item->year }}</td>
                                    <td>{{ $item->date }}</td>
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
                        Create Expense Details
                    </h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <form class="form-valide" action="{{ route('store_expense') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body py-2 px-4">
                        <div class="row mt-2">
                             <label class="col-md-5 col-form-label">Expense Details :
                                 <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-7">
                                <textarea name="expense_name" required cols="30" rows="2" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label for="" class="col-md-5 col-form-label">Amount : </label>
                            <div class="col-md-7">
                                <input type="text" required name="amount" class="form-control" >
                             </div>
                        </div>
                        <div class="row mt-2">
                            <label for="" class="col-md-5 col-form-label">Date : </label>
                            <div class="col-md-7">
                                <input type="date" value="{{ now()->format('Y-m-d') }}" name="date" class="form-control">
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
                        Edit Expense Details
                    </h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <form class="form-valide" action="{{ route('update_expense') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body py-2 px-4">
                        <input type="text" name="hideId" id="hiddenId">
                        <div class="row mt-2">
                             <label class="col-md-5 col-form-label">Expense Details :
                                 <span class="text-danger">*</span>
                            </label>
                            <div class="col-md-7">
                                <textarea name="expense_name" id="editExpenseDetails" required cols="30" rows="2" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label for="" class="col-md-5 col-form-label">Amount : </label>
                            <div class="col-md-7">
                                <input type="text" required name="amount" id="amount" class="form-control">
                             </div>
                        </div>
                        <div class="row mt-2">
                            <label for="" class="col-md-5 col-form-label">Date : </label>
                            <div class="col-md-7">
                                <input type="date" id="date" value="" name="date" class="form-control">
                             </div>
                        </div>
                        <div class="row mt-2">
                            <label for="" class="col-md-5">Status:</label>
                                <div class="col-md-7">
                                <select name="status" id="status" class="form-control">
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



    <div class="modal fade view-modal-data" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        view Expense Details
                    </h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <form class="form-valide" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body py-2 px-4">
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Expense Details :
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                      <label for="" id="expenseview" style="margin-top: 7px"></label>
                                   </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Amount : </label>
                                    <div class="col-md-7">
                                        <label for="" id="amountview" style="margin-top: 7px"></label>
                                     </div>
                                 </div>
                            </div>
                            
                        </div>
                       
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Month : </label>
                                    <div class="col-md-7">
                                        <label for="" id="expenseMonthview" style="margin-top: 7px"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Year : </label>
                                    <div class="col-md-7">
                                        <label for="" id="expenseYearview" style="margin-top: 7px"></label>
                                     </div>
                                 </div>
                            </div>
                           
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Date : </label>
                                    <div class="col-md-7">
                                        <label for="" id="dateview" style="margin-top: 7px"></label>
                                     </div>
                                 </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5">Status:</label>
                                        <div class="col-md-7">
                                             <label for="" id="statusview" style="margin-top: 7px"></label>
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

        $(".edit-data").click(function () {
            $('.bd-example').modal('show');
            var id = $(this).data('id');
            alert(id);
                $.ajax({
                    url:"{{ route('edit_expense') }}",
                    method:'GET',
                    dataType:"JSON",
                    data:{'id':id},
                    success:function(response){
                        console.log(response);
                        $('#hiddenId').val(response.id);
                        $('#editExpenseDetails').val(response.expense_name);
                        $('#amount').val(response.amount);
                        $('#date').val(response.date);
                        $('#status').empty();
                        $('#status').append('<option value="InActive" ' + (response.status == 'InActive' ? 'selected' : '') + '>InActive</option>');
                        $('#status').append('<option value="Active" ' + (response.status == 'Active' ? 'selected' : '') + '>Active</option>');

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
                url:"{{ route('edit_expense') }}",
                method:'GET',
                dataType:"JSON",
                data:{'id':itemId},
                success:function(response){
                    console.log(response);
                        $('#expenseview').text(response.expense_name);
                        $('#amountview').text(response.amount);
                        $('#expenseMonthview').text(response.month);
                        $('#expenseYearview').text(response.year);
                        $('#dateview').text(response.date);
                        $('#statusview').text(response.status);
                        
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







