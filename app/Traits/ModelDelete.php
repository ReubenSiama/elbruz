<?php

namespace App\Traits;

use Exception;
use Illuminate\Database\Eloquent\Model;

trait ModelDelete
{
    public function modelDelete(Model $model): ?bool
    {
        try {
            return $model->delete();
        } catch (Exception) {
            return false;
        }
    }
}
