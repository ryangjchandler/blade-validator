<?php

use RyanChandler\BladeValidator\Checks\InvalidDirectives;
use RyanChandler\BladeValidator\Checks\NoRawEchos;

return [

    'checks' => [
        NoRawEchos::class,
        InvalidDirectives::class,
    ],

];
