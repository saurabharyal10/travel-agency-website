<?php

namespace App\Providers;

use Illuminate\Auth\Events\Failed;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Event;
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
        // Spatie's activitylog only auto-logs Eloquent model events, not
        // auth events - these have to be wired up explicitly.
        Event::listen(function (Login $event) {
            activity()
                ->causedBy($event->user)
                ->withProperties(['guard' => $event->guard])
                ->log('logged in');
        });

        Event::listen(function (Logout $event) {
            if (! $event->user) {
                return;
            }

            activity()
                ->causedBy($event->user)
                ->withProperties(['guard' => $event->guard])
                ->log('logged out');
        });

        Event::listen(function (Failed $event) {
            activity()
                ->causedBy($event->user)
                ->withProperties([
                    'guard' => $event->guard,
                    'email' => $event->credentials['email'] ?? null,
                ])
                ->log('failed login attempt');
        });
    }
}
