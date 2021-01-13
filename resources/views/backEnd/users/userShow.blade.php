@extends('backEnd.app')
@section('title')
    Users
    @endsection
@section('header')
    <h1> Users Information</h1>
@endsection
@section('content')


    <div class="card">
        <div class="card-header">
        <a href="{{route('users.create')}}" class="btn btn-outline-primary rounded" >
                Add User
        </a>
        </div>
        <div class="card-body">
            <table class="table table-striped  text-center table-bordered ">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>email</th>
                        <th>Phone</th>
                        <th>Country</th>
                        <th>role</th>
                        <th>profile</th>

                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody >

                    @foreach ($users as $index => $user)
                        <tr>
                            <th>{{ $index + 1 }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->country }}</td>
                            <td>{{ $user->role }}</td>
                            <td><img src="{{ $user->profile_photo_path }}" alt="{{ $user->profile_photo_path }}" width="50px" height="50px"> </td>

                            <td><a href="{{ route('users.edit', $user,$country) }}"><i
                                        class='fa fa-edit  text-center text-primary '></i> </a></td>
                            <form action="{{ route('users.destroy', $user) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <td><button type="submit" class="btn btn-link"><i
                                            class='fa fa-trash-o  text-center text-danger '></i> </button></td>

                            </form>
                        </tr>

                    @endforeach



                </tbody>
            </table>
        </div>
    </div>








    {{-- @if (Session::has('errors'))


        @section('script')
        <script type="text/javascript">
            alert("jgoijgojp");


            window.addEventListener('load', (event) => {
                var modal = document.getElementById("userModal");
                modal.style.display = "block";
            });
            //    $(document).ready(function() {

            // $('#userModal').modal('show');
            // }
            window.addEventListener('click', (event) => {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            });

        </script>

        @endsection


    @endif --}}







@endsection
