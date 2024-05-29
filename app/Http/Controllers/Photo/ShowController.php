<?php

namespace App\Http\Controllers\Photo;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Photo $photo){
        $date = Carbon::parse($photo->created_at);
        $relatedPhotos = Photo::where('category_id', '=', $photo->category->id)
            ->where('id', '!=', $photo->id)
            ->get()
            ->take(3);
        return view('photo.show', compact('photo', 'date', 'relatedPhotos'));
    }
}
