<?php

namespace App\Http\Controllers;

use App\Product;
use function Couchbase\defaultDecoder;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Array_;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        if (isset($request->category))
        {
            $products = Product::where('category_id',$request->category)->get();

        }
        else
        {
            $products = Product::where('type_id',$request->type)->get();
        }

        $request->sort == 'desc' ? $products = $products->sortByDesc('price') : $products = $products->sortBy('price');
        return view('pages.catalog',['products' => $products]);
    }
}
