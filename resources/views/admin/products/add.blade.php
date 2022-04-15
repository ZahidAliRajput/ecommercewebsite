@extends('admin.layout.app')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="border p-3 rounded">

            @if (Session::has('message'))
            <div class="alert alert-danger" role="alert">
                {{Session::get('message')}}
            </div>
            @endif
            <h6 class="mb-0 text-uppercase">Add Product</h6>
            <a href="{{ route('products') }}" class="btn btn-primary float-end" style="margin-top: -28px;">Back to Listing</a>
            <hr>
            <form class="row g-3" action="{{ route('postproduct') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-6">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="col-6">
                    <label class="form-label">Price</label>
                    <input name="price" type="number" class="form-control">
                </div>

                <div class="col-6">
                    <label class="form-label">Parent Category</label>
                    <select id="cat" class="form-select mb-3" aria-label="Default select example" name="category_id">
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-6 d-none">
                    <label class="form-label">Child Category</label>
                    <select id="subcategories" class="form-select mb-3" aria-label="Default select example" name="subcategory_id">
                    </select>
                </div>

                <div class="col-12">
                    <label class="form-label">Description</label>
                    <!-- <input type="text" > -->
                    <textarea name="description" class="form-control" id="" cols="30" rows="3"></textarea>
                </div>
                <div class="col-12">
                    <label class="form-label">Image</label>
                    <input type="file" class="form-control" name="image">
                </div>
                <div class="col-6">
                </div>

                <div class="col-2">
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@push('scripts')
<script>
    $('#cat').change(function(){
        $("div").removeClass("d-none");
        $id = $('#cat').val()
        // alert($id);
        $.ajax({
            type: "GET",
            url: "{{ url('subcategoryshow') }}/" + $id,
            success: function(response) {
                $('#subcategories').html("");
                $.each(response.subcategories, function(key, item) {
                    $('#subcategories').append(
                        '<option value="' + item.id + '">'+ item.name +'</option>');
                });
            },
        });
    })
</script>
@endpush

@endsection