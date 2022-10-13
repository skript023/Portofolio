@extends('admin.template_helper.template_helper')
@section('title', 'Comments Manager')
@section('breadcrumb', 'Comments Manager')
@section('header', 'Comments Manager')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 ">
            <div class="row border-0 shadow-lg">
                <div class="card-body">
                    <table class="table table-bordered mt-5">
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
                            @foreach($post_comment as $comments)
                                <tr>
                                    @foreach ($comments->article_comment as $comment)
                                        @if (isset($comment))
                                            <td>{{ $comments->post_title }}</td>
                                            <td>{{ $comment->comment_name }}</td>
                                            <td>{{ $comment->comment_email }}</td>
                                            <td>{{ $comment->comment_description }}</td>
                                            <td>
                                                @if ($comment->comment_status === 'unapproved')
                                                    <a href='/dashboard/approve/{{ $comment->id_comments }}' class='btn btn-primary'>Approved</a>
                                                @else 
                                                    <a href='/dashboard/unapprove/{{ $comment->id_comments }}' class='btn btn-danger'>Unapproved</a>
                                                @endif
                                            </td>
                                        @else
                                            <td>N/A</td>
                                            <td>N/A</td>
                                            <td>N/A</td>
                                            <td>
                                                <a href='' class='btn btn-danger'>N/A</a>
                                            </td>
                                        @endif
                                    @endforeach
                                </tr>
                            @endforeach
                            {{ $post_comment->links() }}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection