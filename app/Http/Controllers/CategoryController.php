<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.admin_category', [
            'categories' => category::all(),
        ]);
    }
    
    public function category_edit(Request $request)
    {
        $request->validate([
            'category_name' => 'required'
        ]);

        $data = $request->only([
            'category_name'
        ]);

        $category = category::find($request->edit_id);

        if (isset($category))
        {
            $category->update($data);
            return redirect('/dashboard/category');
        }
        else
        {
            return '<div class="alert alert-danger" role="alert"> Belum Ada Category </div>';
        }
    }

    public function add_category(Request $request)
    {
        $request->validate([
            'category_name' => 'required'
        ]);

        $data = $request->only([
            'category_name'
        ]);

        try 
        {
            category::create($data);
            return redirect('/dashboard/category');
        } 
        catch (\Throwable $th) 
        {
            dd($th);
            return redirect()->back();
        }
    }
}
