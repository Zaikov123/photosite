@extends('personal.layouts.mainLayout')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Stats</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="row">
                <table class="table table-hover text-nowrap w-50">
                    <thead>
                    <tr class="">
                        <th>Photo</th>
                        <th>Link</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($photos as $photo)
                        <tr>
                            <td>
                                <div>
                                    <img src="{{ asset('storage/' . $photo->preview_image) }}" alt="main_image"
                                         class="w-50">
                                </div>
                            </td>
                            <td><a href="{{route('photo.show', [$photo->id])}}" class="btn btn-info btn-sm">View</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </div>
@endsection
