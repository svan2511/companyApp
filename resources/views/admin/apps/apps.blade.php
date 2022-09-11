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
		  @if ( Session::has('app_add_msg') )

          <div class="alert alert-success alert-dismissible">
                 <h5><i class="icon fas fa-check"></i>{{ Session::get('app_add_msg') }}</h5>
                </div>
@endif
            <h1></h1>
			<a href="{{ route('apps.create')}}" class="btn btn-info btn-sm">Add New App</a>
          </div>
          <div class="col-sm-6">
            <h3>All Apps</h3>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           

            <div class="card">
              <div class="card-header">
                <h3 class="card-title"></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Actions</th>
                    
                  </tr>
                  </thead>
                  <tbody>
				  @foreach( $apps as $single)
                  <tr>
                    <td>{{ $single->title }}</td>
                    <td><img src="{{ asset('storage/admin_assets/apps') }}/{{ $single->img }}"  height="40" width="80" /></td>
                    <td>{{ $single->description }}</td>
                    <td>{{ $single->price }}</td>
                    @if($single->status)
                    <td> <span class="float-left badge bg-success"><i class="icon fas fa-check"></i> &nbsp;Active</span> </td>
                    @else
                   <td> <span class="float-left badge bg-danger"><i class="icon fas fa-ban"></i> &nbsp;InActive</span>
                    @endif
                    </td>
						<td><a href="{{route('apps.edit' , $single )}}"><button type="button" class="btn btn-success"><i class="far fa-edit"></i></button></a>
	
            <a onclick="if(confirm('Are You Sure to Delete This App !')){ $('#del_app_data_{{$single->id}}').submit(); }" href="javascript:void(0)"><button type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i> </button></a>
            
						</td><form method="POST" id="del_app_data_{{$single->id}}" action="{{route('apps.destroy' , $single->id )}}" >
				  @csrf
          @method('delete')
            </form>
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Title</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- End content-wrapper -->
  <script>
  </script>
@endsection

  