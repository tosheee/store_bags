<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderProcess extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $user_order;

    public function __construct($user_order)
    {
        $this->user_order = $user_order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('shop@thebags.bg')
            ->subject('Поръчката е приета!')
            ->view('emails.order_process')
            ->with('user_order', $this->user_order);
    }
}
