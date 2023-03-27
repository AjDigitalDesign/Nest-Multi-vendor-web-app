<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $categories = Category::all();
        return view('backend.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('backend.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $categories = new Category();
        $request->validate([
            'name' => ['required'],
            'image' => 'required'
        ]);

        if($request->hasFile('image')){
            $requested_file = $request->file('image');
            $filename = date('Ymdhi').$requested_file->getClientOriginalName();
            $requested_file->move(public_path('uploads/categories/category_logo'), $filename);
            $categories->image = $filename;
        }

        $categories->name = $request->name;
        $categories->slug = $request->slug;
        $categories->description = $request->description;
        $categories->status = $request->status;
        $categories->save();

        $notification = 'Category created successfully';
        noty()
            ->layout('topRight')
            ->addInfo($notification);
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Category $category)
    {
        return view('backend.categories.edit', compact('category'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => ['required'],
        ]);

        if($request->hasFile('image')){
            $requested_file = $request->file('image');
            $filename = date('Ymdhi').$requested_file->getClientOriginalName();
            $requested_file->move(public_path('uploads/categories/category_logo'), $filename);
            $category->image = $filename;
        }

        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->description = $request->description;
        $category->status = $request->status;
        $category->update();

        $notification = 'Category updated successfully';
        noty()
            ->layout('topRight')
            ->addInfo($notification);
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Category $category)
    {
        $category = Category::findOrFail($category->id);
        $category->delete();

        $notification = 'Category deleted successfully';
        noty()
            ->layout('topRight')
            ->addInfo($notification);

        return redirect()->back();
    }
}
