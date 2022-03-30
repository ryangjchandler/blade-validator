<?php

use RyanChandler\BladeLinter\Checks\InvalidDirectives;
use RyanChandler\BladeLinter\Checks\NoRawEchos;

return [

    'checks' => [
        NoRawEchos::class,
        InvalidDirectives::class,
    ],

];
