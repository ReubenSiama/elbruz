<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserDetailRequest;
use Illuminate\Http\Request;
use App\Traits\ModelStore;
use App\Models\UserDetail;
use Auth;

class UserDetailController extends Controller
{
    use ModelStore;

    public function __construct(
        protected UserDetail $userDetail
    ){}

    public function addAddress(UserDetailRequest $request)
    {
        $request->merge(['user_id' => Auth::user()->id]);
        $data['user_detail'] = $this->modelStoreUser($request, model: $this->userDetail);
        return response()->json(['success'=>'Address Added']);
    }
}
