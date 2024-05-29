@extends('admin.layouts.mainLayout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Photos</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Photos</li>
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
                        <a href="{{ route('admin.photo.create')}}" class="btn btn-block btn-success">Create</a>
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
                                        <th>Image</th>
                                        <th colspan="3" class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($photos as $photo)
                                        <tr>
                                            <td>{{$photo->id}}</td>
                                            <td>{{$photo->photo_name}}</td>
                                            <td>
                                                <div>
                                                    <img src="{{ asset('storage/' . $photo->preview_image) }}"
                                                         alt="main_image" class="w-50">
                                                </div>

                                            </td>
                                            <td><a href="{{ route('admin.photo.show', [$photo])}}"><i
                                                        class="fas fa-eye"></i></a></td>
                                            <td><a href="{{ route('admin.photo.edit', [$photo])}}"><i
                                                        class="fas fa-pen"></i></a></td>
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
                                    {{ $photos->links() }}
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
