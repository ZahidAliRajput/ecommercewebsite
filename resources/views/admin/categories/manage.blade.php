@extends('admin.layout.app')

@extends('admin.categories.modal')
@section('content')

<div class="container py-5">
    <div class="row">
        <div class="col-md-12">

        @if (Session::has('message'))
                <div class="alert alert-danger" role="alert">
                    {{Session::get('message')}}
                <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>

                </div>
                @endif

            <div class="card">
                <div class="card-header">
                    <h4>
                        Categoryt Data
                        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#AddCategoryModal">Add Category</button>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td>{{$category->name}}</td>
                                <td>
                                    <a href="javascript:;" class="btn btn-primary"  
                                    onclick="editCategory( {{ $category->id }} )">Edit</a>
                                    <a href="#" class="btn btn-warning">Delete</a>
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

@push('scripts')
<script>
    function editCategory(id)
    {

        $.ajax({
            type:"GET",
            url: "{{ url('editcategory') }}/"+id,
            success:function(response){
                   // console.log(response)
                $("#CategoryID").val(response['id']);
                $("#CategoryName").val(response['name']);
                $("#UpdateCategory").modal('show');
            },
        });
    }
</script>
@endpush
@endsection