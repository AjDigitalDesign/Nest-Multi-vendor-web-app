<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $brands = Brand::all();
        return view('backend.brands.index', compact('brands'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('backend.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $brand = new Brand();
        $request->validate([
            'name' => ['required'],
            'logo' => 'required'
        ]);

        if($request->hasFile('logo')){
            $requested_file = $request->file('logo');
            $filename = date('Ymdhi').$requested_file->getClientOriginalName();
            $requested_file->move(public_path('uploads/brands/brand_logo'), $filename);
            $brand->logo = $filename;
        }

        $brand->name = $request->name;
        $brand->slug = $request->slug;
        $brand->description = $request->description;
        $brand->status = $request->status;
        $brand->save();

        $notification = 'Brand created successfully';
        noty()
            ->layout('topRight')
            ->addInfo($notification);
        return redirect()->route('brands.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Brand $brand)
    {
        return view('backend.brands.show', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Brand $brand)
    {
        return view('backend.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Brand $brand)
    {

        $request->validate([
            'name' => ['required'],
        ]);

        if($request->hasFile('logo')){
            $requested_file = $request->file('logo');
            $filename = date('Ymdhi').$requested_file->getClientOriginalName();
            $requested_file->move(public_path('uploads/brands/brand_logo'), $filename);
            $brand->logo = $filename;
        }

        $brand->name = $request->name;
        $brand->slug = $request->slug;
        $brand->description = $request->description;
        $brand->status = $request->status;
        $brand->update();

        $notification = 'Brand updated successfully';
        noty()
            ->layout('topRight')
            ->addInfo($notification);
        return redirect()->route('brands.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Brand $brand)
    {
        $brand = Brand::findOrFail($brand->id);
        $brand->delete();

        $notification = 'Brand deleted successfully';
        noty()
            ->layout('topRight')
            ->addInfo($notification);
        return redirect()->back();

    }
}
