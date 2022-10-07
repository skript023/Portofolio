@extends('front_end_helper.front_end')
@section('artikel')

<div class="container-fluid">
    <div class="row">
        @foreach($posts as $post)
            <div class="col-md-4 mt-5">
                <img src="image" alt="image" class="card-img-top img-fluid">
            </div>
            <div class="col-md-8 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">{{ $post->post_title }}</h2>
                        <p class="card-text">{{ $post->post_description }}</p>
                    </div>
                    <div class="card-footer text-muted">
                        Posted on {{ $post->post_date }} by
                        <a href="#">Start Bootstrap</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6 mt-3">
            <form action="/comment" method="post">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="comment_name">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="comment_email">
                </div>
                <div class="form-group">
                    <label>Comment</label>
                    <textarea class="form-control" cols="30" rows="10" name="comment_description"></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit" name="add_comment">Submit</button>
                </div>
            </form>
        </div>
        
        <div class="col-md-6 mt-3">
            <h3>List Comment Box</h3>
            <ul class="list-group">
                @foreach($comments as $comment)
                    <li class="list-group-item">{{ $comment->comment_name }}</li>
                    <li class="list-group-item">{{ $comment->comment_description }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

@endsection