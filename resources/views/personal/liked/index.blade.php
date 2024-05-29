@extends('personal.layouts.mainLayout')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Liked photos</h1>
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
                        <th colspan="3" class="text-center">Action</th>
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
                            <td><a href="{{route('photo.show', [$photo->id])}}"><i
                                        class="fas fa-eye"></i></a></td>
                            <td>
                                <form action="{{ route('personal.liked.delete', [$photo])}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="border-0 bg-transparent">
                                        <i class="fas fa-trash text-danger" role="button"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </div>
@endsection
