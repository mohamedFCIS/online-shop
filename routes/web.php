<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\backEnd\usersController;
use App\Http\Controllers\backEnd\ordersController;


use App\Http\Controllers\HomeController;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\backEnd\DashboardController;
use App\Http\Controllers\frontEnd\checkoutController;
use App\Http\Controllers\backEnd\cartController as BackEndCartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\backEnd\ProductsController;
use App\Http\Controllers\backEnd\CategoriesController;
use App\Http\Controllers\backEnd\favouritesController;
use App\Http\Controllers\ProductDetailsController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\backEnd\SitesController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/




######################################## user auth

Route::group(['middleware' => 'auth'], function () {
    ############################# Review ######################################################


    Route::get('review/{review}', [ReviewController::class, 'edit'])->name('edit.review');
    Route::post('review/{id}', [ReviewController::class, 'store'])->name('add.review');
    Route::put('review/{review}', [ReviewController::class, 'update'])->name('update.review');
    Route::delete('review/{review}', [ReviewController::class, 'destroy'])->name('delete.review');
    //checkout
    Route::get('/checkout', [checkoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [checkoutController::class, 'store'])->name('checkout.store');

    //orders
    Route::get('/admin/orders', [ordersController::class, 'index'])->name('orders.index');
    Route::get('/admin/orders/{id}', [ordersController::class, 'show'])->name('orders.show');
    Route::delete('/admin/orders/{id}', [ordersController::class, 'destroy'])->name('orders.destroy');
    ###########################################/*cart */
    Route::get('/cart', [BackEndCartController::class, 'index']);
    Route::post('/cart', [BackEndCartController::class, 'store'])->name('cart');
    Route::get('/empty', function () {
        Cart::instance('default')->destroy();
    });
    Route::delete('/cart/remove/{product}', [BackEndCartController::class, 'delete'])->name('cart.delete');
    Route::post('/cart/save/{product}', [BackEndCartController::class, 'save'])->name('cart.save');
    Route::delete('/cart/removeSaveLater/{product}', [BackEndCartController::class, 'RemovefromSaveLater'])->name('cart.removeSave');
    Route::post('/cart/add/{product}', [BackEndCartController::class, 'AddToCart'])->name('addCart');



    //admin user auth

    Route::group(["middleware" => 'chechAdmin'], function () {

        Route::get('admin/home', [homeController::class, 'index']);
        //conatact us
        Route::get('admin/contact', [ContactController::class, 'index']);
        Route::get('admin/contact/{id}', [ContactController::class, 'show']);
        Route::get('admin/contact/{id}/delete', [ContactController::class, 'destroy']);
        //user favourite
        Route::get('favourit', [favouritesController::class, 'index'])->name('user.fav');
        Route::Post('favourit/{id}', [favouritesController::class, 'store'])->name('fav.add');
        Route::delete('product/{id}', [favouritesController::class, 'destroy'])->name('fav.delete');
        Route::get('product/{product}', [ProductDetailsController::class, 'show'])->name('product.details');

        ////////////////////////////////////////////--Start Categor

        Route::prefix('admin')->group(function () {
            Route::get('home', [DashboardController::class, 'index'])->name('admin');
            Route::get('category/create', [CategoriesController::class, 'create']);
            Route::post('category/create', [CategoriesController::class, 'store']);
            Route::get('category', [CategoriesController::class, 'index']);
            Route::get('category/{id}', [CategoriesController::class, 'show']);
            Route::get('category/{id}/edit', [CategoriesController::class, 'edit']);
            Route::post('category/{id}', [CategoriesController::class, 'update']);
            Route::get('category/{id}/delete', [CategoriesController::class, 'destroy']);
        });
        ////////////////////////////////////////////--End Category

        ////////////////////////////////////////////--Start product

        Route::namespace('backEnd')->prefix('admin')->group(function () {
            Route::get('product/create', [ProductsController::class, 'create'])->middleware('checkCategory');
            Route::post('product/create', [ProductsController::class, 'store']);
            Route::get('product', [ProductsController::class, 'index']);
            Route::get('product/{id}', [ProductsController::class, 'show']);
            Route::get('product/{id}/edit', [ProductsController::class, 'edit']);
            Route::post('product/{id}', [ProductsController::class, 'update']);
            Route::get('product/{id}/delete', [ProductsController::class, 'destroy']);
            Route::get('trashed', [ProductsController::class, 'trashed']);
            Route::get('trashed/{id}', [ProductsController::class, 'restore']);
            Route::get('search', [ProductsController::class, 'search'])->name("search");
        });
        ////////////////////////////////////////////--Start product-
        Route::resource('admin/users', usersController::class);
        Route::resource('admin/sites', SitesController::class);
    });
});

//end of auth


Route::get('/', [HomeController::class, 'index'])->name('products');
Route::get('/home', [HomeController::class, 'index']);
Route::get('/', [HomeController::class, 'index']);
Route::get('/filter', [HomeController::class, 'filters'])->name('products.filter');
Route::get('/sorted', [HomeController::class, 'sorted'])->name('products.sorted');
Route::get('/sortedDesc', [HomeController::class, 'sortedDesc'])->name('products.desc');

Route::get('notfound', function () {
    return view('notfound');
})->name('notfound');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/aboutUs', function () {
    return view('frontEnd.aboutUs');
});

Route::get('/contact', function () {
    return view('frontEnd.contact');
});


//contact us users
Route::get('contact', [ContactController::class, 'create']);
Route::post('contact', [ContactController::class, 'store']);

Route::Post('product/{id}', [favouritesController::class, 'store'])->name('product.fav');

Route::namespace('backEnd')->prefix('admin')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index']);
});


////////////////////////////////////////////--End dashboard--//////////////////////////////////////////
