@extends('admin.template_helper.template_helper')
@section('title', 'Category Manager')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card border-0 shadow-lg">
                <div class="card-body">
                    <h3 class="card-title">Form Add Category</h3>
                    <form method="post">
                        <div class="form-group">
                            <label>Category Name</label>
                            <input type="text" name="category_name" class="form-control" placeholder="input nama kategori">
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" name="add_category" class="btn btn-primary btn-block">Add Category</button>
                        </div>
                    </form>
                    {{-- Alternative @if ($data_id = app('request')->input('edit')) --}}
                    @if ($data_id = request()->edit)
                        @include('admin.category.edit')
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-0 shadow-lg">
                <div class="card-body">
                    <h3 class="card-title">List Category</h3>
                    <table class="table table-boardered">
                        <thead>
                        <tr>
                        <th>Category Name</th>
                        <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($category as $cate)
                                <tr>
                                <td>{{ $cate->category_name }}</td>
                                <td>
                                    <a href={{ '/category?edit=' . $cate->id_category }} class="btn btn-warning">Update</a>
                                    <a href={{ '/category?delete=' . $cate->id_category }} class="btn btn-danger">Delete</a>
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