@extends('frontEnd.app')
@section('title')
    products
@endsection
@section('navbar')
    @include('frontEnd.layouts.navbar')
@endsection

@section('gallery')
    @include('frontEnd.layouts.gallery')
@endsection

@section('content')
    <div class="colorlib-about">
        <div class="container">
            <div class="row row-pb-lg">
                <div class="col-sm-6 mb-3">
                    <div class="video colorlib-video" style="background-image: url(storage/images/congrats.gif);">
                        <a href="https://cdn.jwplayer.com/videos/bH41ZTMy-dOv10K2F.mp4" class="popup-vimeo"><i
                                class="icon-play3"></i></a>
                        <div class="overlay"></div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="about-wrap">
                        <h2>ECommerce Store around the Globe</h2>
                        <p>This site created in 2020 to help people to easliy choise the products they needed using internet
                            and help them to buy easliy.</p>
                        <h3>About Us</h3>

                        <p>Welcome to our Store – the Middle East’s online marketplace.

                            We connect people and products – opening up a world of possibility. From bracelets and backpacks
                            to tablets and toy cars – we give you access to everything you need and want. Our range is
                            unparalleled, and our prices unbeatable.

                            Driven by smart technology, everything we do is designed to put the power directly in your hands
                            – giving you the freedom to shop however, whenever and wherever you like.

                            We’re trusted by millions, because we don’t just deliver to your doorstep, we were born here.
                            With Us you’ll always be getting a good deal – with exceptional service that makes your shopping
                            experience as easy and seamless as possible.

                            This is Store – the power is in your hands.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    @include('frontEnd.layouts.footer')
@endsection
