<?php

namespace App\Http\Controllers\backEnd;

use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderby('id', 'desc')->paginate(10);
        return view('backEnd.product.index' , compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('backEnd.product.create')->with('categories', $categories);
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
            'productName' => 'required',
            'productMetaKeyword' => 'required',
            'productMetaDes' => 'required',
            'productPrice' => 'required',
            'productdetails' => 'required',
            'productdescription' => 'required',
            'productImage' => 'required|image:products,image',
            'categoryID' => 'required',

        ]);


        $product = new Product();
        $product->name = $request->productName;
        $product->meta_keywords = $request->productMetaKeyword;
        $product->meta_des = $request->productMetaDes;
        $product->price = $request->productPrice;
        $product->details = $request->productdetails;
        $product->description = $request->productdescription;
        $product->image = $request->productImage->store('images', 'public');
        $product->cat_id = $request->categoryID;

        $product->save();

        $request->session()->flash('success', 'product created successfully');
        return redirect('/admin/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        return view('backEnd.product.show')->with('product', $product,);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('backEnd.product.edit')->with('product', $product);
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
            'productName' => 'required',
            'productMetaKeyword' => 'required',
            'productMetaDes' => 'required',
            'productPrice' => 'required',
            'productdetails' => 'required',
            'productdescription' => 'required',

        ]);
        $product = Product::find($id);
        $product->name = $request->get('productName');
        $product->meta_keywords = $request->get('productMetaKeyword');
        $product->meta_des = $request->get('productMetaDes');
        $product->price = $request->get('productPrice');
        $product->details = $request->get('productdetails');
        $product->description = $request->get("productdescription");

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($product->image);
            $product->image = $request->productImage->store('images', 'public');;
        }
        $product->save();

        session()->flash('success', 'product updated successfully');

        return redirect('/admin/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::withTrashed()->where('id', $id)->first();
        if ($product->trashed()) {
            Storage::disk('public')->delete($product->image);

            $product->forceDelete();
            session()->flash('success', 'product trashed successfully');
            return redirect('/admin/trashed');
        } else {
            $product->delete();
            session()->flash('success', 'product deleted successfully');
            return redirect('/admin/product');
        }
    }
    public function trashed()
    {
        $trashed = Product::onlyTrashed()->get();
        return view('backEnd.product.index')->with('products', $trashed);
    }
    public function restore($id)
    {
        Product::withTrashed()->where('id', $id)->restore();
        session()->flash('success', 'product restored successfully');
        return redirect('/admin/trashed');
    }
    public function search(Request $request)
    {

        $data = Product::where('name', 'like', '%'.$request['search'].'%')->get();
        return view('frontEnd.product')->with('products', $data);

    }
}
