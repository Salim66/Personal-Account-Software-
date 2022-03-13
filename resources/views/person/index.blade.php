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
							<li class="breadcrumb-item active" aria-current="page">Add Person Name</li>
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
                   <form action="{{ route('person.store') }}" method="POST" novalidate>
                    @csrf
                     <div class="row">
                       <div class="col-12">

                           <div class="form-group">
                               <h5>Business Name <span class="text-danger">*</span></h5>
                               <div class="controls">
                                   <select name="business_id" class="form-control" required data-validation-required-message="This field is required">
                                       <option selected disabled>-Select Business Name-</option>
                                    @foreach($all_business as $business)
                                        <option value="{{ $business->id }}">{{ $business->name }}</option>
                                    @endforeach
                                   </select>
                               </div>
                           </div>

                           <div class="form-group">
                            <h5>Person Name <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="person_name" class="form-control" placeholder="Person Name" required data-validation-required-message="This field is required">
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
                              <th>Person Name</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>

                        @php
                            $all_data = App\Models\Person::latest()->get();
                        @endphp

                        @foreach($all_data as $data)
                          <tr>
                              <td>{{ $loop->index+1 }}</td>
                              <td>{{ $data->business->name }}</td>
                              <td>{{ $data->person_name }}</td>
                              <td>
                                  <a title="Edit" href="{{ route('person.edit', $data->id) }}" class="btn btn-outline-info btn-sm"><i class="fa fa-pencil"></i></a>
                                  <a title="Delete" id="delete" href="{{ route('person.delete', $data->id) }}" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></a>
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

