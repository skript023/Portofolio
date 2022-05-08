@extends('template_helper.template_helper')
@section('title', 'Comments Manager')

@section('content')

<div class="container-fluid">
    <div class="row">
        <h1 class="text-center">List Comments</h1>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="row border-0 shadow-lg">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Comment Post</th>
                                <th>Comment Name</th>
                                <th>Comment Email</th>
                                <th>Comment Description</th>
                                <th>Comment Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($comments as $comment)
                                <tr>
                                    <td>{{ $comment->title }}</td>
                                    <td>{{ $comment->name }}</td>
                                    <td>{{ $comment->email }}</td>
                                    <td>{{ $comment->description }}</td>
                                    <td>
                                        @if ($comment->comment_status == 'unapproved')
                                            <a href='/comments?approved={$comment->id_comments}' class='btn btn-primary'>Approved</a>
                                        @else 
                                            <a href='/comments?unapproved={$comment->id_comments}' class='btn btn-danger'>Unapproved</a>
                                        @endif
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