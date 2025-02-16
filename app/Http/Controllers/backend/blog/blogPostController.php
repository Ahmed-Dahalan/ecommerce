<?php

namespace App\Http\Controllers\backend\blog;

use App\Http\Controllers\Controller;
use App\Models\blog\BlogCategory;
use App\Models\blog\blogPost;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class blogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $blogpost = BlogPost::latest()->get();
        return view('cms.blog.post.list_post', compact('blogpost'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $blogcategory = BlogCategory::latest()->get();
        $blogpost = blogPost::latest()->get();
        return view('cms.blog.post.post_view', compact('blogpost', 'blogcategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'post_title_en' => 'required',
            'post_title_ar' => 'required',
            'post_image' => 'required',
        ], [
            'post_title_en.required' => 'Input Post Title English Name',
            'post_title_ar.required' => 'Input Post Title Hindi Name',
        ]);

        $image = $request->file('post_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(780, 433)->save('upload/post/' . $name_gen);
        $save_url = 'upload/post/' . $name_gen;

        BlogPost::create([
            'category_id' => $request->category_id,
            'post_title_en' => $request->post_title_en,
            'post_title_ar' => $request->post_title_ar,
            'post_slug_en' => strtolower(str_replace(' ', '-', $request->post_title_en)),
            'post_slug_ar' => str_replace(' ', '-', $request->post_title_ar),
            'post_image' => $save_url,
            'post_details_en' => $request->post_details_en,
            'post_details_ar' => $request->post_details_ar,

        ]);

        $notification = array(
                'message' => 'Blog Post Inserted Successfully',
                'alert-type' => 'success'
            );

        return redirect()->route('blog_posts.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
