@extends('template_helper.template_helper')
@section('title', 'Category Manager')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Form Tambah Artikel</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card boarder-0 shadow-lg">
                <div class="card-body">
                <form action= "/article/add" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <select class="form-control" name="post_category_id" >
                        <option>Pilih Kategori</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id_category }}">{{ $category->category_name }}?></option>
                            @endforeach
                        </select>
                    </div>
                        <div class="form-group">
                            <label>Judul Artikel</label>
                            <input type="text" name="post_title" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Gambar Artikel</label>
                            <input type="file" name="post_image" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea name="post_description" id="" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <button class="type-submit" name="add_artikel" class="btn btn-primary btn-block">Simpan</button>
                        </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection