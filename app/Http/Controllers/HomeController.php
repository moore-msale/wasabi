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
use App\Jobs\SendEmail;
use App\Mail\massMail;

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

    public function massMail() {
        $user = Auth::user();
        if($user->role->name == 'admin')
        {
            return view('pages.mass_mail');
        }
        else
        {
            return back();
        }
    }

    public function massMailSend(Request $request) {

        // $mailList = Cart::whereNotNull('email')->get()->pluck('email');//список e-mail
        $title = $request['title'];
        $mail_content = $request['content'];

        $massMail = new \App\MassMail;
        $massMail->title = $title;
        $massMail->content = $mail_content;
        $massMail->save();
        // dd($request['content']);
        $testList = ['catzilla312@gmail.com','oeldiar@yahoo.com','jericho312@mail.ru'];
        foreach ($testList as  $value) {        //Долго
            \Mail::to($value)->send(new \App\Mail\massMail($request,$title));
        
        }
        // $content  = $request;

        // foreach ($testList as  $details) {        //Долго
            
        //     SendEmail::dispatch($details,$content,$title);
        // }

        dd("Отправлен");

    }
}
