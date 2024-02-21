<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Jeffgreco13\FilamentBreezy\BreezyCore;
use Althinect\FilamentSpatieRolesPermissions\FilamentSpatieRolesPermissionsPlugin;

class EspePanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('espe')
            ->path('espe')
            ->login()
            ->profile()
            //->registration()
            ->colors([
                'primary' => 'rgb(99, 102, 241)',
            ])
            ->sidebarCollapsibleOnDesktop(true)
            ->font('Poppins')
            ->brandName('Software League')

            ->navigationGroups([
                'Contabilidad',
                "Sanciones",
                'Estadísticas',
                'Usuarios',
                'Configuración',
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                //Widgets\AccountWidget::class,
                //Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
                \Hasnayeen\Themes\Http\Middleware\SetTheme::class
            ])

            ->plugin(
                BreezyCore::make()
                    ->myProfile(
                        shouldRegisterUserMenu: true, // Sets the 'account' link in the panel User Menu (default = true)
                        shouldRegisterNavigation: false, // Adds a main navigation item for the My Profile page (default = false)
                        navigationGroup: 'Settings', // Sets the navigation group for the My Profile page (default = null)
                        hasAvatars: false, // Enables the avatar upload form component (default = false)
                        slug: 'my-profile' // Sets the slug for the profile page (default = 'my-profile')

                    )
                    ->enableTwoFactorAuthentication(
                        force: false, // force the user to enable 2FA before they can use the application (default = false)
                    )

            )
            ->plugin(
                \Hasnayeen\Themes\ThemesPlugin::make()
            )
            //->plugin(FilamentSpatieRolesPermissionsPlugin::make())

            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
