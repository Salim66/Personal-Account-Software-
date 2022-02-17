@extends('master')

@section('backend')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="page-title">Main Investment</h3>
				<div class="d-inline-block align-items-center">
					<nav>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
							<li class="breadcrumb-item active" aria-current="page">Edit Investment</li>
						</ol>
					</nav>
				</div>
			</div>

		</div>
	</div>

    <!-- Form -->
    <section class="content">

        <!-- Basic Forms -->
         <div class="box">
           <!-- /.box-header -->
           <div class="box-body">
             <div class="row">
               <div class="col">
                   <form action="{{ route('business.update', $data->id) }}" method="POST" novalidate>
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
                           <input type="submit" class="btn btn-info" value="Update">
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

</div>

@endsection

