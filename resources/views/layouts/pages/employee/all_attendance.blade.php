<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Attendance List</h4>
                    <div>
                        <a href="{{ route('attendance') }}" class="btn btn-success btn-sm">Manual Attendance</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="row">
                                <label class="col-md-5 col-form-label font-weight-bold">Employee Name</label>
                                <div class="col-md-7" style="margin-left: -21px">

                                    <select name="headName" id="employeeName" class="form-control dropdwon_select" style="margin-left: -20px">
                                        <option value="" selected disabled>Select a Employee Name</option>
                                        @foreach ($allEmployeeName as $item )
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                         @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="row">
                                <label class="col-md-4 col-form-label font-weight-bold" style="margin-left: -38px">Form</label>
                                <div class="col-md-8">
                                    <input type="date" id="start_date"  class="form-control" style="margin-left: -30px">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="row">
                                <label class="col-md-5 col-form-label font-weight-bold" style="margin-left: -70px">To</label>
                                <div class="col-md-7" style="margin-left: -50px">
                                    <input type="date" id="end_date"  class="form-control" style="margin-left: -17px; width:190px">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
                                   <button type="submit" id="filter" class="btn btn-success btn-sm">Filter</button>
                                   <button type="reset" class="btn btn-danger btn-sm btn-reset">Reset</button>
                                </div>
                            </div>
                        </div>
                    </div>

                <div class="row mt-4">
                    <table class="table" id="data-table">
                        <thead class="thead-dark"  style="display: none">
                          <tr>
                            <th >SL.No</th>
                            <th >Employee Name</th>
                            <th >Date</th>
                            <th >Month</th>
                            <th >Year</th>
                            <th >Attendance</th>
                          </tr>
                        </thead>
                        <tbody id="tbody">

                        </tbody>
                      </table>
                </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>

<script>
$(document).ready(function(){
    // Initial load or any other initialization logic

    // Your existing filter logic
    $(document).on('click','#filter', function() {
        var startDate = $('#start_date').val();
        var endDate = $('#end_date').val();
        var empName = $('#employeeName').val();

        $.ajax({
            url: '{{ route('get_filter_data')}}',
            method: 'GET',
            dataType: 'html',
            data: { startDate, endDate, empName },
            success: function(response) {
                console.log(response);
                $('#tbody').html(response);

                if (response.trim() === '') {
                    // If the response is empty, hide the table header
                    $('#data-table thead').hide();
                } else {
                    // If the response has data, show the table header and update the tbody
                    $('#data-table thead').show();
                    $('#tbody').html(response);
                }
            }
        });
    });
});


$(document).on('click', '.btn-reset', function() {
    // Clear input values
    $('#start_date').val('');
    $('#end_date').val('');
    $('#employeeName').val('');

    // Reload the page
    window.location.reload();
});

</script>


