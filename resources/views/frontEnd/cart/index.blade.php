@extends('frontEnd.app')
@section('title')
Shopping Cart
@endsection

@section('navbar')
@include('frontEnd.layouts.navbar')
@endsection

@section('content')
<!doctype html>
<html class="no-js" lang="zxx">

<!-- shopping-cart31:32-->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

    <body>

    <div class="container">

<h2 class="mt-5"><i class="fa fa-shopping-cart"></i> Shopping Cart</h2>
<hr>
@if(Cart::instance('default')->count()>0)

<h4 class="mt-5">{{Cart::instance('default')->count()}} items in Shopping Cart</h4>

<div class="cart-items">

    <div class="row">

        <div class="col-md-12">

        @if(session()->has('msg'))
    <div class="alert alert-success">{{session()->get('msg')}}</div>
@endif

            <table class="table">

                <tbody>
                @foreach(Cart::instance('default')->content() as $item)
                    <tr>
                        <td><img class="card-img"  src="{{$item->model->image}}"   style="width: 5em"></td>
                        <td>
                            <strong>{{ $item->model->name }}</strong><br>{{$item->model->details}}
                        </td>

                        <td>
                        <form action="{{route('cart.delete',$item->rowId)}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-dark">Remove</button><br>
                            </form>
                            <form action="{{route('cart.save',$item->rowId)}}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-dark">Save</button><br>
                            </form>

                        </td>

                        <td>
                            <select name="" id="" class="form-control quantity" style="width: 4.7em">
                                <option value="">1</option>

                            </select>
                        </td>

                        <td>${{$item->total()}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        <!-- Price Details -->
            <div class="col-md-6">
                    <div class="sub-total">
                         <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th colspan="2">Price Details</th>
                                </tr>
                            </thead>
                                <tr>
                                    <td>Subtotal </td>
                                    <td>${{ Cart::subtotal() }}</td>
                                </tr>
                                <tr>
                                    <td>Tax</td>
                                    <td>{{ Cart::tax() }}</td>
                                </tr>
                                <tr>
                                    <th>Total</th>
                                    <th>${{ Cart::total() }}</th>
                                </tr>
                         </table>
                     </div>
                </div>
            <!-- Save for later  -->
            <div class="col-md-12">
                <a href="/home" class="btn btn-outline-dark">Continue Shopping</a>
                <a href="{{route('checkout.index')}}" class="btn btn-outline-info" >Proceed to checkout</a>
                <hr>
            </div>
        @else
        <h4>No products in your cart</h4>
        <a href="/home" class="btn btn-outline-dark">Continue Shopping</a>
        <hr>
         @endif
            <!--remove and Add to cart-->
            @if(Cart::instance('save')->count()>0)
            <h4 class="mt-5">{{Cart::instance('save')->count()}} items save for later</h4>
            <table class="table">

                <tbody>
                @foreach(Cart::instance('save')->content() as $item)
                    <tr>
                        <td><img class="card-img"  src="{{$item->model->image}}"   style="width: 5em"></td>
                        <td>
                            <strong>{{ $item->model->name }}</strong><br>{{$item->model->details}}
                        </td>

                        <td>
                        <form action="{{route('cart.removeSave',$item->rowId)}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-dark">Remove</button><br>
                            </form>
                            <form action="{{route('addCart',$item->rowId)}}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-dark">move to cart</button><br>
                            </form>

                        </td>

                        <td>
                            <select name="" id="" class="form-control" style="width: 4.7em">
                                <option value="">1</option>

                            </select>
                        </td>

                        <td>${{$item->total()}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif

    </body>

<!-- shopping-cart31:32-->
</html>

@endsection


@section('footer')
@include('frontEnd.layouts.footer')

@endsection
