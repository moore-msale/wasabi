<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Category;
use App\Product;
use App\Stock;
use App\Type;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('welcome');
    }

    public function welcome()
    {
        return view('welcome');
    }

    public function about_us()
    {
        return view('pages.about_us');
    }

    public function profile()
    {
        $user = Auth::user();

        if($user->role->name == 'admin')
        {
            $carts = Cart::all()->reverse();
            return view('pages.admin-profile',['user' => $user, 'carts' => $carts]);
        }
        else
        {
            return view('pages.profile',['user' => $user]);
        }
    }

    public function rule()
    {
        return view('pages.rule');
    }
    public function delivery()
    {
        return view('pages.delivery');
    }
    public function stock()
    {
        $stocks = Stock::where('end_date','>=', Carbon::now())->get();
        return view('pages.stock',['stocks' => $stocks]);
    }
}
