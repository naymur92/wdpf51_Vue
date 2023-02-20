<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $product_id = $request->product_id;
    $user_id = Auth::user()->id;

    if (!$product_id) {
      return [
        'message' => 'Cart items returned',
        'items' => Cart::where('user_id', $user_id)->sum('quantity'),
      ];
    }

    // Getting product details.
    $product = Product::where('id', $product_id)->first();

    $productFoundInCart = Cart::where('product_id', $product_id)->where('user_id', $user_id)->pluck('id');

    if ($productFoundInCart->isEmpty()) {
      // Adding Product in cart.

      $cart  = Cart::create([
        'product_id' => $product->id,
        'quantity' => 1,
        'price' => $product->sale_price,
        'user_id' => $user_id,
      ]);
    } else {
      // Incrementing Product Quantity.

      $cart = Cart::where('product_id', $product_id)->increment('quantity');
    }

    // Check user cart items.

    if ($cart) {
      return [
        'message' => 'Cart Updated',
        'items' => Cart::where('user_id', $user_id)->sum('quantity'),
      ];
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Cart  $cart
   * @return \Illuminate\Http\Response
   */
  public function show(Cart $cart)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Cart  $cart
   * @return \Illuminate\Http\Response
   */
  public function edit(Cart $cart)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Cart  $cart
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Cart $cart)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Cart  $cart
   * @return \Illuminate\Http\Response
   */
  public function destroy(Cart $cart)
  {
    //
  }
}
