@extends('master')

@section('backend')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="page-title">Report</h3>
				<div class="d-inline-block align-items-center">
					<nav>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
							<li class="breadcrumb-item active" aria-current="page">Total Overview</li>
						</ol>
					</nav>
				</div>
			</div>

		</div>
	</div>

    @php
        $businesses = App\Models\Business::latest()->get();
    @endphp

    <!-- Search Content -->
    <div class="container" style="margin-top: 100px; margin-left: 20px;">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label>Select Business Name</label>
                    <select name="business_id" class="form-control js-example-disabled-results" id="business_id" style="width: 100%;">
                        <option selected disabled> - Select - </option>
                        @foreach($businesses as $business)
                        <option value="{{ $business->id }}">{{ $business->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Form Date:</label>

                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="from_data">
                    </div>
                    <!-- /.input group -->
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>To Date:</label>

                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="to_data">
                    </div>
                    <!-- /.input group -->
                </div>
            </div>
            <div class="col-md-3" style="margin-top: 30px;">
                <div class="form-group">
                    <input title="Filter" type="button" name="filter" id="filter_report" class="btn btn-sm btn-outline-primary" value="Search" />
                    <input title="Refresh" type="button" name="refresh" id="refresh_report" class="btn btn-sm btn-outline-dark" value="Refresh" />
                </div>
            </div>
        </div>
    </div>
    <!-- !Search Content -->

    <!-- Main content -->
    <section class="content">
	  <div class="row">
		<div class="col-12 col-lg-12">
			<div class="row">
				<div class="col-md-3 col-12">
					<div class="box box-body text-center">
					  <h6 class="mb-30">
						<span class="text-uppercase">Main Investment</span>
					  </h6>
					  <p class="font-size-26"><span class="main_investment_report"></span> TK</p>
					</div>
				</div>
				<div class="col-md-3 col-12">
					<div class="box box-body text-center">
					  <h6 class="mb-30">
						<span class="text-uppercase">Daily Total Expense</span>
					  </h6>
					  <p class="font-size-26"><span class="daily_expense_report"></span> TK</p>
					</div>
				</div>
				<div class="col-md-3 col-12">
					<div class="box box-body text-center">
					  <h6 class="mb-30">
						<span class="text-uppercase">Total Expense</span>
					  </h6>
					  <p class="font-size-26"><span class="total_expense_report"></span> TK</p>
					</div>
				</div>
				<div class="col-md-3 col-12">
					<div class="box box-body text-center">
					  <h6 class="mb-30">
						<span class="text-uppercase">Total Income</span>
					  </h6>
					  <p class="font-size-26"><span class="income_report"></span> TK</p>
					</div>
				</div>
				<div class="col-md-3 col-12">
					<div class="box box-body text-center">
					  <h6 class="mb-30">
						<span class="text-uppercase">Profit</span>
					  </h6>
					  <p class="font-size-26"><span class="profit_report"></span> TK</p>
					</div>
				</div>

			</div>

		</div>

	</section>
    <!-- /.content -->
</div>

@endsection

