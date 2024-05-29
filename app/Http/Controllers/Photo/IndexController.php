<?php

namespace App\Http\Controllers\Photo;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(){
        $photos = Photo::paginate(10);

        return view('photo.index', compact('photos'));
    }
}
