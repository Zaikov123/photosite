<?php

namespace App\Http\Controllers\Admin\Photo;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;
use App\Models\Category;

class EditController extends BaseController
{
    public function __invoke(Photo $photo){
        $categories = Category::all();
        return view("admin.photos.edit", compact("photo", "categories"));
    }
}
