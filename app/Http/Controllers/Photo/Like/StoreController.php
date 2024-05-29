<?php

namespace App\Http\Controllers\Photo\Like;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Http\Requests\Post\Comment\StoreRequest;
class StoreController extends Controller
{
    public function __invoke(Photo $photo)
    {
        auth()->user()->likedPhotos()->toggle($photo);
        return redirect()->back();
    }
}
