<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\comment;
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
        $category_id = $request->category;

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

    public function read_more(Request $request)
    {
        $read_more = $request->route('readmore');

        if (isset($read_more))
        {
            return view('read_more', [
                'comments' => comment::where('comment_post_id', $read_more)->where('comment_status', 'approved')->get(),
                'posts' => post::where('id_post', $read_more)->get()
            ]);
        }
        else
        {
            return '<div class="alert alert-danger" role="alert"> Belum Ada Artikel </div>';
        }
    }

    public function comment_article(Request $request)
    {
        $request->validate(['comment_name' => 'required', 'comment_email' => 'required', 'comment_description' => 'required']);

        $data = $request->only(['comment_name', 'comment_email', 'comment_description']);

        $data['comment_date'] = now();
        $data['comment_post_id'] = $request->readmore;
        $data['comment_status'] = 'approved';

        try 
        {
            comment::create($data);
            return redirect('/read'. '/' . $request->readmore);
        }
        catch (\Throwable $th) 
        {
            dd($th);
            return back();
        }
    }

    public function user_articles()
    {
        if (auth()->check())
        {
            return view('admin.admin_article', [
                'posts' => post::with(['article_creator', 'article_category'])->simplePaginate(8)
            ]);
        }
    }

    public function search_article(Request $request)
    {
        if (isset($request->post_title))
        {
            return view('admin.admin_article', [
                'search' => post::with(['article_creator', 'article_category'])->where('post_title', $request->post_title)->get()
            ]);
        }
    }
}
