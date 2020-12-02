<?php
/**
 *  app/Http/Controllers/Admin/BrandModelController.php
 *
 * User:
 * Date-Time: 19.10.20
 * Time: 15:29
 * @author Vito Makhatadze <vitomaxatadze@gmail.com>
 */
namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\BrandModel;
use Illuminate\Http\Request;

class BrandModelController extends AdminController
{
    public function index()
    {
        $models = BrandModel::all();
        return view('admin.modules.model.index', compact('models',$models));
    }

    public function create(Request $request)
    {
        if ($request->isMethod('GET')) {
            $brands = Brand::all();
            return view('admin.modules.model.create',compact('brands',$brands));
        }
        if ($request->isMethod('POST')) {
            $request->all();
            $this->validate($request, [
                'brand' => 'required|integer',
                'title' => 'required|string|max:255',
            ]);

            $brand = Brand::where(['id' => $request->brand])->first();
            if (!$brand) {
                return redirect('admin/models/create')->with('warning', 'შეიყვანეთ მწარმოებელი სწორად და სცადეთ ახლიდან.');
            }
            $brandModel = new BrandModel([
               'title' => $request->title,
            ]);
            $brand->brandModel()->save($brandModel);
            return redirect('admin/models')->with('success', 'მოდელი წარმატებით შეიქმნა.');

        }
    }

    public function update(Request $request,BrandModel $brandModel)
    {
        if ($request->isMethod('GET')) {
            return view('admin.modules.model.update', compact('brandModel', $brandModel));
        }
        if ($request->isMethod('POST')) {
            $request->all();
            $this->validate($request, [
                'title' => 'required|string|max:255',
            ]);
            $brandModel->title = $request->title;
            $brandModel->save();
            return redirect('admin/models')->with('success', 'მოდელი წარმატებით რედაქტირდა.');

        }
    }

    public function activate(BrandModel $brandModel) {
        $message = ($brandModel->status) ? 'მოდელი დეაქტივირებულია.' : 'მოდელი გააქტიურდა.';
        $brandModel->status = !$brandModel->status;
        $brandModel->save();
        return redirect('admin/models')->with('success', $message);
    }
}
