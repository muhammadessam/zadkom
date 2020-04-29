<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{

    use AuthenticatesUsers;

    public function showAdminLoginForm()
    {
        return view('Admin.Auth.login');
    }

    public function adminLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [], [
            'email' => 'البريد',
            'password' => 'كلمة المرور'
        ]);

        if (Auth::guard('admin')->attempt($request->only('email', 'password'), $request['remember'])) {
            return redirect()->intended(route('dashboardHome'));
        }
        return back()->withInput($request->only('email', 'remember'));
    }

    public function adminLogout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();


        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new Response('', 204)
            : redirect('/');
    }
}
