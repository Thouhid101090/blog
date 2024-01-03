<?php

namespace App\Http\Controllers\Api;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function showBlogs($id){
        $blog = Blog::find($id);
        $data=array();
        if($blog){
                $data=array(
                    'id'=>$blog->id,
                    'title'=>$blog->title,
                    'details'=>$blog->details,
                    'image'=>asset('public/uploads/productImage/'.$blog->image),
                    'author'=>$blog->author,
                    'day'=>date("d",strtotime($blog->publish_date)),
                    'month'=>date("M",strtotime($blog->publish_date))
                );
            
        }
        return response($data, 200);

    }
    public function categorypost($cid){
        $blog = Blog::where('category_id',$cid)->get();
        $data=array();
        if($blog){
            foreach($blog as $b){
                $data[]=array(
                    'id'=>$b->id,
                    'title'=>$b->title,
                    'details'=>$b->details,
                    'image'=>asset('public/uploads/productImage/'.$b->image),
                    'author'=>$b->author,
                    'day'=>date("d",strtotime($b->publish_date)),
                    'month'=>date("M",strtotime($b->publish_date))
                );
            }
        }
        return response($data, 200);

    }
}
