<?php
/**
 *  app/Http/Controllers/Admin/ColorController.php
 *
 * User: 
 * Date-Time: 04.12.20
 * Time: 13:34
 * @author Vito Makhatadze <vitomaxatadze@gmail.com>
 */
namespace App\Http\Controllers\Admin;


use App\Models\Category;
use App\Models\Color;
use App\Models\Size;
use Illuminate\Http\Request;

class ColorController extends AdminController
{
    public function index()
    {
        $colors = Color::all();
        return view('admin.modules.color.index', compact('colors',$colors));
    }

    public function create(Request $request)
    {
        if ($request->isMethod('POST')) {
            $request->all();
            $this->validate($request, [
                'title_ge' => 'required|string|max:255',
                'title_en' => 'required|string|max:255',
                'title_ru' => 'required|string|max:255',
            ]);
            $size = new Color([
                'title_ge' => $request->title_ge,
                'title_en' => $request->title_en,
                'title_ru' => $request->title_ru,
            ]);
            $size->save();
            return redirect('admin/colors')->with('success', 'ფერი წარმატებით შეიქმნა.');

        }
        return view('admin.modules.color.create');

    }

    public function update(Request $request,Color $color)
    {
        if ($request->isMethod('POST')) {
            $request->all();
            $this->validate($request, [
                'title_ge' => 'required|string|max:255',
                'title_en' => 'required|string|max:255',
                'title_ru' => 'required|string|max:255'
            ]);
            $color->title_ge = $request->title_ge;
            $color->title_en = $request->title_en;
            $color->title_ru = $request->title_ru;
            $color->save();
            return redirect('admin/colors')->with('success', 'ფერი წარმატებით რედაქტირდა.');

        }
        return view('admin.modules.color.update', compact('color', $color));

    }
}
