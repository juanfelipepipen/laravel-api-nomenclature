<?php
/** @noinspection PhpUnused */

namespace Pipen\ApiNomenclature\TestCases\Environment;

use Illuminate\Contracts\Http\Kernel;
use Pipen\ApiNomenclature\Base\ApiTestBase;
use Pipen\ApiNomenclature\Traits\DatabaseConfigs;

class ApplicationMiddleware extends ApiTestBase
{
    use DatabaseConfigs;

    /**
     * Class constructor
     *
     * @param bool $useAppUrl
     */
    public function __construct(bool $useAppUrl = false)
    {
        parent::__construct($useAppUrl);
        $this->addTestsStoppable(['*']);
    }

    /**
     * Check if middleware for protect database is set in app kernel
     *
     * @return void
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     * @throws \Exception
     */
    public function test_check_database_for_tests(): void
    {
        $isUsingMiddleware = app()->make(Kernel::class)->hasMiddleware('Pipen\ApiNomenclature\Middleware\UseTestDatabaseMiddleware');

        if (!$isUsingMiddleware) {
            throw new \Exception('The "UseTestDatabaseMiddleware" middleware has not been set in the kernel');
        }
    }

    /**
     * Set database for storage information in tests
     *
     * @return void
     */
    public function test_database_config(): void
    {
        $this->setDatabaseConnection(true);
    }
}