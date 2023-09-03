<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OTPMail extends Mailable
{
    use Queueable, SerializesModels;
    private $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user=$user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->from('projectprince12@gmail.com')
               ->subject('OTP to change password in Student Report Handling System')
               ->view('Email.otpMail',["user"=>$this->user,"title"=>"Reset Passwprd OTP"]);
        // return $this->view('Email.adminMail');
    }
}
