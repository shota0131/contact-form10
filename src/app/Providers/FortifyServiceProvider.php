<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use App\Actions\Fortify\CreateNewUser;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(CreatesNewUsers::class, CreateNewUser::class);

    // 登録画面
        \Laravel\Fortify\Fortify::registerView(fn () => view('step1'));

    // ログイン画面
        \Laravel\Fortify\Fortify::loginView(fn () => view('auth.login'));
    }
}
