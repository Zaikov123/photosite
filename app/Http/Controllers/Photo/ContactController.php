<?php

namespace App\Http\Controllers\Photo;

use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function __invoke(){

        return view('photo.contact');
    }
}
