<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Watch shop | eCommers</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/img/favicon.ico')}}">

    <!-- CSS here -->
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
@include('frontend.layout.slider')		

        <div class="product_image_area">
            <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 offset-2">
                <div class="single_product_img">
                        <img src="/uploads/category/{{ $product->image }}" width="1000" alt="Product image is here" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-8">
                <div class="single_product_text text-center">
                    <h3>{{ $product->title }}</h3>
                    <p>{{ $product->description }}</p>
                    <div class="card_area">
                        <div class="product_count_area">
                            <p>Rs {{ $product->price }}</p>
                        </div>
                    <div class="add_to_cart">
                    <a href="{{ route('addtocart', $product->id) }}" class="btn_1"><span>Add to cart</span></a>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
@include('frontend.layout.footer')
    <!-- JS here -->
    <script src="{{ asset('frontend/assets/js/vendor/modernizr-3.5.0.min.js')}}"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{ asset('frontend/assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/popper.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js')}}"></script>
    <!-- Jquery Mobile Menu -->
    <script src="{{ asset('frontend/assets/js/jquery.slicknav.min.js')}}"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="{{ asset('frontend/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/slick.min.js')}}"></script>

    <!-- One Page, Animated-HeadLin -->
    <script src="{{ asset('frontend/assets/js/wow.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/animated.headline.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.magnific-popup.js')}}"></script>

    <!-- Scrollup, nice-select, sticky -->
    <script src="{{ asset('frontend/assets/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.sticky.js')}}"></script>
    
    <!-- contact js -->
    <script src="{{ asset('frontend/assets/js/contact.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.form.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.validate.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/mail-script.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.ajaxchimp.min.js')}}"></script>
    
    <!-- Jquery Plugins, main Jquery -->	
    <script src="{{ asset('frontend/assets/js/plugins.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/main.js')}}"></script>
    
</body>
</html>


