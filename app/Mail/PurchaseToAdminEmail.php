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
        $name = $this->request->shipping_name ? $this->request->shipping_name : $this->request->billing_name;
        $email = $this->request->shipping_email ? $this->request->shipping_email : $this->request->billing_email;
        return $this->from($email, $name)
                    ->subject($name . ' have made purchase')
                    ->view('email.purchasetoadmin')
                    ->attach('storage/deliveryOrders/' . $this->order->id . '.pdf', [
                        'as'=> 'delivery-order-'.$this->order->id.'.pdf',
                        'mime' => 'application/pdf',
                    ]);
    }
}
