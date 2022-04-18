<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Validators\ExtensionValidator;

class ValidatorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app['validator']->resolver(function($translator, $data, $rules, $messages, $attribute) {
            return new ExtensionValidator($translator, $data, $rules, $messages, $attribute);
        });

        $this->app['validator']->replacer('max_length', function ($message, $attribute, $rule, $parameters) {
            return str_replace(':max', $parameters[0], $message);
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
