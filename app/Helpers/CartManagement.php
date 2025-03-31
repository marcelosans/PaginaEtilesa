<?php

namespace App\Helpers;
use App\Models\Product;
use Illuminate\Support\Facades\Cookie;
use App\Livewire\Partials\Navbar;


class CartManagement
{
    //Añaadir un producto al carrito

    static public function addItemToCart($product_id)
    {
        $cart_items = self::getCartItemsFromCookie();

        $exisiting_item = null;

        foreach($cart_items as $key => $item)
        {
            if($item['product_id'] == $product_id)
            {
                $exisiting_item = $key;
                break;
            }
        }

        if($exisiting_item !== null)
        {
            $cart_items[$exisiting_item]['quantity']++;
            $cart_items[$exisiting_item]['total_amount'] = $cart_items[$exisiting_item]['quantity'] *
            $cart_items[$exisiting_item]['price'];
        }
        else
        {
            $product = Product::where('id',$product_id)->first(['id','name','price','images']);
            if ($product) {
                $cart_items[] = [
                    'product_id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'quantity' => 1,
                    'unit_amount' => $product->price, // Ensure unit_amount is set
                    'total_amount' => $product->price,
                    'images' => $product->images,
                ];
            }
        }

        self::addCartItemsToCookie($cart_items);
        return count($cart_items);
    }


    // añadir un producto al carrito con qtt
    static public function addItemToCartWithQty($product_id,$qty=1)
    {
        $cart_items = self::getCartItemsFromCookie();

        $exisiting_item = null;

        foreach($cart_items as $key => $item)
        {
            if($item['product_id'] == $product_id)
            {
                $exisiting_item = $key;
                break;
            }
        }

        if($exisiting_item !== null)
        {
            $cart_items[$exisiting_item]['quantity'] += $qty;
            $cart_items[$exisiting_item]['total_amount'] = $cart_items[$exisiting_item]['quantity'] *
            $cart_items[$exisiting_item]['price'];
        }
        else
        {
            $product = Product::where('id',$product_id)->first(['id','name','price','images']);
            if ($product) {
                $cart_items[] = [
                    'product_id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'quantity' => $qty,
                    'unit_amount' => $product->price, // Ensure unit_amount is set
                    'total_amount' => $product->price * $qty, // Calculate total amount
                    'images' => $product->images,
                ];
            }
        }

        self::addCartItemsToCookie($cart_items);
        return count($cart_items);
    }



    //Eliminar un producto del carrito
    static public function removeCartItem($product_id)
    {
        $cart_items = self::getCartItemsFromCookie();
        

        foreach($cart_items as $key => $item)
        {
            if($item['product_id'] == $product_id)
            {
                unset($cart_items[$key]);
            }
        }

        self::addCartItemsToCookie($cart_items);

        return $cart_items;
    }



    //Añadir al carrito a las cookies
    static public function addCartItemsToCookie($cart)
    {
        Cookie::queue('cart', json_encode($cart), 60 * 24 * 30);
    }


    //limpiar el carrito de las cookies
    static public function clearItemsToCookie()
    {
        Cookie::queue(Cookie::forget('cart'));
    }

    //Obtener los productos del carrito de las cookies

    static public function getCartItemsFromCookie()
    {
        $cart = json_decode(Cookie::get('cart'), true);
        if(!$cart)
        {
            $cart = [];
        }
        return $cart;
    }

    //aumentar la cantidad de un producto en el carrito
    static public function incrementQuantityToCart($product_id)
    {
        $cart_items = self::getCartItemsFromCookie();

        foreach ($cart_items as $key => $item) {
            if ($item['product_id'] == $product_id) {
                $cart_items[$key]['quantity']++;
                $cart_items[$key]['total_amount'] = $cart_items[$key]['quantity'] * $cart_items[$key]['unit_amount'];
            }
        }
        
        self::addCartItemsToCookie($cart_items);

        return $cart_items;
    }


    //reducir la cantidad de un producto en el carrito

    static public function decrementQuantityToCartItem($product_id)
    {
        $cart_items = self::getCartItemsFromCookie();

        foreach ($cart_items as $key => $item) {
            if ($item['product_id'] == $product_id) {
                $cart_items[$key]['quantity']--;
                $cart_items[$key]['total_amount'] = $cart_items[$key]['quantity'] * $cart_items[$key]['unit_amount'];
        
                // Remove item if quantity is 0
                if ($cart_items[$key]['quantity'] == 0) {
                    unset($cart_items[$key]);
                }
            }
        }
        

        self::addCartItemsToCookie($cart_items);

        return $cart_items;
    }


    //obtener el total de productos en el carrito
    static public function calculateGrandTotal($items)
    {
        return array_sum(array_column($items, 'total_amount'));
    }



}