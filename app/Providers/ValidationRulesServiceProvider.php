<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class ValidationRulesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('numeric_array', function ($attribute, $values, $parameters, $validator) {
          if(!is_array($values)) {
              return false;
          }

          foreach($values as $value) {
              if(!is_numeric($value)) {
                  return false;
              }
          }

          return true;
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
