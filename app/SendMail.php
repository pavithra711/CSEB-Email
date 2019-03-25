<?php

namespace App;
use Illuminate\Support\Facades\Mail;
class SendMail
{
    public static function send($email ,$subject, $message)
    {

        $username = env('MAIL_USERNAME', NULL);
        if(!($username))
            return 0;

        $message_ = (string) $message;

        try {
            Mail::send([], [], function ($message) use ($email, $message_, $username,$subject) {
                $message->from($username, 'MAIL HANGER');
                $message->to($email);
                $message->subject($subject);
                $message->setBody($message_ , 'text/html');
                $message->priority(3);
            });
        } catch (Exception $e) {
            return 0;
        }
        return 1;
    }
}



