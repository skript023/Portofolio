<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\comment;
use App\Models\post;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
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
            'categories' => category::with(['article_category'])->get()
        ]);
    }

    public function post_article()
    {
        return view('admin.admin_article', [
            'posts' => post::with(['article_creator', 'article_category'])->simplePaginate(6),
            'categories' => category::with(['article_category'])->get() 
        ]);
    }

    public function about()
    {
        return view('about',[
            'categories' => category::all()
        ]);
    }

    public function contact()
    {
        return view('contact',[
            'categories' => category::all()
        ]);
    }

    public function login()
    {
        return view('login', [
            'categories' => category::all()
        ]);
    }

    public function register()
    {
        return view('register', [
            'categories' => category::all()
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
                'posts' => post::where('id_post', $read_more)->get(),
                'categories' => category::all()
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

    public function add_article(Request $request)
    {
        $request->validate([
            "post_title" => "required",
            "post_category_id" => "required",
            "post_image" => "required",
            "post_description" => "required"
        ]);

        $data = $request->only([
            "post_title",
            "post_category_id",
            "post_image",
            "post_description"
        ]);

        $data["post_id_user"] = Auth::user()->id_user;
        $data["post_date"] = now();
        $data["post_status"] = 'published';

        if (Auth::check())
        {
            try 
            {
                post::create($data);
                return redirect('/dashboard/article');
            } 
            catch (\Throwable $th)
            {
                return redirect()->back();
            }
        }
    }

    public function update_article(Request $request)
    {
        $request->validate([
            "post_title" => "required",
            "post_category_id" => "required",
            "post_description" => "required"
        ]);

        $data = $request->only([
            "post_title",
            "post_category_id",
            "post_image",
            "post_description"
        ]);

        $post = post::find($request->selected_article);

        if (Auth::check())
        {
            $post->update($data);
            return redirect('/dashboard/article');
        }
    }

    public function delete_article(Request $request)
    {
        $post = post::find($request->selected_article);

        if (Auth::check())
        {
            $post->delete();
        }
    }

    public function publish_article(Request $request)
    {
        $post = post::find($request->selected_article);

        if (Auth::check())
        {
            $post->post_status = "published";

            $post->save();
            return redirect('/dashboard/article');
        }
    }

    public function unpublish_article(Request $request)
    {
        $post = post::find($request->selected_article);

        if (Auth::check())
        {
            $post->post_status = 'draft';

            $post->save();
            return redirect('/dashboard/article');
        }
    }
}
