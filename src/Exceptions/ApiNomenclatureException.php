<?php

namespace Pipen\ApiNomenclature\Exceptions;

use Exception;
use JetBrains\PhpStorm\Pure;
use Throwable;

class ApiNomenclatureException extends Exception
{
    #[Pure]
    public function __construct($message = "", $code = 500, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}