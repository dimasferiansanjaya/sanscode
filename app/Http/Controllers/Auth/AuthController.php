<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Services\User\UserService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{

  public function __construct(private UserService $service)
  {
  }

  public function loginView()
  {
    $pageConfigs = ['myLayout' => 'blank'];
    return view('content.auth.login', compact('pageConfigs'));
  }

  public function login(LoginRequest $credentials)
  {
    $remember = $credentials->validated('remember') ?? false;
    if (Auth::attempt($credentials->only('email', 'password'), $remember)) {
      $credentials->session()->regenerate();

      return redirect()->intended('/');
    }

    return back()->withErrors([
      'email' => 'The provided credentials do not match our records.',
    ])->onlyInput('email');
  }

  public function logout(Request $request)
  {
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/');
  }

  public function registerView()
  {
    $pageConfigs = ['myLayout' => 'blank'];
    return view('content.auth.register', compact('pageConfigs'));
  }

  public function register(RegisterRequest $credentials)
  {
    $result = $this->service->store($credentials->only('name', 'email', 'password'));
    event(new Registered($result));
    return redirect()->route('login')->with('success', 'Registration successful. You can now log in.');
  }
}
