<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Mailer extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public const REGISTER=0,
                 RESET_PWD=1;

    private $name,$token;
    private $mailType=null;

    public function __construct()
    {

    }

    public function setRegistMail($name,$token){
      $this->mailType = Mailer::REGISTER;
      $this->name = $name;
      $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      if($this->mailType == Mailer::REGISTER){
        return $this->from('wngine.noreply@gmail.com')->subject('Wngine account registration confirmation')
                    ->view('mails.register')
                    ->with(['name' => $this->name,
                            'token' => $this->token]);
      }
      else if($this->mailType == Mailer::REGISTER){
        die('not implemented yet');
      }


  }
}
