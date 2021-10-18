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
    public function validator(array $params, array $rules)
    {
        $validator = Validator::make($params, $rules);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors());
        }
    }
}