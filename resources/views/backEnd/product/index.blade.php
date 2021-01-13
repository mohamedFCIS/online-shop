@extends('backEnd.app')

@section('title')
    products
@endsection
@section('dashboard')
    products
@endsection
@section('content')

    <div class="container">
        <div class="row pt-3 justify-content-center">
            <div class="card" style="width: 90%">
                <div class="card-header text-center">
                    <h1>All products</h1>

                </div>
                @if (session()->has('success'))

                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <div class="card-bod">
                    <ul class="list-group">

                        @forelse ($products as $product)
                            <li class="list-group-item text-muted">
                              <b>{{ $product->name }}</b>

                                    <span class="float-left  mr-5">

                                        <img src="{{ $product->image }}" alt=""

                                        width="50px" height="50px">
                                    </span>
                                <span class="float-right">
                                    <a href="product/{{ $product->id }}/delete" style="color: #f44336">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </a>
                                </span>
                                @if (!$product->trashed())
                                    <span class="float-right mr-2">
                                        <a href="product/{{ $product->id }}/edit" style="color: #4caf50">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </a>
                                    </span>
                                    <span class="float-right mr-2">
                                        <a href="product/{{ $product->id }}" style="color: #00bcd4">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                    </span>
                                    @else
                                    <span class="float-right mr-2">
                                        <a href="trashed/{{ $product->id }}" style="color: #00bcd4">
                                            <i class="fa fa-undo" aria-hidden="true"></i>
                                        </a>

                                @endif


                            </li>

                        @empty

                            <p class="text-center">No product yet</p>


                        @endforelse
                    </ul>
                </div>

            </div>

        </div>
        <div class="mb-3 text-center">
            <a href="product/create"><button type="submit" class="btn btn-success " style="width: 40%">
                    Create new product
                </button></a>

        </div>
    </div>

@endsection
