<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class TokenResolve extends Model
{
    public static function resolve($token)
{
    if (Session::has('token')) {
        if (Session::get('token') != $token) {
            Session::forget('token');
            Session::put('token', $token);
        }
    } else {
        Session::put('token', $token);
    }

    return Session::get('token');
}
}
