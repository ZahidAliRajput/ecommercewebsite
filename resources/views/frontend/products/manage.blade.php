@extends('frontend.layout.app')

@section('content')
<!--? Popular Items Start -->
<div class="popular-items">
    <div class="container">
        <!-- Section tittle -->
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-10">
                <div class="section-tittle mb-70 text-center">
                    <h2>Our Products</h2>
                    <p>Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.</p>
                </div>
            </div>
        </div>
        @if (Session::has('message'))
            <div class="alert alert-danger" role="alert">
                {{Session::get('message')}}
                <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>

            </div>
            @endif

            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif

        <div class="row">
            @foreach($products as $product)
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                <div class="single-popular-items mb-50 text-center">
                    <div class="popular-img">
                        <img src="/uploads/category/{{ $product->image }}" alt="Product image is here">
                        <div class="img-cap">
                            <a href="{{ route('addtocart', $product->id) }}"><span>Add to cart</span></a>
                        </div>

                        <div class="favorit-items">
                            <a href="{{ route('addtowishlist', $product->id) }}"><span class="flaticon-heart"></span></a>
                        </div>
                    </div>
                    <div class="popular-caption">
                        <h3><a href="{{ route('singleproduct', $product->slug) }}">{{$product->title}}</a></h3>
                        <span>{{ $product->price }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- Button -->
        <div class="row justify-content-center">
            <div class="room-btn pt-70">
                <a href="catagori.html" class="btn view-btn1">View More Products</a>
            </div>
        </div>
    </div>
</div>
<!-- Popular Items End -->

@endsection