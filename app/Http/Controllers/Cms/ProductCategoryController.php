<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Cms\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = ProductCategory::all();
        return view('cms.productCategories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('cms.productCategories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category'  =>  'required',
            'status'  =>  'required',
        ]);
        $category = ProductCategory::firstOrNew(['category' => $request->input('category')]);
        $category->status = $request->input('status');
        $category->save();
        return redirect(route('productcategories.index'))->with('success', 'Category added: ' . $request->input('category'));
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
        // $category = ProductCategory::findOrFail($id);
        // return view('cms.productCategories.edit', compact('category'));
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
        $this->validate($request, [
            'category'  =>  'required',
            'status' => 'required',
        ]);
        $category = ProductCategory::where('category', $request->input('category'))->first();
        if ($category) {
            if ($category->id !== (int)$id) {
                return redirect()->back()->with('warning', 'category exists: ' . $request->input('category'));
            } else {
                $category = ProductCategory::findOrFail($id);
                $category->category = $request->input('category');
                $category->status = $request->input('status');
                $category->save();
                return redirect()->back()->with('success', 'category updated: ' . $request->input('category'));
            }
        } else {
            $category = ProductCategory::findOrFail($id);
            $category->category = $request->input('category');
            $category->status = $request->input('status');
            $category->save();
            return redirect()->back()->with('success', 'category updated: ' . $request->input('category'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = ProductCategory::findOrFail($id);
        $category->delete();
        return redirect(route('productcategories.index'))->with('info', 'Category removed.');
    }
}
