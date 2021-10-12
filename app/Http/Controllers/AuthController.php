<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Traits\ModelStore;
use App\Models\User;
use Auth;

class AuthController extends Controller
{
  use ModelStore;

  public function __construct(
    protected User $user
  ) {
  }

  public function login(Request $request)
  {
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
      $user = Auth::user();
      $success['message'] = 'Logged In Successfully';
      $success['user'] = $user;
      $success['token'] = $user->createToken('elburz_token')->accessToken;
      $success['role'] = $user->role;
      $success['address'] = count($user->userDetail);
      return response()->json($success, 200);
    } else {
      return response()->json(['error' => 'Unauthorised'], 401);
    }
  }

  public function register(UserRequest $request)
  {
    $data['user'] = $this->modelStoreUser($request, model: $this->user);

    Auth::login($data['user']);
    $success['message'] = 'Registered';
    $success['user'] = $data['user'];
    $success['token'] = $data['user']->createToken('elburz_token')->accessToken;
    $success['role'] = $data['user']->role;
    return response()->json($success, 200);
  }

  public function logout()
  {
    $user = Auth::user()->token();
    $user->revoke();
    $success['success'] = 'Logged Out';
    return response()->json($success, 200);
  }
}
