<?php

namespace App\Providers;

use App\Mail\UserCreated;
use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Mail;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);

        User::created(function($user) {
            Mail::to($user)->send(new UserCreated($user));
        });

        // User::updated(function($usuario) {
        //     if ($usuario->isDirty('email')) {
        //         retry(5, function() use ($usuario) {
        //             Mail::to($usuario)->send(new UserMailChanged($usuario));
        //         }, 100);
        //     }
        // });

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
