<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminWebController extends Controller
{
  public function getHome()
  {
    return view('admin.home');
  }
}
