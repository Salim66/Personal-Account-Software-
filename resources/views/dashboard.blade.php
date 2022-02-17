@extends('master')

@section('backend')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="page-title">Dashboard</h3>
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
					  <p class="font-size-26">$845,1258</p>
					</div>
				</div>
				<div class="col-md-3 col-12">
					<div class="box box-body text-center">
					  <h6 class="mb-30">
						<span class="text-uppercase">Daily Total Expense</span>
					  </h6>
					  <p class="font-size-26">$845,1258</p>
					</div>
				</div>
				<div class="col-md-3 col-12">
					<div class="box box-body text-center">
					  <h6 class="mb-30">
						<span class="text-uppercase">Total Expense</span>
					  </h6>
					  <p class="font-size-26">$845,1258</p>
					</div>
				</div>
				<div class="col-md-3 col-12">
					<div class="box box-body text-center">
					  <h6 class="mb-30">
						<span class="text-uppercase">Total Income</span>
					  </h6>
					  <p class="font-size-26">$845,1258</p>
					</div>
				</div>
				<div class="col-md-3 col-12">
					<div class="box box-body text-center">
					  <h6 class="mb-30">
						<span class="text-uppercase">Profit</span>
					  </h6>
					  <p class="font-size-26">$845,1258</p>
					</div>
				</div>

			</div>

		</div>

	</section>
    <!-- /.content -->
</div>

@endsection

