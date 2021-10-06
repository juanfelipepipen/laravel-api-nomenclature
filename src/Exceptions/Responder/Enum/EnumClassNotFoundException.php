<?php

namespace Pipen\ApiNomenclature\Exceptions\Responder\Enum;

use JetBrains\PhpStorm\Pure;
use Pipen\ApiNomenclature\Exceptions\ApiNomenclatureException;

class EnumClassNotFoundException extends ApiNomenclatureException
{
    #[Pure]
    public function __construct() {
        parent::__construct();
    }
}