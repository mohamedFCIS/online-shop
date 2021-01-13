<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $product = Product::find($id);
        // $reviews = Review::where('product_id',$product->id)->with('user')->get();
        // return view("frontEnd.productDetails",['reviews'=>$reviews]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {   
        // $product = Product::find($id);
        $this->validate($request,[

            'comment' => 'required',
            'rate' => 'required|min:1|max:5'
        ]);
            // dd($request);
            Review::create([
            'user_id' => auth()->user()->id,
            'product_id'=> $id ,
            'comment' => $request->comment,
            'rate' => $request->rate,
        ]);
                
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
      return view('frontEnd.layouts.review-edit',['review' => $review]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        $this->validate($request,[
            'comment'=> 'required',
            'rate' => 'required'
        ]);
        // dd($review);
         $review->update([

            'user_id' => auth()->user()->id,
            'product_id'=> $review->product_id ,
             'comment' => $request->comment,
              'rate' => $request->rate  
         ]) ;
        //  $product = Product::find($review->product_id );
        // dd($request);
       
        // $review->comment = $request->comment;
        // $review->rate = $request->rate;

        // $review->save();
       
        //  return back();
        // $reviews = Review::where('product_id',$product->id)->with('user')->get();
        //  return view('frontEnd.productDetails',['reviews'=>$review]);
        return redirect(route('product.details',$review->product_id ));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        // dd($review);
        $this->authorize('delete',$review);

        $review->delete();
        return back();
    }
}
