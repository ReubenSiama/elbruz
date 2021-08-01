<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait ModelUpdate
{
    public function modelUpdate(Request $request, $model, $relationshipToLoad = [])
    {
        $model->touch();
        return tap($model)->update(
            $request->only($model->getFillable())
        )->load($relationshipToLoad);
    }
}
