<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        //Str::slug($post->post_title);
        return view('artikel', [
            'posts' => post::with(['article_creator', 'article_category', 'article_comment'])->simplePaginate(6),
        ]);
    }
}
