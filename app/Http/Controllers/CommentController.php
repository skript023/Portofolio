<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Models\post;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comment = post::with(['article_comment'])->where('post_id_user', Auth::user()->id_user)->simplePaginate(3);
        
        return view('admin.admin_comments', [
            'post_comment' => $comment,
            'total_comment' => post::with('article_comment')->where('post_id_user', Auth::user()->id_user)->count()
        ]);
    }

    public function approve_comment(Request $request)
    {
        $comment = comment::find($request->selected_comment);
        if (auth()->check())
        {
            if (isset($comment))
            {
                $comment->comment_status = 'approved';
                $comment->save();

                return redirect('/dashboard/comments');
            }
        }
    }

    public function unapprove_comment(Request $request)
    {
        $comment = comment::find($request->selected_comment);

        if (auth()->check())
        {
            if (isset($comment))
            {
                $comment->comment_status = 'unapproved';
                $comment->save();

                return redirect('/dashboard/comments');
            }
        }
    }
}
