<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.admin_category', [
            'category' => category::with('article_category')->get(),
        ]);
    }
    
    public function category_edit(Request $request)
    {
        $category_id = $request->route('edit');

        if (isset($category_id))
        {
            category::where('id_category', $category_id)->update(['category_name' => $request->category_name]);
            return redirect('/category');
        }
        else
        {
            return '<div class="alert alert-danger" role="alert"> Belum Ada Category </div>';
        }
    }
}
