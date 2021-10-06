<?php

namespace Pipen\ApiNomenclature\Response;

use Illuminate\Http\JsonResponse;

class ResponseNomenclature
{
    /**
     * @var mixed $value
     */
    protected mixed $value;

    /**
     * @var JsonResponse $json
     */
    protected JsonResponse $json;

    /**
     * Class constructor
     */
    public function __construct()
    {

    }

    public function setJsonResponse(JsonResponse $jsonResponse): void
    {
        $this->json = $jsonResponse;
    }

    /**
     * Set default response value
     *
     * @param mixed $value
     */
    public function setValueResponse(mixed $value): void
    {
        $this->value = $value;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getJson(): JsonResponse
    {
        return $this->json;
    }

    /**
     * @return mixed
     */
    public function getValue(): mixed
    {
        return $this->value;
    }
}