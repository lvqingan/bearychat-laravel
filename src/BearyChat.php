<?php

namespace Lvqingan\BearychatLaravel;
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
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->webhook);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json"
        ));

        Curl\Util::execute($ch); 
    }
}
