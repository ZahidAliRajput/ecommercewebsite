@extends('admin.layout.app')
@section('content')

<div class="container py-5">
    <div class="row">
        <div class="col-md-12">

            <div id="success_message"></div>

            @if (Session::has('message'))
            <div class="alert alert-danger" role="alert">
                {{Session::get('message')}}
            </div>
            @endif
            
            <div class="card">
                <div class="card-header">
                    <h4>
                        Product Data
                        <a href="{{ route('addproduct') }}" type="button" class="btn btn-primary float-end">Add Product</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Price</th>
                                <th>Parent Category</th>
                                <th>Child Category</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td><img src="/uploads/category/{{ $product->image }}" alt="Product image is here" width="100"></td>
                                <td>{{$product->title}}</td>
                                <td>{{$product->price}}</td>
                                @foreach($categories as $category)
                                @if($category->id == $product->category_id )
                                <td>{{ $category->name }}</td>
                                @endif
                                @endforeach

                                <td>{{$product->SubCategory()->first()->name}}</td>
                                <!-- <td>{{$product->description}}</td> -->
                                <td>
                                    <a href="{{ route('editproduct', $product->id ) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ route('deleteproduct', $product->id ) }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection