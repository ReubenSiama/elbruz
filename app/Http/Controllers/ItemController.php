<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use Illuminate\Http\Request;
use App\Traits\ModelStore;
use App\Models\Item;

class ItemController extends Controller
{
  use ModelStore;

  public function __construct(
    protected Item $item
  ){}

  public function getItem(Request $request)
  {
    $items = Item::where('item_name', 'LIKE', '%'.$request->q.'%')->get();
    return response()->json(['items'=>$items]);
  }

  public function addItem(ItemRequest $request)
  {
    $image = $this->storeImage('item_images', $request->image);
    $request->merge(['image' => $image]);
    $data['item'] = $this->modelStore($request, model: $this->item);
    return response()->json(['success'=>'Item Added']);
  }
}
