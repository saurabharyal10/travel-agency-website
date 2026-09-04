<?php

namespace App\Filament\Pages;

use App\Models\SiteSetting;
use Filament\Forms\Components\Section;
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
                    ]),
                Section::make('Social Links')
                    ->columns(3)
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
                    ]),
                Section::make('Footer')
                    ->schema([
                        TextInput::make('footer_copyright_text')
                            ->maxLength(255)
                            ->placeholder('© 2026 TRAVEL. All rights reserved.'),
                    ]),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        SiteSetting::current()->update($this->form->getState());

        Notification::make()
            ->title('Settings saved')
            ->success()
            ->send();
    }
}
