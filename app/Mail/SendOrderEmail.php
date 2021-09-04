<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendOrderEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->data['email_app'], $this->data['name_app'])
                   ->view('admin.transaction.email')
                   ->subject($this->data['name_app'].' - TELAH DIKIRIM')
                   ->with(
                    [
                        'resi'        => $this->data['resi'],
                        'tanggal'     => $this->data['tanggal'],
                        'checkout_id' => $this->data['checkout'],
                    ]);
    }
}
