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

    <div class="colorlib-product">
        <div class="container">
            <div class="row row-pb-lg product-detail-wrap">
                <div class="col-sm-8">
                    <div class="owl-carousel">
                        <div class="item">
                            <div class="product-entry border">
                                <a href="#" class="prod-img">
                                    <img src="{{ $product->image }}" class="img-fluid"
                                        alt="Free html5 bootstrap 4 template">
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="product-entry border">
                                <a href="#" class="prod-img">
                                    <img src="images/item-2.jpg" class="img-fluid" alt="Free html5 bootstrap 4 template">
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="product-desc">
                        <h3>{{ $product->name }}</h3>
                        <p class="price">
                            <span>{{ $product->price }}</span>
                            <span class="text-info">
                                {{ $product->name }} have
                                ({{ round($product->reviews->avg('rate'),1,PHP_ROUND_HALF_UP) ?? 0 }}
                                {{ Str::plural('Star', $product->reviews->avg('rate')) }} avg Rating)
                            </span>
                        </p>
                        <p>{{ $product->details }}</p>
                        <div class="size-wrap">
                            <div class="block-26 mb-2">
                                <h4>Size</h4>
                                <ul>
                                    <li><a href="#">7</a></li>
                                    <li><a href="#">7.5</a></li>

                                </ul>
                            </div>
                            <div class="block-26 mb-4">
                                <h4>Width</h4>
                                <ul>
                                    <li><a href="#">M</a></li>
                                    <li><a href="#">L</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="input-group mb-4">
                            <span class="input-group-btn">
                                <button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
                                    <i class="icon-minus2"></i>
                                </button>
                            </span>
                            <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1"
                                min="1" max="100">
                            <span class="input-group-btn ml-1">
                                <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
                                    <i class="icon-plus2"></i>
                                </button>
                            </span>
                        </div>
                        <div class=>
{{--                            <div class="col-sm-12 text-center">--}}
{{--                                <p class="addtocart"><a href="cart.html" class="btn btn-primary btn-addtocart"><i--}}
{{--                                            class="icon-shopping-cart"></i> Add to Cart</a></p>--}}
{{--                            </div>--}}
                            <form action="{{ route('cart')}}" method="post" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <input type="hidden" name="name" value="{{ $product->name }}">
                                <input type="hidden" name="price" value="{{ $product->price }}">

                                <input type="submit"  class="btn btn-danger mt-3" value="Add to Cart">
                            </form>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-md-12 pills">
                            <div class="bd-example bd-example-tabs">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-description-tab" data-toggle="pill"
                                            href="#pills-description" role="tab" aria-controls="pills-description"
                                            aria-expanded="true">Description</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-manufacturer-tab" data-toggle="pill"
                                            href="#pills-manufacturer" role="tab" aria-controls="pills-manufacturer"
                                            aria-expanded="true">Manufacturer</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-review-tab" data-toggle="pill" href="#pills-review"
                                            role="tab" aria-controls="pills-review" aria-expanded="true">Review</a>
                                    </li>
                                </ul>

                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane border fade show active" id="pills-description" role="tabpanel"
                                        aria-labelledby="pills-description-tab">
                                        <p>{{ $product->description }}</p>


                                    </div>

                                    <div class="tab-pane border fade" id="pills-manufacturer" role="tabpanel"
                                        aria-labelledby="pills-manufacturer-tab">
                                        <p>{{ $product->meta_des }}</p>
                                    </div>

                                    <div class="tab-pane border fade" id="pills-review" role="tabpanel"
                                        aria-labelledby="pills-review-tab">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h3 class="head">{{ $product->reviews->count() }}
                                                    {{ Str::plural('Review', $product->reviews->count()) }}
                                                </h3>
                                                <div class="review">
                                                    <div class="user-img" style="background-image: url(images/person1.jpg)">
                                                    </div>
                                                    <div class="desc">
                                                        <h4>
                                                            <span class="text-left">Jacob Webb</span>
                                                            <span class="text-right">14 March 2018</span>
                                                        </h4>
                                                        <p class="star">
                                                            <span>
                                                                <i class="icon-star-full"></i>
                                                                <i class="icon-star-full"></i>
                                                                <i class="icon-star-full"></i>
                                                                <i class="icon-star-half"></i>
                                                                <i class="icon-star-empty"></i>
                                                            </span>
                                                            <span class="text-right"><a href="#" class="reply"><i
                                                                        class="icon-reply"></i></a></span>
                                                        </p>
                                                        <p>When she reached the first hills of the Italic Mountains, she had
                                                            a last view back on the skyline of her hometown Bookmarksgrov
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="review">
                                                    @foreach ($product->reviews as $review)
                                                        <div class="desc bg-gray-200 m-3 p-3 rounded-md">
                                                            <h4>
                                                                <span class="text-left">{{ $review->user['name'] }}</span>

                                                                <span
                                                                    class="text-right">{{ $review->created_at->diffForHumans() }}</span>
                                                            </h4>
                                                            <p class="star">
                                                                <span>
                                                                    {{ $review->rate }}
                                                                    {{ Str::plural('star', $review->rate) }} From Five Stars
                                                                </span>
                                                                <span class="text-right"><a href="#" class="reply"><i
                                                                            class="icon-reply"></i></a></span>
                                                            </p>
                                                            <p class="bg-white rounded-2xl p-2">{{ $review->comment }}</p>
                                                            @can('delete', $review)
                                                                <span>
                                                                    <form action="{{ route('delete.review', $review) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <button type="submit"
                                                                            class="btn btn-danger">Delete</button>
                                                                    </form>

                                                                    <a href="{{ route('edit.review', $review) }}"
                                                                        class="btn btn-info">Edit</a>
                                                                </span>
                                                            @endcan
                                                        </div>
                                                        {{-- @if ($review->user->id == auth()->user()->id)
                                                            --}}
                                                            {{-- @endif
                                                        --}}
                                                    @endforeach
                                                </div>
                                                @auth
                                                    <div class="review bg-blue-200 p-2 rounded-md">
                                                        <form action="{{ route('add.review', $product['id']) }}" method="POST">
                                                            @csrf
                                                            <textarea name="comment" id="" cols="80" rows="5"
                                                                class="bg-white rounded-md"
                                                                placeholder="Write Your Comment Here"></textarea><br>
                                                            <p class="text-success text-lg ">Your rate here</p>
                                                            <div class="rating">
                                                                <input type="radio" name="rate" value="5" id="5">
                                                                <label for="5">☆</label>
                                                                <input type="radio" name="rate" value="4" id="4">
                                                                <label for="4">☆</label>
                                                                <input type="radio" name="rate" value="3" id="3">
                                                                <label for="3">☆</label>
                                                                <input type="radio" name="rate" value="2" id="2">
                                                                <label for="2">☆</label>
                                                                <input type="radio" name="rate" value="1" id="1"><label
                                                                    for="1">☆</label>
                                                            </div>
                                                            <button class="btn btn-success" type="submit">Send Review</button>
                                                        </form>
                                                    </div>
                                                @endauth

                                            </div>
                                            <div class="col-md-4">
                                                <div class="rating-wrap">
                                                    <h3 class="head">Give a Review</h3>
                                                    <div class="wrap">

                                                      <p class="star">

                                                        <span>
                                                            <i class="icon-star-full"></i>
                                                            <i class="icon-star-full"></i>
                                                            <i class="icon-star-full"></i>
                                                            <i class="icon-star-full"></i>
                                                            <i class="icon-star-full"></i>
                                                            (98%)
                                                        </span>
                                                        <span>{{$rate['5']}} Reviews</span>
                                                    </p>


                                                        <p class="star">
                                                            <span>
                                                                <i class="icon-star-full"></i>
                                                                <i class="icon-star-full"></i>
                                                                <i class="icon-star-full"></i>
                                                                <i class="icon-star-full"></i>
                                                                <i class="icon-star-empty"></i>
                                                                (85%)
                                                            </span>
                                                            <span>{{$rate['4']}} Reviews</span>
                                                        </p>
                                                        <p class="star">
                                                            <span>
                                                                <i class="icon-star-full"></i>
                                                                <i class="icon-star-full"></i>
                                                                <i class="icon-star-full"></i>
                                                                <i class="icon-star-empty"></i>
                                                                <i class="icon-star-empty"></i>
                                                                (70%)
                                                            </span>
                                                            <span>{{$rate['3']}} Reviews</span>
                                                        </p>
                                                        <p class="star">
                                                            <span>
                                                                <i class="icon-star-full"></i>
                                                                <i class="icon-star-full"></i>
                                                                <i class="icon-star-empty"></i>
                                                                <i class="icon-star-empty"></i>
                                                                <i class="icon-star-empty"></i>
                                                                (10%)
                                                            </span>
                                                            <span>{{$rate['2']}} Reviews</span>
                                                        </p>
                                                        <p class="star">
                                                            <span>
                                                                <i class="icon-star-full"></i>
                                                                <i class="icon-star-empty"></i>
                                                                <i class="icon-star-empty"></i>
                                                                <i class="icon-star-empty"></i>
                                                                <i class="icon-star-empty"></i>
                                                                (0%)
                                                            </span>
                                                            <span>{{$rate['1']}} Reviews</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    @include('frontEnd.layouts.footer')
@endsection
@section('script')

    <script>
        let arr = [1, 2, 3, 4, 5];
        function handleRating(e) {
            console.log(e.target.value);
        }
    </script>


@endsection
<script>
    $(document).ready(function() {
        var quantitiy = 0;
        $('.quantity-right-plus').click(function(e) {
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());
            // If is not undefined
            $('#quantity').val(quantity + 1);
            // Increment
        });
        $('.quantity-left-minus').click(function(e) {
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());
            // If is not undefined
            // Increment
            if (quantity > 0) {
                $('#quantity').val(quantity - 1);
            }
        });
    });
</script>
