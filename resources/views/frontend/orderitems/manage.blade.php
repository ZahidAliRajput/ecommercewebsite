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
  

    <table class="table">
  <thead>
    <tr>
      <th scope="col">Image</th>
      <th scope="col">Title</th>
      <th scope="col">Price</th>
      <th scope="col">Description</th>
    </tr>
  </thead>
  <tbody>
  @foreach($productsArray as $product )
        @foreach($product as $p)
        <tr>
      <th scope="row"> <img src="/uploads/category/{{ $p->image }}" alt="Product image is here"></th>
      <td>{{ $p->title }}</td>
      @foreach($orderitems as $orderitem)
      <td>{{ $orderitem->price }}</td>
      @endforeach

      <td>{{ $p->description}}</td>
    </tr>
       @endforeach
 @endforeach
  </tbody>
</table>
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