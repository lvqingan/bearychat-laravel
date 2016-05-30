<?php

namespace Lvqingan\BearychatLaravel;
use GuzzleHttp\Client as HttpClient;
use Carbon\Carbon;

class BearyChat
{
    /**
     * @var string
     */
    protected $incomingHookUrl = null;

    /**
     * BearyChat constructor.
     */
    public function __construct()
    {
        $this->incomingHookUrl = config('bearychat.incoming_hook_url');
    }

    public function sendMessage($title, $text)
    {
        $postData = [
            'text' => Carbon::now()->toDateTimeString(),
            'markdown' => false,
            'attachments' => [
                [
                    'title' => $title,
                    'text' => $text,
                    'color' => '#ffa500'
                ]
            ]
        ];
        $postString = json_encode($postData);
        $client = new HttpClient();
        $client->request('POST', $this->incomingHookUrl, [
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'body' => $postString
        ]);    
    }
}
