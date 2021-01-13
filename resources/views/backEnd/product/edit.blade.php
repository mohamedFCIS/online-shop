@extends('backEnd.app')

@section('title')
    Edit
@endsection
@section('dashboard')
    product
@endsection
@section('content')

    <div class="container pt-5 text-center">
        <div class="row justify-content-center mt-5">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h1>Edit product</h1>
                    </div>
                    <div class="card-body">

                        <form action="/admin/product/{{ $product->id }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="enter name" name="productName"
                                    value="{{ $product->name }}" class="@error('productName') is-invalid @enderror">

                                @error('productName')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <br>
                                <input type="text" class="form-control" placeholder="enter meta keyword"
                                    name="productMetaKeyword" value="{{ $product->meta_keywords }}"
                                    class="@error('productMetaKeyword') is-invalid @enderror">
                                @error('productMetaKeyword')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <br>
                                <input type="text" class="form-control" placeholder="enter meta des" name="productMetaDes"
                                    value="{{ $product->meta_des }}" class="@error('productMetaDes') is-invalid @enderror">
                                @error('productMetaDes')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <br>
                                <input type="number" class="form-control" placeholder="enter price" name="productPrice"
                                    value="{{ $product->price }}" class="@error('productPrice') is-invalid @enderror">
                                @error('productPrice')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <br>
                                <textarea name="productdetails" class="form-control" rows="3" placeholder="enter details"
                                    class="@error('productdetails') is-invalid @enderror"> {{ $product->details }}
                                </textarea>

                                @error('productdetails')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <br>
                                <textarea class="form-control" placeholder="enter description" name="productdescription"
                                    class="@error('productdescription') is-invalid @enderror"
                                    rows="4">{{ $product->description }}</textarea>
                                @error('productdescription')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <br>
                                <div class="form-groub">
                                    <img src="{{ asset('storage/'. $product->image) }}" alt=""
                                    width="100%" >
                                </div>
                                <input type="file" class="form-control" name="productImage" value="{{ $product->image }}"
                                    class="@error('productImage') is-invalid @enderror">
                                @error('productImage')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <br>
                                <div class="mb-3 text-center">
                                    <button type="submit" class="btn btn-success " style="width: 40%">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
