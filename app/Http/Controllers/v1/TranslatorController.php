<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\TranslatorConvertRequest;
use App\Models\Translated;
use App\Services\v1\Telegram\Service;
use Error;
use Illuminate\Http\JsonResponse;

class TranslatorController extends Controller
{
    public function index(TranslatorConvertRequest $request): JsonResponse
    {
        $firstName = $request->validated('message.from.first_name');
        $username = $request->validated('message.from.username');
        $text = $request->validated('message.text');


        $languageCode = $this->getLanguageCode($text);
        if (!$languageCode) {
            (new Service())->sendError('Language not found');
            throw new Error('Language not found');
        }

        $text = substr($text, -3);

        $data = [
            'first_name' => $firstName,
            'username' => $username,
            'request_text' => $text,
            'command' => $languageCode,
            'language_code' => $languageCode,
            'log' => json_encode($request->input()),
        ];

        Translated::query()
            ->insert($data);

    }

    /**
     * @param string $text
     * @return bool|string
     */
    private function getLanguageCode(string $text): bool|string
    {
        $languageCodes = [
            'tr',
            'en',
        ];

        $languageCode = substr($text, 1, 2);

        if (!in_array($languageCode, $languageCodes)) {
            return false;
        }

        return $languageCode;
    }
}
