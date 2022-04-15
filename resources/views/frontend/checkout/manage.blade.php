<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Checkout manage</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/img/favicon.ico')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/slicknav.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css')}}">
</head>

<body>
    @include('frontend.layout.header')
    <section class="cart_area ">
        <div class="container">  
            <h3>Order Details</h3>
            
    @if (Session::has('message'))
            <div class="alert alert-danger" role="alert">
                {{Session::get('message')}}
                <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
    @endif
            <form action="{{ route('placeorder') }}" method="POST">
            @csrf
            <div class="col-md-6 mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" placeholder="Email" name="email">
            </div>

            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Sub Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = 0 @endphp
                            @if(session('cart'))
                            @foreach(session('cart') as $id =>$details)
                            @php $total += $details['price'] * $details['quantity'] @endphp

                            <tr data-id="{{ $id }}">
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="/uploads/category/{{ $details['image'] }}" alt="">
                                        </div>
                                        <div class="media-body">
                                            <p>{{$details['title']}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5>{{ $details['price'] }}</h5>
                                </td>
                                <td data-th="Quantity">
                                    <h5>{{ $details['quantity'] }}</h5>
                                    <!-- <input type="number" min="1" value="{{ $details['quantity'] }}" class="form-control quantity updatecart" /> -->
                                </td>
                                <td>
                                    <h5>{{ $details['price'] * $details['quantity'] }}</h5>
                                </td>
                                <td>
                                    <button class="btn_1 removefromcart">Remove</i></button>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                            <!-- <tr class="bottom_button">
                    <td>
                      <a class="btn_1" href="#">Update Cart</a>
                    </td>
                    <td></td>
                    <td></td>
                    <td>
                      <div class="cupon_text float-right">
                        <a class="btn_1" href="#">Close Coupon</a>
                      </div>
                    </td>
                  </tr> -->
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <h5>Total</h5>
                                </td>
                                <td>
                                    <h5>{{ $total }}</h5>
                                </td>
                            </tr>
                     <!-- <tr class="shipping_area">
                    <td></td>
                    <td></td>
                    <td>
                      <h5>Shipping</h5>
                    </td>
                    <td>
                      <div class="shipping_box">
                        <ul class="list">
                          <li>
                            Flat Rate: $5.00
                            <input type="radio" aria-label="Radio button for following text input">
                          </li>
                          <li>
                            Free Shipping
                            <input type="radio" aria-label="Radio button for following text input">
                          </li>
                          <li>
                            Flat Rate: $10.00
                            <input type="radio" aria-label="Radio button for following text input">
                          </li>
                          <li class="active">
                            Local Delivery: $2.00
                            <input type="radio" aria-label="Radio button for following text input">
                          </li>
                        </ul>
                        <h6>
                          Calculate Shipping
                          <i class="fa fa-caret-down" aria-hidden="true"></i>
                        </h6>
                        <select class="shipping_select" style="display: none;">
                          <option value="1">Bangladesh</option>
                          <option value="2">India</option>
                          <option value="4">Pakistan</option>
                        </select><div class="nice-select shipping_select" tabindex="0"><span class="current">Bangladesh</span><ul class="list"><li data-value="1" class="option selected">Bangladesh</li><li data-value="2" class="option">India</li><li data-value="4" class="option">Pakistan</li></ul></div>
                        <select class="shipping_select section_bg" style="display: none;">
                          <option value="1">Select a State</option>
                          <option value="2">Select a State</option>
                          <option value="4">Select a State</option>
                        </select><div class="nice-select shipping_select section_bg" tabindex="0"><span class="current">Select a State</span><ul class="list"><li data-value="1" class="option selected">Select a State</li><li data-value="2" class="option">Select a State</li><li data-value="4" class="option">Select a State</li></ul></div>
                        <input class="post_code" type="text" placeholder="Postcode/Zipcode">
                        <a class="btn_1" href="#">Update Details</a>
                      </div>
                    </td>
                  </tr> -->
                        </tbody>
                    </table>
                    <div class="checkout_btn_inner float-right">
                        <a class="btn_1" href="{{ route('home') }}">Continue Shopping</a>
                        <button type="submit" class="btn_1">Place Order</button>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </section>

    @include('frontend.layout.footer')
    <script src="{{ asset('frontend/assets/js/vendor/modernizr-3.5.0.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/popper.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.slicknav.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/slick.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/wow.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/animated.headline.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.magnific-popup.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.sticky.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/contact.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.form.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.validate.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/mail-script.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.ajaxchimp.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/plugins.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/main.js')}}"></script>

    <script type="text/javascript">
        $(".updatecart").change(function(e) {
            e.preventDefault();
            var ele = $(this);
            $.ajax({
                url: '{{ route('updatecart') }}',
                method: 'patch',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr('data-id'),
                    quantity: ele.parents("tr").find(".quantity").val()
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        });

        $(".removefromcart").click(function(e) {
            e.preventDefault();
            var ele = $(this);
            if (confirm("Are You sure want to remove ?")) {
                $.ajax({
                    url: '{{ route('removefromcart') }}',
                    method: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr('data-id'),
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            }
        });
    </script>
</body>

</html>