<?php

namespace App\Http\Controllers\Admin;


use App\Models\Brand;
use App\Models\BrandModel;
use App\Models\Category;
use Illuminate\Http\Request;

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
