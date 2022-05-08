<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Models\post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        return view('admin.admin_comments', [
            'comments' => post::with(['article_comment'])->get()
        ]);
    }
}
