<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
  public function getCategories()
  {
    $categories = Category::get();
    return view('admin.categories', compact('categories'));
  }
}
