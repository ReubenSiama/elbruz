<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait ModelIndex
{
    public function modelIndex(Request $request, $model)
    {
        return $model->orderBy('id', 'desc')
            ->paginate($request->get('per_page'));
    }
}