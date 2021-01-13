<nav class="colorlib-nav" role="navigation">
    <div class="top-menu">
        <div class="container">

            <div class="row ">
                <div class="col-sm-7 col-md-9">
                    @foreach ($sites as $site)
                        @if ($site->logo_image != '')
                            <div id="colorlib-logo"><a href="{{ url('/home') }}"><img
                                        src="{{ $site->logo_image }}" alt="{{ $site->logo_name }}"
                                        class=" object-cover" width="150" height="80">
                                </a>
                            </div>
                            @break
                        @endif
                    @endforeach
                </div>
                <div class="col-sm-5 col-md-3 ">
                    <form action="{{ route('search') }}" class="search-wrap">
                        <div class="form-group">
                            <input type="search" class="form-control search " placeholder="Search" name="search">
                            <button class="btn btn-primary submit-search text-center" type="submit"><i
                                    class="icon-search"></i></button>
                        </div>
                    </form>
                </div>

            </div>
            <div class="row">
                <div class="col-sm-12 text-left menu-1">
                    <ul>

                        <li><a href="/home">Home</a></li>
                        <li class="has-dropdown">

                            <a href="#">Products</a>

                            <ul class="dropdown">
                                <li><a href="product-detail.html">Product Detail</a></li>
                                @auth
                                    <li> <a href="{{ route('user.fav') }}">User Favourits</a></li>

                                @endauth

                                <li><a href="cart.html">Shopping Cart</a></li>
                                <li><a href="{{ route('checkout.index') }}">Checkout</a></li>
                                <li><a href="order-complete.html">Order Complete</a></li>
                                <li><a href="add-to-wishlist.html">Wishlist</a></li>
                            </ul>
                        </li>

                        <li><a href="/aboutUs">About</a></li>
                        <li><a href="/contact">Contact</a></li>

                        <li class="has-dropdown">

                            <a href="#">Filters</a>
                            <ul class="dropdown">
                                <li><a href="{{ route('products.sorted') }}">From Low To High</a></li>
                                @auth
                                    <li> <a href="{{ route('products.desc') }}">From High To Low</a></li>
                                @endauth

                                <li class="bg-gray-200 rounded-md">
                                    <form action="{{ route('products.filter') }}" method="GET">
                                        <input class="w-20 rounded-md bg-white p-2 m-2 " type="number" name="max" id=""
                                            placeholder="Max">
                                        <input class="w-20 rounded-md bg-white p-2 m-2" type="number" name="min" id=""
                                            placeholder="Min"><br>
                                        <button class="btn bg-blue-300 text-white m-2" type="submit">Filter</button>
                                    </form>
                                </li>
                                <li><a href="{{ route('checkout.index') }}">Checkout</a></li>
                                <li><a href="order-complete.html">Order Complete</a></li>
                                <li><a href="add-to-wishlist.html">Wishlist</a></li>
                            </ul>
                        </li>

                        <li class="cart">
                            @if (Route::has('login'))
                                @if (Auth::check())
                                    @if (Auth::user()->role != 'user')

                                        <a href="{{ url('/admin/home') }}" class="text-sm text-gray-700 underline "
                                            style="display: inline">Dashboard</a>
                                    @endif
                                @endif
                                <div class="hidden  top-0 right-0 px-6 py-4 sm:block"
                                    style="padding-top: 0.1rem !important; display:inline">
                                    @auth

                                    <div class="user-area dropdown float-right">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            @if (Auth::user()->profile_photo_path == '')
                                                <p>{{ Auth::user()->name }}</p>
                                            @else
                                                <img class="rounded-circle float-md-right" width="50" height="50"
                                                    src="{{ asset('storage/' . Auth::user()->profile_photo_path)}}"
                                                    alt="{{ Auth::user()->name }}" />


                                            @endif
                                        </a>



                                        <div class="user-menu dropdown-menu">




                                            <a class="nav-link" href="{{ route('profile.show') }}"><i class="fa fa-cog"></i>
                                                Profile</a>
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <a class="nav-link" href="#" onclick="this.parentNode.submit()"><i
                                                        class="fa fa-power-off"></i>
                                                    Logout</a>

                                            </form>

                                        </div>
                                    </div>
                                @else
                                    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}"
                                            class="ml-4 text-sm text-gray-700 underline">Register</a>
                                    @endif
                                @endauth
                    </div>
                    @endif

                    </li>
                    <li class="cart"><a href="{{ route('cart') }}"><i class="icon-shopping-cart"></i> Cart
                            @if (Cart::instance('default')->count() > 0)
                                <strong>[{{ Cart::instance('default')->count() }}]</strong>
                            @endif
                        </a>
                    </li>




                    </ul>
                </div>
            </div>
        </div>

        </div>

    <div class="sale">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 offset-sm-2 text-center">
                    <div class="row">
                        <div class="owl-carousel2">
                            <div class="item">
                                <div class="col">
                                    <h3><a href="#">25% off (Almost) Everything! Use Code: Summer Sale</a></h3>
                                </div>
                            </div>
                            <div class="item">
                                <div class="col">
                                    <h3><a href="#">Our biggest sale yet 50% off all summer shoes</a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
