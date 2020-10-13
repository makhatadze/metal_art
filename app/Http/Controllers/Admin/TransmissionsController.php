<?php

namespace App\Http\Controllers\Admin;


use App\Models\Brand;
use App\Models\BrandModel;
use App\Models\Category;
use App\Models\Fuel;
use App\Models\Transmission;
use Illuminate\Http\Request;

class TransmissionsController extends AdminController
{
    public function index()
    {
        $transmissions = Transmission::all();
        return view('admin.modules.transmission.index', compact('transmissions',$transmissions));
    }

    public function create(Request $request)
    {
        if ($request->isMethod('GET')) {
            return view('admin.modules.transmission.create');
        }
        if ($request->isMethod('POST')) {
            $request->all();
            $this->validate($request, [
                'title_ge' => 'required|string|max:255|unique:transmissions',
                'title_en' => 'required|string|max:255|unique:transmissions',
            ]);

            $transmission = new Transmission([
                'title_ge' => $request->title_ge,
                'title_en' => $request->title_en,
            ]);
            $transmission->save();
            return redirect('admin/transmissions')->with('success', 'ტრანსმისია წარმატებით შეიქმნა.');

        }
    }

    public function update(Request $request,Transmission $transmission)
    {
        if ($request->isMethod('GET')) {
            return view('admin.modules.transmission.update', compact('transmission', $transmission));
        }
        if ($request->isMethod('POST')) {
            $request->all();
            $this->validate($request, [
                'title_ge' => 'required|string|max:255',
                'title_en' => 'required|string|max:255',
            ]);
            $transmission->title_ge = $request->title_ge;
            $transmission->title_en = $request->title_en;
            $transmission->save();
            return redirect('admin/transmissions')->with('success', 'ტრანსმისია წარმატებით რედაქტირდა.');

        }
    }

    public function activate(Transmission $transmission) {
        $message = ($transmission->status) ? 'ტრანსმისია დეაქტივირებულია.' : 'ტრანსმისია გააქტიურდა.';
        $transmission->status = !$transmission->status;
        $transmission->save();
        return redirect('admin/transmissions')->with('success', $message);
    }
}
