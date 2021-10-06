<?php

namespace Pipen\ApiNomenclature\Exceptions;

use Exception;
use JetBrains\PhpStorm\Pure;

class ApiNomenclatureException extends Exception
{
    #[Pure]
    public function __construct()
    {
        parent::__construct();
    }
}