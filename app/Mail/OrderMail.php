<?php

namespace App\Mail;

use App\Models\Propal;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The message instance.
     *
     * @var \App\Models\Propal
     */
    public $propal;

    /**
     * Create a new message instance.
     *
     * @var \App\Models\Propal
     * @return void
     */
    public function __construct(Propal $propal)
    {
        $this->propal = $propal;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Compra CD-SOLEC')->markdown('emails.order');
    }
}
