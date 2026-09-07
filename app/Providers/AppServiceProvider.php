<?php

namespace App\Providers;

use App\Models\InfoPage;
use App\Models\SiteSetting;
use Illuminate\Auth\Events\Failed;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\View;
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
        // Make the editable site settings available to the Blade views that
        // render CMS-driven copy (hero tagline, newsletter blurb, footer text).
        View::composer(
            ['components.hero', 'components.travel-post', 'components.footer'],
            fn (\Illuminate\View\View $view) => $view->with('settings', SiteSetting::current()),
        );

        // The footer's "Travel Info" column is driven by the InfoPage CMS - only
        // published pages appear, so unpublishing or deleting one simply drops
        // the link rather than leaving a dead link behind.
        View::composer(
            'components.footer',
            fn (\Illuminate\View\View $view) => $view->with(
                'infoPages',
                InfoPage::query()->published()->ordered()->limit(6)->get(['title', 'slug']),
            ),
        );

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
