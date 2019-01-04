<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class InquiryEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The demo object instance.
     *
     * @var Demo
     */
    public $inquiry;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($inquiry)
    {
        $this->inquiry = $inquiry;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->inquiry->contact_email, $this->inquiry->contract_name)
                    ->subject($this->inquiry->contact_subject)
                    // ->text("haha")
                    ->view('email.inquiry');
    }
}
