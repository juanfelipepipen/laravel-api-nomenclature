<?php

namespace Pipen\ApiNomenclature\Exceptions\Responder\Enum;

use JetBrains\PhpStorm\Pure;

class EnumClassNotFoundException extends ApiNomenclatureException
{
    #[Pure]
    public function __construct() {
        parent::__construct();
    }
}