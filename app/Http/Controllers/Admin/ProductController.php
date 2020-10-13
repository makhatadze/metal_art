<?php

namespace App\Http\Controllers\Admin;


use App\Models\Brand;
use App\Models\BrandModel;
use App\Models\Category;
use App\Models\Condition;
use App\Models\Deal;
use App\Models\Fuel;
use App\Models\Gearbox;
use App\Models\Image;
use App\Models\Product;
use App\Models\Transmission;
use Illuminate\Http\Request;

class ProductController extends AdminController
{
    public function index()
    {
        $products = Product::all();
        return view('admin.modules.product.index', compact('products', $products));
    }

    public function create(Request $request)
    {
        if ($request->isMethod('GET')) {
            $brands = Brand::where(['status' => true])->get();
            $brandModels = BrandModel::where(['status' => true,'brandmodeleable_type' => 'App\Models\Brand', 'brandmodeleable_id' => $brands[0]->id])->get();
            $categories = Category::where(['status' => true])->get();
            $transmissions = Transmission::where(['status' => true])->get();
            $deals = Deal::where(['status' => true])->get();
            $fuels = Fuel::where(['status' => true])->get();
            $conditions = Condition::where(['status' => true])->get();
            return view('admin.modules.product.create')
                ->with('brands', $brands)
                ->with('brandModels',$brandModels)
                ->with('categories',$categories)
                ->with('transmissions',$transmissions)
                ->with('deals',$deals)
                ->with('conditions',$conditions)
                ->with('fuels', $fuels);
        }
        if ($request->isMethod('POST')) {
            $request->all();
            $this->validate($request,
                [
                    'title_ge' =>'required|string|max:255',
                    'title_en' =>'required|string|max:255',
                    'description_ge' =>'required|string',
                    'description_en' =>'required|string',
                    'price' => 'required|integer',
                    'luggage' => 'required|integer',
                    'mileage' => 'required|integer',
                    'custom' => 'required|integer',
                    'door' => 'required|integer',
                    'people' => 'required|integer',
                    'wheel' => 'required|integer',
                    'vip' => 'required|integer',
                    'created_date' => 'required',
                    'engine_capacity' => 'required',
                    'brand' => 'required|integer',
                    'model' => 'required|integer',
                    'category' => 'required|integer',
                    'fuel' => 'required|integer',
                    'transmission' => 'required|integer',
                    'condition' => 'required|integer',
                    'deal' => 'required|integer'
                ]);
            $product = new Product([
                'title_ge' =>$request->title_ge,
                'title_en' =>$request->title_en,
                'description_ge' =>$request->description_ge,
                'description_en' =>$request->description_en,
                'price' => $request->price,
                'created_date' => $request->created_date,
                'engine_capacity' => $request->engine_capacity,
                'mileage' => $request->mileage,
                'door' => $request->door,
                'luggage' => $request->luggage,
                'custom' => $request->custom,
                'people' => $request->people,
                'wheel' => $request->wheel,
                'brand_id' => $request->brand,
                'model_id' => $request->model,
                'category_id' => $request->category,
                'fuel_id' => $request->fuel,
                'transmission_id' => $request->transmission,
                'engine_id' => $request->engine,
                'condition_id' => $request->condition,
                'deal_id' => $request->deal,
                'new' => $request->new,
                'vip' => $request->vip,
                'status' => false
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
            $brandModels = BrandModel::where(['status' => true,'brandmodeleable_type' => 'App\Models\Brand', 'brandmodeleable_id' => $product->brand_id])->get();
            $categories = Category::where(['status' => true])->get();
            $transmissions = Transmission::where(['status' => true])->get();
            $deals = Deal::where(['status' => true])->get();
            $fuels = Fuel::where(['status' => true])->get();
            $conditions = Condition::where(['status' => true])->get();
            $images = Image::where(['imageable_type' =>'App\Models\Product','imageable_id' => $product->id])->get();
            return view('admin.modules.product.update')
                ->with('brands', $brands)
                ->with('brandModels',$brandModels)
                ->with('categories',$categories)
                ->with('transmissions',$transmissions)
                ->with('deals',$deals)
                ->with('conditions',$conditions)
                ->with('fuels', $fuels)
                ->with('product',$product)
                ->with('images',$images);
        }
        if ($request->isMethod('POST')) {
            $request->all();
            $this->validate($request,
                [
                    'title_ge' =>'required|string|max:255',
                    'title_en' =>'required|string|max:255',
                    'description_ge' =>'required|string',
                    'description_en' =>'required|string',
                    'price' => 'required|integer',
                    'luggage' => 'required|integer',
                    'mileage' => 'required|integer',
                    'custom' => 'required|integer',
                    'door' => 'required|integer',
                    'people' => 'required|integer',
                    'wheel' => 'required|integer',
                    'vip' => 'required|integer',
                    'created_date' => 'required',
                    'engine_capacity' => 'required',
                    'brand' => 'required|integer',
                    'model' => 'required|integer',
                    'category' => 'required|integer',
                    'fuel' => 'required|integer',
                    'transmission' => 'required|integer',
                    'condition' => 'required|integer',
                    'deal' => 'required|integer'
                ]);
            $product->title = $request->title;
            $product->save();
            return redirect('admin/brands')->with('success', 'მწარმოებელი წარმატებით რედაქტირდა.');

        }
    }

    public function activate(Product $product)
    {
        $message = ($product->status) ? 'პროდუქტი დეაქტივირებულია.' : 'პროდუქტი გააქტიურდა.';
        $product->status = !$product->status;
        $product->save();
        return redirect('admin/products')->with('success', $message);
    }
    public function vip(Product $product)
    {
        $message = ($product->vip) ? 'პროდუქტი დაემატა VIP-ში.' : 'პროდუქტი წაიშალა VIP-დან.';
        $product->vip = !$product->vip;
        $product->save();
        return redirect('admin/products')->with('success', $message);
    }

    public function models(Request $request)
    {
        if ($request->isMethod('GET')) {
            $this->validate($request, [
                'brand' => 'required|integer'
            ]);
            $brandModel = BrandModel::where(['status' => true,'brandmodeleable_type' => 'App\Models\Brand', 'brandmodeleable_id' => $request->brand])->get();
            return response()->json($brandModel);
        }
    }
}
