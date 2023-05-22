<?php


use Illuminate\Support\Facades\Http;

if (!function_exists('send')){
    function send($data, $whatsappId)
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => config('app.token')
        ])->withBody(json_encode($data), 'application/json')->withOptions([
            'verify' => false,
        ])->post('https://graph.facebook.com/v16.0/' . $whatsappId . '/messages');

       return $response;
    }
}


if (!function_exists('sendMessages')) {
    function sendMessages($phone, $messages, $whatsappId, $token = null)
    {
        $data = [
            'messaging_product' => 'whatsapp',
            'recipient_type' => 'individual',
            'to' => $phone,
            'type' => 'text',
            'text' => [
                'preview_url' => false,
                'body' => $messages,
            ]
        ];

       $response =  send($data, $whatsappId);
       if ($response->ok()){
           return true;
       }

    }
}

if (!function_exists('sendWelcomeMessages')) {
    function sendWelcomeMessages($phone, $name_template, $whatsappId, $token = null)
    {
        $data = [
            'messaging_product' => 'whatsapp',
            'recipient_type' => 'individual',
            'to' => $phone,
            'type' => 'template',
            'template' => [
                'name' => $name_template,
                'language' => [
                    'code' => 'en_US',
                ],
            ]
        ];

        $response =  send($data, $whatsappId);
        if ($response->ok()){
            return true;
        }

    }
}
