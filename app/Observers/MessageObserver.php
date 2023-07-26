<?php

namespace App\Observers;

use App\Models\Message;

class MessageObserver
{
    /**
     * Handle the Message "created" event.
     */
    public function created(Message $message): void
    {
        $webhookurl = "https://discord.com/api/webhooks/1120781733948837949/5_n4hm6kmq7tNBDFOBRYp4JYHIDIm05wqQOHcr-hNrIb8FpDE_1g3W3JZ7T8-2T2rmMk";

        $timestamp = date("c", strtotime("now"));

        $json_data = json_encode([
          "content" => $message->body,

          "tts" => false,

          // "file" => "",

          // Embeds Array
          "embeds" => [
            [
              // Embed Title
              "title" => "PHP - Send message to Discord (embeds) via Webhook",

              // Embed Type
              "type" => "rich",

              // Embed Description
              "description" => "Description will be here, someday, you can mention users here also by calling userID <@12341234123412341>",

              // URL of title link
              "url" => "https://github.com/mikhalkevich",

              // Timestamp of embed must be formatted as ISO8601
              "timestamp" => $timestamp,

              // Embed left border color in HEX
              "color" => hexdec( "3366ff" ),

              // Footer
              "footer" => [
                "text" => "GitHub.com/Mikhalkevich",
                "icon_url" => "http://erud.by/accounts/1/s_1.jpg"
              ],

              // Image to send
              "image" => [
                "url" => "http://erud.by/accounts/1/s_1.jpg"
              ],

              "author" => [
                "name" => "Alexandr",
                "url" => "https://github.com/mikhalkevich/"
              ],

              // Additional Fields array
              "fields" => [
                // Field 1
                [
                  "name" => "Field #1 Name",
                  "value" => "Field #1 Value",
                  "inline" => false
                ],
                // Field 2
                [
                  "name" => "Field #2 Name",
                  "value" => "Field #2 Value",
                  "inline" => true
                ]
                // Etc..
              ]
            ]
          ]

        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );


        $ch = curl_init( $webhookurl );
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        curl_setopt( $ch, CURLOPT_POST, 1);
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $json_data);
        curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt( $ch, CURLOPT_HEADER, 0);
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

        $response = curl_exec( $ch );
        //echo $response;
        curl_close( $ch );

    }

    /**
     * Handle the Message "updated" event.
     */
    public function updated(Message $message): void
    {
        //
    }

    /**
     * Handle the Message "deleted" event.
     */
    public function deleted(Message $message): void
    {
        //
    }

    /**
     * Handle the Message "restored" event.
     */
    public function restored(Message $message): void
    {
        //
    }

    /**
     * Handle the Message "force deleted" event.
     */
    public function forceDeleted(Message $message): void
    {
        //
    }
}
