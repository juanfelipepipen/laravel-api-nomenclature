<?php

namespace Pipen\ApiNomenclature\Response;

use Illuminate\Http\JsonResponse;
use Pipen\ApiNomenclature\Responder\Enum\EnumResponder;

trait ResponseNomenclaturePreparation
{
    use EnumResponder;

    /**
     * @var mixed $enumResponseValue
     */
    protected mixed $enumResponseValue = null;

    /**
     * @var JsonResponse|null $enumResponseJson
     */
    protected JsonResponse|null $enumResponseJson = null;

    /**
     * Prepare nomenclature response complete
     *
     * @param mixed|null $value
     * @param array      $enum
     * @param array      $enumArgs
     *
     * @return \Pipen\ApiNomenclature\Response\ResponseNomenclature
     * @throws \Pipen\ApiNomenclature\Exceptions\ApiNomenclatureException
     */
    public function nomenclature(mixed $value = null, array $enum = [], array $enumArgs = []): ResponseNomenclature
    {
        // Set value
        $this->nomenclatureValue($value);

        // Set enum response
        if (sizeof($enum) == 2) $this->nomenclatureEnum($enum[0], $enum[1], $enumArgs);

        return $this->nomenclatureResponse();
    }

    /**
     * Set value at method response got
     *
     * @param mixed $value
     *
     * @return $this
     */
    public function nomenclatureValue(mixed $value): static
    {
        $this->enumResponseValue = $value;
        return $this;
    }

    /**
     * Set response value from enum schema generator in json format
     *
     * @param string $enumClass
     * @param string $enumMethod
     * @param array  $arguments
     *
     * @return \Pipen\ApiNomenclature\Response\ResponseNomenclaturePreparation
     *
     *
     * @throws \Pipen\ApiNomenclature\Exceptions\ApiNomenclatureException
     */
    public function nomenclatureEnum(string $enumClass, string $enumMethod, array $arguments): static
    {
        $this->enumResponseJson = $this->prepareEnum($enumClass, $enumMethod, $arguments);
        return $this;
    }

    /**
     * Return nomenclature response generated
     *
     * @return \Pipen\ApiNomenclature\Response\ResponseNomenclature
     */
    public function nomenclatureResponse(): ResponseNomenclature
    {
        $nomenclatureResponse = new ResponseNomenclature();
        $nomenclatureResponse->setValueResponse($this->enumResponseValue);
        $nomenclatureResponse->setJsonResponse($this->enumResponseJson);

        return $nomenclatureResponse;
    }
}