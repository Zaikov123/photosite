<?php

namespace App\Http\Controllers\Photo;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(Photo $photo){
        $photo->delete();

        return redirect()->back();
    }
}
