@extends('frontEnd.app')
@section('title')
    products
@endsection
@section('navbar')
@include('frontEnd.layouts.navbar')
@endsection


@section('content')	
<div class="review bg-blue-200 p-2 rounded-md">
   {{-- {{dd($review)}} --}}
    <form action="{{route('update.review',$review)}}" method="POST">
        @csrf
        @method('put')
        <textarea name="comment" id="" cols="80" rows="5" class="bg-white rounded-md" placeholder="Write Your Comment Here" value="">{{$review->comment}}</textarea><br>
        <p class="text-success text-lg " >Your rate here</p>
        <div class="rating">
            <input type="radio" name="rate"
                value="5" id="5">
            <label for="5">☆</label>
            <input type="radio" name="rate"
                value="4" id="4">
            <label for="4">☆</label>
            <input type="radio" name="rate"
                value="3" id="3">
            <label for="3">☆</label>
            <input type="radio" name="rate"
                value="2" id="2">
            <label for="2">☆</label>
            <input type="radio" name="rate"
                value="1" id="1"><label for="1">☆</label>

        </div>
        <button class="btn btn-success" type="submit">Send Review</button>
    </form>	
                           
   </div>

@endsection


@section('footer')
@include('frontEnd.layouts.footer')
@endsection
