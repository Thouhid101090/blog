<?php

namespace App\Http\Controllers\Api;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function showBlogs(){
        $product = Blog::get()->toArray();
        return response($product, 200);

    }
}
