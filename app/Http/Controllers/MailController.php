<?php
/**
 *  app/Http/Controllers/MailController.php
 *
 * User: 
 * Date-Time: 04.12.20
 * Time: 13:34
 * @author Vito Makhatadze <vitomaxatadze@gmail.com>
 */
namespace App\Http\Controllers;

use App\Mail\ContactEmail;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmail(Request $request) {
        $request->all();

        $this->validate($request,[
            'name' => 'required|string',
            'email' => 'required|string',
            'message' => 'required|string',
        ]);
        $subject = Setting::where(['key' => 'smtp_contact_subject'])->first();
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'subject' => $subject->value,
        ];

        $mailTo = Setting::where(['key' => 'contact_email'])->first();

        Mail::to($mailTo->value)->send(new ContactEmail($data));

        return redirect('/contact-us');


    }

}
