<?php

namespace Tests;

use TallKit\Icons\IconsServiceProvider;

/**
 * Class TestCase
 * @package Tests
 */
class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return [IconsServiceProvider::class];
    }

    /**
     * @param string $path
     * @return string
     */
    protected function resourcesPath(string $path): string
    {
        return __DIR__ . '/resources/' . $path;
    }
}
