<?php
/**
 *  app/Http/Controllers/Admin/SizeController.php
 *
 * User: 
 * Date-Time: 02.12.20
 * Time: 18:30
 * @author Vito Makhatadze <vitomaxatadze@gmail.com>
 */
namespace App\Http\Controllers\Admin;


use App\Models\Category;
use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends AdminController
{
    public function index()
    {
        $sizes = Size::all();
        return view('admin.modules.size.index', compact('sizes',$sizes));
    }

    public function create(Request $request)
    {
        if ($request->isMethod('GET')) {
            return view('admin.modules.size.create');
        }
        if ($request->isMethod('POST')) {
            $request->all();
            $this->validate($request, [
                'title' => 'required|string|max:255',
            ]);
            $size = new Size([
                'title' => $request->title
            ]);
            $size->save();
            return redirect('admin/sizes')->with('success', 'ზომა წარმატებით შეიქმნა.');

        }
    }

    public function update(Request $request,Size $size)
    {
        if ($request->isMethod('GET')) {
            return view('admin.modules.size.update', compact('size', $size));
        }
        if ($request->isMethod('POST')) {
            $request->all();
            $this->validate($request, [
                'title' => 'required|string|max:255'
            ]);
            $size->title = $request->title;
            $size->save();
            return redirect('admin/sizes')->with('success', 'ზომა წარმატებით რედაქტირდა.');

        }
    }
}
