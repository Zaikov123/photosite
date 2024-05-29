@extends('admin.layouts.mainLayout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Stats</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
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
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $data['usersCount'] }}</h3>

                                <p>Users</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-user"></i>
                            </div>
                            <a href="{{ route('admin.user.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $data['categoriesCount'] }}</h3>

                                <p>Categories</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-th-list"></i>
                            </div>
                            <a href="{{ route('admin.category.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{$data['photosCount']}}</h3>

                                <p>Photos</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-images"></i>
                            </div>
                            <a href="{{ route('admin.photo.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <!-- Common statistic -->
                <div class="row">
                    <div class="col-md-6">
                        <h3>Recent Photos</h3>
                        <table class="table table-hover text-nowrap ">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Created At</th>
                                <th>User</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($recentPhotos as $photo)
                                <tr>
                                    <td>{{ $photo->id }}</td>
                                    <td>{{ $photo->photo_name }}</td>
                                    <td>
                                        <div>
                                            <a href="#"><img src="{{ asset('storage/' . $photo->preview_image) }}"
                                                             alt="main_image"
                                                             class="w-50"></a>
                                        </div>
                                    </td>
                                    <td>{{ $photo->created_at }}</td>
                                    <td>
                                        @if ($photo->user_id)
                                            {{ $photo->user->name }}
                                        @else
                                            admin
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h3>Recent Users</h3>
                        <table class="table table-hover text-nowrap ">
                            <thead>
                            <tr class="">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Created</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($recentUsers as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->created_at->diffForHumans() }}</td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>

                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
