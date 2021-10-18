<?php

namespace Pipen\ApiNomenclature;

use Pipen\ApiNomenclature\Responder\Enum\EnumResponder;
use Pipen\ApiNomenclature\Responder\Exceptions\ExceptionResponder;
use Pipen\ApiNomenclature\Response\ResponseNomenclaturePreparation;
use Pipen\ApiNomenclature\Validator\ValidatorFacadeTrait;

class ServiceBase
{
    use ExceptionResponder, EnumResponder, ResponseNomenclaturePreparation, ValidatorFacadeTrait;
}
