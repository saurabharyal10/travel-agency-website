<?php

namespace App\Filament\Pages\Auth;

use Filament\Pages\Auth\Login as BaseLogin;

class Login extends BaseLogin
{
    /**
     * Deliberately drops the inherited "remember me" checkbox. Laravel's
     * remember-me cookie has no config-driven expiry (it's queued via
     * Cookie::forever(), effectively ~5 years) and would otherwise silently
     * keep users signed in long past SESSION_LIFETIME, defeating the
     * session-timeout fix.
     *
     * @return array<int|string, \Filament\Forms\Components\Component|\Filament\Forms\Form>
     */
    protected function getForms(): array
    {
        return [
            'form' => $this->form(
                $this->makeForm()
                    ->schema([
                        $this->getEmailFormComponent(),
                        $this->getPasswordFormComponent(),
                    ])
                    ->statePath('data'),
            ),
        ];
    }
}
