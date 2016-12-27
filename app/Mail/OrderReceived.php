<?php

namespace Store\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Store\Order;

class OrderReceived extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The order instance.
     *
     * @var Order
     */
    public $order;

    /**
     * Create a new message instance.
     *
     * @param Order $order the Order.
     */
    public function __construct(Order $order)
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
        $admin_email = env('MAIL_ADMIN_ADDRESS', 'manager@example.com');
        $admin_name = env('MAIL_ADMIN_NAME', 'Store Manager');
        return $this->view('emails.orders.received')
            ->bcc($admin_email, $admin_name)
            ->subject('[Galeiras] Order received');
    }
}
