@extends('admin.layouts.mainLayout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit user</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add user</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-12">
            <h6 class="mb-3">
            
            </h6>            
            <form action="{{ route('admin.user.update', [$user])}}" method="POST" class="w-25">
                @csrf
                @method('patch')
                <div class="form-group">
                    <input type="text" class="form-control" name="name"  placeholder="Enter user name"
                    value="{{$user->name}}">                   
                    @error('name')
                        <div class="text-danger">{{$message}}</div>
                    @enderror                    
                </div>
                <div class="form-group">
                    <input type="email" value="{{ $user->email }}" class="form-control" name="email"  placeholder="Enter email">
                    @error('email')
                        <div class="text-danger">{{$message}}</div>
                    @enderror                
                </div>
                <div class="form-group w-50">
                      <label>Role</label>
                      <select name="role" class="form-control">
                        @foreach ($roles as $id => $role)
                          <option value="{{$id}}"
                          {{ $id == $user->role ? ' selected' : ''}}
                          >{{$role}}</option>                        
                        @endforeach
                      </select>

                      @error('role')
                        <div class="text_danger">{{ $message }}</div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <input type="hidden" name="user_id" value="{{$user->id}}"
                  </div>
                <div class="form_group">
                  <input type="submit" class="btn btn-primary" value="edit">
                </div>
            </form>
          </div>
          
          <!-- ./col -->
        </div>
        <!-- /.row -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection