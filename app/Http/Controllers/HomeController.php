<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::where(['status' => true, 'vip' => false])
            ->with(['transmission','category','condition','deal'])
            ->get();
        $vips = Product::where(['status' => true, 'vip' => true])
            ->with(['transmission','category','condition','deal'])
            ->get();

        return view('frontend.home.index')
            ->with('products',$products)
            ->with('vips',$vips);
    }

    public function catalog() {
        $products = Product::where(['status' => true])
            ->with(['transmission','category','condition','deal'])
            ->paginate(1);


        return view('frontend.catalog.index')->with('products',$products);
    }

    public function view(Product $product) {
        $images = $product->image()->get();
        $brand = $product->brand()->get()[0];
        $model = $product->model()->get()[0];
        $deal = $product->deal()->get()[0];
        $engine = $product->engine()->get()[0];
        $engine = $product->engine()->get()[0];

        $news = Product::where(['status' => true ])
            ->with(['transmission','category','condition','deal'])
            ->orderBy('created_at','asc')->paginate(4);

        return view('frontend.catalog.view')
            ->with('product',$product)
            ->with('brand',$brand)
            ->with('model',$model)
            ->with('deal',$deal)
            ->with('engine',$engine)
            ->with('news',$news)
            ->with('images',$images);
    }
}
