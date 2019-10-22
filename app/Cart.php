<?php

namespace App;

use Darryldecode\Cart\Facades\CartFacade;
use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';

    protected $casts = [
        'cart' => 'collection',
    ];

    public static function add(Product $product, $count = 1, $token)
    {
        if (CartFacade::session($token)->get($product->id)) {
            return CartFacade::session($token)->update($product->id, [
                'quantity' => $count
            ]);
        } else {
            return CartFacade::session($token)->add($product->id, $product->name, $product->price, $count ? $count : 1, $product->image);
        }
    }

    public static function remove(Product $product, $count, $token)
    {
        if (!CartFacade::session($token)->get($product->id)) {
            return null;
        }

        if (CartFacade::session($token)->get($product->id)->quantity == $count) {
            return CartFacade::session($token)->remove($product->id);
        } else {
            return CartFacade::session($token)->update($product->id, [
                'quantity' => -$count,
            ]);
        }
    }

    public static function deleteBook(Product $product, $token)
    {
        if (!CartFacade::session($token)->get($product->id)) {
            return null;
        }

        return CartFacade::session($token)->remove($product->id);
    }
}
