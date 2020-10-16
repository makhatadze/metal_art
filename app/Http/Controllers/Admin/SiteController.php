<?php

namespace App\Http\Controllers\Admin;


use App\Models\Product;

class SiteController extends AdminController
{
    public function index()
    {
        $products = Product::where(['vip' => true])->get();
        return view('admin.modules.site.index', compact('products', $products));
    }
}
