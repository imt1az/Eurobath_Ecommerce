<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog\BlogPostCategory;
use App\Models\BlogPost;
use Illuminate\Http\Request;

class HomeBlogController extends Controller
{
    public function BlogShow()
    {
        $blogcategory = BlogPostCategory::latest()->get();
        $blogpost = BlogPost::latest()->get();
        return view('frontend.blog.blog_list',compact('blogpost','blogcategory'));
    }

    public function BlogDetails($id){
        $blogpost = BlogPost::findOrFail($id);
        $blogcategory = BlogPostCategory::latest()->get();
        return view('frontend.blog.blog_details',compact('blogpost','blogcategory'));
    }
    public function CategoryWisePost($id){
        $blogpost = BlogPost::where('category_id',$id)->orderBy('id','DESC')->get();
        $blogcategory = BlogPostCategory::latest()->get();
        return view('frontend.blog.blog_cat_list',compact('blogpost','blogcategory'));

    }
}
