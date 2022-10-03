<form action="/category/{{$data_id}}" method="get">
    <div class="form-group">
        <label>Update Category Name</label>
        <input type="text" class="form-control" name="category_name" value="{{ $category[$data_id - 1]->category_name }}">
    </div>

    <div class="form-group">
        <button type="submit" name="update" class="btn btn-warning btn-block">Update Category</button>
    </div>
</form>