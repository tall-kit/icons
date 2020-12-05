<?php

namespace TallKit\Icons\Tests;

use Orchestra\Testbench\TestCase;
use TallKit\Icons\IconsServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [IconsServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
