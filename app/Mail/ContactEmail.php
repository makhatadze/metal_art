<?php

namespace App\Mail;

use App\Models\Setting;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactEmail extends Mailable
{
    use Queueable, SerializesModels;
    protected $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $contact, $loan)
    {
        $this->data = $data;
        $this->contact = $contact;
        $this->loan = $loan;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mailTo = Setting::where(['key' => 'contact_email'])->first();

        if ($this->contact) {
            return $this->from($mailTo->value, $this->data['full_name'])->subject($this->data['subject'])->view('frontend.mail.contact-email', ['data' => $this->data]);
        }
        if ($this->loan) {
            return $this->from($mailTo->value, $this->data['full_name'])->subject($this->data['subject'])->view('frontend.mail.loan-email', ['data' => $this->data]);
        }
        $email = $this->from($mailTo->value, $this->data['fullName'])
            ->subject($this->data['subject'])
            ->view('frontend.mail.agreement-email', ['data' => $this->data]);
        if ($this->data['files']) {
            foreach ($this->data['files'] as $file) {
                $email->attach($file->getRealPath(), [
                    'as' => $file->getClientOriginalName()
                ]);
            }
        }
        return $email;
    }
}
