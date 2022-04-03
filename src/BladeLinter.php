<?php

namespace RyanChandler\BladeValidator;

class BladeValidator
{
    public function __construct(protected array $checks = [])
    {

    }

    /**
     * @param  class-string<\RyanChandler\BladeValidator\Checks\Check>  $check
     * @return $this
     */
    public function registerCheck(string $check): static
    {
        $this->checks = array_merge($this->checks, [$check]);

        return $this;
    }

    public function process(string $source): array
    {
        $errors = [];

        foreach ($this->checks as $check) {
            $check = app($check);

            $errors = array_merge($errors, $check->check($source));
        }

        return $errors;
    }
}
