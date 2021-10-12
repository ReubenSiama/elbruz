<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitsController extends Controller
{
  public function getUnits()
  {
    $units = Unit::get();
    return view('admin.units', compact('units'));
  }
}
