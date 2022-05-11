<?php

namespace App\Services\v1\Telegram;

use Error;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Http;

class Service
{
    private function sendRequest($url, $parameters)
    {
        $response = Http::get($url, $parameters);

        if ($response->failed()) {
            Log::error('Telegram service error.');
        }

        return $response->body();
    }

    public function sendMessage($message)
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

    public function sendError($message)
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