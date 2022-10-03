<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Models\post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comment = comment::with('article_comment')->simplePaginate(10);
        return view('admin.admin_comments', [
            'comments' => $comment,
        ]);
    }
}
