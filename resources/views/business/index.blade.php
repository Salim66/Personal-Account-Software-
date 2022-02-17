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
							<li class="breadcrumb-item active" aria-current="page">Add Business Name</li>
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
                   <form action="{{ route('business.store') }}" method="POST" novalidate>
                    @csrf
                     <div class="row">
                       <div class="col-12">
                           <div class="form-group">
                               <h5>Add Business Name <span class="text-danger">*</span></h5>
                               <div class="controls">
                                   <input type="text" name="name" class="form-control" placeholder="Business Name" required data-validation-required-message="This field is required">
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
                <h3 class="box-title">All Business List</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>Business Name</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>

                        @php
                            $all_data = App\Models\Business::latest()->get();
                        @endphp

                        @foreach($all_data as $data)
                          <tr>
                              <td>{{ $loop->index+1 }}</td>
                              <td>{{ $data->name }}</td>
                              <td>
                                  <a title="Edit" href="{{ route('business.edit', $data->id) }}" class="btn btn-outline-info btn-sm"><i class="fa fa-pencil"></i></a>
                                  <a title="Delete" id="delete" href="{{ route('business.delete', $data->id) }}" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></a>
                              </td>
                          </tr>
                        @endforeach

                      </tbody>
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

@endsection

