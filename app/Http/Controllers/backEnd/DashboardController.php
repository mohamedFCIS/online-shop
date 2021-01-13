<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;

class DashboardController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        $products = Product::orderby('id', 'desc')->paginate(10);
        $orders = Order::orderby('id', 'desc')->paginate(10);
        return view('backEnd.layouts.index', compact('products' , 'categories'
        ,'orders'));
    }
}

