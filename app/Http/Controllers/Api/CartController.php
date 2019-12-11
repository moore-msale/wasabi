<?php

namespace App\Http\Controllers\Api;

use App\Code;
use App\Mail\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cart;
use App\Product;
use App\TokenResolve;
use Darryldecode\Cart\Facades\CartFacade;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function checkout(Request $request)
    {
        $token = $request->token ? $request->token : uniqid();
        $continue = $request->continue;
        TokenResolve::resolve($token);
        $cart = CartFacade::session($token);

        Session::put('cart', $cart->getContent());
        Session::flash('cart_checkout', true);
        if ($continue) {
            Session::flash('continue', true);

            return view('pages.order', [
                'cartItems' => $cart->getContent(),
                'total' => $cart->getTotal(),
            ]);
        }

        return view('cart.checkout', [
            'cartItems' => $cart->getContent(),
            'total' => $cart->getTotal(),
        ]);
    }

    public function store(Request $request)
    {
//        dd($request->all());
        $token = $request->token ? $request->token : Session::has('token') ? Session::get('token') : uniqid();

        TokenResolve::resolve($token);
        $cart = CartFacade::session($token);
        $newCart = new Cart();
        $newCart->cart = $cart->getContent();
        if(Auth::user()) {
            // $newCart->user_id = Auth::id();
            $newCart->user_id = Auth()->user()->id;
            if (Auth::user()->stock != 1) {
                $user = Auth::user();
                $user->stock = 1;
                $user->save();
                $newCart->discount = 20;
                if($cart->getTotal() > 200 && $cart->getTotal() < 700)
                {
                $newCart->total = ($cart->getTotal() + 50) - (($cart->getTotal() / 100) * 20);
                }
                else
                {
                    $newCart->total = $cart->getTotal() - (($cart->getTotal() / 100) * 20);
                }
            }
        }
        if (isset($request->promo)) {
                $promos = Code::all();
                foreach ($promos as $promo) {
                    if ($request->promo == $promo->name) {
                        $newCart->promo = $request->promo;
                        if($cart->getTotal() > 200 && $cart->getTotal() < 700)
                        {
                            $newCart->total = ($cart->getTotal() + 50) - (($cart->getTotal() / 100) * $promo->discount);
                        }
                        else
                        {
                            $newCart->total = $cart->getTotal() - (($cart->getTotal() / 100) * $promo->discount);
                        }

                        $newCart->discount = $promo->discount;
                    }
                }
                if (!$newCart->promo)
                {
                    if($cart->getTotal() > 200 && $cart->getTotal() < 700)
                    {
                        $newCart->total = $cart->getTotal() + 50;
                    }
                    else
                    {
                        $newCart->total = $cart->getTotal();
                    }

                }
            } else {
            if($cart->getTotal() > 200 && $cart->getTotal() < 700 && $request->type == 1)
            {
                $newCart->total = $cart->getTotal() + 50;
            }
            else
            {
                $newCart->total = $cart->getTotal();
            }
            }
        if($request->type == 1) {
            $newCart->type = 1;
            $newCart->comment = $request->message;
            $newCart->name = $request->name;
            if($request->email)
            {
            $newCart->email = $request->email;
            }
            $newCart->phone = $request->phone;
            $newCart->address = $request->address;
            if ($request->need == 'on') {
                $newCart->need = 'да';
            } else {
                $newCart->need = 'нет';
            }
            if ($request->time == 'on') {
                $newCart->date = $request->dtime;
            } else {
                $newCart->date = 'нет';
            }
        }
        else{
            $newCart->name = $request->name;
            if($request->email)
            {
                $newCart->email = $request->email;
            }
            $newCart->phone = $request->phone;
            $newCart->date = $request->dtime;
        }
        $newCart->save();

        Session::forget(['cart', 'token']);
        Session::flash('cart_success', 'Your info has successfully created!');
        Mail::to('mackinkenny@gmail.com')->send(new Order($newCart));

        $data = $request->all();

//        return view('pages.success_order',['user' => $data,'datas' => $newCart]);
//        dd($data, $total, $cart);
        return view('pages.success_order',['user' => $data]);
    }

    public function index(Request $request)
    {
        $token = $request->token ? $request->token : uniqid();

        $token = TokenResolve::resolve($token);
        $cart = CartFacade::session($token);

        Session::put('cart', $cart->getContent());
        if (preg_match('/checkout/', $request->server->get('HTTP_REFERER'))) {
            Session::flash('cart_checkout', true);
        }

        return response()->json([
            'message' => 'Cart',
            'status' => 'success',
            'cart' => $cart->getContent()->sortKeys(),
            'token' => $token,
            'total' => $cart->getTotalQuantity(),
            'totalprice' => $cart->getTotal(),
            'modalhtml' => view('pages.modal_cart', [
               'cartItems' => $cart->getContent()->sortKeys(),
               'total' => $cart->getTotal(),
            ])->render(),
            'html' => view('pages.cart', [
                'cartItems' => $cart->getContent()->sortKeys(),
                'total' => $cart->getTotal(),
            ])->render(),
        ]);
    }

    public function add(Request $request)
    {
        $product = Product::find($request->product_id);
        $count = $request->count;
        $token = $request->token ? $request->token : uniqid();

        if (!$product) {
            return response()->json([
                'message' => 'book not found',
                'status' => 'error'
            ]);
        }
        $token = TokenResolve::resolve($token);

        Cart::add($product, $count, $token);
        Session::put('cart', CartFacade::session($token)->getContent());
        if (preg_match('/checkout/', $request->server->get('HTTP_REFERER'))) {
            Session::flash('cart_checkout', true);
        }



        return response()->json([
            'status' => 'success',
            'message' => 'book added to cart',
            'cart' => CartFacade::session($token)->getContent(),
            'token' => $token,
        ]);
    }

    public function remove(Request $request)
    {
        $product = Product::find($request->product_id);
        $count = $request->count;
        $token = $request->token;

        if (!$product) {
            return response()->json([
                'message' => 'book not found',
                'status' => 'error'
            ]);
        }
        $token = TokenResolve::resolve($token);

        if (!Cart::remove($product, $count, $token)) {
            return response()->json([
                'status' => 'error',
                'message' => 'book not found in cart',
                'cart' => CartFacade::session($token)->getContent(),
                'token' => $token,
            ]);
        }
        Session::put('cart', CartFacade::session($token)->getContent());
        if (preg_match('/checkout/', $request->server->get('HTTP_REFERER'))) {
            Session::flash('cart_checkout', true);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'book updated in cart',
            'cart' => CartFacade::session($token)->getContent(),
            'token' => $token,
        ]);
    }

    public function delete(Request $request)
    {
        $product = Product::find($request->product_id);
        $token = $request->token;

        if (!$product) {
            return response()->json([
                'message' => 'book not foun d',
                'status' => 'error'
            ]);
        }
        $token = TokenResolve::resolve($token);

        if (!Cart::deleteBook($product, $token)) {
            return response()->json([
                'status' => 'error',
                'message' => 'book not found in cart',
                'cart' => CartFacade::session($token)->getContent(),
                'token' => $token,
            ]);
        }
        Session::put('cart', CartFacade::session($token)->getContent());
        if (preg_match('/checkout/', $request->server->get('HTTP_REFERER'))) {
            Session::flash('cart_checkout', true);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'book added to cart',
            'cart' => CartFacade::session($token)->getContent(),
            'token' => $token,
        ]);
    }
}
