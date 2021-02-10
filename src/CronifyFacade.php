<?php

namespace Schubu\Cronify;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Schubu\Cronify\Skeleton\SkeletonClass
 */
class CronifyFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'cronify';
    }
}
