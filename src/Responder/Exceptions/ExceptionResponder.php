<?php

namespace Pipen\ApiNomenclature\Responder\Exceptions;

use Illuminate\Http\JsonResponse;

trait ExceptionResponder
{
    /**
     * List of exceptions thrown with their answers
     *
     * @var array $preparedExceptionResponses
     */
    private array $preparedExceptionResponses = array();

    /**
     * Throw if condition is true and prepare future response
     *
     * @param bool   $condition
     * @param string $exceptionClass
     */
    public function throwAndPrepare(bool $condition, string $exceptionClass)
    {
        $exceptionExists = new $exceptionClass();

        if ($condition) {

        }
    }

    /**
     * Generate http response from a generated exception
     *
     * @param string      $exceptionClass
     * @param string|null $message
     * @param array       $data
     *
     * @return JsonResponse
     */
    public function exceptionResponder(string $exceptionClass, string $message = null, array $data = []): JsonResponse
    {
        return response()->json(['a']);
    }
}
