<?php

namespace Database\Seeders;

use App\Models\InfoPage;
use Illuminate\Database\Seeder;

class InfoPageSeeder extends Seeder
{
    /**
     * Seeds the three "Travel Info" pages linked from the footer. Content is
     * written in plain language as general guidance - it deliberately avoids
     * quoting fees or rules that change, and points readers to official
     * sources to confirm current details.
     *
     * Safe to re-run: uses updateOrCreate keyed on slug.
     */
    public function run(): void
    {
        $pages = [
            [
                'slug' => 'visa-requirements',
                'title' => 'Visa Requirements',
                'sort_order' => 10,
                'content' => <<<'HTML'
                    <p>Most foreign travellers can enter Nepal on a tourist visa obtained on arrival &mdash; at Tribhuvan International Airport in Kathmandu, and at the main land border crossings with India and Tibet. A small number of nationalities are not eligible for a visa on arrival and must apply in advance at a Nepali embassy or consulate, so it is worth checking your own situation before you book flights. Indian nationals do not need a visa to enter Nepal.</p>

                    <h2>Getting the visa on arrival</h2>
                    <p>At the airport you fill in an arrival form, submit it with your fee at the visa desk, and receive a visa sticker in your passport. You can speed this up by completing the online application on the Department of Immigration website within about two weeks of travel and bringing the printed confirmation with you. There are self-service kiosks at the airport for the arrival form, and photo booths if you need one.</p>

                    <h2>What to bring</h2>
                    <ul>
                        <li>A passport valid for at least six months beyond your date of entry, with a blank page for the visa sticker.</li>
                        <li>One recent passport-sized photograph (a spare is useful; the airport photo booths can also produce one).</li>
                        <li>The visa fee in cash. US dollars are the most widely accepted; other major currencies are usually fine, and card payment is sometimes available but not reliable, so carry enough cash to be safe.</li>
                        <li>The address of where you are staying for the first night, for the arrival form.</li>
                    </ul>

                    <h2>Length and extensions</h2>
                    <p>Tourist visas are normally issued for 15, 30 or 90 days and are multiple-entry, so you can leave and re-enter within the validity period. If you decide to stay longer, tourist visas can be extended at the Department of Immigration offices in Kathmandu and Pokhara, up to a maximum total number of days per calendar year. Extensions are charged per day with a minimum, and overstaying carries a fine, so plan your dates with a little margin.</p>

                    <h2>Trekking permits are separate</h2>
                    <p>Your visa lets you enter the country; it does not cover trekking. Every trek needs its own permits &mdash; typically a TIMS card plus the entry fee for the relevant national park or conservation area. Restricted regions such as Upper Mustang, Upper Dolpo, Manaslu and Nar&ndash;Phu require a special restricted-area permit that can only be arranged through a registered trekking agency, with a minimum group size. We handle all of these for the trips we run; if you are trekking with us you do not need to organise permits yourself.</p>

                    <h2>Confirm before you travel</h2>
                    <p>Visa fees, the list of eligible nationalities, extension limits and entry rules are set by the Government of Nepal and can change at short notice. Treat everything above as general orientation only, and confirm the current details with Nepal's <strong>Department of Immigration</strong> (immigration.gov.np) or your <strong>nearest Nepali embassy or consulate</strong> before you travel. If you are trekking with us, ask our team and we will point you to the latest information.</p>
                    HTML,
            ],
            [
                'slug' => 'insurance-safety',
                'title' => 'Insurance & Safety',
                'sort_order' => 20,
                'content' => <<<'HTML'
                    <p>Trekking in Nepal is well established and, with sensible preparation, generally safe. The two things that matter most are carrying the right travel insurance and respecting altitude. This page covers both.</p>

                    <h2>Travel insurance</h2>
                    <p>Comprehensive travel insurance is a requirement for any trip with us, not an optional extra. When you choose a policy, check the following:</p>
                    <ul>
                        <li><strong>Altitude cover.</strong> Many standard policies only cover trekking up to around 3,000&ndash;4,000&nbsp;m. Himalayan treks routinely go higher &mdash; some passes are over 5,000&nbsp;m. Your policy must explicitly cover trekking to the maximum elevation of your itinerary. If you are unsure, send us your itinerary and we will tell you the high point.</li>
                        <li><strong>Emergency helicopter evacuation and repatriation.</strong> This is the single most important clause. Ground evacuation from a remote trail is slow and sometimes impossible; a helicopter rescue and hospital transfer can run to several thousand US dollars, and in practice you or your family pay up front and claim the money back later. Make sure the sum insured is high enough and that the policy covers being flown out of the mountains, not just treatment once you reach a city.</li>
                        <li><strong>Medical treatment abroad</strong>, including hospital stays and, if needed, an air ambulance home.</li>
                        <li><strong>Trip cancellation and interruption</strong>, so you are covered if illness, a family emergency or a flight disruption stops you travelling or forces you to cut the trip short.</li>
                        <li><strong>Baggage and personal trekking gear</strong>, and check whether "trekking" and "mountaineering" are defined differently in the wording &mdash; peak climbing usually needs a higher tier of cover than teahouse trekking.</li>
                    </ul>
                    <p>Carry your policy number and the 24-hour assistance phone number with you on the trek, give a copy to your guide, and leave a copy with someone at home.</p>

                    <h2>Altitude</h2>
                    <p>Altitude sickness (acute mountain sickness, or AMS) happens when you climb faster than your body can adjust to the thinner air. Mild symptoms &mdash; headache, tiredness, poor appetite, broken sleep &mdash; are common above roughly 2,500&ndash;3,000&nbsp;m and usually settle with rest and a slower ascent. It becomes dangerous only when the warning signs are ignored and you keep going up.</p>
                    <ul>
                        <li>Ascend gradually and build in acclimatisation days. Our itineraries are paced for this on purpose.</li>
                        <li>Follow "climb high, sleep low" &mdash; it is fine to walk to a higher point during the day as long as you come back down to sleep.</li>
                        <li>Drink plenty of water, eat well even if your appetite drops, and avoid alcohol and sleeping pills at altitude.</li>
                        <li>Tell your guide honestly how you feel. The only reliable treatment for worsening symptoms is to descend, and a good guide would rather turn around early than take a risk.</li>
                    </ul>

                    <h2>General trekking safety</h2>
                    <ul>
                        <li><strong>Go with a licensed guide.</strong> Beyond navigation and local knowledge, someone needs to be responsible for decisions about weather, route and health if you are unwell. Solo trekking is now restricted in many of Nepal's national-park and conservation areas, and a guide is required.</li>
                        <li><strong>Stay on marked trails, start early</strong> so you finish the day's walk before afternoon cloud and wind build up, and do not walk alone on remote sections.</li>
                        <li><strong>Leave your itinerary</strong> with family and with us, and sign in at trail checkpoints where they exist.</li>
                        <li><strong>Pack for the mountains:</strong> warm layers, a waterproof shell, a hat and gloves, a headlamp, a basic personal first-aid kit and any medication you take, sun protection, and water purification.</li>
                        <li><strong>Food and water:</strong> eat freshly cooked food, drink water that has been boiled or treated, and take the first couple of days gently while your stomach and your body adjust.</li>
                        <li><strong>Carry enough cash</strong> in small notes. ATMs are scarce or non-existent once you leave the trailhead towns.</li>
                    </ul>

                    <h2>Getting to and from the trek</h2>
                    <p>Mountain roads are rough and journeys are long. Flights to and from the small mountain airstrips are weather-dependent and delays or cancellations are normal, especially in the afternoons and in poor visibility. Always leave one or two buffer days in Kathmandu or Pokhara before an international flight home so a delayed mountain flight does not cost you your connection.</p>
                    HTML,
            ],
            [
                'slug' => 'common-questions',
                'title' => 'Common Questions',
                'sort_order' => 30,
                'content' => <<<'HTML'
                    <p>A few of the questions we are asked most often. If yours is not here, <a href="/contact">get in touch</a> &mdash; a real person will answer.</p>

                    <h2>When is the best time to trek in Nepal?</h2>
                    <p>The two main seasons are autumn (roughly October to November) and spring (March to April). Autumn brings the clearest, most stable weather and the sharpest mountain views, and the popular trails are busy. Spring is a little warmer, the rhododendron forests are in bloom, and the air is slightly hazier. Winter (December to February) is cold and the high passes can be blocked by snow, but lower-altitude treks are quiet and often crystal clear. The monsoon (June to September) is wet, humid and cloudy, with leeches on forested trails &mdash; though the rain-shadow regions such as Mustang and Dolpo stay dry and are excellent at that time.</p>

                    <h2>How worried should I be about altitude sickness?</h2>
                    <p>It is worth taking seriously but not worth being frightened of. Mild symptoms like headache and poor sleep are common as you go above about 3,000&nbsp;m and usually pass with rest and a slower ascent. It only becomes dangerous if it is ignored. The safeguards are simple: ascend gradually, take the acclimatisation days built into the itinerary, stay hydrated, tell your guide how you feel, and be willing to descend if symptoms get worse. Our routes are planned around acclimatisation rather than speed. There is more detail on our <a href="/info/insurance-safety">Insurance &amp; Safety</a> page.</p>

                    <h2>What is included in a package price?</h2>
                    <p>It varies by trip, and every package page lists its own inclusions and exclusions, but as a general guide a trek price usually covers:</p>
                    <ul>
                        <li>Airport pick-up and drop-off</li>
                        <li>A licensed, English-speaking guide, and porters where the itinerary needs them</li>
                        <li>Teahouse or lodge accommodation during the trek</li>
                        <li>Most meals while you are on the trail</li>
                        <li>All trekking permits and national-park or conservation-area entry fees</li>
                        <li>Ground transport between the city and the trailhead</li>
                    </ul>
                    <p>What is normally <em>not</em> included: international flights, your Nepal visa, travel insurance, personal trekking gear, drinks and snacks beyond your meals, tips for the crew, and any extra nights or meals in Kathmandu or Pokhara. Always check the specific package page for the exact list.</p>

                    <h2>How do booking and enquiries work on this site?</h2>
                    <p>On any package page you can use <strong>Enquire</strong> to ask questions or <strong>Book Now</strong> to start a booking request. Both go straight to our team, who reply within about a day with current availability, a full day-by-day itinerary and the next steps, including the deposit. Nothing is charged automatically through the website &mdash; you are always talking to a person before any money changes hands.</p>

                    <h2>Do I tip guides and porters, and how much?</h2>
                    <p>Tipping is customary in Nepal and forms a meaningful part of a trekking crew's income. There is no fixed rule. A common approach is for the group to pool a tip and hand it over together on the last day, with a larger amount for a longer or harder trek. Your guide can advise on local norms, and you are welcome to ask us for a rough per-person guideline for your particular trip before you leave.</p>

                    <h2>What should I pack?</h2>
                    <p>A broad checklist, tailored to your specific trek once it is confirmed:</p>
                    <ul>
                        <li>Broken-in trekking boots and comfortable socks</li>
                        <li>Layers: base layers, an insulating fleece or down jacket, and a waterproof, windproof shell</li>
                        <li>A warm hat, sun hat, and gloves</li>
                        <li>A sleeping bag rated for the altitude you are reaching &mdash; you can rent a good one in Kathmandu if you would rather not carry your own</li>
                        <li>A daypack for the things you need during the day</li>
                        <li>Sun protection: high-SPF sunscreen, lip balm, and proper sunglasses</li>
                        <li>A headlamp with spare batteries</li>
                        <li>A water bottle or bladder plus a purification method</li>
                        <li>A small personal first-aid kit and any medication you take regularly</li>
                        <li>Enough cash in small notes for snacks, drinks, charging and tips</li>
                    </ul>
                    <p>Porters carry a weight limit, so pack light and leave anything you will not need on the trek at your hotel in the city. We send a full, trip-specific packing list once your booking is confirmed.</p>
                    HTML,
            ],
        ];

        foreach ($pages as $page) {
            InfoPage::updateOrCreate(
                ['slug' => $page['slug']],
                [
                    'title' => $page['title'],
                    'sort_order' => $page['sort_order'],
                    'is_published' => true,
                    'content' => $page['content'],
                ],
            );
        }
    }
}
