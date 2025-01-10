<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class CartController extends Controller
{
    private function getCart(){ //get the cart of the user

        $cart = auth()->user()->cart;

        if (!$cart) {
            $cart = Cart::create([
                'user_id' => auth()->id(),
            ]);
        }
        return $cart;
    }

    public function index(){ //show the cart
        $cart = $this->getCart(); //get the cart of the user

        //cart has many items, items that have products return
        $items = $cart->items()->with('product')->get();

        return view('cart.index', compact('items')); //return view with items
    }

    public function add(Request $request, $productId){ //add product to cart
        $cart = $this->getCart();

        //Get item with product id
        $cartItem = $cart->items()->where('product_id', $productId)->first();
        //If item exists, adding quantity and saving.
        //If not exists, create
        if ($cartItem) {
            $cartItem->quantity++;
            $cartItem->save();
        } else {
            $cart->items()->create([
                'product_id' => $productId,
                'quantity' => 1,
            ]);
        }
        return redirect()->route('cart.index');
    }

    public function update(Request $request, $itemId){ //update quantity of item
        $cartItem = CartItem::findOrFail($itemId); //findOrFail is used to get the item by id and if not found, it throws an exception

        $cartItem->quantity = $request->quantity;
        $cartItem->save();

        return redirect()->route('cart.index');
    }

    public function remove(Request $request, $itemId){ //remove item from cart
        $cartItem = CartItem::findOrFail($itemId);

        $cartItem->delete();

        return redirect()->route('cart.index');
    }
}
