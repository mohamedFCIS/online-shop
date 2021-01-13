<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('backEnd.category.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backEnd.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'catogaryName' => 'required|unique:categories,name',
            'catogaryMetaKeyword' => 'required',
            'catogaryMetaDes' => 'required',

        ]);


        $category = new Category();
        $category->name = $request->catogaryName;
        $category->meta_keywords = $request->catogaryMetaKeyword;
        $category->meta_des = $request->catogaryMetaDes;
        $category->save();

        $request->session()->flash('success', 'Category created successfully');
        return redirect('/admin/category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);

        return view('backEnd.category.show')->with('category', $category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('backEnd.category.edit')->with('category', $category);
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
        $request->validate([
            'catogaryName' => 'required',
            'catogaryMetaKeyword' => 'required',
            'catogaryMetaDes' => 'required',
        ]);
        $category = Category::find($id);
        $category->name = $request->get('catogaryName');
        $category->meta_keywords = $request->get('catogaryMetaKeyword');
        $category->meta_des = $request->get('catogaryMetaDes');

        $category->save();

        session()->flash('success', 'Category updated successfully');

        return redirect('/admin/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        session()->flash('success', 'Category deleted successfully');

        return redirect('/admin/category');
    }
}
