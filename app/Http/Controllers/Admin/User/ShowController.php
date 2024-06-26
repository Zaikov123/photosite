<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Category;

class ShowController extends Controller
{
    public function __invoke(User $user){
        $photos = $user->photos;
        return view("admin.users.show", compact('user', 'photos'));
    }
}
