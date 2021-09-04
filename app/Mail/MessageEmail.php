<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MessageEmail extends Mailable
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
                   ->view('admin.message.email')
                   ->subject($this->data['name_app'])
                   ->with(
                    [
                        'name'        => $this->data['name'],
                        'pesan'       => $this->data['pesan'],
                        'reply'       => $this->data['reply'],
                    ]);
    }
}
