<?php

namespace App\Mail;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactFormInfo extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $contact;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->contact = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->contact['email'], $this->contact['name'])
                    ->subject($this->contact['name'].' contacted you on Clean Blog.')
                    ->replyTo($this->contact['email'], $this->contact['name'])
                    ->markdown('emails.contact')
                    ->with([
                        'name' => $this->contact['name'],
                        'email' => $this->contact['email'],
                        'phone_number' => $this->contact['phone_number'],
                        'message' => $this->contact['message']
                    ]);
    }
}
