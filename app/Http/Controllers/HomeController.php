<?php
/**
 *  app/Http/Controllers/HomeController.php
 *
 * User:
 * Date-Time: 19.10.20
 * Time: 15:29
 * @author Vito Makhatadze <vitomaxatadze@gmail.com>
 */

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\BrandModel;
use App\Models\Category;
use App\Models\Color;
use App\Models\Page;
use App\Models\Product;
use App\Models\Size;
use App\Models\Transmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return void
     */
    public function index()
    {
        $page = Page::where(['status' => true, 'slug' => 'home'])->first();
        if (!$page) {
            return abort('404');
        }
        $vips = Product::where(['status' => true, 'vip' => true])->paginate();

        return view('frontend.home.index',[
            'vips' => $vips,
            'page' => $page
        ]);
    }

    public function products(Request $request)
    {
        $page = Page::where(['status' => true, 'slug' => 'products'])->first();
        if (!$page) {
            return abort('404');
        }

        $this->validate($request, [
            'category' => 'integer|nullable',
            'sub_category' => 'integer|nullable',
            'color' => 'integer|nullable',
            'size' => 'integer|nullable',
        ]);

        $products = Product::where(['status' => true]);

        if ($request->category != null) {
            $products = $products->with('categories')->whereHas('categories', function ($query) use ($request) {
               $query->where('id',$request->category);
            });
        }

        if ($request->sub_category != null) {
            $products = $products->with('subCategories')->whereHas('subCategories', function ($query) use ($request) {
                $query->where('id',$request->sub_category);
            });
        }

        if ($request->color != null) {
            $products = $products->with('colors')->whereHas('colors', function ($query) use ($request) {
                $query->where('id',$request->color);
            });
        }

        if ($request->size != null) {
            $products = $products->with('sizes')->whereHas('sizes', function ($query) use ($request) {
                $query->where('id',$request->size);
            });
        }

        if ($request->price_from != null) {
            $products->where('price','>=',$request->price_from);
        }

        if ($request->price_to != null) {
            $products->where('price','<=',$request->price_to);
        }

        $products = $products->orderBy('vip', 'desc', 'created_at', 'desc')->paginate(9)->appends(request()->query());
        $colors = Color::all();
        $sizes = Size::all();
        $categories = Category::all();
        $subCategories = [];
        return view('frontend.products.index',[
            'page' => $page,
            'products' => $products,
            'colors' => $colors,
            'sizes' => $sizes,
            'categories' => $categories,
            'subCategories' => $subCategories
        ]);

    }

    public function view(Product $product)
    {
        $page = Page::where(['status' => true, 'slug' => 'details'])->first();
        if (!$page) {
            return abort('404');
        }

        $relatedProducts = Product::where('status', true)->where('id','!=',$product->id)->paginate(6);
        return view('frontend.products.view')
            ->with('product', $product)
            ->with('relatedProducts',$relatedProducts)
            ->with('page', $page);
    }

    public function about()
    {
        $page = Page::where(['status' => true, 'slug' => 'about-us'])->first();
        if (!$page) {
            return abort('404');
        }
        return view('frontend.about.index')->with('page', $page);

    }

    public function contact()
    {
        $page = Page::where(['status' => true, 'slug' => 'contact-us'])->first();
        if (!$page) {
            return abort('404');
        }
        return view('frontend.contact.index')->with('page', $page);

    }

    public function statement()
    {
        $page = Page::where(['status' => true, 'slug' => 'statement'])->first();
        if (!$page) {
            return abort('404');
        }
        return view('frontend.statement.index')->with('page', $page);

    }

    private function setEnvironmentValue($environmentName, $configKey, $newValue)
    {
        file_put_contents(App::environmentFilePath(), str_replace(
            $environmentName . '=' . Config::get($configKey),
            $environmentName . '=' . $newValue,
            file_get_contents(App::environmentFilePath())
        ));

        Config::set($configKey, $newValue);

        // Reload the cached config
        if (file_exists(App::getCachedConfigPath())) {
            Artisan::call("config:cache");
        }
    }

    public function getDolar()
    {
        return 3.25;
    }

}
