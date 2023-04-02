<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $subcategories = Subcategory::with(['category'])->get();
       return view('backend.subcategories.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.subcategories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $subcategory = new Subcategory();
        $request->validate([
            'name' => 'required',
            'category_id' => 'required'
        ]);

        $subcategory->name = $request->name;
        $subcategory->category_id = $request->category_id;
        $subcategory->slug = $request->slug;
        $subcategory->description = $request->description;

        $subcategory->save();

        $notification = 'Sub_category created successfully';
        noty()
            ->layout('topRight')
            ->addInfo($notification);
        return redirect()->route('subcategories.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Subcategory $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Subcategory $subcategory)
    {
        $categories = Category::all();
        return view('backend.subcategories.edit', compact(['categories', 'subcategory']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Subcategory $subcategory)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required'
        ]);

        $subcategory->name = $request->name;
        $subcategory->category_id = $request->category_id;
        $subcategory->slug = $request->slug;
        $subcategory->description = $request->description;

        $subcategory->update();

        $notification = 'Sub_category updated successfully';
        noty()
            ->layout('topRight')
            ->addInfo($notification);
        return redirect()->route('subcategories.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcategory $subcategory)
    {
        $subcategory = Subcategory::findOrFail($subcategory->id);
        $subcategory->delete();

        $notification = 'Sub_category deleted successfully';
        noty()
            ->layout('topRight')
            ->addInfo($notification);

        return redirect()->back();
    }
}
