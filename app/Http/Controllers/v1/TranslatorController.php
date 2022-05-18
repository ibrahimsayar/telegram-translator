<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\TranslatorConvertRequest;
use App\Models\Translated;
use App\Services\v1\Telegram\Service;
use Error;
use Exception;
use Illuminate\Http\JsonResponse;
use Stichoza\GoogleTranslate\GoogleTranslate;

class TranslatorController extends Controller
{

    /**
     * @param TranslatorConvertRequest $request
     * @return JsonResponse
     */
    public function index(TranslatorConvertRequest $request): JsonResponse
    {

        $firstName = $request->input('message.from.first_name');
        $username = $request->input('message.from.username');
        $text = $request->input('message.text');

        $data = [
            'first_name' => $firstName,
            'username' => $username,
            'request_text' => $text,
            'log' => json_encode($request->input()),
        ];

        $recordId = Translated::query()
            ->insertGetId($data);

        $languageCode = $this->getLanguageCode($text);
        if (!$languageCode) {
            (new Service())->sendError('Language not found');
            throw new Error('Language not found');
        }

        $text = substr($text, 4);

        return $this->convert($text, $languageCode, $recordId);
    }

    /**
     * @param string $text
     * @return false|string
     */
    protected function getLanguageCode(string $text)
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

    /**
     * @param $text
     * @param $languageCode
     * @return JsonResponse
     */
    private function convert($text, $languageCode, $recordId): JsonResponse
    {
        try {
            $keyword = new GoogleTranslate($languageCode);

            $translatedText = $keyword->translate($text);

            $data = [
                'command' => $languageCode,
                'language_code' => $languageCode,
                'response_text' => $translatedText,
                'status' => true,
            ];

            Translated::query()
                ->where('id', $recordId)
                ->update($data);

            (new Service())->sendMessage($translatedText);

            return response()->json([
                'status' => 'success',
            ]);

        } catch (Exception $e) {
            throw new Error($e->getMessage());
        }
    }
}
