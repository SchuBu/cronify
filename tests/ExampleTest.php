<?php

namespace Schubu\Cronify\Tests;

use Orchestra\Testbench\TestCase;
use Schubu\Cronify\CronifyServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [CronifyServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
