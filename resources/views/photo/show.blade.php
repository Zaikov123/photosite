@extends('layouts.mainLayout')

@section('content')
    <main class="blog-post">

        <div class="container">
            <div class="about_section layout_padding">
                <div class="container">
                    <div class="row ">
                        <div class="col-lg-8 col-sm-12 ">

                            <div>
                                <img src="{{ asset('storage/' . $photo->main_image) }}" alt="main_image" class="w-50">
                            </div>
                            <p class="post_text">Post By : {{ $date->format('Y m d') }}</p>
                            <h2 class="most_text"> {{ $photo->photo_name }}</h2>


                        </div>
                        <div class="col-lg-4 col-sm-12">
                            <div>
                                <img src="{{ asset('storage/' . $photo->preview_image) }}" alt="preview_image"
                                     class="w-50">
                            </div>
                            <h1 class="about_taital">About Us</h1>
                            <p class="about_text">{{ $photo->caption }}</p>
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
                            <div class="form-group d-flex align-items-center justify-content-end">
                                @if(isset(auth()->user()->id) && auth()->user()->id == $photo->user_id)
                                    <h2 class="most_text">Delete photo: </h2>
                                    <form action="{{ route('photo.delete', [$photo])}}" method="POST" class="w-50">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="border-0 bg-transparent">
                                            <i class="fas fa-trash text-danger"></i>
                                        </button>
                                    </form>
                                @endif
                            </div>

                        </div>

                        <div class="col-lg-9 mx-auto ">
                            @if($relatedPhotos->count() > 0)
                                <section class="related-photos">
                                    <h2 class="most_text">Related photos:</h2>
                                    <div class="row">
                                        @foreach($relatedPhotos as $relatedPhoto)
                                            <div class="col-md-4 recent_box border " data-aos="fade-right"
                                                 data-aos-delay="100">
                                                <img src="{{asset('storage/' . $relatedPhoto->main_image)}}"
                                                     alt="related photo"
                                                     class="photo-thumbnail">
                                                <p class="photo-category">{{$relatedPhoto->category->category_name}}</p>
                                                <a href="{{route('photo.show', $relatedPhoto->id)}}"><h5
                                                        class="photo-title">{{$relatedPhoto->photo_name}}</h5></a>
                                            </div>
                                        @endforeach
                                    </div>
                                </section>
                            @endif
                            <section
                            @auth()
                                <section class="comment-list mb-5">
                                    <h2 class="most_text">Comments:</h2>
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">User</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Comment</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($photo->comments as $comment)
                                            <tr>
                                                <td>{{ $comment->user->name }}</td>
                                                <td>{{ $comment->dateAsCarbon->diffForHumans() }}</td>
                                                <td>{{ $comment->message }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </section>



                            <section class="comment-section">
                                <h2 class="section-title mb-5" data-aos="fade-up">Leave a Reply</h2>
                                <form action="{{ route('photo.comment.store', $photo->id) }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-12" data-aos="fade-up">
                                            <label for="comment" class="sr-only">Comment</label>
                                            <textarea name="message" id="comment" class="form-control"
                                                      placeholder="Comment"
                                                      rows="10"></textarea>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <input type="hidden" name="photo_id" value="{{ $photo->id }}">
                                    </div>
                                    <div class="row">
                                        <div class="col-12" data-aos="fade-up">
                                            <input type="submit" value="Comment" class="btn btn-warning">
                                        </div>
                                    </div>
                                </form>
                            </section>
                                @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
