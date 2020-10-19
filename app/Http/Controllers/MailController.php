<?php

namespace App\Http\Controllers;

use App\Mail\ContactEmail;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmail(Request $request) {
        $this->validate($request,[
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'birthday' => 'required|string',
            'personal_id' => 'required|integer',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        $subject = Setting::where(['key' => 'smtp_subject'])->first();
        $data = [
          'fullName' => $request->first_name . ' ' . $request->last_name,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'pid' => $request->personal_id,
            'phone' => $request->phone,
            'birthday' => $request->birthday,
            'subject' => $subject->value
        ];

        $mailTo = Setting::where(['key' => 'contact_email'])->first();

        return Mail::to($mailTo->value)->send(new ContactEmail($data,false));

    }
    public function sendMessage(Request $request) {
        $this->validate($request,[
            'full_name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);
        $subject = Setting::where(['key' => 'smtp_contact_subject'])->first();
        $data = [
            'full_name' => $request->full_name,
            'email' => $request->email,
            'message' => $request->message,
            'subject' => $subject->value
        ];

        $mailTo = Setting::where(['key' => 'contact_email'])->first();

        return Mail::to($mailTo->value)->send(new ContactEmail($data,true));

    }
}
