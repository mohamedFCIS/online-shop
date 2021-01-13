@extends('backEnd.app')

@section('title')
    Home
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-one">
                        <div class="stat-icon dib"><i class="ti-user text-primary border-primary"></i></div>
                        <div class="stat-content dib">
                            <div class="stat-text">All Users</div>
                            <div class="stat-digit">{{\App\Models\User::count()}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-one">
                        <div class="stat-icon dib"><i class="ti-layout-grid2 text-warning border-warning"></i></div>
                        <div class="stat-content dib">
                            <div class="stat-text">All Products</div>
                            <div class="stat-digit">{{\App\Models\Product::count()}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-one">
                        <div class="stat-icon dib"><i class="fa fa-contao text-danger border-danger"></i></div>
                        <div class="stat-content dib">
                            <div class="stat-text">All Categories</div>
                            <div class="stat-digit">{{\App\Models\Category::count()}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-one">
                        <div class="stat-icon dib"><i class="fa fa-first-order text-success border-success"></i></div>
                        <div class="stat-content dib">
                            <div class="stat-text">All Orders</div>
                            <div class="stat-digit">{{\App\Models\Order::count()}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row mt-4">
        <div class="col-lg-12 ">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Latest Products</strong>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>

                            <th scope="col">Name</th>
                            <th scope="col">price</th>
                            <th scope="col">Category</th>
                            <th scope="col">image</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>

                                <td>{{$product->name}}</td>
                                <td>{{$product->price}}</td>

                                <td>{{$product->category->name}}</td>


                                <td>  <img src="{{$product->image}}" alt=""

                                           width="30px" height="30px"></td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="col-lg-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Latest Orders</strong>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Customer</th>
                            <th scope="col">Total</th>
                            <th scope="col">Order Date</th>
                            <th scope="col">#</th>
                            <th scope="col">#</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <th scope="row">{{$order->id}}</th>
                                <td>{{$order->name}}</td>
                                <td>${{$order->total}}</td>
                                <td>{{$order->created_at}}</td>
                                <td><a href="{{route('orders.show' , $order)}}" class="btn btn-primary"> Details</a></td>
                                <td>
                                    <form action="{{route('orders.destroy' , $order)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>




@endsection
