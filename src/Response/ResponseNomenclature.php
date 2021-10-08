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
     * @var JsonResponse|null $json
     */
    protected JsonResponse|null $json;

    /**
     * Class constructor
     */
    public function __construct()
    {
        // TODO.
    }

    public function setJsonResponse(JsonResponse|null $jsonResponse): void
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
     * @return \Illuminate\Http\JsonResponse|null
     */
    public function getJson(): JsonResponse|null
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