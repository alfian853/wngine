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

    public static $Member=0,
                  $Company=1;

    private $name,$token,$email;
    private $mailType=null,$clientType=null;

    public function __construct()
    {

    }

    public function setResetPassMail($email,$name,$token,$userType){
      $this->mailType = Mailer::RESET_PWD;
      $this->clientType =  (($userType == Mailer::$Member)?"member":"company");
      $this->name = $name;
      $this->token = $token;
      $this->email = $email;
    }

    public function setRegistMail($name,$token,$userType){
      $this->mailType = Mailer::REGISTER;
      $this->clientType =  (($userType == Mailer::$Member)?"member":"company");
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
                            'token' => $this->token,
                            'type' => $this->clientType]);
      }
      else if($this->mailType == Mailer::RESET_PWD){
        return $this->from('wngine.noreply@gmail.com')->subject('Wngine account registration confirmation')
                    ->view('mails.reset_pwd')
                    ->with(['email' => $this->email,
                            'name' => $this->name,
                            'token' => $this->token,
                            'type' => $this->clientType]);
      }


  }
}
