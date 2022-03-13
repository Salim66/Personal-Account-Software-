@extends('master')

@section('backend')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="page-title">Person</h3>
				<div class="d-inline-block align-items-center">
					<nav>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
							<li class="breadcrumb-item active" aria-current="page">Edit Person Name</li>
						</ol>
					</nav>
				</div>
			</div>

		</div>
	</div>

    @php
        $all_business = App\Models\Business::latest()->get();
    @endphp

    <!-- Form -->
    <section class="content">

        <!-- Basic Forms -->
         <div class="box">
           <!-- /.box-header -->
           <div class="box-body">
             <div class="row">
               <div class="col">
                   <form action="{{ route('person.update', $data->id) }}" method="POST" novalidate>
                    @csrf
                     <div class="row">
                       <div class="col-12">

                           <div class="form-group">
                               <h5>Business Name <span class="text-danger">*</span></h5>
                               <div class="controls">
                                   <select name="business_id" class="form-control" required data-validation-required-message="This field is required">
                                       <option selected disabled>-Select Business Name-</option>
                                    @foreach($all_business as $business)
                                        <option value="{{ $business->id }}" {{ ($data->business_id == $business->id)? 'selected' : '' }}>{{ $business->name }}</option>
                                    @endforeach
                                   </select>
                               </div>
                           </div>

                           <div class="form-group">
                            <h5>Person Name <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="person_name" class="form-control" placeholder="Person Name" required data-validation-required-message="This field is required" value="{{ $data->person_name }}">
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

