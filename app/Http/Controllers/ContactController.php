<?php

namespace App\Http\Controllers;

use App\Models\contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact()
    {
        return view('contact');
    }
    
    public function admin_contact_manager()
    {
        return view('admin.admin_contacts', [
            'contacts' => contact::all(),
        ]);
    }

    public function contact_developer(Request $request)
    {
        $request->validate(['name' => 'required', 'email' => 'required', 'message' => 'required']);

        $data = $request->only(['name', 'email', 'message']);

        $data['date'] = now();

        try 
        {
            contact::create($data);
            return redirect('/contact');
        }
        catch (\Throwable $th) 
        {
            dd($th);
            return redirect('/');
        }
    }

    public function remove_contact(Request $request)
    {
        try 
        {
            contact::where('id_contact', $request->id_contact)->delete();
            return redirect()->url('/contact');
        }
        catch (\Throwable $th) 
        {
            return redirect()->back();
        }
    }
}
