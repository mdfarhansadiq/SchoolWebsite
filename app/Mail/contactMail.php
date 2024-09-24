<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class contactMail extends Mailable
{
    use Queueable, SerializesModels;


    public $name;
    public $email;
    public $phone;
    public $subject;
    public $emailMessage;
    public $chk;
    /**
     * Create a new message instance.
     */
    public function __construct($name, $email, $phone, $subject, $message, $chk)
    {
        //
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->subject = $subject;
        $this->emailMessage = $message;
        $this->chk = $chk;
    }

    /**
     * Get the message envelope.
     */
    // public function envelope(): Envelope
    // {
    //     return new Envelope(
    //         subject: 'Contact Mail',
    //     );
    // }

    // /**
    //  * Get the message content definition.
    //  */
    // public function content(): Content
    // {
    //     return new Content(
    //         view: 'view.name',
    //     );
    // }

    // /**
    //  * Get the attachments for the message.
    //  *
    //  * @return array<int, \Illuminate\Mail\Mailables\Attachment>
    //  */
    // public function attachments(): array
    // {
    //     return [];
    // }

    public function build()
    {
        if($this->chk == 'admin')
        {
            return $this->subject($this->subject)->view('mail.contactPage');
        }
        else if( $this->chk == 'user')
        {
            return $this->subject('Gongapur Govt. Primary School')->view('mail.contactPage');
        }

    }
}
