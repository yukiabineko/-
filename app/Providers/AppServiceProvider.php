<?php

namespace App\Providers;


use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::defaultView('vendor.pagination.default');
        Paginator::defaultSimpleView('vendor.pagination.default');

        //カタカナのバリデーション追加
        Validator::extend('katakana', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/[ァ-ヴー]+/u', $value);
        });
        //電話番号のバリデーション
        Validator::extend('tel', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/^0[0-9]{9,10}$/u', $value);
        });
         //郵便番号のバリデーション
         Validator::extend('zipcode', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/^[0-9]{7}$/', $value);
        });
    }
}
