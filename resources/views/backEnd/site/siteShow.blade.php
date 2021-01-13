@extends('backEnd.app')
@section('header')
    <h2> Sites Information</h2>
@endsection
@section('content')


    <div class="card">

        <div class="card-body">
            <table class="table table-striped  text-center table-bordered ">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>logo</th>
                        <th>Update</th>

                    </tr>
                </thead>
                <tbody >
                    @foreach ($sites as $index => $site)


                        <tr>
                            <th>{{ $index + 1 }}</th>
                            <td>{{ $site->logo_name }}</td>


                            <td><img src="{{  $site->logo_image}}" alt="{{ $site->logo_image }}" width="50px" height="50px"> </td>




                            <td><a href="{{ route('sites.edit', $site) }}"><i
                                        class='fa fa-edit  text-center text-primary '></i> </a></td>

                        </tr>

                    @endforeach



                </tbody>
            </table>
        </div>
    </div>






@endsection
