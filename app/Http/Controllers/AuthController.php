<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Category;
use App\Models\Buku;
use Illuminate\Support\Facades\DB;


class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('username', $request->username)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect()->route('dashboard');
        }

        return back()->with('error', 'Invalid username or password.');

    }

    public function index()
    {
        $role = Auth::user()->role;

        switch ($role) {
            case 'admin':
                return view('admin.dashboard');
            case 'staff':
                return redirect('/dashboard_buku');
            case 'siswa': {
                $categories = Category::all();
                return view('siswa.dashboard', [
                        'categories' => Category::all(),
                        'category_buku' => DB::table('category_buku')->get(),
                        'bukus' => Buku::all(),
                    ]);
            }
                
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
