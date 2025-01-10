<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function checkout(){
        $cart = auth()->user()->cart;

        //if the cart is empty, redirect to the cart page with error message
        if (!$cart|| $cart->items->count() == 0) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty');
        }

        //this will return the view with the cart items
        $items = $cart->items()->with('product')->get(); //get the items of the cart with the product
        $total = 0; //initialize the total to 0

        foreach ($items as $item) { //loop through the items
            $total += $item->product->price * $item->quantity;
        }

        //here we will create the order
        $order = Order::create([ //this creates the order
            'user_id' => auth()->id(),
            'total' => $total,
        ]);

        foreach($items as $item){ //loop through the items
            $order->items()->create([ //create the items of the order
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price,
            ]);
        }
        // for an empty cart
        $cart->items()->delete();
        return redirect()->route('orders.show', $order->id)->with('success', 'Order placed successfully');
    }
    public function show($id){
        $order = Order::with('items.product')->findOrFail($id); //get the order with the items and product

        return view('orders.show', compact('order')); // compact('order') is used to pass the order to the view
}
}
