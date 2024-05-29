@extends('../layouts.mainLayout')

@section('content')

    <main class="blog">
        <div class="container">
            <div class="row">
                <h2 class="mb-4">Users</h2>
            </div>
            <div class="row">
                <div class="col-12">
                    <ul class="list-group">
                        @foreach ($users as $user)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $user->name }}
                                <span class="badge badge-primary badge-pill">{{ $user->photos_count }} photos</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 d-flex justify-content-center">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </main>

@endsection
