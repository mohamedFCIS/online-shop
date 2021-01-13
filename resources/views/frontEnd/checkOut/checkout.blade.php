@extends('frontEnd.app')
@section('title')
    CheckOut
@endsection
@section('style')
    <style>
        .StripeElement {
            box-sizing: border-box;

            height: 40px;


            padding: 10px 12px;

            border: 1px solid transparent;
            border-radius: 4px;
            background-color: white;

            box-shadow: 0 1px 3px 0 #e6ebf1;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
        }

        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }

        .StripeElement--invalid {
            border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }

    </style>
@endsection
@section('navbar')
    @include('frontEnd.layouts.navbar')
@endsection
@section('content')
    <div class="container mt-5">
        @if(session()->has('success_message'))
            <div class="spacer"></div>
            <div class="alert alert-success">
            {{session()->get('success_message')}}
            </div>
        @endif
        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <input type="hidden" name="amount" value="{{ Cart::total() }}">
        <div class="row">
            <div class="col-lg-8">
                <form action="{{route('checkout.store')}}" method="post" class="colorlib-form" id="payment-form">
                    @csrf
                    <h2>Billing Details</h2>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="country">Select Country</label>
                                <div class="form-field">
                                    <i class="icon icon-arrow-down3"></i>
                                    <select name="country" id="people" class="form-control">
                                        <option value="#">Select country</option>
                                        <option value="Alaska">Alaska</option>
                                        <option value="China">China</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Korea">Korea</option>

                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" name="name" value="{{old('name')}}" class="form-control" placeholder="Your Name">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" id="address" name="address" value="{{old('address')}}" class="form-control" placeholder="Enter Your Address">
                            </div>

                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="city">Town/City</label>
                                <input type="text" id="city" name="city" value="{{old('city')}}" class="form-control" placeholder="Town or City">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="province">State/Province</label>
                                <input type="text" id="province" name="province" value="{{old('province')}}" class="form-control" placeholder="State Province">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="postalcode">Zip/Postal Code</label>
                                <input type="text" id="postalcode" value="{{old('postalcode')}}" class="form-control" placeholder="Zip / Postal">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">E-mail Address</label>
                                <input type="text" id="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Enter Your Email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="text" id="phone" name="phone" value="{{old('phone')}}" class="form-control" placeholder="Your Phone Number">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="">
                                    <label for="card-element">
                                        Credit or debit card
                                    </label>
                                    <div id="card-element" class="form-control">
                                        <!-- A Stripe Element will be inserted here. -->
                                    </div>

                                    <!-- Used to display form errors. -->
                                    <div id="card-errors" role="alert"></div>
                                </div>

                                <button type="submit" class="btn btn-primary mt-3">Submit Payment</button>
                            </div>
                        </div>


                    </div>
                </form>
            </div>

            <div class="col-lg-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="cart-detail">
                            <h2>Cart Total</h2>
                            <ul>
                                <li>

                                    <span>Subtotal</span> <span>${{ Cart::subtotal() }}</span>
                                    <ul>
                                        @foreach(Cart::instance('default')->content() as $item)
                                            <li><span>{{ $item->model->name }}</span> <span>${{$item->total()}}</span></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li><span>Tax</span> <span>{{ Cart::tax() }}</span></li>
                                <li><span>Order Total</span> <span>${{ Cart::total() }}</span></li>

                            </ul>
                        </div>
                    </div>

                    <div class="w-100"></div>


                </div>

            </div>
        </div>
    </div>

@endsection
@section('script')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        window.onload = function () {
            var stripe = Stripe('pk_test_51I09Z4Imekf4EWohqNnce1Xdj6re2VB4RJ3D2ZcnxV4Y6nYe9qX53JDDMUVRRK6gAh2BlYqYT6dpUaEiSpco3MDZ00jpdh9cVJ');
            var elements = stripe.elements();

            var style = {
                base: {
                    color: '#32325d',
                    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                    fontSmoothing: 'antialiased',
                    fontSize: '16px',
                    '::placeholder': {
                        color: '#aab7c4'
                    }
                },
                invalid: {
                    color: '#fa755a',
                    iconColor: '#fa755a'
                }
            };
            var card = elements.create('card', {style: style });
            card.mount('#card-element');

            // Handle real-time validation errors from the card Element.
            card.on('change', function (event) {
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                } else {
                    displayError.textContent = '';
                }
            });

            // Handle form submission.
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function (event) {
                event.preventDefault();

            var option = {
                name    : document.getElementById('name').value,
                address_line1 : document.getElementById('address').value,
                address_city    : document.getElementById('city').value,
                address_state   : document.getElementById('province').value,
                address_zip     : document.getElementById('postalcode').value
            }

                stripe.createToken(card , option).then(function (result) {
                    if (result.error) {
                        // Inform the user if there was an error.
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                    } else {
                        // Send the token to your server.
                        stripeTokenHandler(result.token);
                    }
                });
            });

            // Submit the form with the token ID.
            function stripeTokenHandler(token) {
                // Insert the token ID into the form so it gets submitted to the server
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);

                // Submit the form
                form.submit();
            }
        }
    </script>
@endsection
@section('footer')
    @include('frontEnd.layouts.footer')

@endsection
