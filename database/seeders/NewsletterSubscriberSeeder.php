<?php

namespace Database\Seeders;

use App\Models\NewsletterSubscriber;
use Illuminate\Database\Seeder;

class NewsletterSubscriberSeeder extends Seeder
{
    /**
     * DEMO DATA - not real subscribers.
     *
     * Seeds ~13 placeholder newsletter subscribers so the admin "Newsletter
     * Subscribers" list isn't empty during review/handover. Every address uses
     * the RFC 2606 reserved "@example.com" domain, which can never belong to a
     * real person - so these are unmistakably fake and trivially filtered:
     *
     *     NewsletterSubscriber::where('email', 'like', '%@example.com')->delete();
     *
     * This whole set is meant to be removed in the selective DB cleanup pass
     * (task 7j). When it is, also drop the ->call() for this seeder from
     * DatabaseSeeder so a full re-seed doesn't bring them back.
     *
     * Safe to re-run: uses updateOrCreate keyed on email.
     */
    public function run(): void
    {
        $subscribers = [
            ['email' => 'anita.gurung@example.com',        'subscribed_at' => '2026-05-14 08:22:00'],
            ['email' => 'r.thapa@example.com',             'subscribed_at' => '2026-05-29 19:05:00'],
            ['email' => 'j.whitfield@example.com',          'subscribed_at' => '2026-06-08 11:47:00'],
            ['email' => 'sunita_rai88@example.com',         'subscribed_at' => '2026-06-21 14:33:00'],
            ['email' => 'marco.bianchi@example.com',        'subscribed_at' => '2026-07-02 07:58:00'],
            ['email' => 'p.shrestha@example.com',           'subscribed_at' => '2026-07-11 21:14:00'],
            ['email' => 'hannah.oconnell@example.com',      'subscribed_at' => '2026-07-19 09:41:00'],
            ['email' => 'deepak.kc@example.com',            'subscribed_at' => '2026-07-28 16:02:00'],
            ['email' => 'yuki.tanaka@example.com',          'subscribed_at' => '2026-08-05 12:26:00'],
            ['email' => 'l.fernandez@example.com',          'subscribed_at' => '2026-08-13 18:37:00'],
            ['email' => 'bishnu.magar@example.com',         'subscribed_at' => '2026-08-22 10:09:00'],
            ['email' => 'chloe.dubois@example.com',         'subscribed_at' => '2026-08-30 20:51:00'],
            ['email' => 'a.karki@example.com',              'subscribed_at' => '2026-09-04 13:18:00'],
        ];

        foreach ($subscribers as $subscriber) {
            NewsletterSubscriber::updateOrCreate(
                ['email' => $subscriber['email']],
                ['subscribed_at' => $subscriber['subscribed_at']],
            );
        }
    }
}
