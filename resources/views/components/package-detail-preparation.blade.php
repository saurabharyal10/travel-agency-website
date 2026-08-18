@php
    $categoryLabels = [
        'packing_list' => 'Packing List',
        'difficulty' => 'Difficulty',
        'insurance' => 'Insurance',
        'useful_info' => 'Useful Info',
    ];
@endphp

@if ($package->preparationTips->isNotEmpty())
    <div>
        <h2 class="font-heading text-h4 font-bold text-text-primary">Preparation &amp; Useful Info</h2>

        <div class="mt-6 space-y-8">
            @foreach ($package->preparationTips->groupBy('category') as $category => $tips)
                <div>
                    <h3 class="font-heading text-h6 font-bold text-text-primary">{{ $categoryLabels[$category] ?? $category }}</h3>
                    <div class="
                        mt-2 font-body text-sm leading-relaxed text-text-secondary
                        [&_p]:mt-2
                        [&_ul]:mt-2 [&_ul]:list-disc [&_ul]:space-y-1 [&_ul]:pl-5
                        [&_ol]:mt-2 [&_ol]:list-decimal [&_ol]:space-y-1 [&_ol]:pl-5
                        [&_a]:text-primary [&_a]:underline [&_a]:underline-offset-2
                        [&_strong]:font-semibold [&_strong]:text-text-primary
                    ">
                        @foreach ($tips as $tip)
                            {!! $tip->content !!}
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif
