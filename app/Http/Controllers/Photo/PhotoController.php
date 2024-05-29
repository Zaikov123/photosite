<?php

namespace App\Http\Controllers\Photo;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function __invoke()
    {
        $photos = Photo::orderBy('created_at', 'desc')->paginate(10);
        return view('photo.photos', compact('photos'));
    }
}
