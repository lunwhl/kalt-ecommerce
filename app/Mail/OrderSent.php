<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderSent extends Mailable
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
        return $this->from("info@kalt.com.my")
                    ->subject('Kalt')
                    ->view('email.orderSent')
                    ->attach('storage/deliveryOrders/' . $this->order->id . '.pdf', [
                        'as'=> 'delivery-order-'.$this->order->id.'.pdf',
                        'mime' => 'application/pdf',
                    ]);;
    }
}
