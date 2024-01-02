<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class categotyController extends Controller
{
    public function displayCat(){
        $cat= Category::get()->toArray();
        return response($cat,200);
    }
}
