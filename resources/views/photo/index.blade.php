@extends('layouts.mainLayout')

@section('content')

    <main class="blog">
        <div class="container">
            <div class="row">
                <p class="most_text">Last 10 posts:</p>
            </div>
            <div class="row">
                @foreach($photos as $photo)
                    <div class="col-md-4 recent_box border " data-aos="fade-right"
                         data-aos-delay="100">
                        <img src="{{asset('storage/' . $photo->main_image)}}"
                             alt="related photo"
                             class="photo-thumbnail w-50">
                        <div class="d-flex justify-content-between">
                        <p class="photo-category">{{$photo->category->category_name}}</p>
                        <section class="likes my-3">
                            @auth()
                                <form action="{{route('photo.like.store', $photo->id)}}" method="post">
                                    @csrf
                                    <span>{{$photo->liked_users_count}}</span>
                                    <button type="submit" class="border-0 bg-transparent">
                                        @if(auth()->user()->likedPhotos->contains($photo->id))
                                            <i class="fa-solid fa-heart-o"></i>
                                        @else
                                            <i class="fa-regular fa-heart-o"></i>
                                        @endif
                                    </button>
                                </form>
                            @endauth
                            @guest()
                                <div>
                                    <span>{{$photo->liked_users_count}}</span>
                                    <i class="far fa-thumbs-up"></i>
                                </div>

                            @endguest
                        </section>
                        </div>
                        <a href="{{route('photo.show', $photo->id)}}"><h5
                                class="photo-title">{{$photo->photo_name}}</h5></a>
                    </div>
                @endforeach
            </div>
        </div>
    </main>

@endsection
