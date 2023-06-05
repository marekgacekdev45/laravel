<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $color = Color::findOrFail($request->color);

        $item = [
            'product' => $product,
            'quantity' => $request->quantity,
            'color' => $color,
        ];

        // dd($item);

        if (session()->has('cart')) {

            $cart = session()->get('cart');
            $key = $this->checkItemInCart($item);


            if ($key != -1) {
                $cart[$key]['quantity'] += $request->quantity;
                session()->put('cart', $cart);
            } else {
                session()->push('cart', $item);
            }
            return back()->with('addedToCart', 'Success');
        } else {
            // Create cart and add item
            session()->push('cart', $item);

            return back()->with('addedToCart', 'Success');
        }
    }

    public function checkItemInCart($item)
    {
        $cart = session()->get('cart');
        if (!is_array($cart)) {
            return -1;
        }
    
        if (!isset($item['product']['id']) || !isset($item['color']['id'])) {
            return -1;
        }
    
        foreach ($cart as $key => $val) {
            if (isset($val['product']['id']) && isset($val['color']['id'])) {
                if ($val['product']['id'] == $item['product']['id'] && $val['color']['id'] == $item['color']['id']) {
                    return $key;
                }
            }
        }
    
        return -1;
    }
    public function removeFromCart($key)
    {
        if (session()->has('cart')) {
            $cart = session()->get('cart');
            array_splice($cart, $key, 1);
            session()->put('cart', $cart);
            return back()->with('success', "Product Removed From Cart");
        }
        return back();
    }
}