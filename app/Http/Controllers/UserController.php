<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', [
            'user_data' => User::all(),
            'username' => User::select('username')->where('username', 'Admin')->first(),
            'user_position' => User::select('user_position')->get(),
            'user_status' => User::select('user_status')->get(),
            'creation_date' => User::select('user_date')->get(),
            'user_image' => User::select('user_image')->get(),
            //'total_user' => User::select('username')->get()->sum('username')
        ]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        
        $credentials = $request->only(['username', 'password']);
        try
        {
            if (Auth::attempt($credentials)) 
            {
                $request->session()->regenerate();
                //dd($auth);
                return redirect()->intended('/dashboard');
            }
        }
        catch (\Throwable $th) 
        {
            dd($th);
            return redirect('/login');
            // back()->withErrors([
            //     'username' => 'The provided credentials do not match our records.',
            // ]);
        }
    }

    public function add_user(Request $request)
    {
        $request->validate([
            'first_name' => 'required', 
            'last_name' => 'required',
            'username' => 'required',
            'email' => 'required:|email:dns', 
            'password' => 'required'
        ]);

        $data = $request->only([
            'first_name', 
            'last_name',
            'username', 
            'email',
            'password'
        ]);

        $data['user_date'] = now();
        $data['password'] = Hash::make($data['password']);

        try 
        {
            User::create($data);
            return redirect('/');
        } 
        catch (\Throwable $th) 
        {
            dd($th);
            return redirect()->back();
        }

    }

    public function delete_user()
    {
        
    }

    public function update_user()
    {

    }

    public function banned_user()
    {
        $user = User::select('username')->get();

        
    }
}
