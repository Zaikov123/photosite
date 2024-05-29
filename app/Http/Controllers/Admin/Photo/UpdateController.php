<?php

namespace App\Http\Controllers\Admin\Photo;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Photo\UpdateRequest;
use App\Models\Photo;
use Illuminate\Http\Request;
use App\Models\Category;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Photo $photo){
        $data = $request->validated();
        $photo = $this->service->update($data, $photo, $request);
        return view("admin.photos.show", compact("photo"));
    }
}
