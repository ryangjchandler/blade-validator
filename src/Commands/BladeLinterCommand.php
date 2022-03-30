<?php

namespace RyanChandler\BladeLinter\Commands;

use Illuminate\Console\Command;

class BladeLinterCommand extends Command
{
    public $signature = 'blade-linter';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
