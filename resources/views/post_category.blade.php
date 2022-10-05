@extends('front_end_helper.default_front_end')
@section('artikel')

<div class="container">
    <div class="row mt-5">
        <div class="col-md-12 mt-5">
            <h1>Post By Category <b>{{$category[0]->category_name}}</b></h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="class col-md-4">
        <!-- Blog Post -->
        <div class="card mb-4 border-0 shadow-lg">
            @foreach($posts as $post)
                <img class="card-img-top" src="" alt="Card image cap">
                    <div class="card-body">
                        <h2 class="card-title">{{ $post->post_title  }}</h2>
                        <p class="card-text">{{ substr($post->post_description,0,100) }}...</p>
                        <a href="read_artikel?read_more={{ $post->post_id }}" class="btn btn-primary">Read More &rarr;</a>
                    </div>
                    <div class="card-footer text-muted">
                        Posted on {{ $post->post_date }} by
                        <a href="#">Start Bootstrap</a>
                    </div>
                </div>
            @endforeach
        </div> 
    </div>
</div>

@endsection