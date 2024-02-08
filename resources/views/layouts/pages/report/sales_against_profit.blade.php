
<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- card header -->
                <div class="card-header">
                    <h4 class="card-title">
                     Sales Against Profit
                    </h4>
                    <div>
                        {{-- <a href=""  class="btn btn-sm btn-success"><i class="fa fa-print" aria-hidden="true"></i><span class="btn-icon-add"></span>Print</a> --}}
                        <a href="" class="btn btn-sm btn-primary"><i class="fa fa-reply"></i><span class="btn-icon-add"></span>Back</a>
                    </div>

                </div>
                <!-- card body -->
                <div class="card-body">

                        <div class="row">
                            <div class="col-md-5">
                                <div class="row">
                                    <label class="col-md-4 col-form-label font-weight-bold" >Form</label>
                                    <div class="col-md-8">
                                        <input type="date" id="start_date" style="margin-left: 10px"  class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="row">
                                    <label class="col-md-4 col-form-label font-weight-bold" >To</label>
                                    <div class="col-md-8">
                                        <input type="date" id="end_date" style="margin-left: -94px" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="row">
                                    <div class="col-md-8">
                                       <button type="submit" id="filter" class="btn btn-success btn-sm">Filter</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="row mt-4">
                        <table class="table" id="data-table" style="">
                            
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
    $(document).on('click','#filter',function(){
       var startDate = $('#start_date').val();
       var endDate = $('#end_date').val();


           $.ajax({
               url:'{{ route('get_sales_againt_profit_report') }}',
               method:'GET',
               dataType:"html",
               data:{startDate,endDate},
               success:function(response){
                   console.log(response);
                   $('#tbody').html(response);

                   if (response.trim() === '') {

                       $('#data-table thead').hide();
                   } else {

                           $('#data-table thead').show();
                           $('#tbody').html(response);
                   }

               }
           });

       });

</script>

























