<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserDetail;
use App\Traits\ModelStore;
use App\Models\Item;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Payment;
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

    $check = Cart::where('user_id', Auth::user()->id)->where('item_id', $request->item_id)->first();

    if($check == null){
      $data['cart'] = $this->modelStore($request, model: $this->cart);
      $message = 'Item Added To Cart';
    }
    else{
      $message = 'Item already in cart';
    }
    return response()->json(['success'=>$message]);
  }

  public function getDetail()
  {
    $user = Auth::user();
    return response()->json(['user'=>$user]);
  }

  public function getCart()
  {
    $cart = Cart::where('user_id', Auth::user()->id)->get();
    return response()->json(['carts'=>$cart]);
  }

  public function removeCart($id)
  {
    Cart::findOrFail($id)->delete();
    return response()->json(['success'=>'Item Removed From Cart']);
  }

  public function changeQuantity(Request $request, $id)
  {
    $cart = Cart::findOrFail($id);
    if($request->type == 'decrease')
      $cart->quantity = $cart->quantity -= 1;
    else
      $cart->quantity = $cart->quantity += 1;

    $cart->save();
    return response()->json(['success'=>'Quantity changed']);
  }

  public function changeAddressDefault($id)
  {
    UserDetail::where('user_id', Auth::user()->id)->update(['primary' => 0]);
    $detail = UserDetail::findOrFail($id);
    $detail->primary = 1;
    $detail->save();
    return response()->json(['success'=>'Address Changed']);
  }

  public function getUserData()
  {
    $user = Auth::user();
    $detail = UserDetail::where('user_id', Auth::user()->id)->where('primary', 1)->first();
    return response()->json(['user'=>$user, 'detail'=>$detail], 200);
  }

  public function updateOrder(Request $request)
  {
    $user_detail = UserDetail::where('user_id', Auth::user()->id)->where('primary', 1)->first();
    if($request->type == 'ordernow'){
      $item = Item::findOrFail($request->q);
      $order = new Order;
      $order->user_id = Auth::user()->id;
      $order->total_price = $item->price;
      $order->order_date = Date('d-m-Y');
      $order->discount = 0;
      $order->user_detail_id = $user_detail->id;
      $order->save();

      $order_detail = new OrderDetail;
      $order_detail->order_id = $order->id;
      $order_detail->item_id = $request->q;
      $order_detail->quantity = 1;
      $order_detail->save();
    }else{
      $carts = Cart::where('user_id', Auth::user()->id)->get();
      $total_price = 0;
      foreach($carts as $cart){
        $item = Item::findOrFail($cart->item_id);
        $total_price += $item->price * $cart->quantity;
      }
      $order = new Order;
      $order->user_id = Auth::user()->id;
      $order->total_price = $total_price;
      $order->order_date = Date('d-m-Y');
      $order->discount = 0;
      $order->user_detail_id = $user_detail->id;
      $order->save();

      foreach($carts as $cart){
        $order_detail = new OrderDetail;
        $order_detail->order_id = $order->id;
        $order_detail->item_id = $cart->item_id;
        $order_detail->quantity = $cart->quantity;
        $order_detail->save();
        $cart->delete();
      }
    }
    $payment = new Payment;
    $payment->order_id = '';
    $payment->payment_id = $request->paymentId;
    $payment->signature = '';
    $payment->save();
    return response()->json(['success'=>'Order Placed Successfully']);
  }

  public function getMyOrders()
  {
    $orders = Order::where('user_id',Auth::user()->id)->latest()->take(5)->get();
    return response()->json(['orders'=>$orders]);
  }

  public function cancelOrder(Request $request)
  {
    Order::findOrFail($request->id)->update([
      'status' => 'Cancelled',
    ]);
    return response()->json(['message' => 'Order Cancelled']);
  }
}
