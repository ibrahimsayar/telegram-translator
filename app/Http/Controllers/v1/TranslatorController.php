<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\TranslatorConvertRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TranslatorController extends Controller
{
    public function index(TranslatorConvertRequest $request): JsonResponse
    {
        $keyword = $request->validated('keyword');
    }
}
