@extends('admin/master_layout')
  
  @section('select_user','active')
  @section('main_content')
   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
		  @if ( Session::has('user_add_msg') )

          <div class="alert alert-success alert-dismissible">
                 <h5><i class="icon fas fa-check"></i>{{ Session::get('user_add_msg') }}</h5>
                </div>
@endif
            <h1></h1>
		
          </div>
          <div class="col-sm-6">
            <h3>All Users</h3>
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
                    <th>Name</th>
                    <th>Image</th>
                    <th>email</th>
                    <th>Mac Address</th>
                    <th>Actions</th>
                    
                  </tr>
                  </thead>
                  <tbody>
				  @foreach( $users as $single)
                  <tr>
                    <td>{{ $single->name }}</td>
                    <td>
                    @if($single->img!=null)
                    <img src="{{ asset('storage/admin_assets/users') }}/{{ $single->img }}"  height="40" width="80" />
                    @else
                    <img src="{{ asset('storage/admin_assets/users/profile.png') }}"  height="40" width="80" />

                    @endif
                    </td>
                    <td>{{ $single->email  }}</td>
                    <td>{{ $single->mac }}</td>
                    
						<td><a href="{{route('users.show' , $single )}}"><button type="button" class="btn btn-success"><i class="fas fa-solid fa-eye"></i></button></a>
	
            <a onclick="if(confirm('Are You Sure to Delete This App !')){ $('#del_app_data_{{$single->id}}').submit(); }" href="javascript:void(0)"><button type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i> </button></a>
            
						</td><form method="POST" id="del_app_data_{{$single->id}}" action="{{route('users.destroy' , $single->id )}}" >
				  @csrf
          @method('delete')
            </form>
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Name</th>
                    <th>Image</th>
                    <th>email</th>
                    <th>Phone</th>
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

  