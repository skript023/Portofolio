@extends('front_end_helper.front_end')
@section('artikel')
<!-- Blog Post -->

@foreach($posts as $post)
    @if($post->post_status === 'published')
        <div class="card mb-4">
            <img class="card-img-top" src="{{ asset("image").'/'.$post->post_image }}" alt="Card image cap">
            <div class="card-body">
            <h2 class="card-title">{{ $post->post_title }}</h2>
            <p class="card-text">{{ $post->post_description }}</p>
            <a href="/read/{{$post->id_post}}" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
            {{ $post->post_date }}
            <a href="#">Author : {{ $post->article_creator->first_name . " " . $post->article_creator->last_name }}</a>
            </div>
        </div>
    @endif
@endforeach

{{ $posts->links() }}

@endsection