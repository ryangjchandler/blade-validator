<?php

namespace RyanChandler\BladeValidator\Commands;

use RyanChandler\BladeValidator\Checks\Error;
use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Symfony\Component\Finder\Finder;
use RyanChandler\BladeValidator\BladeValidator;
use Symfony\Component\Finder\SplFileInfo;

use function Termwind\render;

class LintCommand extends Command
{
    public $signature = 'blade:lint';

    public $description = 'Lint your Blade templates.';

    protected BladeValidator $linter;

    /** @var array<string, \RyanChandler\BladeValidator\Checks\Error[]> */
    protected array $errors = [];

    public function handle(BladeValidator $linter): int
    {
        $this->linter = $linter;

        foreach (config('view.paths') as $path) {
            $this->processPath($path);
        }

        $this->newLine(2);

        if (count($this->errors) <= 0) {
            render(<<<'HTML'
                <div class="bg-green w-1/2 px-2 py-1 text-black">
                    [OK] No errors!
                </div>
            HTML);

            return self::SUCCESS;
        }

        foreach ($this->errors as $file => $errors) {
            $this->table(['Line', $file], array_map(fn (Error $error) => [$error->line, $error->message], $errors));
        }

        return self::SUCCESS;
    }

    protected function processPath(string $path): void
    {
        $files = Finder::create()->in($path)->files()->name('*.blade.php');

        $this->withProgressBar($files, function (SplFileInfo $file) use ($path) {
            $contents = $file->getContents();

            $this->errors = array_merge($this->errors, [
                str($file->getRealPath())->after($path)->trim(DIRECTORY_SEPARATOR)->toString() => $this->linter->process($contents)
            ]);
        });

        $this->errors = array_filter($this->errors);
    }
}
