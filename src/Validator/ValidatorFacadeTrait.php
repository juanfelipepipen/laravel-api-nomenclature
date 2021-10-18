<?php

namespace Pipen\ApiNomenclature\Validator;

use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

trait ValidatorFacadeTrait
{
    /**
     * Facade for validator make
     *
     * @param array $rules
     * @param array $params
     *
     * @return void
     */
    public function validator(array $rules, array $params)
    {
        $validator = Validator::make($rules, $params);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors());
        }
    }
}