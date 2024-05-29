<?php
namespace App\Services;

use App\Models\Photo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PhotoService
{
    public function store($data)
    {
        try {
            DB::beginTransaction();


            $data["main_image"] = Storage::disk('public')->put("/images", $data['main_image']);
            $data["preview_image"] = Storage::disk('public')->put("/images", $data['preview_image']);

            DB::commit();
        }catch (\Exception $e){
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $post, $request){
        try{
            DB::beginTransaction();


            if ($request->hasFile('main_image')) {
                if ($post->main_image) {
                    Storage::disk('public')->delete($post->main_image);
                }
                $data['main_image'] = Storage::disk('public')->put('images', $data['main_image']);
            } else {
                $data['main_image'] = $post->main_image;
            }

            if ($request->hasFile('preview_image')) {
                if ($post->preview_image) {
                    Storage::disk('public')->delete($post->preview_image);
                }
                $data['preview_image'] = Storage::disk('public')->put('images', $data['preview_image']);
            } else {
                $data['preview_image'] = $post->preview_image;
            }
            $post->update($data);

            DB::commit();
        }catch (\Exception $e){
            DB::rollBack();
            abort(500);
        }

        return $post;
    }
}
