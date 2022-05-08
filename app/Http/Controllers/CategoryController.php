<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.admin_cateory', [
            'category' => category::with('article_category')->get(),
        ]);
    }
    
    public function category_edit(Request $request)
    {

    }
}
