<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserDetailRequest;
use Illuminate\Http\Request;
use App\Traits\ModelStore;
use App\Models\UserDetail;
use App\Models\User;
use Auth;

class UserDetailController extends Controller
{
    use ModelStore;

    public function __construct(
        protected UserDetail $userDetail
    ){}

    public function addAddress(UserDetailRequest $request)
    {
      UserDetail::where('user_id', Auth::user()->id)->update(['primary' => 0]);
      $request->merge(['user_id' => Auth::user()->id]);
      $data['user_detail'] = $this->modelStore($request, model: $this->userDetail);
      return response()->json(['success'=>'Address Added']);
    }

    public function getMyProfile()
    {
      return response()->json(['user'=>Auth::user()]);
    }

    public function updateProfile(Request $request)
    {
      $user = User::findOrFail(Auth::user()->id);
      $user->name = $request->name;
      if($request->email != $user->email){
        $request->validate([
          'email' => 'unique:users',
        ]);
        $user->email = $request->email;
      }
      if($request->password != ''){
        $request->validate([
          'password' => 'required|min:6|confirmed',
          'password_confirmation' => 'required',
        ]);
        $user->password = bcrypt($request->password);
      }
      $user->save();
      return response()->json(['user'=>'Profile Updated Successfully']);
    }
}
