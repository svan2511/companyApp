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
            <h1>User Profile</h1>
            @if(Session::has('succMsg'))
            <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h6 id='succMsg'><i class="icon fas fa-check"></i> {{Session::get('succMsg')}}</h6>
          </div>
            @endif
           
          </div>
          <div class="col-sm-6">
            <!-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol> -->
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                       @if($user->img!=null)
                        <img class="profile-user-img img-fluid img-circle" src="{{ asset('storage/admin_assets/users') }}/{{ $single->img }}" alt="user image">
                        @else
                        <img class="profile-user-img img-fluid img-circle" src="{{ asset('storage/admin_assets/users/profile.png') }}" alt="user image">
                        @endif
                </div>

                <h3 class="profile-username text-center">{{$user->name}}</h3>

                <p class="text-muted text-center">User Role </p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Email: </b> <a class="float-right">{{$user->email}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Phone:</b> <a class="float-right">{{$user->phone}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Mac:</b> <a class="float-right">{{$user->mac}}</a>
                  </li>
                  <!-- <li class="list-group-item">
                    <b>Friends</b> <a class="float-right">13,287</a>
                  </li> -->
                </ul>

                <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Other Details </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong>Total Cash Back Transfer</strong>

                <p class="text-muted">
                <i class="fas fa-rupee-sign"></i>  1000
                </p>
 </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#downApp" data-toggle="tab">Downloaded Apps</a></li>
                   <li class="nav-item"><a class="nav-link" href="#wfdownload" data-toggle="tab">Waiting for Download </a></li> 
                  <li class="nav-item"><a class="nav-link" href="#allReferels" data-toggle="tab">All Refrals</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="downApp">
                    <!-- Post -->

                    @if(count($user->apps)>0)
                    @foreach($user->apps as $single)
                    <div class="post">
                      <div class="user-block">
                        @if($single->img!=null)
                        <img class="img-circle img-bordered-sm" src="{{ asset('storage/admin_assets/apps') }}/{{ $single->img }}" alt="user image">
                        @else
                        <img class="img-circle img-bordered-sm" src="{{ asset('storage/admin_assets/apps/no-icon.jpg') }}" alt="user image">
                        @endif
                        <span class="username">
                          <a href="#">{{$single->title}}</a>
                          <!-- <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a> -->
                        </span>
                        <span class="description">Dowloaded At - {{ date("d-F-Y", strtotime($single->download_at)); }}</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                      {{$single->description}}
                      </p>

                      <!-- <p>
                        <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                        <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                        <span class="float-right">
                          <a href="#" class="link-black text-sm">
                            <i class="far fa-comments mr-1"></i> Comments (5)
                          </a>
                        </span>
                      </p> -->

                      <!-- <input class="form-control form-control-sm" type="text" placeholder="Type a comment"> -->
                  </div>
                    <!-- /.post -->
                    @endforeach
                    @else
                    <h6>No Downloads</h6>
                    @endif
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="wfdownload">
                    <!-- Post -->
                    @if(count($remainApps)>0)
                    @foreach($remainApps as $single)
                    <div class="post">
                      <div class="user-block">
                        @if($single->img!=null)
                        <img class="img-circle img-bordered-sm" src="{{ asset('storage/admin_assets/apps') }}/{{ $single->img }}" alt="user image">
                        @else
                        <img class="img-circle img-bordered-sm" src="{{ asset('storage/admin_assets/apps/no-icon.jpg') }}" alt="user image">
                        @endif
                        <span class="username">
                          <a href="#">{{$single->title}}</a>
                          <!-- <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a> -->
                        </span>
                        <span class="description">Dowloaded At - {{ date("d-F-Y", strtotime($single->download_at)); }}</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                      {{$single->description}}
                      </p>
                     
                      <input type="button" data-app ="{{$single->id}}" data-user="{{$user->id}}" class="btn btn-info updtuserApp" value="Add This to User Account" />
                      <!-- <input class="form-control form-control-sm" type="text" placeholder="Type a comment"> -->
                  </div>
                    <!-- /.post -->
                    @endforeach
                    @else
                    <h6>No More App for Download </h6>
                    @endif
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="allReferels">
                  <table id="" class="table table-bordered table-striped">
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
				  @foreach( $allReferels as $single)
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
						</td>
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
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection