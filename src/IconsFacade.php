<?php

namespace TallKit\Icons;

use Illuminate\Support\Facades\Facade;

/**
 * @see \TallKit\Icons\Skeleton\SkeletonClass
 */
class IconsFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'icons';
    }
}
