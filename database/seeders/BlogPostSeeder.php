<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use Illuminate\Database\Seeder;

class BlogPostSeeder extends Seeder
{
    /**
     * Seeds 4 real blog posts written to read like actual field notes rather
     * than generic marketing copy - a trek diary, a guide profile, a
     * practical seasonal guide, and a homestay story. Images already exist
     * on the "public" disk under storage/app/public/blog/.
     *
     * Safe to re-run: uses updateOrCreate keyed on slug.
     */
    public function run(): void
    {
        $posts = [
            [
                'title' => 'Five Days to Langtang: What My Notebook Actually Says',
                'slug' => 'five-days-to-langtang-trek-diary',
                'category' => 'Trail Diary',
                'excerpt' => "I kept a notebook for the Langtang trek instead of trying to remember it later. Here's what's actually in it - blisters, dal bhat, and the one view that made the cold worth it.",
                'image' => 'blog/langtang-trek-diary.webp',
                'is_featured' => true,
                'read_minutes' => 7,
                'published_at' => '2026-08-30 09:00:00',
                'content' => <<<'HTML'
                    <p>I'm not a journal person. But a guide I trekked with years ago told me the trick to remembering a trek honestly - not the postcard version - is to write in it every night before you're too tired to be truthful. So this time I did. Here's more or less what's in the notebook, lightly cleaned up.</p>

                    <h2>Day 1 - Syabrubesi to Lama Hotel</h2>
                    <p>Left Kathmandu at 6:40am, later than planned because the jeep driver was waiting on one more passenger who didn't show. The road to Syabrubesi is rougher than I expected - about seven hours, most of it unpaved after Dhunche, and I regret the coffee I had before we left.</p>
                    <p>Started walking around 1pm. The trail follows the Langtang Khola the whole way, climbing through forest that's still properly green this time of year. Reached Lama Hotel just as it got dark, legs fine, ego slightly bruised by a Nepali family who overtook me on the last climb without appearing to breathe harder.</p>

                    <h2>Day 2 - Lama Hotel to Langtang Village</h2>
                    <p>Colder than yesterday. You start noticing the tree line thinning out - pine gives way to rhododendron and birch, then to scrub. Passed the spot where the 2015 earthquake triggered a landslide that buried the old Langtang village; there's a small memorial there now. Nobody in our group said much walking past it.</p>
                    <p>New Langtang village, rebuilt a short way from the original site, is a proper Tamang village - stone houses, prayer wheels, yak herds on the hillside above. Had yak cheese for the first time with dinner. Verdict: sharper than I expected, in a good way.</p>

                    <h2>Day 3 - Langtang Village to Kyanjin Gompa</h2>
                    <p>Short day, only about three hours, which was welcome. Kyanjin Gompa sits at 3,870m and you feel it - not altitude sickness, just a heaviness in the legs on anything uphill. The monastery here is small and still active; an older monk let us look inside without much ceremony about it.</p>
                    <p>Spent the afternoon doing nothing, which is apparently the correct move at this altitude. Cloud cleared around 4pm and Langtang Lirung (7,227m) appeared directly above the village like it had just been switched on.</p>

                    <blockquote>Cloud cleared around 4pm and Langtang Lirung appeared directly above the village like it had just been switched on.</blockquote>

                    <h2>Day 4 - Kyanjin Ri</h2>
                    <p>Woke at 4:45am for the climb up Kyanjin Ri (4,773m) for sunrise. This was the hardest two hours of the trek by a wide margin - steep, thin air, and cold enough that my water bottle had a skin of ice on it by the top.</p>
                    <p>Worth it. The whole Langtang range catches the first light before anything else does, and for about ten minutes the valley below is still in shadow while the peaks are already gold. I didn't take as many photos as I meant to because I kept forgetting to.</p>

                    <h2>Day 5 - Back to Lama Hotel</h2>
                    <p>Long descent day, retracing the route. Knees unhappy by the end. Stopped at the same teahouse in Lama Hotel as night one - same owner, who remembered we'd asked for extra chili the first time and had it ready without being asked.</p>

                    <h2>What I'd tell someone doing this for the first time</h2>
                    <ul>
                        <li>Bring proper gloves for the Kyanjin Ri sunrise climb - a normal winter jacket's pockets aren't enough at 4am.</li>
                        <li>The dal bhat really is bottomless at most teahouses on this route. Pace yourself on day one, you'll want the refill later in the trip.</li>
                        <li>You don't need Everest Base Camp-level fitness for this one, but the Kyanjin Ri side trip on day four is genuinely steep. Skip it if your legs are already done.</li>
                    </ul>
                    HTML,
            ],
            [
                'title' => 'Twenty-Two Years on the Annapurna Trail: A Conversation with a Local Guide',
                'slug' => 'twenty-two-years-annapurna-guide-interview',
                'category' => 'Guides & Porters',
                'excerpt' => "Dawa Tamang has been guiding on the Annapurna routes since he was nineteen. We sat down with him after a trek to ask what's actually changed - and what hasn't.",
                'image' => 'blog/guide-profile.webp',
                'is_featured' => false,
                'read_minutes' => 6,
                'published_at' => '2026-08-19 08:30:00',
                'content' => <<<'HTML'
                    <p>Dawa Tamang started as a porter on the Annapurna Circuit at nineteen, carrying loads for a season before moving into guiding two years later. Twenty-two years on, he still does around fifteen treks a year, mostly Annapurna Base Camp and Poon Hill. We caught him between groups for this conversation.</p>

                    <h2>How did you get into guiding in the first place?</h2>
                    <p>"My older cousin was already a porter. I finished school and there wasn't much work in the village, so I went with him for a season to carry loads. I was not good at it at first - too slow, and I picked a bag that was too heavy on the first day to prove something. By day three I understood why the older porters laughed at me.</p>
                    <p>After two seasons carrying, one of the guides I worked with was sick and the company asked me to take a small group for four days because I already knew the route. That was the start. I never planned it, exactly."</p>

                    <h2>What's changed most since you started?</h2>
                    <p>"The teahouses, mostly. When I started, some of the lodges on the Annapurna Circuit had no attached bathroom, no solar power, sometimes no menu beyond dal bhat and maybe eggs. Now some of them have WiFi and hot showers. Good for trekkers, but I think something is a little lost too - people used to sit around the one fire in the evening and talk. Now everyone is a little bit on their phone.</p>
                    <p>Also, more trekkers now know what altitude sickness actually is before they arrive. Before, I spent a lot of time explaining it from nothing. Now people have read about it, which makes my job a little easier."</p>

                    <h2>What's a moment that's stayed with you?</h2>
                    <p>"There are many, but one from maybe eight years ago. I had a client, older man, maybe sixty-five, trekking to Annapurna Base Camp with his daughter. On the second-to-last day he was struggling, very slow, and I could see he was deciding whether to turn back.</p>
                    <p>I didn't tell him he could do it - I just walked next to him at his pace and didn't rush. We reached base camp about two hours later than planned. He didn't say much when we got there, just stood and looked for a long time. His daughter told me afterward it was the thing he'd wanted to do since her mother passed away. I still think about that one."</p>

                    <blockquote>I didn't tell him he could do it - I just walked next to him at his pace and didn't rush.</blockquote>

                    <h2>What do first-time trekkers get wrong?</h2>
                    <ul>
                        <li>Walking too fast on day one because they feel strong. The altitude doesn't care how strong you feel on day one.</li>
                        <li>Packing too many "just in case" items and then complaining about the bag weight by day two.</li>
                        <li>Not telling the guide about small problems early - a sore knee on day one becomes a real problem by day four if nobody mentions it.</li>
                    </ul>

                    <h2>Favorite season to guide in?</h2>
                    <p>"October, without question. Clear skies almost every day, not too cold yet, and the rhododendrons are finished by then so the trail is quieter than March-April. But I tell people honestly - there is no bad season here, only different kinds of trek."</p>
                    HTML,
            ],
            [
                'title' => 'When Should You Actually Trek Nepal? A Season-by-Season Breakdown',
                'slug' => 'when-to-trek-nepal-season-guide',
                'category' => 'Trip Planning',
                'excerpt' => "Everyone says spring and autumn are 'the best time.' True, but incomplete. Here's what each season actually means on the ground - trail conditions, crowds, and what to pack.",
                'image' => 'blog/seasonal-guide.webp',
                'is_featured' => false,
                'read_minutes' => 8,
                'published_at' => '2026-07-18 10:00:00',
                'content' => <<<'HTML'
                    <p>"Best time to visit Nepal" is one of those questions with a real answer that still depends a lot on what you actually want out of the trip. Here's the honest breakdown by season, not the marketing version.</p>

                    <h2>Autumn (late September - November)</h2>
                    <p>This is the season most guidebooks point to, and for good reason. The monsoon has just cleared the air, skies are consistently clear, and mountain views are about as reliable as they get. Daytime temperatures on most trekking routes sit comfortably in the mid-teens Celsius; nights get cold above 3,000m but nothing extreme.</p>
                    <p>The catch: this is also peak season. Teahouses on popular routes like Everest Base Camp and Annapurna Circuit fill up, and you'll share the trail with a lot of other trekkers. Book lodges ahead where you can, especially around the Dashain and Tihar festival periods when domestic travel spikes too.</p>

                    <h2>Spring (March - May)</h2>
                    <p>The other "best" season, and genuinely close behind autumn. Warmer than autumn at lower elevations, with the added bonus of rhododendron forests in bloom from roughly mid-March to late April - the Ghorepani-Poon Hill route in particular turns red and pink for a few weeks.</p>
                    <p>Haze builds up as spring goes on, especially by May, so long-distance mountain views can be softer than in autumn. It's also the primary Everest expedition season, so Base Camp routes are busy with climbing teams as well as trekkers.</p>

                    <h2>Summer / Monsoon (June - August)</h2>
                    <p>Most of Nepal's popular trekking routes are genuinely difficult in monsoon - daily rain, leeches on lower-elevation forest trails, and a real risk of landslides closing roads. This isn't the season to attempt Annapurna Circuit or Everest Base Camp for most trekkers.</p>
                    <p>The exception is Upper Mustang and the upper Manang region, which sit in the Himalayan rain shadow and stay largely dry even during monsoon. If you specifically want Mustang's canyon landscapes, this is actually a legitimate window - just not for the wetter southern and central routes.</p>

                    <h2>Winter (December - February)</h2>
                    <p>Cold, especially above 3,500m, where nighttime temperatures regularly drop well below freezing and some high passes can close with snow. But lower-altitude treks - Ghorepani-Poon Hill, the lower stretches of Annapurna, and short trips like Nagarkot or Chandragiri - are genuinely pleasant, with clear skies and none of the peak-season crowds.</p>
                    <p>If you're set on a high-altitude trek like Everest Base Camp in winter, it's possible but requires proper cold-weather gear and a realistic conversation with your guide about conditions on the day.</p>

                    <h2>Quick recommendation</h2>
                    <ul>
                        <li><strong>Want the classic postcard mountain views and don't mind crowds:</strong> October-November.</li>
                        <li><strong>Want similar views with rhododendrons and slightly fewer people:</strong> late March-April.</li>
                        <li><strong>Traveling in summer no matter what:</strong> look at Upper Mustang instead of central/eastern routes.</li>
                        <li><strong>Want quiet trails and don't need the highest passes:</strong> a lower-altitude winter trek is underrated.</li>
                    </ul>
                    HTML,
            ],
            [
                'title' => 'A Night at a Community Homestay Near Chitwan',
                'slug' => 'community-homestay-near-chitwan',
                'category' => 'Community Stories',
                'excerpt' => "Before the jeep safari and the rhino sightings, we spent a night at a small community-run homestay outside the park. It wasn't fancy. It was the part of the trip people asked us about most.",
                'image' => 'blog/homestay-story.webp',
                'is_featured' => false,
                'read_minutes' => 5,
                'published_at' => '2026-08-02 11:15:00',
                'content' => <<<'HTML'
                    <p>Most people plan a Chitwan trip around the safari - the rhinos, the jeep rides, maybe a canoe on the Rapti River. All good reasons to go. But the night before our safari, we stayed at a small community-run homestay on the edge of the buffer zone, and it's the part of the trip that came up most when people asked how it went.</p>

                    <h2>The setup</h2>
                    <p>It's a cluster of thatched-roof huts built and run collectively by a handful of families in the area, with a shared dining structure where everyone eats together rather than in individual rooms. No WiFi, no menu - you eat what's cooked that evening, which the night we visited was a vegetable curry, rice, and a lentil soup that was better than several restaurant versions we'd had in Kathmandu.</p>
                    <p>Rooms are simple. A bed, a mosquito net you will actually need, and a shared bathroom block a short walk across the compound. If you're expecting anything close to a hotel, this isn't it, and that's rather the point.</p>

                    <h2>What actually happened</h2>
                    <p>We arrived mid-afternoon and were immediately put to work, in the friendliest possible way, helping shell something in the kitchen area that I still can't identify with confidence. Nobody explained much in English, and we didn't have much Nepali, so a good portion of the afternoon was conducted in gestures and the kind of laughing that happens when a task goes wrong in an obvious way.</p>
                    <p>After dinner, one of the men from the family running the compound got out a drum, and within about ten minutes half the guests staying that night - us, a French couple, and a solo traveler from South Korea - were attempting a Tharu stick dance with visibly limited success. Nobody was any good at it. That wasn't the point either.</p>

                    <blockquote>Nobody was any good at it. That wasn't the point either.</blockquote>

                    <h2>The less romantic parts</h2>
                    <p>In fairness, it wasn't all charming simplicity. The mosquito net had a small hole we didn't discover until an hour in, a rooster started well before sunrise and showed no interest in stopping, and the shared bathroom had exactly one working light bulb between three stalls. If you need reliable hot water and full privacy, this isn't the stay for you.</p>

                    <h2>Why we'd still recommend it</h2>
                    <p>The money from a stay like this goes directly to the families running it, not to a hotel chain with a Chitwan branch. It's a genuinely different way to see the region than the safari-lodge circuit most itineraries default to - and if you're already coming for the wildlife, it's a low-effort addition that changes the shape of the trip more than you'd expect from one night.</p>
                    HTML,
            ],
        ];

        foreach ($posts as $data) {
            BlogPost::updateOrCreate(
                ['slug' => $data['slug']],
                $data
            );
        }
    }
}
