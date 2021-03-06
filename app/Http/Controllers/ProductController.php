<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Type;
use function Couchbase\defaultDecoder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Array_;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        if (isset($request->category))
        {
            $category = Category::find($request->category);
            $products = $category->products;
        }
        else
        {
            $type = Type::find($request->type);
            $products = $type->products;
        }
        $request->sort == 'desc' ? $products = $products->sortByDesc('price') : $products = $products->sortBy('price');
        return view('pages.catalog',['products' => $products]);
    }

    public function mobile_catalog(Request $request)
    {
//        dd($request->all());
        if($request->type == 'category')
        {
            $categories = Category::all();
            return view('pages.catalog_m',['items' => $categories, 'type' => $request->type, 'pos' => $request->pos, 'tipers' => []]);
        }
        else
        {
            $types = Type::all();
            return view('pages.catalog_m',['items' => $types, 'type' => $request->type, 'pos' => $request->pos, 'tipers' => []]);
        }

//        return view('pages.catalog_m',['categories' => $categories]);
    }
    public function filter(Request $request)
    {
//        dd($request->all());
        if (isset($request->sort))
        {
            $count = count($request->all()) - 3;
        }
        else
        {
            $count = count($request->all()) - 2;
        }
        if(isset($request->category))
        {
            $category = Category::find($request->category);
            $products = $category->products;
        }
        else
        {
            $type = Type::find($request->type);
            $products = $type->products;
        }
        if($count == 0)
        {
            return view('pages.catalog', ['products' => $products]);
        }
        else
        {
        $items = collect();

        foreach ($products as $product) {
            $i = 0;
            foreach ($product->types as $type)
            {
                if($request[$type->id])
                {
                    $i = $i + 1;
                }
                if($i == $count)
                {
                    $items->push($product);
                    break;
                }
            }
        }

        $products = $items;

        return view('pages.catalog', ['products' => $products]);
        }
    }
    public function mobile_filter(Request $request)
    {
//        dd($request->all());
        $tipers = collect();
        if($request->type == 'category')
        {
            $items = Category::all();

            foreach (Type::all() as $type)
            {
                if($request[$type->id])
                {
                    $tipers->push($type);
                }
            }
            $tt = collect();
            foreach($items as $item)
            {
                foreach($tipers as $tiper)
                {
                    foreach($tiper->products as $product)
                    {
                        if($item->products->contains($product->id))
                        {
                            $tt->push($item);
                        }
                    }
                }
            }
            $items = $tt->unique();
        }
        else
        {
            $items = Type::all();

            foreach (Category::all() as $category)
            {
                if($request[$category->id])
                {
                    $tipers->push($category);
                }
            }
            $tt = collect();
            foreach($items as $item)
            {
                foreach($tipers as $tiper)
                {
                    foreach($tiper->products as $product)
                    {
                        if($item->products->contains($product->id))
                        {
                            $tt->push($item);

                        }
                    }
                }
            }
            $items = $tt->unique();
        }
//        dd($items);
            return view('pages.catalog_m', ['items' => $items, 'tipers' => $tipers]);
    }


    public function liked(Request $request)
    {
        $product = Product::find($request->id);


        Auth::user()->products()->attach($product);
        if ($request->ajax()){
            return response()->json([
                'status' => "success",
            ]);
        }

        return back();
    }

    public function unliked(Request $request)
    {
        $product = Product::find($request->id);

        Auth::user()->products()->detach($product);
        if ($request->ajax()){
            return response()->json([
                'status' => "success",
            ]);
        }

        return back();
    }

    public function get_count(Request $request)
    {

    }
}
