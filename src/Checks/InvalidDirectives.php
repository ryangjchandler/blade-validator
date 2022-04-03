<?php

namespace RyanChandler\BladeValidator\Checks;

use Illuminate\View\Compilers\BladeCompiler;

class InvalidDirectives implements Check
{
    public function __construct(protected BladeCompiler $compiler)
    {

    }

    public function check(string $source): array
    {
        $lines = explode(PHP_EOL, $source);
        $errors = [];

        foreach ($lines as $i => $line) {
            $matched = preg_match_all("/(?<!@)@(\w+(?:::\w+)?)([ \t]*)(\( ( (?>[^()]+) | (?3) )* \))?/x", $line, $matches);

            if (! $matched) {
                continue;
            }

            foreach ($matches[1] as $name) {
                // 1. Check if the directive is a custom one and that it exists.
                if (array_key_exists($name, $this->compiler->getCustomDirectives())) {
                    continue;
                }

                // 2. Check if it's a first-party directive.
                if (method_exists($this->compiler, "compile".ucfirst($name))) {
                    continue;
                }

                // 3. If not, there's a problem.
                $errors[] = new Error($i + 1, "Unrecognised Blade directive `{$name}`.");
            }
        }

        return $errors;
    }
}
