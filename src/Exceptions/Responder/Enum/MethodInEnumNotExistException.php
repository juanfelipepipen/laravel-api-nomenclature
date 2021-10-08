<?php

namespace Pipen\ApiNomenclature\Exceptions\Responder\Enum;

use JetBrains\PhpStorm\Pure;
use Pipen\ApiNomenclature\Exceptions\ApiNomenclatureException;
use Throwable;

class MethodInEnumNotExistException extends ApiNomenclatureException
{
    #[Pure]
    public function __construct($message = "", $code = 500, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}