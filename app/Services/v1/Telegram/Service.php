<?php

namespace App\Services\v1\Telegram;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class Service
{
    /**
     * @param $url
     * @param $parameters
     * @return string
     */
    private function sendRequest($url, $parameters): string
    {
        $response = Http::get($url, $parameters);

        if ($response->failed()) {
            Log::error('Telegram service error.');
        }

        return $response->body();
    }

    /**
     * @param $message
     * @return string
     */
    public function sendMessage($message): string
    {
        $url = env('TELEGRAM_API_URL') . '/' . env('TELEGRAM_API_KEY') . '/sendMessage';

        $parameters = [
            'chat_id' => env('TELEGRAM_CHAT_ID'),
            'parse_mode' => 'HTML',
            'disable_web_page_preview' => true,
            'text' => $message,
        ];

        return $this->sendRequest($url, $parameters);
    }
}