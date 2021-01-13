<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use App\Models\Order;
use App\Models\OrderProduct;
use Cartalyst\Stripe\Exception\CardErrorException;
use  Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Cartalyst\Stripe\Laravel\Facades\Stripe;

class checkoutController extends Controller
{
    public function index()
    {

        return view('frontEnd.checkOut.checkout');
    }

    public function store(CheckoutRequest $request)
    {
        $contents = Cart::content()->map(function ($item) {
            return $item->model->name . ',' . $item->qty;
        })->values()->toJson();
        try {
            $charge = Stripe::charges()->create([
                'amount' => Cart::total(),
                'currency' => 'USD',
                'source' => $request->stripeToken,
                'description' => 'order',
                'receipt_email' => $request->email,
                'metadata' => [
                    'contents' => $contents,
                    'quantity' => Cart::instance('default')->count()
                ],
            ]);
            //insert into orders table

                $order = Order::create([
                    'user_id' => auth()->user() ? auth()->user()->id : null,
                    'name' => $request->name,
                    'email' => $request->email,
                    'address' => $request->address,
                    'city' => $request->city,
                    'province' => $request->province,
//                'postalcode' => $request->postalcode,
                    'phone' => $request->phone,
                    'content' =>  Cart::content()->map(function ($item) {
                        return $item->model->name ;
                    })->values(),
                    'subtotal' => $this->getNumbers()->get('newSubtotal'),
                    'tax' => Cart::tax(),
                    'total' => $this->getNumbers()->get('newTotal'),
                    'error' => null,
                ]);


//            insert into order_product table
            foreach (Cart::instance('default')->content() as $item) {
                OrderProduct::create([
                    'order_id' => $order->id,
                    'product_id' => $item->model->id,
                    'quantity' => $item->qty,
                ]);
            }

            return back()->with('success_message', 'Thank You! Your Payment Has Been Successfully Accepted!');
        } catch (CardErrorException $e) {
            return back()->withErrors('Error!', $e->getMessage());
        }

    }

    private function getNumbers()
    {
        $tax = Cart::tax();
        $newSubtotal = (Cart::subtotal());
        $newTotal = (Cart::total());
//        $content = (Cart::content());
        return collect([
            'tax' => $tax,
            'newSubtotal' => $newSubtotal,
            'newTotal' => $newTotal,
//            'content' => $content,
        ]);
    }
}
//------------------------------------------------------------------------------------------------


