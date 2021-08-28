<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;

class UnitController extends Controller
{
  public function fillables()
  {
    $fillables = (new Unit)->getFillable();
    return $fillables;
  }

  public function getUnits()
  {
    $units = Unit::get();
    return response()->json(['units'=>$units]);
  }

  public function addUnit(Request $request)
  {
    Unit::create($request->only($this->fillables()));
    return response()->json(['success'=>'New Unit Added Successfully']);
  }

  public function updateUnit(Request $request, $id)
  {
    Unit::findOrFail($id)->update($request->only($this->fillables()));
    return response()->json(['success'=>'Unit Updated Successfully']);
  }
}
