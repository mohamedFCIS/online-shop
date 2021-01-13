@extends('backEnd.app')

@section('title')
    Show product
@endsection
@section('dashboard')
    product
@endsection
@section('content')

    <div class="container">
        <h1 class="mt-5 text-center">
            {{ $product->name }}
        </h1>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <span>
                            Details
                        </span>
                        <span class="badge float-right badge-warning">
                         <b>meta_keywords:</b>   {{ $product->meta_keywords }}
                        </span>
                    </div>
                    <div class="card-body">
                        <span class="badge float-left">
                          <b>meta_des:</b>     {{ $product->meta_des }}
                        </span>
                    </div>
                    <div class="card-body">
                        <span class="badge float-left">
                           <b>price: </b>  {{ $product->price }}
                        </span>
                    </div>
                    <div class="card-body">
                        <span class="badge float-left">
                         <b>details:</b>    {{ $product->details }}
                        </span>
                    </div>
                    <div class="card-body">
                        <span class="badge float-left">
                       <b>description:</b>        {{ $product->description }}
                        </span>
                    </div>

                    <div class="form-groub">



                        <img src="{{ $product->image }}" alt=""

                        width="100%" >
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
