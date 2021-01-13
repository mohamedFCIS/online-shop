@extends('backEnd.app')

@section('title')
    Dashboard
@endsection
@section('dashboard')
    Dashboard
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card text-white bg-info">
                            <div class="card-header">
                                Users
                            </div>
                            <div class="card-body">{{$users_count}}</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white bg-danger">
                            <div class="card-header">
                                Products
                            </div>
                            <div class="card-body">{{$products_count}}</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white bg-success">
                            <div class="card-header">
                                Categories
                            </div>
                            <div class="card-body">{{$categories_count}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
