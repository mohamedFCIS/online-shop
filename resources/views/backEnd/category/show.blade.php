@extends('backEnd.app')

@section('title')
    Show Category
@endsection
@section('dashboard')
    Category
@endsection
@section('content')

    <div class="container">
        <h1 class="mt-5 text-center">
            {{ $category->name }}
        </h1>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <span>
                            Details
                        </span>
                        <span class="badge float-right badge-warning">
                            {{ $category->meta_keywords }}
                        </span>
                    </div>
                    <div class="card-body">
                        <span class="badge float-left">
                            {{ $category->meta_des }}
                        </span>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
