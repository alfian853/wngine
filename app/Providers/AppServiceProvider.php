<?php
namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      Validator::extend('strong_pwd', function($attribute, $value, $parameters, $validator) {
        return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).{6,}$/', (string)$value);
      },"weak password");

      Validator::extend('phone_number', function($attribute, $value, $parameters, $validator) {
        return preg_match('/^\+[0-9]{12,15}$/', (string)$value);
      },"invalid phone number");
    
    }
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
