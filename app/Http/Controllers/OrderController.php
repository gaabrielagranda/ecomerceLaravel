<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function checkout(){
        $cart = auth()->user()->cart; //get the cart of the user
    }
}
