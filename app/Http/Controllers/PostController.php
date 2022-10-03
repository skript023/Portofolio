<?php

namespace App\Http\Controllers;

use App\Models\category;
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
            'posts' => post::with(['article_creator', 'article_category'])->simplePaginate(6),
        ]);
    }

    public function post_by_category(Request $request)
    {
        $category_id = $request->route('category');

        if (isset($category_id))
        {
            return view('post_category', [
                'category' => category::where('id_category', $category_id)->get(),
                'posts' => post::where('post_category_id', $category_id)->simplePaginate(6)
            ]);
        }
        else
        {
            return '<div class="alert alert-danger" role="alert"> Belum Ada Artikel </div>';
        }
    }
}
