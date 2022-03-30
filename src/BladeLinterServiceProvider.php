<?php

namespace RyanChandler\BladeLinter;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use RyanChandler\BladeLinter\Commands\BladeLinterCommand;

class BladeLinterServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('blade-linter')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_blade-linter_table')
            ->hasCommand(BladeLinterCommand::class);
    }
}
