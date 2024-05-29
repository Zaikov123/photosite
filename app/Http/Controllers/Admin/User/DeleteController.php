<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Category;

class DeleteController extends Controller
{
    public function __invoke(User $user){
        $user->delete();
        return redirect()->route("admin.user.index");
    }
}
