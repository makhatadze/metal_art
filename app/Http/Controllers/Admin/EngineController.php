<?php

namespace App\Http\Controllers\Admin;


use App\Models\Brand;
use App\Models\BrandModel;
use App\Models\Category;
use App\Models\Engine;
use App\Models\Fuel;
use App\Models\Transmission;
use Illuminate\Http\Request;

class EngineController extends AdminController
{
    public function index()
    {
        $engines = Engine::all();
        return view('admin.modules.engine.index', compact('engines',$engines));
    }

    public function create(Request $request)
    {
        if ($request->isMethod('GET')) {
            return view('admin.modules.engine.create');
        }
        if ($request->isMethod('POST')) {
            $request->all();
            $this->validate($request, [
                'title_ge' => 'required|string|max:255|unique:engines',
                'title_en' => 'required|string|max:255|unique:engines',
            ]);

            $engine = new Engine([
                'title_ge' => $request->title_ge,
                'title_en' => $request->title_en,
            ]);
            $engine->save();
            return redirect('admin/engines')->with('success', 'ძრავის ტიპი წარმატებით შეიქმნა.');

        }
    }

    public function update(Request $request,Engine $engine)
    {
        if ($request->isMethod('GET')) {
            return view('admin.modules.engine.update', compact('engine', $engine));
        }
        if ($request->isMethod('POST')) {
            $request->all();
            $this->validate($request, [
                'title_ge' => 'required|string|max:255',
                'title_en' => 'required|string|max:255',
            ]);
            $engine->title_ge = $request->title_ge;
            $engine->title_en = $request->title_en;
            $engine->save();
            return redirect('admin/engines')->with('success', 'ძრავის ტიპი წარმატებით რედაქტირდა.');

        }
    }

    public function activate(Engine $engine) {
        $message = ($engine->status) ? 'ძრავის ტიპი დეაქტივირებულია.' : 'ძრავის ტიპი გააქტიურდა.';
        $engine->status = !$engine->status;
        $engine->save();
        return redirect('admin/engines')->with('success', $message);
    }
}
