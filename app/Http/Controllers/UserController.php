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
                return redirect()->intended('/dashboard');
            }
        }
        catch (\Throwable $th) 
        {
            dd($th);
            return back()->withErrors([
                    'username' => 'The provided credentials do not match our records.',
                ]);
        }
    }

    public function is_login()
    {
        if (auth()->check())
        {
            return true;
        }
        return false;
    }

    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
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

    public function view_user()
    {
        if ($this->is_login())
        {
            return view('admin.users_management', [
                'users' => user::all(),
            ]);
        }
    }

    public function delete_user(Request $request)
    {
        $user = user::find($request->delete);
        if ($this->is_login())
        {
            if (isset($user))
            {
                $user->delete();
            }
            else
            {
                return '<div class="alert alert-danger" role="alert"> User tidak ditemukan </div>';
            }
        }
    }

    public function update_user(Request $request)
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
            'password',
            'user_image'
        ]);

        $user = user::find($request->id_user);

        if ($this->is_login())
        {
            if (isset($request->user))
            {
                $user->update($data);
                return redirect('/dashboard/user');
            }
            else
            {
                return '<div class="alert alert-danger" role="alert"> User tidak ditemukan </div>';
            }
        }
    }

    public function profile()
    {
        if ($this->is_login())
        {
            return view('admin.user_profile', [
                'user' => auth()->user()
            ]);
        }
        else
        {
            return '<div class="alert alert-danger" role="alert"> Autentikasi gagal </div>';
        }
    }

    public function banned_user()
    {
        $user = User::select('username')->get();

        
    }
}
