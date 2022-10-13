<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card boarder-0 shadow-lg">
                <div class="card-body">
                    <form action="/dashboard/article" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" name="post_title" placeholder="Masukan Judul Aritkel Anda...">
                            <span class="input-group-btn">
                                <button class="btn btn-dark mt-3" name="cariArtikel" type="submit">
                                    Cari Artikel
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@if (isset($search))
    <div class="row">
        <div class="col-md-12">
            <a href="/dashboard/article" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
    <div class="row">
        @foreach($search as $found)
            @if (auth()->user()->id_user === $found->post_id_user)
                <div class="col-md-4 mb-5">
                <!-- Blog Post -->
                    <div class="card mb-4 border-0 shadow-lg">
                        <img class="card-img-top"  src="{{ asset('profile'). '/' . $found->post_image }}" alt="Card image cap">
                        <div class="card-body">
                            <span class="badge badge-primary">{{ $found->category_name }}</span>
                            <br>
                            <h2 class="card-title">{{ $found->post_title }}</h2>
                            <br>
                            <div class="btn-group">
                                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Action
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="/read/{{ $found->id_post }}">View Artikel</a>
                                    <a class="dropdown-item" href="article?delete={{ $found->id_post }}">Delete Artikel</a>
                                    <a class="dropdown-item" href="article?page=edit&p_id={{ $found->id_post }}">Edit Artikel</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Separated link</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-muted">
                            Posted on {{ $found->post_date }} by
                            <a href="#">{{ $found->article_creator->username }}</a>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@else
    <div class="row">
        @foreach($posts as $post)
            @if (auth()->user()->id_user === $post->post_id_user)
                <div class="col-md-4 mb-5">
                <!-- Blog Post -->
                    <div class="card mb-4 border-0 shadow-lg">
                        <img class="card-img-top"  src="{{ asset('profile') . '/' . $post->post_image}}" alt="Card image cap">
                        <div class="card-body">
                            <span class="badge badge-primary">{{ $post->article_category->category_name }}</span> / <span class="badge badge-info">{{ $post->post_status }}</span>
                            <br>
                            <h3 class="card-title">{{ $post->post_title }}</h3>
                            <br>
                            <div class="btn-group">
                                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Action
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="/read/{{ $post->id_post }}">View Artikel</a>
                                    <a class="dropdown-item" href="/dashboard/article/delete/{{ $post->id_post }}">Delete Artikel</a>
                                    <a class="dropdown-item" href="/dashboard/article?page=edit&selected_article={{ $post->id_post }}">Edit Artikel</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="/dashboard/article/update_status/{{ $post->id_post }}" method="post">
                                        <button class="btn btn-info">{{ $post->post_status ? "Publish article" : "Unpublish article" }}</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-muted">
                            Posted on {{ $post->post_date }} by
                            <a href="#">{{ $post->article_creator->username }}</a>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endif
</div>