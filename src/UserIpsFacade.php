<?php

namespace DevWorkout\UserIps;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Exfriend\UserIps\UserIpsClass
 */
class UserIpsFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-user-ips';
    }
}
