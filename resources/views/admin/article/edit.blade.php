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
                    <form action="/dashboard/article/edit/{{ request()->selected_article }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @foreach($posts as $post)
                            @if (request()->selected_article == $post->id_post)
                                <div class="form-group">
                                    <select class="form-control" name="post_category_id" >
                                    <option>Pilih Kategori</option>
                                        <option value="{{ $post->article_category->id_category }}"  {{ $post->article_category->id_category == $post->post_category_id ? 'selected' : ''  }} required>{{ $post->article_category->category_name }}</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Judul Artikel</label>
                                    <input type="text" name="post_title" class="form-control" value="{{ $post->post_title }}" required>
                                </div>

                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" name="post_image" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea name="post_description" class="form-control" cols="30" rows="10" required>{{ $post->post_description }}</textarea>
                                </div>

                                <div class="form-group">
                                    <button type="submit" name="update_artikel" class="btn btn-warning btn-block">Update Artikel</button>
                                </div>
                            @endif
                        @endforeach
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>