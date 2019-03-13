<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PurchaseToAdminEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The demo object instance.
     *
     * @var Demo
     */
    public $order;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->order->billing_email, $this->order->billing_name)
                    ->subject($this->order->billing_name . ' have made purchase')
                    ->view('email.purchasetoadmin')
                    ->attach('storage/deliveryOrders/' . $this->order->id . '.pdf', [
                        'as'=> 'delivery-order-'.$this->order->id.'.pdf',
                        'mime' => 'application/pdf',
                    ])
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
