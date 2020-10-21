<?php
/**
 *  app/Http/Controllers/MailController.php
 *
 * User:
 * Date-Time: 19.10.20
 * Time: 15:29
 * @author Vito Makhatadze <vitomaxatadze@gmail.com>
 */
namespace App\Http\Controllers;

use App\Mail\ContactEmail;
use App\Models\BrandModel;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmail(Request $request) {
        $request->all();

        $this->validate($request,[
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'address' => 'required|string',
            'description' => 'required',
            'phone' => 'required',
        ]);
        if ($request->hasFile(0)) {
            $validate = [];
            for ($i = 0; $i<$request->count; $i++) {
                $validate[$i] = 'image|mimes:jpeg,png,jpg,gif,svg|max:7000';
            }
            $this->validate($request,$validate);
        }


        $subject = Setting::where(['key' => 'smtp_subject'])->first();
        $data = [
          'fullName' => $request->first_name . ' ' . $request->last_name,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'phone' => $request->phone,
            'description' => $request->description,
            'subject' => $subject->value,
            'files' => []
        ];
        if($request->count) {
            for ($i = 0; $i<$request->count; $i++) {
                if ($request->hasFile($i)) {
                    $data['files'][$i]=$request->file($i);
                }
            }
        }

        $mailTo = Setting::where(['key' => 'contact_email'])->first();
        return Mail::to($mailTo->value)->send(new ContactEmail($data,false,false));

    }
    public function sendLoan(Request $request) {
        $this->validate($request,[
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone' => 'required|string',
            'address' => 'required',
            'url' => 'url'
        ]);

        $subject = Setting::where(['key' => 'smtp_subject'])->first();
        $data = [
            'full_name' => $request->first_name . ' ' . $request->last_name,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'phone' => $request->phone,
            'url' => $request->url,
            'subject' => 'განვადება',
        ];

        $mailTo = Setting::where(['key' => 'contact_email'])->first();

        return Mail::to($mailTo->value)->send(new ContactEmail($data,false,true));

    }

    public function sendMessage(Request $request) {
        $this->validate($request,[
            'full_name' => 'required|string',
            'phone' => 'required|string',
            'message' => 'required|string',
        ]);
        $subject = Setting::where(['key' => 'smtp_contact_subject'])->first();
        $data = [
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->phone ? $request->phone : '',
            'message' => $request->message,
            'subject' => $subject->value
        ];

        $mailTo = Setting::where(['key' => 'contact_email'])->first();

        return Mail::to($mailTo->value)->send(new ContactEmail($data,true,false));

    }

    public function models(Request $request)
    {
        if ($request->isMethod('GET')) {
            $this->validate($request, [
                'brand' => 'required|integer'
            ]);
            $brandModel = BrandModel::where(['status' => true,'brandmodeleable_type' => 'App\Models\Brand', 'brandmodeleable_id' => $request->brand])->get();
            return response()->json($brandModel);
        }
    }
}
