@extends('backEnd.app')

@section('title')
    Show messages
@endsection
@section('dashboard')
    messages
@endsection
@section('content')

    <div class="container">
        <h1 class="mt-5 text-center">
            {{ $contact->subject }}
        </h1>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <span>
                            {{ $contact->fname }}     {{ $contact->lname }}

                        </span>
                        <span class="badge float-right badge-warning">
                            {{ $contact->email }}
                        </span>
                    </div>
                    <div class="card-body">
                        <span class="badge float-left">
                            {{ $contact->message }}
                        </span>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
