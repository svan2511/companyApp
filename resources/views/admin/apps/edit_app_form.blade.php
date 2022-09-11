@extends('admin/master_layout')
@section('select_app','active')
@section('main_content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1></h1>
          </div>
          <div class="col-sm-6">
           
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
	<?php // "<pre>"; print_r($category);die;?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
               <h3 class="card-title">
			Edit App
			</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{ route('apps.update' , $app->id ) }}"  enctype="multipart/form-data" >
				  @csrf
          @method('put')
          <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" name="title" class="form-control"  value="{{$app->title }}" id="title" placeholder="Enter Title">
					@error('title')
					 <div class="alert alert-danger">{{ $message }}</div>
					@enderror
                  </div>

                  <div class="form-group">
	
				 <div class="custom-file custom-lable-image">
		<input type="file" name="img" class="custom-file-input" id="img">
		<label class="custom-file-label" for="customFile">Select Image</label>
		@error('img')
	   <div class="alert alert-danger">{{ $message }}</div>
	   @enderror
	  
   </div>

	  
   
	</div>

  <div class="form-group">
                        <label> Description</label>
                        <textarea class="form-control" rows="3" name="description" class="form-control" id="description" placeholder="Enter Product Description" >{{$app->description}}</textarea>
                     @error('description')
					 <div class="alert alert-danger">{{ $message }}</div>
					@enderror
                      </div>
                   
                      <div class="form-group">
                    <label for="exampleInputEmail1">Price</label>
                    <input type="text" name="price" class="form-control"  value="{{$app->price}}" id="title" placeholder="Enter Price">
					@error('price')
					 <div class="alert alert-danger">{{ $message }}</div>
					@enderror
                  </div>


                  <div class="form-group">
                    <label for="exampleInputEmail1">Fourth Point</label>
                    <input type="text" name="f_point" class="form-control"  value="{{$app->f_point}}" id="title" placeholder="Enter Fourth Point">
					@error('f_point')
					 <div class="alert alert-danger">{{ $message }}</div>
					@enderror
                  </div>


                </div>
                <!-- /.card-body -->
                <div class="card-footer">
				
			
				  <button type="submit" class="btn btn-primary">Update</button>       
							
                  
                </div>
				</form>
			 
			  
			  
			 
			  
			  
			  
			  
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  

@endsection