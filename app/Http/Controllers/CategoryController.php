<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
  public function getCategories()
  {
    $categories = Category::get();
    return response()->json(['categories'=>$categories]);
  }

  public function addCategory(Request $request)
  {
    $category = new Category;
    $category->name = $request->name;
    $category->save();
    return response()->json(['success'=>'New category added']);
  }

  public function updateCategory(Request $request, $id)
  {
    $fillables = (new Category)->getFillable();
    Category::findOrFail($id)->update($request->only($fillables));
    return response()->json(['success'=>'Category Updated']);
  }

  public function deleteCategory($id)
  {
    Category::findOrFail($id)->delete();
    return response()->json(['success'=>'Category deleted']);
  }
}
