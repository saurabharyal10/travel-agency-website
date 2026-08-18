<div>
    <h2 class="font-heading text-h4 font-bold text-text-primary">Group Pricing</h2>

    <div class="mt-6 overflow-hidden rounded-2xl border border-text-secondary/10">
        <table class="w-full text-left font-body text-sm">
            <thead class="bg-background">
                <tr>
                    <th scope="col" class="px-5 py-3 text-xs font-semibold uppercase tracking-wide text-text-secondary">Group Size</th>
                    <th scope="col" class="px-5 py-3 text-right text-xs font-semibold uppercase tracking-wide text-text-secondary">Price per Person</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-text-secondary/10 bg-white">
                @forelse ($package->pricingTiers as $tier)
                    <tr>
                        <td class="px-5 py-3 text-text-primary">{{ $tier->pax_label }}</td>
                        <td class="px-5 py-3 text-right font-semibold text-text-primary">{{ $tier->formatted_price }}</td>
                    </tr>
                @empty
                    <tr>
                        <td class="px-5 py-3 text-text-primary">All group sizes</td>
                        <td class="px-5 py-3 text-right font-semibold text-text-primary">{{ $package['formatted_price'] }}</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
