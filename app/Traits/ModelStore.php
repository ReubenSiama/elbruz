<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Http\Request;

trait ModelStore
{
    public function modelStore(Request $request, $model, $relationshipToLoad = [])
    {
        return $model->firstOrCreate(
            $request->only($model->getFillable())
        )->load($relationshipToLoad);
    }

    public function modelStoreUser(Request $request, $model)
    {
        $user = $model->firstOrCreate(
            $request->only($model->getFillable())
        );
        return $user;
    }
}
