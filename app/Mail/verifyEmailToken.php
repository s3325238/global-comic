<?php

namespace App\Mail;

use App\User;
use App\Settings;
use Illuminate\Support\Facades\DB;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class verifyEmailToken extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $setting = Settings::find(1);
        $mail_username = $setting->MAIL_USERNAME;
        return $this->subject('Global Comics | Please verify your email address')
            ->from(
                $mail_username,
                'Global Comics Email Verification Service'
            )
            ->view('mail.verifyEmailHTML');
    }
}
