<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderProcess extends Mailable
{
    use Queueable, SerializesModels;

    public $user_order;

    public function __construct($user_order)
    {
        $this->user_order = $user_order;
    }

    public function build()
    {
        //dd($this->user_order['cart']);
        /*
                foreach($this->user_order['cart']->items as $item){


                    echo $item['item_title'];
                    echo $item['qty'];
                    echo $item['item_price'];
                    echo $item['total_item_price'];
                    echo $item['item_pic'];
                }

               echo $this->user_order['cart']->totalQty ;
                echo $this->user_order['cart']->totalPrice ;

                */

               return $this->from('shop@thebag.bg')
                    ->subject('Успешна поръчка в thebag.bg')
                    ->view('emails.order_process')
                    ->with('user_order', $this->user_order);
    }
}
