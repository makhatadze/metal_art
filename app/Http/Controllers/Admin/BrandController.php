<?php
/**
 *  app/Http/Controllers/Admin/BrandController.php
 *
 * User:
 * Date-Time: 19.10.20
 * Time: 15:28
 * @author Vito Makhatadze <vitomaxatadze@gmail.com>
 */
namespace App\Http\Controllers\Admin;


use App\Models\Brand;
use App\Models\BrandModel;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandController extends AdminController
{
    public function index()
    {
        $brands = Brand::all();
        return view('admin.modules.brand.index', compact('brands',$brands));
    }

    public function create(Request $request)
    {
        if ($request->isMethod('GET')) {
            return view('admin.modules.brand.create');
        }
        if ($request->isMethod('POST')) {
            $request->all();
            $this->validate($request, [
                'title' => 'required|string|max:255|unique:brands'
            ]);
            $brand = new Brand([
                'title' => $request->title,
            ]);
            $brand->save();
            if ($request->model) {
                foreach ($request->model as $mod) {
                    if ($mod != '') {
                        $brandModel = new BrandModel([
                            'title' => $mod,
                        ]);
                        $brand->brandModel()->save($brandModel);
                    }
                }
            }

            if ($request->hasFile('files')) {
                $imagename = date('Ymhs') . $request->file('files')->getClientOriginalName();
                $destination = base_path() . '/storage/app/public/brand/' . $brand->id;
                $request->file('files')->move($destination, $imagename);
                $brand->image()->create([
                    'name' => $imagename
                ]);
            }
            return redirect('admin/brands')->with('success', 'მწარმოებელი წარმატებით შეიქმნა.');

        }
    }

    public function update(Request $request,Brand $brand)
    {
        if ($request->isMethod('GET')) {
            return view('admin.modules.brand.update', compact('brand', $brand));
        }
        if ($request->isMethod('POST')) {
            $request->all();
            $this->validate($request, [
                'title' => 'required',
            ]);
            $brand->title = $request->title;
            $brand->save();

            if ($request->hasFile('kartik-input-700')) {
                $image = Image::where(['imageable_id' => $brand->id, 'imageable_type' => 'App\Models\Brand'])->first();
                if ($image) {
                    if (!Storage::delete('public/brand/' . $image->imageable_id . '/' . $image->name)) {
                        return false;
                    }
                    if (!$image->delete()) {
                        return false;
                    }
                }
                    $imagename = date('Ymhs') . $request->file('kartik-input-700')->getClientOriginalName();
                    $destination = base_path() . '/storage/app/public/brand/' . $brand->id;
                    $request->file('kartik-input-700')->move($destination, $imagename);
                    $brand->image()->create([
                        'name' => $imagename
                    ]);
            }

            return redirect('admin/brands')->with('success', 'მწარმოებელი წარმატებით რედაქტირდა.');

        }
    }

    public function activate(Brand $brand) {
        $message = ($brand->status) ? 'მწარმოებელი დეაქტივირებულია.' : 'მწარმოებელი გააქტიურდა.';
        $brand->status = !$brand->status;
        $brand->save();
        return redirect('admin/brands')->with('success', $message);
    }
}
