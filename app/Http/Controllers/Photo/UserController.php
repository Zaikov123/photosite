<?php

namespace App\Http\Controllers\Photo;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __invoke()
    {
        $users = User::withCount('photos')
            ->orderBy('photos_count', 'desc')
            ->paginate(10);

        return view('photo.user', compact('users'));

    }
}
