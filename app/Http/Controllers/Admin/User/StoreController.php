<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $hashedPassword = Hash::make($data['password']);
        User::firstOrCreate(['email' => $data['email']], array_merge($data, ['password' => $hashedPassword]));
        return redirect()->route('admin.user.index');
    }

}
