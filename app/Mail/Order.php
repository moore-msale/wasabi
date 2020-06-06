<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Order extends Mailable
{
    use Queueable, SerializesModels;
    public $newCart;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($newCart)
    {
        $this->newCart = $newCart;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('wasabi@wasabi.kg')->subject('Новый заказ с сайта Wasabi"
')->markdown('mail.order');
    }
}
