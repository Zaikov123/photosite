@extends('admin.layouts.mainLayout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 d-flex align-items-center">
            <h1 class="m-0 mr-2">{{ $user->name}}</h1>
            <a href="{{ route('admin.user.edit', [$user])}}"><i class="fas fa-pen mr-2"></i></a>
            <form action="{{ route('admin.user.delete', [$user])}}" method="POST">
              @csrf
              @method('delete')
                <button type="submit" class="border-0 bg-transparent">
                  <i class="fas fa-trash text-danger"></i>
                </button>
            </form>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Categories</li>
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
          <div class="col-4">
            <div class="card">
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <tbody>
                    <tr>
                      <td>ID</td>
                      <td>{{$user->id}}</td>
                    </tr>
                    <tr>
                      <td>Name</td>
                      <td>{{$user->name}}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap ">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($photos as $photo)
                            <tr>
                                <td>{{ $photo->photo_name }}</td>
                                <td>
                                    <div>
                                        <a href="{{ route('photo.show', $photo) }}"><img src="{{ asset('storage/' . $photo->preview_image) }}"
                                                         alt="main_image"
                                                         class="w-50"></a>
                                    </div>
                                </td>
                                <td>
                                    <form action="{{ route('admin.photo.delete', [$photo])}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="border-0 bg-transparent">
                                            <i class="fas fa-trash text-danger"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
              <!-- /.card-body -->
            </div>
          </div>

          <!-- ./col -->
        </div>
        <!-- /.row -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
