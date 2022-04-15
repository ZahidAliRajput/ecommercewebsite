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
            <h6 class="mb-0 text-uppercase">Update Product</h6>
            <hr>
            <form class="row g-3" action="{{ route('updateproduct') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $product->id }}">
                <div class="col-6">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" value="{{ $product->title }}">
                </div>
                <div class="col-6">
                    <label class="form-label">Price</label>
                    <input name="price" type="number" class="form-control" value="{{ $product->price }}">
                </div>
                <div class="col-6">
                    <label class="form-label">Parent Category</label>
                    <select id="cat" class="form-select mb-3" aria-label="Default select example" name="category_id">
                        @foreach($categories as $category)
                        @php $selected = ""; @endphp
                        @if($category->id == $product->category_id)
                        @php $selected = "Selected"; @endphp
                        @endif
                        <option value="{{ $category->id }}" {{ $selected }}> {{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Initially displayed Child category -->
                <div class="col-6  select1">
                    <label class="form-label">Child Category</label>
                    <select class="form-select mb-3" aria-label="Default select example" name="subcategory_id">
                        @foreach($subcategories as $subcategory)
                        @php $selected = ""; @endphp
                        @if($subcategory->id == $product->subcategory_id)
                        @php $selected = "Selected"; @endphp
                        @endif
                        <option value="{{ $subcategory->id }}" {{ $selected }}>{{ $subcategory->name }}</option>
                        @endforeach
                    </select>
                </div>


                <!-- On change Case of parent category -->
                <div class="col-6 d-none select2">
                    <label class="form-label">Child Category</label>
                <select id='subcategories' class="form-select mb-3 " aria-label="Default select example" name="subcategory_id">
                <!-- Option is from the ajax response -->
                </select>
                </div>

                <div class="col-12">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" id="" cols="30" rows="3">{{ $product->description }}</textarea>
                </div>
                <div class="col-12">
                    <label class="form-label">Image</label>
                    <input type="file" class="form-control" name="image">
                </div>
                <div class="col-6">
                </div>

                <div class="col-2">
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@push('scripts')
<script>
    $('#cat').change(function() {

        $(".select2").removeClass("d-none");
        $(".select1").addClass("d-none");
        $id = $('#cat').val()
        $.ajax({
            type: "GET",
            url: "{{ url('subcategoryshow') }}/" + $id,
            success: function(response) {
                $('#subcategories').html("");
                $.each(response.subcategories, function(key, item) {
                    $('#subcategories').append(
                        '<option value="' + item.id + '">' + item.name + '</option>');
                });
            },
        });
    })
</script>
@endpush
@endsection