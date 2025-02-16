<?php

namespace App\Http\Controllers\backend\blog;

use App\Http\Controllers\Controller;
use App\Models\blog\BlogCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class blogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $blogcategory = BlogCategory::latest()->get();
        return view('cms.blog.category.category_view', compact('blogcategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'blog_category_name_en' => 'required',
            'blog_category_name_ar' => 'required',

        ], [
            'blog_category_name_en.required' => 'Input Blog Category English Name',
            'blog_category_name_ar.required' => 'Input Blog Category Hindi Name',
        ]);



        BlogCategory::create([
            'blog_category_name_en' => $request->blog_category_name_en,
            'blog_category_name_ar' => $request->blog_category_name_ar,
            'blog_category_slug_en' => strtolower(str_replace(' ', '-', $request->blog_category_name_en)),
            'blog_category_slug_ar' => str_replace(' ', '-', $request->blog_category_name_ar),


        ]);

        $notification = array(
                'message' => 'Blog Category Inserted Successfully',
                'alert-type' => 'success'
            );

        return redirect()->back()->with($notification);
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
        $blogcategory = BlogCategory::findOrFail($id);
        return view('cms.blog.category.category_edit', compact('blogcategory'));
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


        BlogCategory::findOrFail($id)->update([
            'blog_category_name_en' => $request->blog_category_name_en,
            'blog_category_name_ar' => $request->blog_category_name_ar,
            'blog_category_slug_en' => strtolower(str_replace(' ', '-', $request->blog_category_name_en)),
            'blog_category_slug_ar' => str_replace(' ', '-', $request->blog_category_name_ar),
            'created_at' => Carbon::now(),


        ]);

        $notification = array(
                'message' => 'Blog Category Updated Successfully',
                'alert-type' => 'info'
            );

        return redirect()->route('blog_categories.index')->with($notification);
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
        $blog_category = BlogCategory::findOrFail($id);
        $deleted = $blog_category->delete();
        return route('blog_categories.index');
    }
}
