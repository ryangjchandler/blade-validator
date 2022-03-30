<?php

namespace RyanChandler\BladeLinter\Commands;

use Illuminate\Console\Command;

class LintCommand extends Command
{
    public $signature = 'blade:lint';

    public $description = 'Lint your Blade templates.';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
