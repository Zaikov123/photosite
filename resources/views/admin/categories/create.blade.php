@extends('admin.layouts.mainLayout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add category</li>
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
            <form action="{{route('admin.category.store')}}" method="POST" class="w-25">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" name="category_name"  placeholder="Enter category name">
                    @error('category_name')
                        <div class="text-danger">Field can`t be nullable</div>
                    @enderror

                  </div>
                  <input type="submit" class="btn btn-primary" value="add">
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
