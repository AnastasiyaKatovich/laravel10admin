<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelpController extends Controller
{
    //
    public function getForm(){
        return view('help');
    }

    public function postForm(Request $request){
        abort_if(!$request->body, 418);
        $to      = 'sincerova@tut.by';
        $subject = 'HotTicket сообщение от пользователя';
        $message = $request->body;
        $headers = 'From: sincerova@tut.by' . "\r\n" .
            'Reply-To: sincerova@tut.by' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        mail($to, $subject, $message, $headers);
        // return redirect()->back();
    }

}
