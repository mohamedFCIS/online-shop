<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Site;
use Illuminate\Support\Facades\View;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index(){



        $products = Product::orderby('id', 'desc')->paginate(10)->load('reviews');
        return view('frontEnd.product')->with('products', $products);    }



    public function filters(Request $request) {
       $max = $request->max;
       $min = $request->min;
    //    dd($max,$min);
        $products = Product::all()->load('reviews');
        $filterd = [];
        foreach ($products as $product){
           if($product['price'] < $max && $product['price'] > $min)  {
                $filterd[]=$product;

           }
        }
        // dd($filterd);
        if($filterd === []){

                  return view('frontEnd.product')->with('products', $products);

        }
         return view('frontEnd.product')->with('products', $filterd);
    }



    public function sorted() {

        $products = Product::all()->load('reviews');
        $sorted = $products->sortBy('price');
        // dd($sorted);
        return view('frontEnd.product')->with('products', $sorted);
    }

    public function sortedDesc() {

        $products = Product::all()->load('reviews');
        $sortedDesc = $products->sortByDesc('price');
        // dd($sorted);
        return view('frontEnd.product')->with('products', $sortedDesc);
    }
}
