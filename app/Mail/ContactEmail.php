<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data,$contact)
    {
        $this->data = $data;
        $this->contact = $contact;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($this->contact) {
            return $this->from($this->data['email'],$this->data['full_name'])->subject($this->data['subject'])->view('frontend.mail.contact-email',['data' => $this->data]);
        }
        return $this->from($this->data['email'],$this->data['fullName'])->subject($this->data['subject'])->view('frontend.mail.agreement-email',['data' => $this->data]);
    }
}
