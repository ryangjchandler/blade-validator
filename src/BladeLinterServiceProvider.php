<?php

namespace RyanChandler\BladeLinter;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use RyanChandler\BladeLinter\Commands\LintCommand;

class BladeLinterServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('blade-linter')
            ->hasConfigFile()
            ->hasCommand(LintCommand::class);
    }
}
