<?php

namespace App\Http\Controllers\Admin\Photo;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CreateController extends BaseController
{
    public function __invoke(){
        $categories = Category::all();
        return view("admin.photos.create", compact("categories"));
    }
}
