<?php

namespace App\Http\Controllers\Admin\Photo;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Services\PhotoService;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public $service;

    public function __construct(PhotoService $service){
        $this->service = $service;
    }
}
