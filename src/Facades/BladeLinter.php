<?php

namespace RyanChandler\BladeLinter\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \RyanChandler\BladeLinter\BladeLinter
 */
class BladeLinter extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'blade-linter';
    }
}
