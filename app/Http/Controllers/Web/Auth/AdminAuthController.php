<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
  public function getLoginPage()
  {
    return view('admin.auth.login');
  }

  public function login(Request $request)
  {
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
      if (Auth::user()->role != 1) {
        Auth::logout();
        return redirect()->back()->withInput()->withError('Invalid Credentials');
      } else {
        return redirect()->route('admin.home');
      }
    } else {
      return redirect()->back()->withInput()->withError('Invalid Credentials');
    }
  }

  public function logout()
  {
    Auth::logout();
    return redirect()->route('login');
  }
}
