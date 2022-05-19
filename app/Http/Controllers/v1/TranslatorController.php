<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Models\Translated;
use App\Services\v1\Telegram\Service;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Stichoza\GoogleTranslate\GoogleTranslate;

class TranslatorController extends Controller
{
    /**
     * @var array|string[]
     */
    protected array $languages = [
        'en',
        'tr',
        'try'
    ];

    /**
     * @var array
     */
    protected array $entities = [];

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        try {

            $firstName = $request->input('message.from.first_name');
            $username = $request->input('message.from.username');
            $text = $request->input('message.text');
            $entities = $request->input('message.entities') ?? false;

            if (!$entities) {
                return response()->json([
                    'status' => false,
                    'message' => 'Message is not command.',
                ]);
            }

            $this->entities = $entities[0];

            $command = $this->getCommand($text, $this->entities);
            if (!$command) {
                return response()->json([
                    'status' => false,
                    'message' => 'This language is not currently supported.',
                ]);
            }

            $data = [
                'first_name' => $firstName,
                'username' => $username,
                'request_text' => $text,
                'log' => json_encode($request->input()),
            ];

            $recordId = Translated::query()
                ->insertGetId($data);

            $text = substr($text, ($this->entities['length'] + 1));

            return $this->convert($text, $command, $recordId);

        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * @param string $text
     * @param array $entities
     * @return false|string
     */
    protected function getCommand(string $text, array $entities)
    {
        $command = substr($text, ($entities['offset'] + 1), ($entities['length'] - 1));

        if (!in_array($command, $this->languages)) {
            return false;
        }

        return $command;
    }


    /**
     * @param $text
     * @param $command
     * @param $recordId
     * @return JsonResponse
     * @throws \ErrorException
     */
    private function convert($text, $command, $recordId): JsonResponse
    {
        $keyword = new GoogleTranslate($command);

        $translatedText = $keyword->translate($text);

        $recordComplete = [
            'command' => $command,
            'language_code' => $command,
            'response_text' => $translatedText,
            'status' => true,
        ];

        Translated::query()
            ->where('id', $recordId)
            ->update($recordComplete);

        (new Service())->sendMessage($translatedText);

        return response()->json([
            'status' => true,
            'message' => 'The conversion is complete.',
            'recordId' => $recordId
        ]);
    }
}
