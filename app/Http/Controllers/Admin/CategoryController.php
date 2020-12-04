<?php
/**
 *  app/Http/Controllers/Admin/CategoryController.php
 *
 * User: 
 * Date-Time: 04.12.20
 * Time: 13:34
 * @author Vito Makhatadze <vitomaxatadze@gmail.com>
 */
namespace App\Http\Controllers\Admin;


use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class CategoryController extends AdminController
{
    public function index()
    {
        $categories = Category::all();
        $subCategories = SubCategory::all();
        return view('admin.modules.category.index')->with('categories',$categories)->with('subCategories',$subCategories);
    }

    public function create(Request $request)
    {
        if ($request->isMethod('GET')) {
            return view('admin.modules.category.create_category');
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

    public function createSubCategory(Request $request)
    {
        if ($request->isMethod('POST')) {
            $request->all();
            $this->validate($request, [
                'title_ge' => 'required|string|max:255',
                'title_en' => 'required|string|max:255',
                'title_ru' => 'required|string|max:255',
            ]);
            $subCategory = new SubCategory([
                'title_ge' => $request->title_ge,
                'title_en' => $request->title_en,
                'title_ru' => $request->title_ru
            ]);
            $subCategory->save();

            if ($request->categories != null) {
                foreach ($request->categories as $category) {
                        $subCategory->categories()->attach($category);
                        $subCategory->save();
                }
            }

            return redirect('admin/categories')->with('success', 'ქვე კატეგორია წარმატებით შეიქმნა.');

        }
        $categories = Category::all();
        return view('admin.modules.category.create_sub_category')->with('categories',$categories);
    }

    public function update(Request $request,Category $category)
    {
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

        return view('admin.modules.category.update_category', compact('category', $category));

    }

    public function updateSubCategory(Request $request,SubCategory $subCategory)
    {
        if ($request->isMethod('POST')) {
            $request->all();
            $this->validate($request, [
                'title_ge' => 'required|string|max:255',
                'title_en' => 'required|string|max:255',
                'title_ru' => 'required|string|max:255',
            ]);
            $subCategory->title_ge = $request->title_ge;
            $subCategory->title_en = $request->title_en;
            $subCategory->title_ru = $request->title_ru;
            $subCategory->save();

            $subCategory->categories()->detach();

            if ($request->categories != null) {
                foreach ($request->categories as $category) {
                    $subCategory->categories()->attach($category);
                    $subCategory->save();
                }
            }

            return redirect('admin/categories')->with('success', 'ქვე კატეგორია წარმატებით რედაქტირდა.');
        }

        $categories = Category::all();
        $subCategoryToCategories = $subCategory->categories()->select('id')->get()->toArray();

        return view('admin.modules.category.update_sub_category', [
            'subCategory' => $subCategory,
            'categories' => $categories,
            'subCategoryToCategories' => $subCategoryToCategories
        ]);

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
