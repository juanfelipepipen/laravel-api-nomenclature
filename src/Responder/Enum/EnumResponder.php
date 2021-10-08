<?php

namespace Pipen\ApiNomenclature\Responder\Enum;

use Illuminate\Http\JsonResponse;
use Pipen\ApiNomenclature\Exceptions\Responder\Enum\EmumResponseFormatIncorrectException;
use Pipen\ApiNomenclature\Exceptions\Responder\Enum\EnumClassNotFoundException;
use Pipen\ApiNomenclature\Exceptions\Responder\Enum\EnumResponseFormatIncorrectException;
use Pipen\ApiNomenclature\Exceptions\Responder\Enum\MethodInEnumNotExistException;
use Throwable;

trait EnumResponder
{
    public mixed $enum;

    public array $enumsResponses = array();

    /**
     * Add one enum to the list
     *
     * @param string $enumClass
     *
     * @return void
     */
    public function addEnum(string $enumClass): void
    {
//        if ($this->validateEnumClass($enumClass)) {
//            $this->enum = $enumClass();
//        }
    }

    /**
     * Add list at authorized enums
     *
     * @param array $enums
     *
     * @return void
     */
    public function addEnums(array $enums): void
    {
        // TODO.
    }

    /**
     * Prepare response for enum
     *
     * @param string $enumClass
     * @param string $enumMethod
     * @param array  $arguments
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Pipen\ApiNomenclature\Exceptions\ApiNomenclatureException
     */
    public function prepareEnum(string $enumClass, string $enumMethod, array $arguments): JsonResponse
    {
        $this->validateEnumClass($enumClass, $enumMethod, throw : true);

        $enumInstance = new $enumClass();
        $response     = call_user_func_array([$enumInstance, $enumMethod], $arguments);

        if (!($response instanceof JsonResponse)) {
            throw new EnumResponseFormatIncorrectException();
        }

        return $response;
    }

    /**
     * Validate if enum class is correct and instantiable
     *
     * @param string $class
     * @param string $method
     * @param bool   $throw
     *
     * @return bool
     * @throws \Pipen\ApiNomenclature\Exceptions\ApiNomenclatureException
     */
    protected function validateEnumClass(string $class, string $method, bool $throw = false): bool
    {
        $isEnumValid  = false;
        $instanceEnum = null;

        try {
            $instanceEnum = new $class();
            $isEnumValid  = true;
        } catch (Throwable) {
            // Nothing to do
        }

        # [Throw]
        if ($throw && !$isEnumValid) {
            throw new EnumClassNotFoundException();
        }

        if (!method_exists($instanceEnum, $method)) {
            throw new MethodInEnumNotExistException();
        }

        return $isEnumValid;
    }
}
