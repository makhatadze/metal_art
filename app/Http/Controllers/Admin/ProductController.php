<?php
/**
 *  app/Http/Controllers/Admin/ProductController.php
 *
 * User:
 * Date-Time: 19.10.20
 * Time: 15:29
 * @author Vito Makhatadze <vitomaxatadze@gmail.com>
 */

namespace App\Http\Controllers\Admin;


use App\Models\Brand;
use App\Models\BrandModel;
use App\Models\Category;
use App\Models\Condition;
use App\Models\Deal;
use App\Models\Engine;
use App\Models\Fuel;
use App\Models\Gearbox;
use App\Models\Image;
use App\Models\Product;
use App\Models\Transmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends AdminController
{
    public function index(Request $request)
    {
        $request->all();
        if($request->id) {
            $products = Product::where(['id' => $request->id])->get();
            return view('admin.modules.product.index', compact('products', $products));

        }
        $products = Product::all();
        return view('admin.modules.product.index', compact('products', $products));
    }

    public function create(Request $request)
    {
        if ($request->isMethod('GET')) {
            $brands = Brand::where(['status' => true])->get();
            $brandModels = BrandModel::where(['status' => true, 'brandmodeleable_type' => 'App\Models\Brand', 'brandmodeleable_id' => $brands[0]->id])->get();
            $categories = Category::where(['status' => true])->get();
            $transmissions = Transmission::where(['status' => true])->get();
            $deals = Deal::where(['status' => true])->get();
            $fuels = Fuel::where(['status' => true])->get();
            return view('admin.modules.product.create')
                ->with('brands', $brands)
                ->with('brandModels', $brandModels)
                ->with('categories', $categories)
                ->with('transmissions', $transmissions)
                ->with('deals', $deals)
                ->with('fuels', $fuels);
        }
        if ($request->isMethod('POST')) {
            $request->all();
            $this->validate($request,
                [
                    'title_ge' => 'required|string|max:255',
                    'title_en' => 'required|string|max:255',
                    'description_ge' => 'required|string',
                    'price' => 'required|integer',
                    'mileage' => 'required|string',
                    'custom' => 'required|integer',
                    'wheel' => 'required|integer',
                    'vip' => 'required|integer',
                    'created_date' => 'required',
                    'drive' => 'required|string',
                    'engine_capacity' => 'required',
                    'brand' => 'required|integer',
                    'model' => 'required|integer',
                    'category' => 'required|integer',
                    'fuel' => 'required|integer',
                    'transmission' => 'required|integer',
                    'deal' => 'required|integer',
                    'phone' => 'required',
                    'kartik-input-700' => 'required'
                ]);
            $product = new Product([
                'title_ge' => $request->title_ge,
                'title_en' => $request->title_en,
                'description_ge' => $request->description_ge,
                'description_en' => $request->description_en,
                'price' => $request->price,
                'created_date' => $request->created_date,
                'engine_capacity' => $request->engine_capacity,
                'mileage' => $request->mileage,
                'custom' => $request->custom,
                'people' => $request->people,
                'wheel' => $request->wheel,
                'brand_id' => $request->brand,
                'model_id' => $request->model,
                'category_id' => $request->category,
                'fuel_id' => $request->fuel,
                'transmission_id' => $request->transmission,
                'deal_id' => $request->deal,
                'vip' => $request->vip,
                'phone' => $request->phone,
                'drive' => $request->drive

            ]);
            $product->save();

            if ($request->hasFile('kartik-input-700')) {
                foreach ($request->file('kartik-input-700') as $key => $file) {
                    $imagename = date('Ymhs') . $file->getClientOriginalName();
                    $destination = base_path() . '/storage/app/public/product/' . $product->id;
                    $request->file('kartik-input-700')[$key]->move($destination, $imagename);
                    $product->image()->create([
                        'name' => $imagename
                    ]);
                }
            }

            return redirect('admin/products')->with('success', 'პროდუქტი წარმატებით შეიქმნა.');

        }
    }

    public function update(Request $request, Product $product)
    {
        if ($request->isMethod('GET')) {
            $brands = Brand::where(['status' => true])->get();
            $brandModels = BrandModel::where(['status' => true, 'brandmodeleable_type' => 'App\Models\Brand', 'brandmodeleable_id' => $product->brand_id])->get();
            $categories = Category::where(['status' => true])->get();
            $transmissions = Transmission::where(['status' => true])->get();
            $deals = Deal::where(['status' => true])->get();
            $fuels = Fuel::where(['status' => true])->get();
            $images = Image::where(['imageable_type' => 'App\Models\Product', 'imageable_id' => $product->id])->get();

            return view('admin.modules.product.update')
                ->with('brands', $brands)
                ->with('brandModels', $brandModels)
                ->with('categories', $categories)
                ->with('transmissions', $transmissions)
                ->with('deals', $deals)
                ->with('fuels', $fuels)
                ->with('product', $product)
                ->with('images', $images);
        }
        if ($request->isMethod('POST')) {
            $request->all();
            $this->validate($request,
                [
                    'title_ge' => 'required|string|max:255',
                    'title_en' => 'required|string|max:255',
                    'description_ge' => 'required|string',
                    'drive' => 'required|string',
                    'price' => 'required|integer',
                    'mileage' => 'required|string',
                    'custom' => 'required|integer',
                    'wheel' => 'required|integer',
                    'vip' => 'required|integer',
                    'created_date' => 'required',
                    'phone' => 'required|string',
                    'engine_capacity' => 'required',
                    'brand' => 'required|integer',
                    'model' => 'required|integer',
                    'category' => 'required|integer',
                    'fuel' => 'required|integer',
                    'transmission' => 'required|integer',
                    'deal' => 'required|integer'
                ]);
            $product->title_ge = $request->title_ge;
            $product->title_en = $request->title_en;
            $product->description_ge = $request->description_ge;
            $product->description_en = $request->description_en;
            $product->price = $request->price;
            $product->created_date = $request->created_date;
            $product->engine_capacity = $request->engine_capacity;
            $product->mileage = $request->mileage;
            $product->custom = $request->custom;
            $product->wheel = $request->wheel;
            $product->brand_id = $request->brand;
            $product->model_id = $request->model;
            $product->category_id = $request->category;
            $product->fuel_id = $request->fuel;
            $product->transmission_id = $request->transmission;
            $product->deal_id = $request->deal;
            $product->vip = $request->vip;
            $product->phone = $request->phone;
            $product->drive = $request->drive;
            $product->save();

            if ($request->hasFile('kartik-input-700')) {
                foreach ($request->file('kartik-input-700') as $key => $file) {
                    $imagename = date('Ymhs') . $file->getClientOriginalName();
                    $destination = base_path() . '/storage/app/public/product/' . $product->id;
                    $request->file('kartik-input-700')[$key]->move($destination, $imagename);
                    $product->image()->create([
                        'name' => $imagename
                    ]);
                }
            }
            return redirect('admin/products')->with('success', 'პროდუქტი წარმატებით რედაქტირდა.');

        }
    }

    public function activate(Product $product)
    {
        $message = ($product->status) ? 'პროდუქტი დეაქტივირებულია.' : 'პროდუქტი გააქტიურდა.';
        $product->status = !$product->status;
        $product->save();
        return back()->with('success', $message);

    }

    public function vip(Product $product)
    {
        $message = ($product->vip) ? 'პროდუქტი დაემატა VIP-ში.' : 'პროდუქტი წაიშალა VIP-დან.';
        $product->vip = !$product->vip;
        $product->save();
        return back()->with('success', $message);
    }

    public function models(Request $request)
    {
        if ($request->isMethod('GET')) {
            $this->validate($request, [
                'brand' => 'required|integer'
            ]);
            $brandModel = BrandModel::where(['status' => true, 'brandmodeleable_type' => 'App\Models\Brand', 'brandmodeleable_id' => $request->brand])->get();
            return response()->json($brandModel);
        }
    }

    public function delete(Product $product)
    {
        if ($product) {
            if (Storage::exists('public/product/' . $product->id)) {
                Storage::deleteDirectory('public/product/' . $product->id);
            }
            if ($product->image()) {
                $product->image()->delete();
            }
            $product->delete();
            return back()->with('success', 'პროდუქტი წაიშალა');
        }

    }
}
