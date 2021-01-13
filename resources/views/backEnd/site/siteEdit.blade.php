@extends('backEnd.app')

@section('content')







    <div class="card">
        <div class="card-header">
            <h1 class="text-center text-primary"> Update site Information</h1>
        </div>
        <div class="cart-body p-5">
            <form action="{{ route('sites.update', $site) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row form-group">
                    <div class="col col-sm-5"><label for="input-small" class=" form-control-label">
                            Logo Name</label></div>
                    <div class="col col-sm-6"><input type="text" id="input-small" name="logo_name" value="{{ $site->logo_name }}"
                            placeholder="Enter full Name" class=" form-control">
                            @error('logo_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


                
              

              
                <div class="row form-group">
                    <div class="col col-sm-5"><label for="input-large" class=" form-control-label">Logo Image</label>
                    </div>
                <div class="col col-sm-6"><input type="file" name="image" class=" form-control" value="{{$site->logo_image}}"
                            id="imgUpload">

                        @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <img src="{{  $site->logo_image }}" alt="{{ $site->image }}" width="100px" height="100px" id="img">

                    </div>
                </div>

                


               
        <div class="card-footer">
            <button type="submit" class="btn btn-primary ">
                <i class="fa fa-dot-circle-o"></i> Submit
            </button>
            <button type="reset" class="btn btn-danger  ">
                <i class="fa fa-ban"></i> Reset
            </button>


        </div>
    </div>
    </form>

@endsection
