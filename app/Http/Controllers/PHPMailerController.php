<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class PHPMailerController extends Controller
{
    public function sendMail(Request $request)
    {
        require base_path("vendor/autoload.php");
        $mail = new PHPMailer(true);
        // Server settings
        try {
            $body =  $request->emailBody.' <br/> '.$request->emailEmail;
            $mail->isSMTP();
            $mail->SMTPDebug = 0;
            $mail->Debugoutput = 'html';
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->Username = 'kotovichanastasi@gmail.com';
            $mail->Password = 'jgqrjdpiftvfwsla';
            // Sender &amp; Recipient
            $mail->FromName = $request->emailName;
            $mail->addAddress('kotovichanastasi@gmail.com');

            if(isset($_FILES['emailAttachments'])) {
                for ($i=0; $i < count($_FILES['emailAttachments']['tmp_name']); $i++) {
                    $mail->addAttachment($_FILES['emailAttachments']['tmp_name'][$i], $_FILES['emailAttachments']['name'][$i]);
                }
            }
            // Content
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';
            $mail->Encoding = 'base64';
            $mail->Body = $body;
            $mail->Subject = $request->emailSubject;


            if ($mail->send()) {

                return back()->with("success", "Email has been sent.");
            } else {

                return back()->with("failed", "Email not sent.")->withErrors($mail->ErrorInfo);
            }
        } catch (Exception $e) {
            return back()->with('error','Message could not be sent.');
        }

    }

    public function email() {
        return view("help");
    }

}
