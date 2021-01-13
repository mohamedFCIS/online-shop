@extends('backEnd.app')

@section('content')







    <div class="card">
        <div class="card-header">
            <h1 class="text-center text-primary">Add user Information</h1>
        </div>
        <div class="cart-body p-5">
            <form action="{{ route('users.store') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                @csrf
              
                {{-- name feild --}}
                <div class="row form-group">
                    <div class="col col-sm-5"><label for="input-small" class=" form-control-label">
                            Full Name</label></div>
                    <div class="col col-sm-6"><input type="text" id="input-small" name="name" value="{{ old('name') }}"
                            placeholder="Enter full Name" class=" form-control">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

{{-- email feild --}}
                <div class="row form-group">
                    <div class="col col-sm-5"><label for="input-normal" class=" form-control-label">
                            Email</label></div>
                    <div class="col col-sm-6">
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="Enter Your Email"
                            class="form-control">

                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

{{-- phone feild --}}
                <div class="row form-group">
                    <div class="col col-sm-5"><label for="input-large" class=" form-control-label"> Phone</label>
                    </div>
                    <div class="col col-sm-6"><input type="phone" name="phone" value="{{ old('phone') }}"
                            placeholder="Your Phone" class=" form-control">
                            

                            @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
               {{-- role feild --}}

                <div class="row form-group">
                    <div class="col col-sm-5"><label for="input-large" class=" form-control-label"> Role</label>
                    </div>
                    <div class="col col-sm-6">



                        <select class="form-control" id="role" name="role">
                            <option value="admin">admin</option>
                            <option value="user">User</option>

                        </select>

                        @error('role')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div>

                </div>
{{-- country feild --}}
                    <div class="row form-group">
                            <div class="col col-sm-5"><label for="input-large" class=" form-control-label"> Country</label>
                            </div>
                            <div class="col col-sm-6">
                                <select class="form-control" id="role" name="country" >
                                <option value="">choose country</option>
                                @if ($country->count())

                                    @foreach ($country as $country)

                                        {{-- <span style="padding: 5px;"> {!! $country->flag['flag-icon'] !!} {!!
                                            $country->name->common !!} </span> --}}

                                

                                <option value="{{$country->name->common}}">{{$country->name->common}}</option>
                                @endforeach

                                @endif

                                </select>

                            @error('country')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                            </div>

                        </div>

                        <div class="row form-group">
                            <div class="col col-sm-5"><label for="input-large" class=" form-control-label">Image</label>
                            </div>
                            <div class="col col-sm-6"><input type="file" name="image" class=" form-control"
                                    id="imgUpload">
                            <img src="" alt="k" width="50px" height="50px" id="img">


                                @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

{{-- password field --}}
                      




                <div class="row form-group">
                    <div class="col col-sm-5"><label for="input-large" class=" form-control-label"> Password</label>
                    </div>
                    <div class="col col-sm-6"><input type="password" name="password" class=" form-control" id="password">

                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-sm-5"><label for="input-large" class=" form-control-label">
                            repeat-password</label>
                    </div>
                    <div class="col col-sm-6"><input type="password" name="password_confirmation" class=" form-control">
                    </div>
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
