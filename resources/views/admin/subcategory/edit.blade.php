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
            <h6 class="mb-0 text-uppercase">Update Sub Category</h6>
            <a href="{{ route('managesubcategory') }}" class="btn btn-primary float-end" style="margin-top: -28px;">Back to Listing</a>
            <hr>
            <form class="row g-3" action="{{ route('updatesubcategory') }}" method="POST">
                @csrf
                <input type="hidden" value="{{ $subcategory->id }}" name="id">
                <div class="offset-3 col-6">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $subcategory->name }}">
                </div>
                <div class="offset-3 col-6">
                    <label class="form-label">Parent Category</label>
                    <select class="form-select mb-3" aria-label="Default select example" name="category_id">
                        @foreach($categories as $category)
                        @php $selected = ""; @endphp
                        @if($category->id == $subcategory->category_id)
                        @php $selected = "Selected"; @endphp
                        @endif
                        <option value="{{ $category->id }}" {{ $selected }}>{{$category->name}}</option>
                        @endforeach
                    </select>
                    <!-- </div>
                <div class="col-6">
                </div> -->

                    <div class="offset-4 col-2">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary text-center">Update</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>

@endsection