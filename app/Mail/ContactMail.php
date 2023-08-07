<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
        string $name,
        string $email,
        string $title,
        string $context,
    )
    {
        $this->name = $name;
        $this->email = $email;
        $this->title = $title;
        $this->context = $context;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to('yuki1980426@gmail.com')
            ->subject('お問合せ内容')
            ->from('abineko@yukiabineko.sakura.ne.jp')
            ->text('emails.contact')
            ->with([
                'name' => $this->name,
                'title' => $this->title,
                'context' => $this->context
            ]);
    }
}
