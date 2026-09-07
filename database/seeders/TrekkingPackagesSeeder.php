<?php

namespace Database\Seeders;

use App\Models\Package;
use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

/**
 * Task 4 of the client-call feature branch.
 *
 * 1. Promotes the treks that were already in the catalogue (Everest Base
 *    Camp, Annapurna Circuit, Langtang Valley, Everest View Trek) to
 *    `type = 'trekking'` so they show under the navbar "Trekking Packages"
 *    dropdown. Their content and images are untouched.
 *
 * 2. Adds five more classic Nepal treks (Annapurna Base Camp, Gosaikunda,
 *    Tilicho Lake, Mardi Himal, Poon Hill).
 *
 * 3. Adds the two international / pilgrimage trips the client wants featured
 *    as Exclusive Offers (Dubai, Chardham). Kathmandu is already covered by
 *    the existing `kathmandu-valley-day-tour`.
 *
 * 4. Wires all three Exclusive Offers slots on Site Settings.
 *
 * Safe to re-run: `updateOrCreate` keyed on slug.
 *
 * ------------------------------------------------------------------------
 * IMAGES — NOT FINAL. Every package created here points at
 *   packages/<slug>.webp
 * which does NOT exist yet. Until the real file is dropped into
 * storage/app/public/packages/, Package::getImageUrlAttribute() serves
 * public/images/_placeholder-needs-photo.svg ("NEEDS REAL PHOTO"), so the
 * cards are obviously unfinished rather than broken. Galleries are left
 * empty on purpose. Files still to be sourced (royalty-free only):
 *   storage/app/public/packages/annapurna-base-camp.webp
 *   storage/app/public/packages/tilicho-lake-trek.webp
 *   storage/app/public/packages/mardi-himal-trek.webp
 *   storage/app/public/packages/poon-hill-trek.webp
 *   storage/app/public/packages/gosaikunda-trek.webp
 *   storage/app/public/packages/dubai-city-escape.webp
 *   storage/app/public/packages/chardham-yatra.webp
 * ------------------------------------------------------------------------
 */
class TrekkingPackagesSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Promote the existing treks.
        Package::whereIn('slug', [
            'everest-base-camp',
            'annapurna-circuit',
            'langtang-valley',
            'everest-view-trek',
        ])->update(['type' => 'trekking']);

        // 2 + 3. New packages. `image` / `gallery` are set in the loop below.
        $packages = [
            [
                'title' => 'Annapurna Base Camp',
                'slug' => 'annapurna-base-camp',
                'category' => 'Trekking',
                'type' => 'trekking',
                'destination_id' => 4,
                'duration' => '11 Days',
                'description' => 'Walk straight into the Annapurna Sanctuary, a natural amphitheatre ringed by peaks over 7,000m, and wake up at 4,130m with the south face of Annapurna I filling the sky.',
                'price' => '1550.00',
                // No 'featured' badge yet — that would pull it into the homepage
                // Curated Expeditions carousel before it has real photography.
                // The client can set it from the admin once the photo is in.
                'badge' => null,
                'highlights' => [
                    'Sunrise on Annapurna I (8,091m) and Machapuchare from base camp',
                    'The Modi Khola gorge and its bamboo and rhododendron forest',
                    'Hot springs at Jhinu Danda on the walk out',
                    'Gurung villages of Chhomrong and Ghandruk',
                ],
                'itinerary' => [
                    ['day' => 1, 'title' => 'Drive to Pokhara', 'description' => 'Scenic drive or short flight from Kathmandu to Pokhara, with a briefing and gear check by the lake in the evening.'],
                    ['day' => 2, 'title' => 'Drive to Siwai, trek to Chhomrong', 'description' => 'Road head at Siwai, then a stone-stepped trail up to the large Gurung village of Chhomrong (2,170m).'],
                    ['day' => 3, 'title' => 'Chhomrong to Bamboo', 'description' => 'Steep descent to the Chhomrong Khola, then a climb into the humid forest to the lodges at Bamboo (2,310m).'],
                    ['day' => 4, 'title' => 'Bamboo to Deurali', 'description' => 'Follow the Modi Khola upstream past Dovan and the Hinku Cave to Deurali (3,230m).'],
                    ['day' => 5, 'title' => 'Deurali to Annapurna Base Camp', 'description' => 'Through the gorge and into the Sanctuary, passing Machapuchare Base Camp before the final hour to ABC (4,130m).'],
                    ['day' => 6, 'title' => 'Sunrise at ABC, descend to Bamboo', 'description' => 'Dawn on the surrounding wall of peaks, then a long descent back to Bamboo.'],
                    ['day' => 7, 'title' => 'Bamboo to Jhinu Danda', 'description' => 'Descend to Chhomrong and on to Jhinu Danda for an afternoon soak in the riverside hot springs.'],
                    ['day' => 8, 'title' => 'Jhinu Danda to Siwai, drive to Pokhara', 'description' => 'Short walk to the road head and drive back to Pokhara for a proper bed and hot shower.'],
                    ['day' => 9, 'title' => 'Pokhara at leisure', 'description' => 'A free day by Phewa Lake — buffer against mountain weather and a chance to rest tired legs.'],
                    ['day' => 10, 'title' => 'Return to Kathmandu', 'description' => 'Drive or fly back to Kathmandu, evening free.'],
                    ['day' => 11, 'title' => 'Departure', 'description' => 'Transfer to the airport for onward travel.'],
                ],
                'inclusions' => [
                    'Annapurna Conservation Area permit and TIMS card',
                    'Licensed guide and porter support',
                    'Teahouse accommodation on trek',
                    'All meals during the trek',
                    'Kathmandu–Pokhara ground transport and trailhead transfers',
                ],
                'exclusions' => [
                    'International flights',
                    'Nepal visa fees',
                    'Travel insurance',
                    'Hot showers, Wi-Fi and charging at teahouses',
                    'Personal expenses and tips',
                ],
                'is_active' => true,
                'trip_grade' => 'Moderate',
                'group_size_min' => 2,
                'group_size_max' => 12,
                'best_season' => 'Mar–May, Oct–Nov',
                'meals_note' => 'All meals included on trek; breakfast only in Pokhara',
                'accommodation_note' => 'Teahouse lodges on trek; 3-star hotel in Pokhara',
            ],
            [
                'title' => 'Tilicho Lake Trek',
                'slug' => 'tilicho-lake-trek',
                'category' => 'Trekking',
                'type' => 'trekking',
                'destination_id' => 4,
                'duration' => '15 Days',
                'description' => 'A high add-on to the Annapurna Circuit that climbs to one of the highest large lakes in the world at 4,919m, along an exposed traverse that few trekkers make time for.',
                'price' => '1950.00',
                'badge' => null,
                'highlights' => [
                    'The turquoise, ice-fringed Tilicho Lake at 4,919m',
                    'The notorious landslide traverse to Tilicho Base Camp',
                    'Acclimatisation days in Manang, a Tibetan-influenced trading town',
                    'Option to continue over the Thorong La to Muktinath',
                ],
                'itinerary' => [
                    ['day' => 1, 'title' => 'Drive to Besisahar, on to Chame', 'description' => 'Long drive from Kathmandu up the Marsyangdi valley to Chame (2,710m).'],
                    ['day' => 2, 'title' => 'Chame to Pisang', 'description' => 'Forest trail past the curved rock face of Paungda Danda to Upper Pisang (3,300m).'],
                    ['day' => 3, 'title' => 'Pisang to Manang', 'description' => 'The high route via Ghyaru and Ngawal for the best Annapurna II and IV views, descending to Manang (3,540m).'],
                    ['day' => 4, 'title' => 'Manang acclimatisation', 'description' => 'Rest day with an acclimatisation hike to Gangapurna Lake or Ice Lake.'],
                    ['day' => 5, 'title' => 'Manang to Khangsar', 'description' => 'Short day to the last permanent village, Khangsar (3,750m).'],
                    ['day' => 6, 'title' => 'Khangsar to Tilicho Base Camp', 'description' => 'Cross the exposed scree and landslide section to the lodges at Tilicho Base Camp (4,150m).'],
                    ['day' => 7, 'title' => 'Tilicho Lake and back to Shree Kharka', 'description' => 'Pre-dawn climb to the lake at 4,919m, then descend well below base camp to sleep lower at Shree Kharka.'],
                    ['day' => 8, 'title' => 'Shree Kharka to Yak Kharka', 'description' => 'Rejoin the main circuit trail and climb gently to Yak Kharka (4,050m).'],
                    ['day' => 9, 'title' => 'Yak Kharka to Thorong Phedi', 'description' => 'Short, steady day to the base of the pass (4,540m).'],
                    ['day' => 10, 'title' => 'Thorong La to Muktinath', 'description' => 'Early start to cross the 5,416m Thorong La, descending to the pilgrimage temple complex at Muktinath.'],
                    ['day' => 11, 'title' => 'Drive to Pokhara', 'description' => 'Jeep down the Kali Gandaki via Jomsom and Tatopani to Pokhara.'],
                    ['day' => 12, 'title' => 'Pokhara at leisure', 'description' => 'Buffer and rest day by the lake.'],
                    ['day' => 13, 'title' => 'Return to Kathmandu', 'description' => 'Drive or fly back to Kathmandu.'],
                    ['day' => 14, 'title' => 'Contingency day', 'description' => 'Spare day held against weather or road delays on the high sections.'],
                    ['day' => 15, 'title' => 'Departure', 'description' => 'Transfer to the airport for onward travel.'],
                ],
                'inclusions' => [
                    'Annapurna Conservation Area permit and TIMS card',
                    'Licensed guide and porter support',
                    'Teahouse accommodation on trek',
                    'All meals during the trek',
                    'Trailhead transport and Pokhara–Kathmandu return',
                ],
                'exclusions' => [
                    'International flights',
                    'Nepal visa fees',
                    'Travel insurance (must cover trekking to 5,000m)',
                    'Hot showers, Wi-Fi and charging at teahouses',
                    'Personal expenses and tips',
                ],
                'is_active' => true,
                'trip_grade' => 'Challenging',
                'group_size_min' => 2,
                'group_size_max' => 10,
                'best_season' => 'Mar–May, Oct–Nov',
                'meals_note' => 'All meals included on trek',
                'accommodation_note' => 'Basic teahouse lodges; the base-camp lodges are very simple',
            ],
            [
                'title' => 'Mardi Himal Trek',
                'slug' => 'mardi-himal-trek',
                'category' => 'Trekking',
                'type' => 'trekking',
                'destination_id' => 4,
                'duration' => '6 Days',
                'description' => 'A short, steep ridge trek that stays high above the tree line with Machapuchare almost close enough to touch — the best big-mountain payoff in Nepal for the time it takes.',
                'price' => '890.00',
                'badge' => null,
                'highlights' => [
                    'The ridgeline walk to Mardi Himal High Camp (3,580m)',
                    'Close, unobstructed views of Machapuchare and Annapurna South',
                    'Moss-draped rhododendron forest on the lower ridge',
                    'Far fewer trekkers than the neighbouring Annapurna trails',
                ],
                'itinerary' => [
                    ['day' => 1, 'title' => 'Pokhara to Forest Camp', 'description' => 'Drive to Kande and trek via Australian Camp and Pothana onto the forested ridge to Forest Camp (2,550m).'],
                    ['day' => 2, 'title' => 'Forest Camp to High Camp', 'description' => 'Climb out of the trees to Low Camp and continue along the open ridge to High Camp (3,580m).'],
                    ['day' => 3, 'title' => 'Mardi Himal View Point, descend to Middle Camp', 'description' => 'Pre-dawn walk toward Mardi Himal Base Camp (4,500m) for sunrise, then a long descent to Middle Camp.'],
                    ['day' => 4, 'title' => 'Middle Camp to Sidhing, drive to Pokhara', 'description' => 'Drop off the ridge to the village of Sidhing and drive back to Pokhara.'],
                    ['day' => 5, 'title' => 'Pokhara at leisure', 'description' => 'Free day by the lake — weather buffer and rest.'],
                    ['day' => 6, 'title' => 'Return to Kathmandu', 'description' => 'Drive or fly back to Kathmandu for onward travel.'],
                ],
                'inclusions' => [
                    'Annapurna Conservation Area permit and TIMS card',
                    'Licensed guide and porter support',
                    'Teahouse accommodation on trek',
                    'All meals during the trek',
                    'Pokhara trailhead transfers',
                ],
                'exclusions' => [
                    'International flights',
                    'Nepal visa fees',
                    'Travel insurance',
                    'Kathmandu–Pokhara transport',
                    'Personal expenses and tips',
                ],
                'is_active' => true,
                'trip_grade' => 'Moderate',
                'group_size_min' => 1,
                'group_size_max' => 12,
                'best_season' => 'Mar–May, Oct–Dec',
                'meals_note' => 'All meals included on trek',
                'accommodation_note' => 'Simple ridge-top teahouses; rooms are basic and fill fast in season',
            ],
            [
                'title' => 'Poon Hill Trek',
                'slug' => 'poon-hill-trek',
                'category' => 'Trekking',
                'type' => 'trekking',
                'destination_id' => 4,
                'duration' => '5 Days',
                'description' => 'The classic short trek of the Annapurna foothills — stone staircases through Magar and Gurung villages to a sunrise view of Dhaulagiri and the Annapurnas from 3,210m.',
                'price' => '650.00',
                'badge' => null,
                'highlights' => [
                    'Sunrise over Dhaulagiri, Annapurna South and Machapuchare from Poon Hill',
                    'The blue-roofed village of Ghandruk and its Gurung museum',
                    'Rhododendron forest that flowers red and pink through spring',
                    'A realistic first Himalayan trek for families and first-timers',
                ],
                'itinerary' => [
                    ['day' => 1, 'title' => 'Pokhara to Ulleri', 'description' => 'Drive to Nayapul and Hile, then climb the long stone staircase to Ulleri (1,960m).'],
                    ['day' => 2, 'title' => 'Ulleri to Ghorepani', 'description' => 'Through oak and rhododendron forest, gaining height steadily to the ridge village of Ghorepani (2,860m).'],
                    ['day' => 3, 'title' => 'Poon Hill sunrise, trek to Tadapani', 'description' => 'Pre-dawn climb to Poon Hill (3,210m) for the panorama, then a forest trail to Tadapani.'],
                    ['day' => 4, 'title' => 'Tadapani to Ghandruk, drive to Pokhara', 'description' => 'Descend to the large Gurung village of Ghandruk and drive back to Pokhara.'],
                    ['day' => 5, 'title' => 'Return to Kathmandu', 'description' => 'Drive or fly back to Kathmandu for onward travel.'],
                ],
                'inclusions' => [
                    'Annapurna Conservation Area permit and TIMS card',
                    'Licensed guide and porter support',
                    'Teahouse accommodation on trek',
                    'All meals during the trek',
                    'Pokhara trailhead transfers',
                ],
                'exclusions' => [
                    'International flights',
                    'Nepal visa fees',
                    'Travel insurance',
                    'Kathmandu–Pokhara transport',
                    'Personal expenses and tips',
                ],
                'is_active' => true,
                'trip_grade' => 'Easy to Moderate',
                'group_size_min' => 1,
                'group_size_max' => 15,
                'best_season' => 'Oct–Apr',
                'meals_note' => 'All meals included on trek',
                'accommodation_note' => 'Comfortable village teahouses, most with private rooms',
            ],
            [
                'title' => 'Gosaikunda Trek',
                'slug' => 'gosaikunda-trek',
                'category' => 'Trekking',
                'type' => 'trekking',
                'destination_id' => 14,
                'duration' => '7 Days',
                'description' => 'A trek to a chain of sacred alpine lakes at 4,380m in Langtang National Park, close enough to Kathmandu to start walking the same day you leave the city.',
                'price' => '990.00',
                'badge' => null,
                'highlights' => [
                    'The frozen lakes of Gosaikunda, a major Hindu and Buddhist pilgrimage site',
                    'Ridge views of Langtang Lirung, Ganesh Himal and the Annapurnas',
                    'The Tamang village and cheese-making tradition of Chandanbari',
                    'Option to cross the Laurebina La (4,610m) toward Helambu',
                ],
                'itinerary' => [
                    ['day' => 1, 'title' => 'Drive to Dhunche', 'description' => 'Drive from Kathmandu over the Trishuli valley to the district town of Dhunche (1,960m).'],
                    ['day' => 2, 'title' => 'Dhunche to Chandanbari', 'description' => 'Climb through oak and hemlock forest to Chandanbari / Sing Gompa (3,330m) and its small cheese factory.'],
                    ['day' => 3, 'title' => 'Chandanbari to Gosaikunda', 'description' => 'Ascend the exposed ridge past Lauribinayak, with the first lakes appearing before Gosaikunda (4,380m).'],
                    ['day' => 4, 'title' => 'Gosaikunda acclimatisation and exploration', 'description' => 'A day among the lakes — optional walk toward the Laurebina La for wider views.'],
                    ['day' => 5, 'title' => 'Gosaikunda to Chandanbari', 'description' => 'Retrace the ridge down to the forest lodges at Chandanbari.'],
                    ['day' => 6, 'title' => 'Chandanbari to Dhunche', 'description' => 'Final forest descent to Dhunche.'],
                    ['day' => 7, 'title' => 'Drive to Kathmandu', 'description' => 'Return drive to Kathmandu, arriving mid-afternoon.'],
                ],
                'inclusions' => [
                    'Langtang National Park permit and TIMS card',
                    'Licensed guide and porter support',
                    'Teahouse accommodation on trek',
                    'All meals during the trek',
                    'Kathmandu–Dhunche return transport',
                ],
                'exclusions' => [
                    'International flights',
                    'Nepal visa fees',
                    'Travel insurance',
                    'Hot showers and charging at teahouses',
                    'Personal expenses and tips',
                ],
                'is_active' => true,
                'trip_grade' => 'Moderate',
                'group_size_min' => 2,
                'group_size_max' => 12,
                'best_season' => 'Mar–May, Oct–Nov',
                'meals_note' => 'All meals included on trek',
                'accommodation_note' => 'Teahouse lodges; the lakeside lodges at Gosaikunda are very basic and cold',
            ],
            [
                'title' => 'Dubai City Escape',
                'slug' => 'dubai-city-escape',
                'category' => 'City Break',
                'type' => 'travel',
                'destination_id' => 19,
                'duration' => '5 Days',
                'description' => 'A short, well-paced first trip to Dubai — the old creek and spice souks, a desert evening, and the view from the top of the Burj Khalifa, with an English-speaking guide throughout.',
                'price' => '1150.00',
                'badge' => null,
                'highlights' => [
                    'At the Top observation deck of the Burj Khalifa',
                    'Abra boat crossing of Dubai Creek to the gold and spice souks',
                    'Evening desert safari with dune drive and a Bedouin-style camp dinner',
                    'Sheikh Zayed Grand Mosque day trip to Abu Dhabi',
                ],
                'itinerary' => [
                    ['day' => 1, 'title' => 'Arrival in Dubai', 'description' => 'Airport pickup and hotel transfer. Evening at leisure around Dubai Marina or Downtown.'],
                    ['day' => 2, 'title' => 'Old Dubai and Burj Khalifa', 'description' => 'Morning in Deira and Bur Dubai — the creek, the souks and the Al Fahidi historic quarter — then an afternoon slot At the Top of the Burj Khalifa.'],
                    ['day' => 3, 'title' => 'Desert safari', 'description' => 'Free morning, then an afternoon pickup for a dune drive, sandboarding, camel ride and dinner under lights at a desert camp.'],
                    ['day' => 4, 'title' => 'Abu Dhabi day trip', 'description' => 'Full-day excursion to the Sheikh Zayed Grand Mosque and the Corniche, returning to Dubai in the evening.'],
                    ['day' => 5, 'title' => 'Departure', 'description' => 'Free time for last-minute shopping before the airport transfer.'],
                ],
                'inclusions' => [
                    'Airport transfers and all listed tours by private air-conditioned vehicle',
                    'Hotel accommodation (4 nights) with breakfast',
                    'Burj Khalifa At the Top ticket (non-prime hours)',
                    'Desert safari with dinner',
                    'Abu Dhabi day trip with a licensed guide',
                ],
                'exclusions' => [
                    'International flights',
                    'UAE visa',
                    'Travel insurance',
                    'Lunches and dinners not listed',
                    'Personal expenses and tips',
                ],
                'is_active' => true,
                'trip_grade' => 'Easy',
                'group_size_min' => 1,
                'group_size_max' => 16,
                'best_season' => 'Nov–Mar',
                'meals_note' => 'Daily breakfast; one desert-camp dinner',
                'accommodation_note' => '4-star hotel in Downtown or Marina (upgrades on request)',
            ],
            [
                'title' => 'Chardham Yatra',
                'slug' => 'chardham-yatra',
                'category' => 'Pilgrimage',
                'type' => 'travel',
                'destination_id' => 15,
                'duration' => '11 Days',
                'description' => 'The full Uttarakhand Char Dham circuit — Yamunotri, Gangotri, Kedarnath and Badrinath — arranged with unhurried acclimatisation, trusted lodges, and support on the two walking sections.',
                'price' => '1250.00',
                'badge' => null,
                'highlights' => [
                    'Darshan at all four dhams — Yamunotri, Gangotri, Kedarnath and Badrinath',
                    'The source valleys of the Yamuna and the Ganga',
                    'Pony / palanquin arrangements for the Yamunotri and Kedarnath walks',
                    'A night in Rishikesh with the evening Ganga Aarti at Triveni Ghat',
                ],
                'itinerary' => [
                    ['day' => 1, 'title' => 'Arrive Haridwar / Rishikesh', 'description' => 'Meet the group, evening Ganga Aarti, and a briefing on the days ahead.'],
                    ['day' => 2, 'title' => 'Drive to Barkot', 'description' => 'Long mountain drive via Mussoorie toward the Yamunotri valley, overnight at Barkot.'],
                    ['day' => 3, 'title' => 'Yamunotri and back to Barkot', 'description' => 'Drive to Janki Chatti and the 6km walk (pony available) to Yamunotri temple, returning to Barkot.'],
                    ['day' => 4, 'title' => 'Drive to Uttarkashi', 'description' => 'Cross to the Bhagirathi valley; evening visit to Vishwanath temple in Uttarkashi.'],
                    ['day' => 5, 'title' => 'Gangotri and back to Uttarkashi', 'description' => 'Day trip up to Gangotri (3,100m) for darshan at the source shrine of the Ganga.'],
                    ['day' => 6, 'title' => 'Drive to Guptkashi / Sitapur', 'description' => 'Long transfer toward the Kedarnath valley.'],
                    ['day' => 7, 'title' => 'Kedarnath', 'description' => 'Drive to Sonprayag / Gaurikund and trek 16km (pony, palanquin or helicopter option) to Kedarnath (3,580m); overnight near the temple.'],
                    ['day' => 8, 'title' => 'Return to Guptkashi', 'description' => 'Morning darshan, then descend and drive back to Guptkashi.'],
                    ['day' => 9, 'title' => 'Drive to Badrinath', 'description' => 'Drive via Joshimath to Badrinath (3,300m); evening aarti at the temple.'],
                    ['day' => 10, 'title' => 'Badrinath to Rudraprayag', 'description' => 'Morning at Mana village near the Tibet border, then begin the return drive.'],
                    ['day' => 11, 'title' => 'Drive to Haridwar, departure', 'description' => 'Final drive down to the plains and drop at Haridwar / Rishikesh.'],
                ],
                'inclusions' => [
                    'All ground transport by private vehicle for the full circuit',
                    'Accommodation (10 nights) on twin-sharing basis',
                    'Daily breakfast and dinner',
                    'Tour manager / pandit support throughout',
                    'All temple-town parking, permits and green tax',
                ],
                'exclusions' => [
                    'Flights and rail to Haridwar / Dehradun',
                    'Pony, palanquin, and Kedarnath helicopter charges',
                    'Lunches',
                    'Travel insurance',
                    'Personal expenses, VIP darshan and tips',
                ],
                'is_active' => true,
                'trip_grade' => 'Moderate (high-altitude temple towns; two walking sections)',
                'group_size_min' => 2,
                'group_size_max' => 24,
                'best_season' => 'May–Jun, Sep–Oct (temples closed in winter)',
                'meals_note' => 'Breakfast and dinner daily; pure-vegetarian throughout',
                'accommodation_note' => 'Simple but clean pilgrim lodges; standards are basic at Kedarnath',
            ],
        ];

        foreach ($packages as $data) {
            // Placeholder image until real photography is sourced — see the
            // class docblock. The accessor falls back to the "NEEDS REAL
            // PHOTO" SVG while packages/<slug>.webp is absent.
            $data['image'] = 'packages/'.$data['slug'].'.webp';
            $data['gallery'] = [];

            Package::updateOrCreate(['slug' => $data['slug']], $data);
        }

        // 4. Wire the Exclusive Offers slots.
        SiteSetting::current()->update([
            'exclusive_offer_1_id' => Package::where('slug', 'kathmandu-valley-day-tour')->value('id'),
            'exclusive_offer_2_id' => Package::where('slug', 'dubai-city-escape')->value('id'),
            'exclusive_offer_3_id' => Package::where('slug', 'chardham-yatra')->value('id'),
        ]);
    }
}
