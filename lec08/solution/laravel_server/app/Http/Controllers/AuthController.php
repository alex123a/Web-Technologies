<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function login()
    {
        return view('auth.login');
    }

    public function doLogin(Request $request)
    {
        $validated = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required']
        ]);

        $user = User::where("email", $validated["email"])->first();
        if(Hash::check($validated["password"] . $user->salt, $user->password)) {
            auth()->login($user);
        }
        
        return back()->withErrors([
            'error' => 'Server error',
        ]);
    }

    public function register()
    {
        return view('auth.register');
    }

    public function doRegister(Request $request)
    {
        $validated = $request->validate([
            'name'     => ['required'],
            'email'    => ['required', 'email', 'unique:App\Models\User,email'],
            'password' => ['required', 'min:4']
        ]);

        $user = User::create($validated);
        auth()->login($user);
        return redirect()->route("albums.index");
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route("albums.index");
    }
}
