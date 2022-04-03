<?php

namespace RyanChandler\BladeValidator\Checks;

interface Check
{
    /**
     * @param  string  $source
     * @return Error[]
     */
    public function check(string $source): array;
}
