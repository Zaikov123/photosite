<?php

namespace App\Http\Controllers\Admin\Photo;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Photo\StoreRequest;
use App\Models\Category;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request){
        $data = $request->validated();
        $photoCount = Photo::where('user_id', auth()->user()->id)->count();

        if ($photoCount >= 10) {
            return redirect()->back()->withErrors(['You have reached the maximum number of photos allowed (10).']);
        }
        $this->service->store($data);
        return redirect()->route('admin.photo.index');
    }
}
