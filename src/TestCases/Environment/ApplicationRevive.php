<?php
/** @noinspection PhpUnused */

namespace Pipen\ApiNomenclature\TestCases\Environment;

use Illuminate\Support\Facades\Artisan;
use Pipen\ApiNomenclature\Base\ApiTestBase;

class ApplicationRevive extends ApiTestBase
{

    /**
     * Up application
     *
     * @return void
     */
    public function test_up_application(): void
    {
        Artisan::call('up');
    }
}