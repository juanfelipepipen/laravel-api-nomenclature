<?php

namespace Pipen\ApiNomenclature\Validator;

use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

trait ValidatorFacadeTrait
{
    /**
     * Facade for validator make
     *
     * @param array $data
     * @param array $rules
     * @param array $messages
     * @param array $customAttributes
     *
     * @return void
     */
    public function validator(array $data, array $rules, array $messages = [], array $customAttributes = []): void
    {
        $validator = Validator::make($data, $rules, $messages, $customAttributes);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors());
        }
    }
}