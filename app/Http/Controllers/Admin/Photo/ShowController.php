<?php

namespace App\Http\Controllers\Admin\Photo;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Photo;
use Illuminate\Http\Request;
use App\Models\Category;

class ShowController extends BaseController
{
    public function __invoke(Photo $photo){
        $comments = $photo->comments;
        return view("admin.photos.show", compact('photo', 'comments'));
    }
}
