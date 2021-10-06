<?php

namespace Pipen\ApiNomenclature\Response;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class EnumResponse extends Response
{
    /**
     * Generate JSONm api response base
     *
     * @param string $message
     * @param string $code
     * @param int    $status
     * @param array  $data
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public static function apiResponse(string $message, string $code, int $status, array $data = []): JsonResponse
    {
        return response()->json([
            'message' => $message,
            'code'    => $code,
            'status'  => $status,
            'data'    => $data
        ], $status);
    }
}