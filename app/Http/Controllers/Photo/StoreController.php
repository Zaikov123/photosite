<?php

namespace App\Http\Controllers\Photo;

use App\Http\Controllers\Controller;
use App\Http\Requests\Photo\StoreRequest;
use App\Models\Category;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request){

        $data = $request->validated();
        $photoCount = Photo::where('user_id', auth()->user()->id)->count();

        if ($photoCount >= 10) {
            return redirect()->back()->withErrors(['You have reached the maximum number of photos allowed (10).']);
        }
        try {
            DB::beginTransaction();


            $data["main_image"] = Storage::disk('public')->put("/images", $data['main_image']);
            $data["preview_image"] = Storage::disk('public')->put("/images", $data['preview_image']);
            $post = Photo::firstOrCreate($data);

            DB::commit();
        }catch (\Exception $e){
            DB::rollBack();
            abort(500);
        }
        return redirect()->route('photo.index');
    }
}
