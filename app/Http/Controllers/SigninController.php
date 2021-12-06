<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class SigninController extends Controller
{
    public function create() 
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $this->validate(request(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        
        if(auth()->attempt($data)) {
            return redirect()->to('/');
        }

        return back()->withErrors([
            'message' => 'Tu email o password son incorrectos.'
        ]);
    }

    public function logout() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}
