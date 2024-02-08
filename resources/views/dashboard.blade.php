<x-app-layout>
    <!-- row -->

	<div class="row">
	    <div class="col-xl-3 col-xxl-4 col-lg-6 col-sm-6">
			<div class="widget-stat card bg-danger">
				<div class="card-body  p-4">
					<div class="media">
						<span class="mr-3">
							<i class="flaticon-381-calendar-1"></i>
						</span>
						<div class="media-body text-white text-right">
							<p class="mb-1">To Day Sale</p>
							<h3 class="text-white">{{ $todaySaleAmount }} TK</h3>
                            <div class="progress mb-2 bg-secondary">
                                <div class="progress-bar progress-animated bg-light" style="width: 80%"></div>
                            </div>
						</div>
					</div>
				</div>
			</div>
        </div>
        <div class="col-xl-3 col-xxl-4 col-lg-6 col-sm-6">
			<div class="widget-stat card bg-success">
				<div class="card-body p-4">
					<div class="media">
						<span class="mr-3">
							<i class="flaticon-381-diamond"></i>
						</span>
						<div class="media-body text-white text-right">
							<p class="mb-1">To Day Expense</p>
							<h3 class="text-white">{{ $todayExpenseAmount }} TK</h3>
                            <div class="progress mb-2 bg-secondary">
                                <div class="progress-bar progress-animated bg-light" style="width: 80%"></div>
                            </div>
						</div>
					</div>
				</div>
			</div>
        </div>
        <div class="col-xl-3 col-xxl-4 col-lg-6 col-sm-6">
			<div class="widget-stat card bg-info">
				<div class="card-body p-4">
					<div class="media">
						<span class="mr-3">
							<i class="flaticon-381-heart"></i>
						</span>
						<div class="media-body text-white text-right">
							<p class="mb-1">To day due TK</p>
							<h3 class="text-white">{{ $todayDueAmount }} TK</h3>
                            <div class="progress mb-2 bg-secondary">
                                <div class="progress-bar progress-animated bg-light" style="width: 80%"></div>
                            </div>
						</div>
					</div>
				</div>
			</div>
        </div>
        <div class="col-xl-3 col-xxl-4 col-lg-6 col-sm-6">
			<div class="widget-stat card bg-primary">
				<div class="card-body  p-4">
					<div class="media">
						<span class="mr-3">
							<i class="la la-users"></i>
						</span>
						<div class="media-body text-white">
							<p class="mb-1">to day due received</p>
							<h3 class="text-white">{{ $recDueAmount }} TK</h3>
							<div class="progress mb-2 bg-secondary">
                                <div class="progress-bar progress-animated bg-light" style="width: 80%"></div>
                            </div>
							<small>80% Increase in 20 Days</small>
						</div>
					</div>
				</div>
			</div>
        </div>
	</div>


</x-app-layout>
