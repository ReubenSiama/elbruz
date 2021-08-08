<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;

class AdminController extends Controller
{
  public function adminDashboard()
  {
    $ordersToday = Order::whereDate('created_at', \Carbon\Carbon::today())->count();
    $ordersMonth = Order::whereMonth('created_at', \Carbon\Carbon::now()->month)->count();
    $newUsersMonth = User::whereMonth('created_at', \Carbon\Carbon::now()->month)->where('role', 2)->count();
    return response()->json(['ordersToday' =>$ordersToday, 'ordersMonth' => $ordersMonth, 'newUsersMonth' => $newUsersMonth]);
  }

  public function getOrders()
  {
    $orders = Order::get();
    return response()->json(['orders'=>$orders]);
  }

  public function updateOrder(Request $request)
  {
    Order::findOrFail($request->id)->update([
      'status' => $request->status,
    ]);

    return response()->json(['message' => 'Order Updated']);
  }
}
