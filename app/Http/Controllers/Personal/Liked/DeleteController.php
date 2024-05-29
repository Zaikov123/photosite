<?php

namespace App\Http\Controllers\Personal\Liked;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(Photo $photo)
    {
        auth()->user()->likedPhotos()->detach($photo->id);
        return redirect()->route('personal.liked.index');
    }
}
