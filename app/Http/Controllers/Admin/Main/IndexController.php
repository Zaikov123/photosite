<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Category;
use App\Models\Photo;
class IndexController extends Controller
{
    public function __invoke()
    {
        $data = [];
        $data['usersCount'] = User::all()->count();
        $data['categoriesCount'] = Category::all()->count();
        $data['photosCount'] = Photo::all()->count();

        $recentUsers = User::latest()->take(5)->get();

        $recentPhotos = Photo::latest()->take(5)->get();

        return view('admin.main.index', compact('data', 'recentUsers', 'recentPhotos'));
    }
}
