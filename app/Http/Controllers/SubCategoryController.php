<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubCategoryRequest;
use App\Http\Requests\UpdateSubCategoryRequest;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $sub_categories = SubCategory::with(['category'])->get();
        return view('backend.subcategories.index', compact('sub_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.subcategories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSubCategoryRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreSubCategoryRequest $request)
    {
        $subCat = SubCategory::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'description' => $request->description
        ]);

        $subCat = new SubCategory();

        $notification = 'Sub-category created successfully';
        noty()
            ->layout('topRight')
            ->addInfo($notification);
        return redirect()->route('subcategory.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return Application|Factory|View
     */
    public function show(SubCategory $subCategory)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return Application|Factory|View
     */
    public function edit(SubCategory $subCategory)
    {
//        $categories = Category::orderBy('name', 'ASC')->get();
        return view('backend.subcategories.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubCategoryRequest  $request
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubCategoryRequest $request, SubCategory $subCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subCategory)
    {
        //
    }
}
