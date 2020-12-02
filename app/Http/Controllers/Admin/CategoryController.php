<?php
/**
 *  app/Http/Controllers/Admin/CategoryController.php
 *
 * User:
 * Date-Time: 19.10.20
 * Time: 15:29
 * @author Vito Makhatadze <vitomaxatadze@gmail.com>
 */
namespace App\Http\Controllers\Admin;


use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends AdminController
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.modules.category.index', compact('categories',$categories));
    }

    public function create(Request $request)
    {
        if ($request->isMethod('GET')) {
            return view('admin.modules.category.create');
        }
        if ($request->isMethod('POST')) {
            $request->all();
            $this->validate($request, [
                'title_ge' => 'required|string|max:255',
                'title_en' => 'required|string|max:255',
                'title_ru' => 'required|string|max:255',
            ]);
            $category = new Category([
                'title_ge' => $request->title_ge,
                'title_en' => $request->title_en,
                'title_ru' => $request->title_ru
            ]);
            $category->save();
            return redirect('admin/categories')->with('success', 'კატეგორია წარმატებით შეიქმნა.');

        }
    }

    public function update(Request $request,Category $category)
    {
        if ($request->isMethod('GET')) {
            return view('admin.modules.category.update', compact('category', $category));
        }
        if ($request->isMethod('POST')) {
            $request->all();
            $this->validate($request, [
                'title_ge' => 'required|string|max:255',
                'title_en' => 'required|string|max:255',
                'title_ru' => 'required|string|max:255',
            ]);
            $category->title_ge = $request->title_ge;
            $category->title_en = $request->title_en;
            $category->title_ru = $request->title_ru;
            $category->save();
            return redirect('admin/categories')->with('success', 'კატეგორია წარმატებით რედაქტირდა.');

        }
    }

    public function activate($id) {
        $where = array('id' => $id);
        $category = Category::where($where)->first();
        $message = ($category->status) ? 'კატეგორია დეაქტივირებულია.' : 'კატეგორია გააქტიურდა.';
        $category->status = !$category->status;
        $category->save();
        return redirect('admin/categories')->with('success', $message);
    }
}
