<?php

namespace App\Http\Controllers\backend;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $brands = Brand::latest()->get();
        return view('cms.brand.index',compact('brands'));
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
            'brand_name_en'=>'required',
            'brand_name_ar' => 'required',
            'brand_image' => 'required'
        ]);
        $image = $request->file('brand_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();  // 3434343443.jpg
        Image::make($image)->resize(300, 300)->save('upload/brand_image/' . $name_gen);
        $save_url =  'upload/brand_image/'.$name_gen;
        Brand::create([
            'brand_name_en'=>$request->brand_name_en,
            'brand_name_ar'=>$request->brand_name_ar,
            'brand_slug_en' => strtolower(str_replace(' ','-',$request->brand_name_en)),
            'brand_slug_ar' => strtolower(str_replace(' ', '-', $request->brand_name_ar)),
            'brand_image' => $save_url,

        ]);
        $notification = array(
            'message' => 'created brand sucess',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        //
        return view('cms.brand.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        //
        if ($request->file('brand_image')) {
            $image = $request->file('brand_image');
            @unlink(public_path($brand->brand_image));
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();  // 3434343443.jpg

            Image::make($image)->resize(300, 300)->save('upload/brand_image/' . $name_gen);
            $save_url = 'upload/brand_image/'.$name_gen;

            $brand->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_ar' => $request->brand_name_ar,
                'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
                'brand_slug_ar' => strtolower(str_replace(' ', '-', $request->brand_name_ar)),
                'brand_image' => $save_url,

            ]);
            $notification = array(
                'message' => 'updated brand with image',
                'alert-type' => 'success'
            );

            return redirect()->route('brands.index')->with($notification);
        } else {

            $brand->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_ar' => $request->brand_name_ar,
                'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
                'brand_slug_ar' => strtolower(str_replace(' ', '-', $request->brand_name_ar)),

            ]);

            $notification = array(
                'message' => 'updated brand without image',
                'alert-type' => 'success'
            );

            return redirect()->route('brands.index')->with($notification);
        } // end Else
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        //
        unlink($brand->brand_image);
        $deleted = $brand->delete();
        return route('brands.index');
    }
}
