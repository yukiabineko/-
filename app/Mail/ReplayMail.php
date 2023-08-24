<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReplayMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
        string $email,
        string $subject,
        string $replay,
    )
    {
        $this->email = $email;
        $this->subject = $subject;
        $this->replay = $replay;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to( $this->email )
            ->subject( $this->subject )
            ->from('abineko@yukiabineko.sakura.ne.jp')
            ->text('emails.replay')
            ->with([
                'context' => $this->replay
            ]);
    }
}
