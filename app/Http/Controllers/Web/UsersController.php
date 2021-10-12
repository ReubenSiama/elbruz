<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
  public function getUsers()
  {
    $users = User::where('role', 1)->get();
    return view('admin.users', compact('users'));
  }

  public function addUser(Request $request)
  {
    $user = new User;
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);
    $user->role = 1;
    $user->save();
    return back()->withSuccess('User Added');
  }

  public function updateUser(Request $request, $id)
  {
    $user = User::findOrFail($id);
    $user->name = $request->name;
    $user->email = $request->email;
    if ($request->password != '') {
      $user->password = bcrypt($request->password);
    }
    $user->save();
    return back()->withSuccess('User Updated');
  }

  public function deleteUser($id)
  {
    User::findOrFail($id)->delete();
    return back()->withSuccess('User Deleted');
  }
}
