<?php
/**
 *  app/Http/Controllers/Admin/ConditionController.php
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
use App\Models\Condition;
use App\Models\Fuel;
use Illuminate\Http\Request;

class ConditionController extends AdminController
{
    public function index()
    {
        $conditions = Condition::all();
        return view('admin.modules.condition.index', compact('conditions',$conditions));
    }

    public function create(Request $request)
    {
        if ($request->isMethod('GET')) {
            return view('admin.modules.condition.create');
        }
        if ($request->isMethod('POST')) {
            $request->all();
            $this->validate($request, [
                'title_ge' => 'required|string|max:255|unique:conditions',
                'title_en' => 'required|string|max:255|unique:conditions',
            ]);

            $condition = new Condition([
                'title_ge' => $request->title_ge,
                'title_en' => $request->title_en,
            ]);
            $condition->save();
            return redirect('admin/conditions')->with('success', 'მდგომარეობა წარმატებით შეიქმნა.');

        }
    }

    public function update(Request $request,Condition $condition)
    {
        if ($request->isMethod('GET')) {
            return view('admin.modules.condition.update', compact('condition', $condition));
        }
        if ($request->isMethod('POST')) {
            $request->all();
            $this->validate($request, [
                'title_ge' => 'required|string|max:255',
                'title_en' => 'required|string|max:255',
            ]);
            $condition->title_ge = $request->title_ge;
            $condition->title_en = $request->title_en;
            $condition->save();
            return redirect('admin/conditions')->with('success', 'მდგომარეობა წარმატებით რედაქტირდა.');

        }
    }

    public function activate(Condition $condition) {
        $message = ($condition->status) ? 'მდგომარეობა დეაქტივირებულია.' : 'მდგომარეობა გააქტიურდა.';
        $condition->status = !$condition->status;
        $condition->save();
        return redirect('admin/conditions')->with('success', $message);
    }
}
