@extends('admin.layouts.mainLayout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Categories</h1>
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
          <div class="col-2 mb-3">
            <a href="{{ route('admin.category.create')}}" class="btn btn-block btn-success">Create</a>
          </div>
        </div>
        <div class="row">
          <div class="col-4">
            <div class="card">
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Title</th>
                      <th colspan="3" class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($categories as $category)
                    <tr>
                      <td>{{$category->id}}</td>
                      <td>{{$category->category_name}}</td>
                      <td><a href="{{ route('admin.category.show', [$category])}}"><i class="fas fa-eye"></i></a></td>
                      <td><a href="{{ route('admin.category.edit', [$category])}}"><i class="fas fa-pen"></i></a></td>
                      <td>
                        <form action="{{ route('admin.category.delete', [$category])}}" method="POST">
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
