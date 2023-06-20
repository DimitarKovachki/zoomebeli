<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CheckoutMailable extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order , $items , $riserve_type)
    {
        $this->order = $order;
        $this->items = $items;
        $this->riserve_type = $riserve_type;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if($this->riserve_type == 'user') {
            return $this->subject('Поръчка от zoomebeli.bg')->view('mails.checkout_user',['order'=> $this->order, 'items'=> $this->items]);
        } else {
            return $this->subject('Поръчка от zoomebeli.bg')->view('mails.checkout_admin',['order'=> $this->order, 'items'=> $this->items]);
        }
    }
}
