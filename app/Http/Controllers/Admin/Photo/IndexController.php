<?php

namespace App\Http\Controllers\Admin\Photo;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;
use App\Models\Category;

class IndexController extends BaseController
{
    public function __invoke(){
        $photos = Photo::latest()->paginate(10);
        return view("admin.photos.index", compact("photos"));
    }
}
