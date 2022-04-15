@extends('admin.layout.app')
@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">

            <div id="success_message"></div>

            @if (Session::has('message'))
            <div class="alert alert-danger" role="alert">
                {{Session::get('message')}}
                <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>

            </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>
                        Sub Category
                        <a href="{{ route('addsubcategory') }}" type="button" class="btn btn-primary float-end">Add Sub Category</a>
                        </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Child Category</th>
                                <th>Parent Category</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($subcategories as $subcategory)
                            <tr>
                                <td>{{$subcategory->name}}</td>
                                <td>{{$subcategory->Category()->first()->name}}</td>                              
                                <td>
                                    <a href="{{ route('editsubcategory', $subcategory->id ) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ route('deletesubcategory', $subcategory->id ) }}" class="btn btn-danger">Delete</a>
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