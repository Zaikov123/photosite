<?php

namespace App\Http\Controllers\Admin\Photo;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Photo;
use Illuminate\Http\Request;
use App\Models\Category;

class DeleteController extends BaseController
{
    public function __invoke(Photo $photo){
        $photo->delete();
        return redirect()->route("admin.photo.index");
    }
}
