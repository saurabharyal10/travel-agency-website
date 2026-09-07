<?php

namespace App\Filament\Pages;

use App\Models\Package;
use App\Models\SiteSetting;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class ManageSiteSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static string $view = 'filament.pages.manage-site-settings';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill(SiteSetting::current()->toArray());
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Homepage & Newsletter')
                    ->schema([
                        Textarea::make('tagline')
                            ->rows(2)
                            ->maxLength(255)
                            ->helperText('The large headline in the homepage hero.'),
                        Textarea::make('newsletter_blurb')
                            ->rows(2)
                            ->maxLength(255)
                            ->helperText('Short line under the newsletter sign-up heading.'),
                    ]),
                Section::make('Contact Info')
                    ->columns(2)
                    ->schema([
                        TextInput::make('contact_address')
                            ->maxLength(255)
                            ->columnSpanFull(),
                        TextInput::make('contact_phone')
                            ->tel()
                            ->maxLength(255),
                        TextInput::make('contact_email')
                            ->email()
                            ->maxLength(255),
                        TextInput::make('whatsapp_link')
                            ->url()
                            ->maxLength(255)
                            ->placeholder('https://wa.me/...'),
                        TextInput::make('hours')
                            ->maxLength(255)
                            ->placeholder('e.g. Sun–Fri, 9am–6pm NPT')
                            ->helperText('Opening hours. Leave blank until confirmed.')
                            ->columnSpanFull(),
                    ]),
                Section::make('Social Links')
                    ->columns(2)
                    ->schema([
                        TextInput::make('facebook_url')
                            ->url()
                            ->maxLength(255),
                        TextInput::make('instagram_url')
                            ->url()
                            ->maxLength(255),
                        TextInput::make('twitter_url')
                            ->url()
                            ->maxLength(255),
                        TextInput::make('tiktok_url')
                            ->label('TikTok URL')
                            ->url()
                            ->maxLength(255),
                    ]),
                Section::make('Exclusive Offers')
                    ->description('Up to three hand-picked packages for the homepage "Exclusive Offers" strip, shown above Curated Expeditions. Leave a slot blank to skip it. Each slot must be a different package.')
                    ->columns(3)
                    ->schema([
                        Select::make('exclusive_offer_1_id')
                            ->label('1st Package')
                            ->options(fn (): array => Package::orderBy('title')->pluck('title', 'id')->all())
                            ->searchable()
                            ->preload()
                            ->placeholder('None'),
                        Select::make('exclusive_offer_2_id')
                            ->label('2nd Package')
                            ->options(fn (): array => Package::orderBy('title')->pluck('title', 'id')->all())
                            ->searchable()
                            ->preload()
                            ->placeholder('None'),
                        Select::make('exclusive_offer_3_id')
                            ->label('3rd Package')
                            ->options(fn (): array => Package::orderBy('title')->pluck('title', 'id')->all())
                            ->searchable()
                            ->preload()
                            ->placeholder('None'),
                    ]),
                Section::make('Footer')
                    ->schema([
                        TextInput::make('footer_copyright_text')
                            ->maxLength(255)
                            ->placeholder('© '.date('Y').' '.config('app.brand_name').'. All rights reserved.'),
                    ]),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $state = $this->form->getState();

        $offers = array_filter([
            $state['exclusive_offer_1_id'] ?? null,
            $state['exclusive_offer_2_id'] ?? null,
            $state['exclusive_offer_3_id'] ?? null,
        ]);

        if (count($offers) !== count(array_unique($offers))) {
            Notification::make()
                ->title('Each Exclusive Offers slot must be a different package.')
                ->danger()
                ->send();

            return;
        }

        SiteSetting::current()->update($state);

        Notification::make()
            ->title('Settings saved')
            ->success()
            ->send();
    }
}
