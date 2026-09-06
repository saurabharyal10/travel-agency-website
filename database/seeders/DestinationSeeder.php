<?php

namespace Database\Seeders;

use App\Models\Destination;
use App\Models\Package;
use Illuminate\Database\Seeder;

class DestinationSeeder extends Seeder
{
    /**
     * Seeds the site's Destinations - the 12 Nepal domestic regions the
     * existing Packages already cover or are adjacent to, plus 6
     * international routes Nepali travelers commonly book alongside them.
     *
     * Images are not sourced/copied here - every path below already exists
     * on the "public" disk under storage/app/public/destinations/, either
     * reused from an existing Package/region photo (for destinations that
     * already have one) or freshly sourced for the ones that didn't.
     *
     * Safe to re-run: uses updateOrCreate keyed on slug. Also links each
     * destination to its matching existing Packages by slug (where one
     * exists) via Package::destination_id - packages with no matching
     * destination in this list, or destinations with no packages yet
     * (all 6 international ones, plus Manaslu/Bardia/Rara/Ilam), are left
     * as-is rather than forcing a match that doesn't exist.
     */
    public function run(): void
    {
        $destinations = [
            [
                'name' => 'Kathmandu Valley',
                'slug' => 'kathmandu-valley',
                'tagline' => 'Temples, Palaces & Living Heritage',
                'description' => 'Nepal\'s cultural heart - a valley of UNESCO World Heritage temple squares, ancient palaces, and everyday life that has carried on around them for centuries.',
                'image' => 'destinations/kathmandu-valley.webp',
                'sort_order' => 10,
                'package_slugs' => ['kathmandu-valley-day-tour', 'kathmandu-food-culture-walk'],
            ],
            [
                'name' => 'Pokhara',
                'slug' => 'pokhara',
                'tagline' => 'Gateway to Annapurna',
                'description' => 'A lakeside city framed by the Annapurna range, where Phewa Lake, paragliding launch sites, and the trailheads for some of Nepal\'s most iconic treks all sit within a short drive of each other.',
                'image' => 'destinations/pokhara.webp',
                'sort_order' => 20,
                'package_slugs' => ['pokhara', 'pokhara-valley-getaway', 'pokhara-adventure-add-ons', 'annapurna-circuit'],
            ],
            [
                'name' => 'Chitwan',
                'slug' => 'chitwan',
                'tagline' => 'Jungle Safari & Wildlife',
                'description' => 'Nepal\'s premier lowland national park - a subtropical jungle of one-horned rhinos, gharial crocodiles, and, if you\'re lucky, a Bengal tiger sighting from a jeep or dugout canoe.',
                'image' => 'destinations/chitwan.webp',
                'sort_order' => 30,
                'package_slugs' => ['chitwan-safari', 'chitwan-wildlife-safari'],
            ],
            [
                'name' => 'Mustang',
                'slug' => 'mustang',
                'tagline' => 'Ancient Kingdom, Untouched',
                'description' => 'A high-altitude desert kingdom on the Tibetan plateau\'s edge, where wind-carved canyons, centuries-old monasteries, and the walled city of Lo Manthang feel like another era entirely.',
                'image' => 'destinations/mustang.webp',
                'sort_order' => 40,
                'package_slugs' => ['mustang'],
            ],
            [
                'name' => 'Manaslu',
                'slug' => 'manaslu',
                'tagline' => 'Off the Beaten Path',
                'description' => 'The circuit around the world\'s eighth-highest mountain - a quieter alternative to Annapurna and Everest, threading through Tibetan-influenced villages and glacier-fed valleys.',
                'image' => 'destinations/manaslu.webp',
                'sort_order' => 50,
                'package_slugs' => [],
            ],
            [
                'name' => 'Everest / Solu Khumbu',
                'slug' => 'everest-solu-khumbu',
                'tagline' => 'Home of Legends',
                'description' => 'The Khumbu region\'s Sherpa heartland - Namche Bazaar, Tengboche Monastery, and the trail to the foot of the world\'s highest mountain.',
                'image' => 'destinations/everest-solu-khumbu.webp',
                'sort_order' => 60,
                'package_slugs' => ['everest-base-camp', 'everest-view-trek'],
            ],
            [
                'name' => 'Nagarkot',
                'slug' => 'nagarkot',
                'tagline' => 'Sunrise Over the Himalaya',
                'description' => 'A hilltop viewpoint just outside Kathmandu, best known for sunrise panoramas stretching from Langtang to the Everest range.',
                'image' => 'destinations/nagarkot.webp',
                'sort_order' => 70,
                'package_slugs' => ['nagarkot-sunrise-changu-narayan-hike'],
            ],
            [
                'name' => 'Chandragiri Hills',
                'slug' => 'chandragiri-hills',
                'tagline' => 'Cable Car Above the Valley',
                'description' => 'A cable car ride above the Kathmandu Valley to a forested hilltop with a temple, a Himalayan panorama, and one of the easiest big-view outings near the city.',
                'image' => 'destinations/chandragiri-hills.webp',
                'sort_order' => 80,
                'package_slugs' => ['chandragiri-hills-day-tour'],
            ],
            [
                'name' => 'Bardia National Park',
                'slug' => 'bardia-national-park',
                'tagline' => 'Nepal\'s Wildest Corner',
                'description' => 'A far-western national park with one of the highest densities of wild Bengal tigers anywhere, plus rhinos, elephants, and river dolphins - all with a fraction of Chitwan\'s crowds.',
                'image' => 'destinations/bardia-national-park.webp',
                'sort_order' => 90,
                'package_slugs' => [],
            ],
            [
                'name' => 'Rara Lake',
                'slug' => 'rara-lake',
                'tagline' => 'Nepal\'s Largest Lake',
                'description' => 'A remote alpine lake in the far northwest, ringed by pine forest and rarely-visited mountains - one of the most untouched places in the country.',
                'image' => 'destinations/rara-lake.webp',
                'sort_order' => 100,
                'package_slugs' => [],
            ],
            [
                'name' => 'Ilam Tea Hills',
                'slug' => 'ilam-tea-hills',
                'tagline' => 'Nepal\'s Tea Country',
                'description' => 'Rolling tea estates in Nepal\'s far east, closer in feel to Darjeeling than the Himalaya - a quieter, greener side of the country built around tea gardens and hill towns.',
                'image' => 'destinations/ilam-tea-hills.webp',
                'sort_order' => 110,
                'package_slugs' => [],
            ],
            [
                'name' => 'Langtang Valley',
                'slug' => 'langtang-valley',
                'tagline' => 'The Valley of Glaciers',
                'description' => 'The closest Himalayan trekking region to Kathmandu - a glacier-carved valley of Tamang villages, yak pastures, and mountain views that rival treks twice as far from the capital.',
                'image' => 'destinations/langtang-valley.webp',
                'sort_order' => 120,
                'package_slugs' => ['langtang-valley'],
            ],
            [
                'name' => 'Char Dham Yatra',
                'slug' => 'char-dham-yatra',
                'tagline' => 'The Himalayan Pilgrimage Circuit',
                'description' => 'India\'s four sacred Himalayan shrines - Yamunotri, Gangotri, Kedarnath, and Badrinath - a pilgrimage circuit through Uttarakhand that draws travelers from across Nepal and India alike.',
                'image' => 'destinations/char-dham-yatra.webp',
                'sort_order' => 200,
                'package_slugs' => [],
            ],
            [
                'name' => 'Maldives',
                'slug' => 'maldives',
                'tagline' => 'Overwater & Endless Blue',
                'description' => 'Coral atolls, overwater villas, and some of the clearest lagoon water anywhere - the classic beach-and-honeymoon add-on to a Nepal itinerary.',
                'image' => 'destinations/maldives.webp',
                'sort_order' => 210,
                'package_slugs' => [],
            ],
            [
                'name' => 'Bali',
                'slug' => 'bali',
                'tagline' => 'Rice Terraces & Temples',
                'description' => 'Terraced rice fields, volcano views, and centuries-old temples across an island that pairs easily with a longer Southeast Asia trip.',
                'image' => 'destinations/bali.webp',
                'sort_order' => 220,
                'package_slugs' => [],
            ],
            [
                'name' => 'Thailand (Bangkok-Phuket)',
                'slug' => 'thailand-bangkok-phuket',
                'tagline' => 'City Energy to Island Beaches',
                'description' => 'Bangkok\'s temples and street food followed by Phuket\'s beaches - a two-in-one Thailand route covering both the capital\'s energy and the south\'s coastline.',
                'image' => 'destinations/thailand-bangkok-phuket.webp',
                'sort_order' => 230,
                'package_slugs' => [],
            ],
            [
                'name' => 'Dubai / UAE',
                'slug' => 'dubai-uae',
                'tagline' => 'Desert Meets Skyline',
                'description' => 'A short flight from Kathmandu into a different kind of landscape entirely - the Burj Khalifa skyline, desert safaris, and duty-free shopping.',
                'image' => 'destinations/dubai-uae.webp',
                'sort_order' => 240,
                'package_slugs' => [],
            ],
            [
                'name' => 'Singapore',
                'slug' => 'singapore',
                'tagline' => 'Gardens, Skyline & Street Food',
                'description' => 'A compact, easy-to-navigate city-state built around Marina Bay\'s skyline, Gardens by the Bay, and a hawker-stall food scene that rewards wandering.',
                'image' => 'destinations/singapore.webp',
                'sort_order' => 250,
                'package_slugs' => [],
            ],
        ];

        foreach ($destinations as $data) {
            $packageSlugs = $data['package_slugs'];
            unset($data['package_slugs']);

            $destination = Destination::updateOrCreate(
                ['slug' => $data['slug']],
                $data
            );

            Package::whereIn('slug', $packageSlugs)->update(['destination_id' => $destination->id]);
        }
    }
}
