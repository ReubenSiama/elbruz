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
    );
    // ->load($relationshipToLoad)
  }

  public function modelStoreUser(Request $request, $model)
  {
    $user = $model->firstOrCreate(
      $request->only($model->getFillable())
    );
    return $user;
  }

  public function storeImage($path, $base64Image)
  {
    $image_64 = $base64Image;
    $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];
    $image = substr($image_64, strpos($image_64, ',')+1);
    $imageName = \Str::random(30).date('YmdHis').'.'.$extension;
    $pathUrl = public_path().'/'.$path.'/'.$imageName;
    $success = file_put_contents($pathUrl, base64_decode($image));
    return '/'.$path.'/'.$imageName;
  }
}
