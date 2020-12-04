<?php
/**
 *  app/Http/Controllers/Admin/SiteController.php
 *
 * User: 
 * Date-Time: 04.12.20
 * Time: 13:34
 * @author Vito Makhatadze <vitomaxatadze@gmail.com>
 */
namespace App\Http\Controllers\Admin;


use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;

class SiteController extends AdminController
{
    public function index(Request $request)
    {
        $dayProductId = Setting::where('key','day_product')->first();

        if ($request->isMethod('POST')) {
            $request->validate([
                'product' => 'required|integer'
            ]);
            $dayProductId->value = $request->product;
            $dayProductId->save();
        }

        $dayProduct = Product::where(['status' => true, 'id' => $dayProductId->value])->first();
        if ($dayProduct == null) {
            $dayProduct = Product::latest()->first();
            if ($dayProduct != null) {
                $dayProductId->value = $dayProduct->id;
                $dayProductId->save();
            }
        }

        $productsSelect = Product::where(['status' => true])->get();

        $products = Product::where(['vip' => true])->get();
        return view('admin.modules.site.index', [
            'products'=> $products,
            'dayProduct' => $dayProduct,
            'productsSelect' => $productsSelect
        ]);
    }
}
