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
use App\Models\Page;
use App\Models\Product;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $page = Page::where(['status' => true, 'slug' => 'home'])->first();
        if (!$page) {
            return abort('404');
        }

        return view('frontend.home.index')->with('page', $page);
    }

    public function catalog(Request $request)
    {
        $page = Page::where(['status' => true, 'slug' => 'catalogue'])->first();
        if (!$page) {
            return abort('404');
        }
        if ($request->isMethod('get')) {

            $this->validate($request, [
                'custom' => 'integer|nullable',
                'brand' => 'integer|nullable',
                'transmission' => 'integer|nullable',
                'date_from' => 'integer|nullable',
                'date_to' => 'integer|nullable',
                'category' => 'integer|nullable',
            ]);
            $products = Product::where(['status' => true])
                ->with(['transmission', 'category', 'deal','brand','model']);
            if ($request->searchValue) {
                $products->where('title_'.app()->getLocale(), 'like', '%'.$request->searchValue.'%');
            }
            if ($request->brand) {
                $products->where(['brand_id' => $request->brand]);
            }
            if ($request->custom) {
                $products->where(['custom' => $request->custom]);
            }
            if ($request->transmission) {
                $products->where(['transmission_id' => $request->transmission]);
            }

            if ($request->category) {
                $products->where(['category_id' => $request->category]);
            }
            if ($request->price_from) {
                $products->where('price', '>', $request->price_from);
            }
            if ($request->price_to) {
                $products->where('price', '<', $request->price_to);
            }

            if ($request->date_from) {
                $from = $request->date_from . '-01-01 00:00:00';
                $products->where('created_date', '>', $from);
            }

            if ($request->date_to) {
                $to = $request->date_to . '-01-01 00:00:00';
                $products->where('created_date', '<', $to);
            }

            $products = $products->orderBy('vip', 'desc', 'created_at', 'desc')->paginate(12)->appends(request()->query());;
            $categories = Category::where(['status' => true])->get();
            $transmissions = Transmission::where(['status' => true])->get();
            $brands = Brand::where(['status' => true])->get();
            $brandModels = [];
            if (isset($brands[0])) {
                $brandModels = BrandModel::where(['status' => true, 'brandmodeleable_type' => 'App\Models\Brand', 'brandmodeleable_id' => $brands[0]->id])->get();
            }

            return view('frontend.catalog.index')
                ->with('products', $products)
                ->with('categories', $categories)
                ->with('transmissions', $transmissions)
                ->with('brands', $brands)
                ->with('dolar', $this->getDolar())
                ->with('page', $page)
                ->with('brandModels', $brandModels);

        }
    }

    public function view(Product $product)
    {
        $page = Page::where(['status' => true, 'slug' => 'details'])->first();
        if (!$page) {
            return abort('404');
        }
        $images = $product->image()->get();
        $brand = $product->brand()->get()[0];
        $model = $product->model()->get()[0];
        $deal = $product->deal()->get()[0];
        $fuel = $product->fuel()->get()[0];

        $news = Product::where(['status' => true,'vip' => false])
            ->with(['transmission', 'category', 'deal'])
            ->orderBy('created_at', 'desc')->paginate(4);

        $vips = Product::where(['status' => true, 'vip' => true])
            ->with(['transmission', 'category', 'deal'])
            ->orderBy('created_at', 'desc')->paginate(4);

        return view('frontend.catalog.view')
            ->with('product', $product)
            ->with('brand', $brand)
            ->with('model', $model)
            ->with('deal', $deal)
            ->with('news', $news)
            ->with('page', $page)
            ->with('vips', $vips)
            ->with('fuel',$fuel)
            ->with('dolar', $this->getDolar())
            ->with('images', $images);
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

    public function getDolar() {
        return 3.25;
    }

}
