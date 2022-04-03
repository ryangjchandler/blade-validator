<?php

namespace RyanChandler\BladeValidator;

use RyanChandler\BladeValidator\Commands\LintCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class BladeValidatorServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('blade-validator')
            ->hasConfigFile()
            ->hasCommand(LintCommand::class);
    }

    public function packageRegistered()
    {
        $this->app->singleton(BladeValidator::class, function ($app) {
            return new BladeValidator($app['config']->get('blade-validator.checks'));
        });
    }
}
