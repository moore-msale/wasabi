<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Mail\reminderMail;
use App\User;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NotificationController extends Controller
{
    public function notification(){
        $users = User::select('email','id')->get();
        foreach ($users as $user){
             $cart = Cart::where('email',$user->email)->latest('created_at')->first();
             if(isset($cart['created_at']) and $cart['reminded'] != 1) {
                 $to = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $cart['created_at']);
                 $to->addMonths(2);
                 $from = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
                 $diff_in_months = $to->diffInMonths($from);
                 if($diff_in_months==0){
                     Mail::to($user->email)->send(new reminderMail());
                     $cart->reminded = 1;
                     $cart->save();
                 }
             }
        }
    }
}
