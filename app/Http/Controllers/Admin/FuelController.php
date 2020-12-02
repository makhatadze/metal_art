<?php
/**
 *  app/Http/Controllers/Admin/FuelController.php
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
use App\Models\Fuel;
use Illuminate\Http\Request;

class FuelController extends AdminController
{
    public function index()
    {
        $fuels = Fuel::all();
        return view('admin.modules.fuel.index', compact('fuels',$fuels));
    }

    public function create(Request $request)
    {
        if ($request->isMethod('GET')) {
            return view('admin.modules.fuel.create');
        }
        if ($request->isMethod('POST')) {
            $request->all();
            $this->validate($request, [
                'title_ge' => 'required|string|max:255|unique:fuels',
                'title_en' => 'required|string|max:255|unique:fuels',
            ]);

            $fuel = new Fuel([
                'title_ge' => $request->title_ge,
                'title_en' => $request->title_en,
            ]);
            $fuel->save();
            return redirect('admin/fuels')->with('success', 'წვის ტიპი წარმატებით შეიქმნა.');

        }
    }

    public function update(Request $request,Fuel $fuel)
    {
        if ($request->isMethod('GET')) {
            return view('admin.modules.fuel.update', compact('fuel', $fuel));
        }
        if ($request->isMethod('POST')) {
            $request->all();
            $this->validate($request, [
                'title_ge' => 'required|string|max:255',
                'title_en' => 'required|string|max:255',
            ]);
            $fuel->title_ge = $request->title_ge;
            $fuel->title_en = $request->title_en;
            $fuel->save();
            return redirect('admin/fuels')->with('success', 'წვის ტიპი წარმატებით რედაქტირდა.');

        }
    }

    public function activate(Fuel $fuel) {
        $message = ($fuel->status) ? 'წვის ტიპი დეაქტივირებულია.' : 'წვის ტიპი გააქტიურდა.';
        $fuel->status = !$fuel->status;
        $fuel->save();
        return redirect('admin/fuels')->with('success', $message);
    }
}
