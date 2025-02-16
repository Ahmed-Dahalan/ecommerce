<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\blog\BlogCategory;
use App\Models\blog\blogPost;
use Illuminate\Http\Request;

class HomeBlogController extends Controller
{
    //

    public function AddBlogPost()
    {

        $blogcategory = BlogCategory::latest()->get();
        $blogpost = blogPost::latest()->get();
        return view('frontend.blog.blog_list', compact('blogpost', 'blogcategory'));
    }

    public function DetailsBlogPost($id)
    {

        $blogcategory = BlogCategory::latest()->get();
        $blogpost = BlogPost::findOrFail($id);
        return view('frontend.blog.blog_details', compact('blogpost', 'blogcategory'));
    }

    public function HomeBlogCatPost($category_id)
    {

        $blogcategory = BlogCategory::latest()->get();
        $blogpost = BlogPost::where('category_id', $category_id)->orderBy('id', 'DESC')->get();
        return view('frontend.blog.blog_cat_list', compact('blogpost', 'blogcategory'));
    } // end mehtod 
}
