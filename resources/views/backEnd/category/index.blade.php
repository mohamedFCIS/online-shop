@extends('backEnd.app')

@section('title')
    categories
@endsection
@section('dashboard')
    Categories
@endsection
@section('content')
@if (session()->has('error'))
<div class="alert alert-danger">

    {{session()->get('error')}}

</div>

@endif
    <div class="container">
        <div class="row pt-3 justify-content-center">
            <div class="card" style="width: 90%">
                <div class="card-header text-center">
                    <h1>All Categories</h1>
                </div>
                @if (session()->has('success'))

                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <div class="card-bod">
                    <ul class="list-group">

                        @forelse ($categories as $category)
                            <li class="list-group-item text-muted">
                                {{ $category->name }}
                                <span class="float-right ">
                                    <a href="category/{{ $category->id }}/delete" style="color: #f44336">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </a>
                                </span>
                                <span class="float-right mr-2">
                                    <a href="category/{{ $category->id }}/edit" style="color: #4caf50">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </a>
                                </span>
                                <span class="float-right mr-2">
                                    <a href="category/{{ $category->id }}" style="color: #00bcd4">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                </span>
                            </li>

                        @empty <p class="text-center">No Category yet</p>


                        @endforelse
                    </ul>
                </div>

            </div>

        </div>
        <div class="mb-3 text-center">
            <a href="category/create"><button type="submit" class="btn btn-success " style="width: 40%">
                    Create new Category
                </button></a>

        </div>
    </div>

@endsection
