<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Traits\ModelStrore;

class ItemController extends Controller
{
    use ModelStore;

    public function __construct(
        protected Item $item
    ){}

    public function getItem()
    {
        return 'item';
    }

    public function addItem(Request $request)
    {
        $data['item'] = $this->modelStoreUser($request, model: $this->item);
        return response()->json(['success'=>'Item Added']);
    }
}
