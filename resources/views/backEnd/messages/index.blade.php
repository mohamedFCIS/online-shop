@extends('backEnd.app')

@section('title')
    messages
@endsection
@section('dashboard')
    messages
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
                    <h1>All Messages</h1>
                </div>
                @if (session()->has('success'))

                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <div class="card-bod">
                    <ul class="list-group">

                        @forelse ($contacts as $contact)
                            <li class="list-group-item text-muted">
                                {{ $contact->subject }}
                                <span class="float-right ">
                                    <a href="contact/{{ $contact->id }}/delete" style="color: #f44336">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </a>
                                </span>

                                <span class="float-right mr-2">
                                    <a href="contact/{{ $contact->id }}" style="color: #00bcd4">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                </span>
                            </li>

                        @empty <p class="text-center">No message yet</p>


                        @endforelse
                    </ul>
                </div>

            </div>

        </div>

    </div>

@endsection
