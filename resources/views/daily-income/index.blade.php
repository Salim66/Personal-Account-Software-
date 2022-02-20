@extends('master')

@section('backend')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="page-title">Daily Income</h3>
				<div class="d-inline-block align-items-center">
					<nav>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
							<li class="breadcrumb-item active" aria-current="page">Add Daily Income</li>
						</ol>
					</nav>
				</div>
			</div>

		</div>
	</div>

    @php
         $businesses = App\Models\Business::latest()->get();
    @endphp

    <!-- Form -->
    <section class="content">

        <!-- Basic Forms -->
         <div class="box">
           <!-- /.box-header -->
           <div class="box-body">
             <div class="row">
               <div class="col">
                   <form action="{{ route('income.store') }}" method="POST" novalidate>
                    @csrf
                     <div class="row">
                       <div class="col-12">
                           <div class="form-group">
                                <label>Select Business Name</label>
                                <select name="business_id" class="form-control js-example-disabled-results" style="width: 100%;">
                                    <option selected disabled> - Select - </option>
                                    @foreach($businesses as $business)
                                    <option value="{{ $business->id }}">{{ $business->name }}</option>
                                    @endforeach
                                </select>
                           </div>
                           <div class="form-group">
                               <h5>Amount <span class="text-danger">*</span></h5>
                               <div class="controls">
                                   <input type="text" name="amount" class="form-control" placeholder="Amount" required data-validation-required-message="This field is required">
                               </div>
                           </div>
                           <div class="form-group">
                               <h5>Remark <span class="text-danger">*</span></h5>
                               <div class="controls">
                                   <input type="text" name="remark" class="form-control" placeholder="Remark" required data-validation-required-message="This field is required">
                               </div>
                           </div>

                       </div>
                     </div>
                       <div>
                           <input type="submit" class="btn btn-info" value="Add New">
                       </div>
                   </form>

               </div>
               <!-- /.col -->
             </div>
             <!-- /.row -->
           </div>
           <!-- /.box-body -->
         </div>
         <!-- /.box -->

    </section>

    <!-- Table -->
    <section class="content">
        <div class="row">

          <div class="col-12">

            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">All Daily Income List</h3>
              </div>
              <!-- /.box-header -->
              <div class="container">
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
                                <input title="Filter" type="button" name="filter" id="filter" class="btn btn-sm btn-outline-primary" value="Search" />
                                <input title="Refresh" type="button" name="refresh" id="refresh" class="btn btn-sm btn-outline-dark" value="Refresh" />
                            </div>
                        </div>
                    </div>
              </div>
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="daily_income" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>Business Name</th>
                              <th>Date</th>
                              <th>Remark</th>
                              <th>Amount</th>
                              <th>Action</th>
                          </tr>
                      </thead>


                      <tfoot>
						<tr>
                            <th rowspan="1" colspan="5" style="text-align: right; font-weight: bold;">Total Amount</th>
                            <th rowspan="1" colspan="1" style="text-align: left; font-weight: bold;" class="total_daily_income"></th>
                        </tr>
					  </tfoot>
                  </table>

                  </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>

          <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>

</div>

 <!-- Modal -->
 <div class="modal center-modal fade dialy_income_edit" id="modal-center" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Daily Income</h5>
        </div>
        <form method="POST" id="edit_dialy_income_form">
            <div class="modal-body">

                    <div class="form-group">
                        <select name="business_id" class="form-control d_income_name">

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Amount</label>
                        <input type="number" name="amount" class="form-control d_income_amount">
                    </div>

                    <div class="form-group">
                        <label for="">Remark</label>
                        <input type="text" name="remark" class="form-control d_income_remark">
                        <input type="hidden" name="id" class="form-control d_income_id">
                    </div>

            </div>
            <div class="modal-footer modal-footer-uniform d-flex justify-content-between">
                <input type="button" class="btn btn-bold btn-sm btn-pure btn-secondary" data-dismiss="modal" value="Close" />
                <input type="submit" name="update" class="btn btn-sm btn-primary" value="UPDATE">
            </div>
        </form>
      </div>
    </div>
  </div>
<!-- /.modal -->

@endsection

