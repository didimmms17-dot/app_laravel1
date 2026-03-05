<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Notification;

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
        // Share unreadNotifications dengan semua admin views
        View::composer(['admin.*'], function ($view) {
            if (auth()->check() && auth()->user()->role === 'admin') {
                $unreadNotifications = Notification::whereNull('read_at')->count();
                $view->with('unreadNotifications', $unreadNotifications);
            }
        });
    }
}
