<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\post;
use App\Models\comment;
use App\Models\contact;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function dashboard(Request $request)
    {
        if (auth()->user()->user_position === 'administrator')
        {
            return view('admin.dashboard', [
                'user_data' => User::all(),
                'username' => auth()->user()->username,
                'user_position' => auth()->user()->user_position,
                'user_status' => auth()->user()->user_status,
                'creation_date' => auth()->user()->user_date,
                'user_image' => auth()->user()->user_image,
                'total_user' => User::select('username')->get()->count(),
                'total_contacts' => contact::select('name')->get()->count(),
                'total_comment' => comment::with('article_comment')->count(),
                'total_post' => post::where('post_id_user', auth()->user()->id_user)->get()->count()
            ]);
        }

        return view('admin.dashboard', [
            'user_data' => User::all(),
            'username' => auth()->user()->username,
            'user_position' => auth()->user()->user_position,
            'user_status' => auth()->user()->user_status,
            'creation_date' => auth()->user()->user_date,
            'user_image' => auth()->user()->user_image,
            'total_comment' => comment::where('comment_post_id', Auth::user()->id_user)->get()->count(),
            'total_post' => post::where('post_id_user', auth()->user()->id_user)->get()->count()
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
            if (Auth::attempt($credentials, $request->remember)) 
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

    public function is_admin()
    {
        if (auth()->check())
        {
            if (auth()->user()->user_position === 'administrator')
            {
                return true;
            }
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
            return redirect()->back();
        }
    }

    public function view_user()
    {
        if ($this->is_login())
        {
            if ($this->is_admin())
            {
                return view('admin.users_management', [
                    'users' => user::all(),
                ]);
            }
        }

        return redirect('/');
    }

    public function delete_user(Request $request)
    {
        $user = user::find($request->delete);
        if ($this->is_login())
        {
            if ($this->is_admin())
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
        return redirect('/');
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

        $user = user::find($request->selected_user);

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

    public function banned_user(Request $request)
    {
        $user = User::find($request->selected_user);

        if ($this->is_login())
        {
            if ($this->is_admin())
            {
                $user->delete();
            }
        }
    }
}
