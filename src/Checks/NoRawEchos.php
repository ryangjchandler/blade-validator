<?php

namespace RyanChandler\BladeLinter\Checks;

class NoRawEchos implements Check
{
    public function check(string $source): array
    {
        $lines = explode(PHP_EOL, $source);
        $errors = [];

        foreach ($lines as $i => $line) {
            $matched = preg_match_all("/(?<!@){!!\s*(.+?)\s*!!}(\r?\n)?/", $line, $matches);

            if (! $matched) {
                continue;
            }

            $errors[] = new Error($i + 1, 'Found a raw echo.');
        }

        return $errors;
    }
}
