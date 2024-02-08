<div>
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <label class="col-md-4 col-form-label font-weight-bold" >This Month Salary : </label>
                <div class="col-md-8">
                   <label class="font-weight-bold" for="" id="salary" style="margin-top: 6px;margin-left:45px"></label>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <label class="col-md-5 col-form-label font-weight-bold" >This Month Selling Amount  : </label>
                <div class="col-md-7">
                   <label class="font-weight-bold" for="" id="totalSaleAmount" style="margin-top: 6px"></label>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <label class="col-md-5 col-form-label font-weight-bold" >This Month Expense Cost : </label>
                <div class="col-md-7">
                   <label class="font-weight-bold" for="" id="expense" style="margin-top: 6px"></label>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <label class="col-md-4 col-form-label font-weight-bold" >Total Invest Amount : </label>
                <div class="col-md-8">
                   <label class="font-weight-bold" for="" id="invest" style="margin-top: 6px;margin-left:46px"></label>
                </div>
            </div>

        </div>
        <div class="col-md-6">
            <div class="row">
                <label class="col-md-5 col-form-label font-weight-bold" >This Month Buying Cost : </label>
                <div class="col-md-7">
                   <label class="font-weight-bold" for="" id="buying" style="margin-top: 6px"></label>
                </div>
            </div>
        </div>
        <div class="col-md-6"></div>
    </div>
</div>
<hr>
<div class="row" style="margin-top: -17px;margin-bottom:-30px">
    <div class="col-md-6"></div>
    <div class="col-md-6">
        <div class="row">
            <label class="col-md-5 col-form-label font-weight-bold" >Total Profit : </label>
            <div class="col-md-7">
               <label class="font-weight-bold" for="" id="profit" style="margin-top: 6px"></label>
            </div>
        </div>
    </div>
</div>


<script>
    
    var paidSalary = {{ $paidSalry }};
    var expense = {{ $allexpense }};
    var totalbuyingPrice = {{ $totalBuyingPrice }};
    var totalSaleAmount = {{ $totalSaleAmount }};
    var invest = paidSalary + expense + totalbuyingPrice;
    var profit = totalSaleAmount - invest;
    document.getElementById('salary').textContent = paidSalary;
    document.getElementById('expense').textContent = expense;
    document.getElementById('buying').textContent = totalbuyingPrice;
    document.getElementById('totalSaleAmount').textContent = totalSaleAmount;
    document.getElementById('invest').textContent = invest;
    document.getElementById('profit').textContent = profit;
</script>






