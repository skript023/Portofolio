@extends('template_helper.template_helper')
@section('title', 'Category Manager')

@section('edit_article')


<div class="class-container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Form Edit Artikel</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-lg">
                <div class="card-body">
                    <form action="category/edit" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <select class="form-control" name="post_category_id" >
                            <option>Pilih Kategori</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id_category }}"  {{ if ($category->id_category == $category->article_category->post_category_id) : 'selected'; endif;  }}>{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Judul Artikel</label>
                            <input type="text" name="post_title" class="form-control" value="{{ $category->article_category->post_title }}">
                        </div>

                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="post_image" class="form-control" >
                        </div>

                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea name="post_description" class="form-control" cols="30" rows="10">{{ $category->article_category->post_description }}</textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" name="update_artikel" class="btn btn-warning btn-block">Update Artikel</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection