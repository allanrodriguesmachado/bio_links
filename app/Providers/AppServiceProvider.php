<?php

namespace App\Providers;

use Illuminate\Support\Facades\Password;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        \Illuminate\Validation\Rules\Password::default(
            function() {
                $rule = \Illuminate\Validation\Rules\Password::min(8);

                return $this->app->isProduction()
                    ? $rule->mixedCase()->uncompromised()
                    : $rule;
            }
        );
    }
}
