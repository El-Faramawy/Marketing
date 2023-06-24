<?php


namespace App\Http\Traits;


use Illuminate\Support\Facades\Mail;

trait SendEmail
{
    protected function send_EmailFun($email,$text,$subject){
        $contact_company=' Marketing ';
        Mail::send([
            'html' => 'Email.email-tem'],
            ['text' => $text,'email'=>$email,'logo'=>setting()->logo,'title'=>' Marketing '],
            function($message) use ($email, $subject, $contact_company)
            {
                $message->to($email,$contact_company)->from('mts55hello@gmail.com',$contact_company)->subject($subject);
            }
        );
    }//end fun

}//end trait
