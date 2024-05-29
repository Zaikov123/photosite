@extends('layouts.mainLayout')

@section('content')

    <main class="blog">
        <div class="container">
            <div class="row">
                <h2 class="most_text">Add photo: </h2>
            </div>
            <div class="row">
                <form action="{{route('photo.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <div class="form-group ">
                        <input type="text" class="form-control" name="photo_name" placeholder="Enter photo name"
                               value="{{ old('photo_name') }}">

                        @error('photo_name')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group ">
                        <input type="text" class="form-control" name="caption" placeholder="Enter photo caption"
                               value="{{ old('caption') }}">

                        @error('caption')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputFile">Main image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="main_image">
                                <label class="custom-file-label">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                        @error('main_image')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputFile">Preview image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="preview_image">
                                <label class="custom-file-label">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                        @error('preview_image')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Category</label>
                        <select name="category_id" class="form-control">
                            @foreach ($categories as $index => $category)
                                <option value="{{$category->id}}" {{ $index === 0 ? 'selected' : '' }}>{{$category->category_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="add">
                    </div>
                </form>
            </div>

        </div>
    </main>

@endsection
