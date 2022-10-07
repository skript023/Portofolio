<form action="/dashboard/category/edit/{{$data_id}}" method="post">
    @csrf
    <div class="form-group">
        <label>Update Category Name</label>
        @foreach ($categories as $category)
            @if ($category->id_category === $data_id)
                <input type="text" class="form-control" name="category_name" value="{{ $category->category_name }}" required>
            @endif
        @endforeach
    </div>

    <div class="form-group">
        <button type="submit" name="update" class="btn btn-warning btn-block">Update Category</button>
    </div>
</form>