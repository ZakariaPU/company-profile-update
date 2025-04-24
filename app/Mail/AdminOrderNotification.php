<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminOrderNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $orderData;

    public function __construct($orderData)
    {
        $this->orderData = $orderData;
    }

    public function build()
    {
        return $this->subject('Pesanan Katering Baru')
                    ->markdown('emails.admin-notification');
    }
}
