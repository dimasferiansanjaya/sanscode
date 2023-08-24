<?php

namespace App\Http\Controllers\Api\Auth;

use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ExceptionHandler;
use App\Services\User\UserService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
  use ApiResponse, ExceptionHandler;

  public function __construct(private UserService $service)
  {
    //
  }

  public function register(RegisterRequest $request)
  {
    try {
      DB::beginTransaction();
      $result = $this->service->store($request->validated());
      event(new Registered($result));
      DB::commit();
    } catch (\Throwable $e) {
      DB::rollBack();
      return $this->handleApiException($e);
    }

    return $this->success('Resource created successfully.', $result, Response::HTTP_CREATED);
  }

  public function login(LoginRequest $request)
  {
    if (Auth::attempt($request->validated())) {
      $user = Auth::user();
      $token = $user->createToken('authToken')->plainTextToken;
      return $this->successLogin($token, $user, Response::HTTP_OK);
    }

    throw ValidationException::withMessages([
      'email' => ['The provided credentials are incorrect.'],
    ]);
  }

  public function logout(Request $request)
  {
    try {
      $request->user()->tokens()->delete();
      return $this->success('Logged out successfully. Your session has been closed.', null, Response::HTTP_OK);
    } catch (\Throwable $e) {
      return $this->handleApiException($e);
    }
  }
}
