<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ModelStore;
use App\Models\Item;
use App\Models\Cart;
use Auth;

class CustomerController extends Controller
{
  use ModelStore;

  public function __construct(
    protected Cart $cart
  ){}

  public function getItems()
  {
    $items = Item::get();
    return response()->json(['items'=>$items]);
  }

  public function getSingleItem($id)
  {
    $item = Item::findOrFail($id);
    return response()->json(['item'=>$item]);
  }

  public function addCart(Request $request)
  {
    $request->merge(['user_id' => Auth::user()->id]);
    $data['cart'] = $this->modelStore($request, model: $this->cart);
    return response()->json(['success'=>'Item Added To Cart']);
  }

  public function getDetail()
  {
    $user = Auth::user();
    return response()->json(['user'=>$user]);
  }
}
