<?php

namespace App\Http\Controllers\backEnd;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  Gloudemans\Shoppingcart\Facades\Cart;
class cartController extends Controller
{

    public function index(){
        return view("frontEnd.cart.index");
    }
 public function store(Request $request){
  $duplicateProduct=Cart::search(function ($cartItem, $rowId)use($request) {
    return $cartItem->id ===$request->id ;
  });
  if($duplicateProduct->isNotEmpty()){
    return redirect()->back()->with('msg','product has been already added');
  }
  Cart::add($request->id,$request->name,1, $request->price)->associate('App\Models\Product');
  return redirect()->back()->with('msg','item has been added');
 }
 public function delete($id){
   Cart::remove($id);
   return redirect()->back()->with('msg','product has been deleted successfully');
 }
 public function save($id){
  $duplicateProduct=Cart::search(function ($cartItem, $rowId)use($id) {
    return $cartItem->id ===$id ;
  });
  if($duplicateProduct->isNotEmpty()){
    return redirect()->back()->with('msg','product has been already save for later');
  }
  $item=Cart::get($id);
Cart::remove($id);
Cart::instance('save')->add($item->id,$item->name,1,$item->price)->associate('App\Models\Product');
return redirect()->back()->with('msg','product has been saved for later');
 }
 public function RemovefromSaveLater($id){
  Cart::instance('save')->remove($id);
  return redirect()->back()->with('msg','product has been deleted successfully');
}
public function AddToCart($id){
  $item=Cart::instance('save')->get($id);
  Cart::instance('save')->remove($id);
  Cart::instance('default')->add($item->id,$item->name,1,$item->price)->associate('App\Models\Product');
  return redirect()->back()->with('msg','product has been added to your cart');
}



 }
