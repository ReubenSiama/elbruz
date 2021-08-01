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
        )->load('roles', 'student');
        return tap($user)->update(['regn_no' => $this->generateUniqueRegnNo($user)]);
    }

    private function generateUniqueRegnNo(User $user): string
    {
        return env('SCHOOL_SHORT')
            . date('y')
            . '-'
            . str_pad($user->id, 5, '0', STR_PAD_LEFT);
    }
}
