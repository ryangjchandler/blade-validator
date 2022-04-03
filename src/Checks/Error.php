<?php

namespace RyanChandler\BladeValidator\Checks;

use Stringable;

class Error implements Stringable
{
    public function __construct(public int $line, public string $message)
    {

    }

    public function __toString(): string
    {
        return sprintf('%d: %s', $this->line, $this->message);
    }
}
