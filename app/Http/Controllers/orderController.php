<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Order;
use App\models\product;

class orderController extends Controller
{
  public function index()
  {
    $orders = Order::get();
    $products = Product::select('id', 'name')
      ->get();

    return view('pages.order.index', compact('orders', 'products'));
  }
  public function create(Request $request)
  {
    $request->validate([
      'product_id' => ['required', 'exist:products,id']
    ]);
    $user = $request->user();

    // $user->orders()
    //   ->create([
    //     'total' => 2,
    //     'status' => Order::UNPAID;
    //   ]);
    //   return redirect()->back();
  }
}
