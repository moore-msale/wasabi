<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function types()
    {
        return $this->belongsToMany(Type::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
