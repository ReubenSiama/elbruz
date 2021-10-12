<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\ItemRequest;
use App\Models\Category;
use App\Models\Item;
use App\Models\Unit;
use App\Traits\ModelStore;
use Illuminate\Http\Request;

class AdminItemController extends Controller
{
  use ModelStore;

  public function __construct(
    protected Item $item
  ) {
  }
  public function getItem()
  {
    $items = Item::get();
    return view('admin.items', compact('items'));
  }

  public function addItem(ItemRequest $request)
  {
    $image = $this->storeImage('item_images', $request->image);
    $request->merge(['image' => $image]);
    $data['item'] = $this->modelStore($request, model: $this->item);
    return back()->withSuccess('Item Added');
  }

  public function getAddItem()
  {
    $categories = Category::get();
    $units = Unit::get();
    return view('admin.addItem', compact('categories', 'units'));
  }
}
