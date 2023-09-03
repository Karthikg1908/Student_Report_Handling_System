<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisterMail extends Mailable
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

        return $this->from('studentreporthandling@gmail.com')
               ->subject('Thank You For Activating Account in Student Report Handling System')
               ->view('Email.newUser',["user"=>$this->user,"title"=>"Register"]);
        // return $this->view('Email.adminMail');
    }
}
