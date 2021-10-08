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
    protected mixed $enumResponseValue;

    /**
     * @var JsonResponse $enumResponseJson
     */
    protected JsonResponse $enumResponseJson;

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
     * @throws \Pipen\ApiNomenclature\Exceptions\Responder\Enum\EnumClassNotFoundException
     * @throws \Pipen\ApiNomenclature\Exceptions\Responder\Enum\MethodInEnumNotExistException
     * @throws \Pipen\ApiNomenclature\Exceptions\Responder\Enum\EnumResponseFormatIncorrectException
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