<?php
/**
 *  app/Http/Controllers/Admin/SiteController.php
 *
 * User:
 * Date-Time: 19.10.20
 * Time: 15:29
 * @author Vito Makhatadze <vitomaxatadze@gmail.com>
 */
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
