<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderCompleted extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The order array
     * @var
     */
    public $order;

    /**
     * Create a new message instance.
     *
     * @return void
     * @param $order
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
        return $this->view('mail')
            ->from('ice@dronedeliver.com')
            ->with([
                'container' => $this->order['container'],
                'scoops' => $this->order['scoops'],
                'toppings' => $this->order['toppings'],
                'subtotal' => $this->order['subtotal'],
                'total' => $this->order['total']
            ]);
    }
}
