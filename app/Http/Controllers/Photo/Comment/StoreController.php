<?php

namespace App\Http\Controllers\Photo\Comment;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;
use App\Models\Comment;
//use app/Http/Requests/Photo/Comment/StoreRequest.php
use App\Http\Requests\Photo\Comment\StoreRequest;
class StoreController extends Controller
{
    public function __invoke(Photo $photo, StoreRequest $request)
    {
        $data = $request->validated();

        $commentCount = Comment::where('user_id', auth()->user()->id)->count();

        if ($commentCount >= 10) {
            return redirect()->back()->withErrors(['You have reached the maximum number of comments allowed (10).']);
        }
        $data['user_id'] = auth()->user()->id;
        $data['photo_id'] = $photo->id;
        Comment::create($data);
        return redirect()->back();
    }
}
