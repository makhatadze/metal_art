<?php
/**
 *  app/Http/Controllers/Admin/DealController.php
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
use App\Models\Deal;
use App\Models\Fuel;
use App\Models\Transmission;
use Illuminate\Http\Request;

class DealController extends AdminController
{
    public function index()
    {
        $deals = Deal::all();
        return view('admin.modules.deal.index', compact('deals',$deals));
    }

    public function create(Request $request)
    {
        if ($request->isMethod('GET')) {
            return view('admin.modules.deal.create');
        }
        if ($request->isMethod('POST')) {
            $request->all();
            $this->validate($request, [
                'title_ge' => 'required|string|max:255|unique:deals',
                'title_en' => 'required|string|max:255|unique:deals',
            ]);

            $deal = new Deal([
                'title_ge' => $request->title_ge,
                'title_en' => $request->title_en,
            ]);
            $deal->save();
            return redirect('admin/deals')->with('success', 'გარიგების ტიპი წარმატებით შეიქმნა.');

        }
    }

    public function update(Request $request,Deal $deal)
    {
        if ($request->isMethod('GET')) {
            return view('admin.modules.deal.update', compact('deal', $deal));
        }
        if ($request->isMethod('POST')) {
            $request->all();
            $this->validate($request, [
                'title_ge' => 'required|string|max:255',
                'title_en' => 'required|string|max:255',
            ]);
            $deal->title_ge = $request->title_ge;
            $deal->title_en = $request->title_en;
            $deal->save();
            return redirect('admin/deal')->with('success', 'გარიგების ტიპი წარმატებით რედაქტირდა.');

        }
    }

    public function activate(Deal $deal) {
        $message = ($deal->status) ? 'გარიგების ტიპი დეაქტივირებულია.' : 'გარიგების ტიპი გააქტიურდა.';
        $deal->status = !$deal->status;
        $deal->save();
        return redirect('admin/deals')->with('success', $message);
    }
}
