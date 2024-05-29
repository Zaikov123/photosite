<?php

namespace App\Http\Controllers\Personal\Main;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Category;
use App\Models\Photo;
class IndexController extends Controller
{
    public function __invoke()
    {
        $photos = auth()->user()->photos()->paginate(10);
        return view('personal.main.index', compact('photos'));
    }
}
