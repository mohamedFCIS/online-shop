@extends('backEnd.app')

@section('title')
    create
@endsection

@section('dashboard')
    Category
@endsection
@section('content')

    <div class="container pt-5 text-center">
        <div class="row justify-content-center mt-5">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h1>Create a new catogary</h1>
                    </div>
                    <div class="card-body">

                        <form action="create" method="post">
                            @csrf
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="enter name" name="catogaryName"
                                    value="{{ old('catogaryName') }}" class="@error('catogaryName') is-invalid @enderror">

                                @error('catogaryName')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <br>
                                <input type="text" class="form-control" placeholder="enter meta keyword"
                                    name="catogaryMetaKeyword" value="{{ old('catogaryMetaKeyword') }}"
                                    class="@error('catogaryMetaKeyword') is-invalid @enderror">
                                @error('catogaryMetaKeyword')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <br>
                                <input type="text" class="form-control" placeholder="enter meta des" name="catogaryMetaDes"
                                    value="{{ old('catogaryMetaDes') }}"
                                    class="@error('catogaryMetaDes') is-invalid @enderror">
                                @error('catogaryMetaDes')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <br>
                                <div class="mb-3 text-center">
                                    <button type="submit" class="btn btn-success " style="width: 40%">
                                        Create
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
