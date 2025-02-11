<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\ServiceProvider;
use phpDocumentor\Reflection\Types\True_;

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
        Model::unguard();

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
