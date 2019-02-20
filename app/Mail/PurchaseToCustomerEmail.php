<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PurchaseToCustomerEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The demo object instance.
     *
     * @var Demo
     */
    public $request, $order;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request, $order)
    {
        $this->request = $request;
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from("info@kalt.com.my")
                    ->subject('Kalt')
                    ->view('email.purchasetocustomer')
                    ->attach('storage/invoices/' . $this->order->id . '.pdf', [
                        'as'=> 'invoice.pdf',
                        'mime' => 'application/pdf',
                    ])
                    ->attach('storage/receipts/' . $this->order->id . '.pdf', [
                        'as'=> 'receipt.pdf',
                        'mime' => 'application/pdf',
                    ]);
    }
}
