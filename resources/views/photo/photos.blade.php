@extends('layouts.mainLayout')

@section('content')

    <main class="blog">
        <div class="container">
            <div class="row">
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
                    @foreach ($photos as $photo)
                        <tr>
                            <td>{{ $photo->id }}</td>
                            <td>{{ $photo->photo_name }}</td>
                            <td>
                                <div>
                                    <a href="{{ route('photo.show', $photo) }}"><img src="{{ asset('storage/' . $photo->preview_image) }}"
                                                     alt="main_image"
                                                     class="w-25"></a>
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
            <div class="row">
                {{ $photos->links() }}
            </div>
        </div>
    </main>

@endsection
