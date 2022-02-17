@extends('master')

@section('backend')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="page-title">Business</h3>
				<div class="d-inline-block align-items-center">
					<nav>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
							<li class="breadcrumb-item active" aria-current="page">Edit Business Name</li>
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
                               <h5>Edit Business Name <span class="text-danger">*</span></h5>
                               <div class="controls">
                                   <input type="text" name="name" class="form-control" placeholder="Business Name" value="{{ $data->name }}" required data-validation-required-message="This field is required">
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

