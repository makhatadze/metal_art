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


use App\Models\Category;
use App\Models\Color;
use App\Models\Image;
use App\Models\Product;
use App\Models\Size;
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
        if ($request->isMethod('POST')) {
            $request->all();
            $this->validate($request,
                [
                    'title_ge' => 'required|string|max:255',
                    'title_en' => 'required|string|max:255',
                    'title_ru' => 'required|string|max:255',
                    'description_ge' => 'required|string',
                    'description_en' => 'required|string',
                    'description_ru' => 'required|string',
                    'price' => 'required',
                    'categories' => 'required',
                    'sub_categories' => 'required',
                    'sizes' => 'required',
                    'colors' => 'required',
                    'kartik-input-700' => 'required'
                ]);


            $product = new Product([
                'title_ge' => $request->title_ge,
                'title_en' => $request->title_en,
                'title_ru' => $request->title_ru,
                'description_ge' => $request->description_ge,
                'description_en' => $request->description_en,
                'description_ru' => $request->description_ru,
                'price' => $request->price,
                'is_sale' => $request->is_sale == 'on',
                'sale' => $request->sale,
                'vip' => false
            ]);
            $product->save();


            if ($request->categories != null) {
                foreach ($request->categories as $category) {
                    $product->categories()->attach($category);
                    $product->save();
                }
            }

            if ($request->sub_categories != null) {
                foreach ($request->sub_categories as $category) {
                    $product->subCategories()->attach($category);
                    $product->save();
                }
            }

            if ($request->sizes != null) {
                foreach ($request->sizes as $size) {
                    $product->sizes()->attach($size);
                    $product->save();
                }
            }

            if ($request->colors != null) {
                foreach ($request->colors as $color) {
                    $product->colors()->attach($color);
                    $product->save();
                }
            }

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
        $categories = Category::all();
        $sizes = Size::all();
        $colors = Color::all();

        return view('admin.modules.product.create',[
            'categories' => $categories,
            'sizes' => $sizes,
            'colors' => $colors
        ]);

    }

    public function update(Request $request, Product $product)
    {
        if ($request->isMethod('POST')) {
            $request->all();
            $this->validate($request,
                [
                    'title_ge' => 'required|string|max:255',
                    'title_en' => 'required|string|max:255',
                    'title_ru' => 'required|string|max:255',
                    'description_ge' => 'required|string',
                    'description_en' => 'required|string',
                    'description_ru' => 'required|string',
                    'price' => 'required',
                    'categories' => 'required',
                    'sub_categories' => 'required',
                    'sizes' => 'required',
                    'colors' => 'required'
                ]);


            $product->title_ge = $request->title_ge;
            $product->title_en = $request->title_en;
            $product->title_ru = $request->title_ru;
            $product->description_ge = $request->description_ge;
            $product->description_en = $request->description_en;
            $product->description_ru = $request->description_ru;
            $product->price = $request->price;
            $product->is_sale = $request->is_sale == 'on';
            $product->sale = $request->sale;
            $product->save();

            $product->categories()->detach();

            if ($request->categories != null) {
                foreach ($request->categories as $category) {
                    $product->categories()->attach($category);
                    $product->save();
                }
            }
            $product->subCategories()->detach();
            if ($request->sub_categories != null) {
                foreach ($request->sub_categories as $category) {
                    $product->subCategories()->attach($category);
                    $product->save();
                }
            }
            $product->sizes()->detach();
            if ($request->sizes != null) {
                foreach ($request->sizes as $size) {
                    $product->sizes()->attach($size);
                    $product->save();
                }
            }

            $product->colors()->detach();

            if ($request->colors != null) {
                foreach ($request->colors as $color) {
                    $product->colors()->attach($color);
                    $product->save();
                }
            }

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

        $images = Image::where(['imageable_type' => 'App\Models\Product', 'imageable_id' => $product->id])->get();

        $categories = Category::all();
        $sizes = Size::all();
        $colors = Color::all();

        $productColors = $product->colors()->select('id')->get()->toArray();
        $productSizes = $product->sizes()->select('id')->get()->toArray();
        $productCategories = $product->categories()->select('id')->get()->toArray();
        $productSubCategories = $product->subCategories()->select('id')->get()->toArray();

        $categorySubCategories = [];

        foreach ($product->categories()->get() as $category) {
            $subArray = $category->subCategories()->get()->toArray();
            if (count($subArray) > 0) {
                foreach ($subArray as $sub) {
                    if (count($categorySubCategories) > 0) {
                        if (in_array($sub['id'],array_column($categorySubCategories,'id'))) {
                            continue;
                        }
                    }
                    $categorySubCategories [] = $sub;
                }
            }
        }
        return view('admin.modules.product.update',[
            'product' => $product,
            'images' => $images,
            'categories' => $categories,
            'sizes' => $sizes,
            'colors' => $colors,
            'productColors' => $productColors,
            'productSizes' => $productSizes,
            'productCategories' => $productCategories,
            'productSubCategories' => $productSubCategories,
            'categorySubCategories' => $categorySubCategories
        ]);
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


    public function getCategories(Request $request) {
        $request->all();
        $data = [];
        foreach ($request->categories as $category) {
            $category = Category::where('id',$category)->first();
            $subArray = $category->subCategories()->get()->toArray();
            if (count($subArray) > 0) {
                foreach ($subArray as $sub) {
                    if (count($data) > 0) {
                        if (in_array($sub['id'],array_column($data,'id'))) {
                            continue;
                        }
                    }
                    $data [] = $sub;
                }
            }
        }

        return $data;
    }
}
