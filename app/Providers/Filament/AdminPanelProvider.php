<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->authGuard('web')
            ->profile(isSimple: false)
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                AccountWidget::class,
                FilamentInfoWidget::class,
            ])
            ->navigationGroups([
                NavigationGroup::make('Principal')->collapsible(false),
                NavigationGroup::make('Finanzas')->collapsible(false),
                NavigationGroup::make('Sistema')->collapsible(false),
            ])
            ->navigationItems([
                NavigationItem::make('Inicio')
                    ->url('/admin')
                    ->icon('heroicon-o-home')
                    ->group('Principal')
                    ->sort(1),
                NavigationItem::make('Eventos')
                    ->url('/admin/eventos')
                    ->icon('heroicon-o-calendar')
                    ->group('Principal')
                    ->sort(2),
                NavigationItem::make('Tipos de entrada')
                    ->url('/admin/tipos-entrada')
                    ->icon('heroicon-o-ticket')
                    ->group('Principal')
                    ->sort(3),
                NavigationItem::make('Pedidos')
                    ->url('/admin/pedidos')
                    ->icon('heroicon-o-shopping-bag')
                    ->group('Principal')
                    ->sort(4),
                NavigationItem::make('Usuarios')
                    ->url('/admin/usuarios')
                    ->icon('heroicon-o-users')
                    ->group('Principal')
                    ->sort(5),
                NavigationItem::make('Reportes')
                    ->url('/admin/reportes')
                    ->icon('heroicon-o-chart-bar')
                    ->group('Finanzas')
                    ->sort(6),
                NavigationItem::make('Pagos')
                    ->url('/admin/pagos')
                    ->icon('heroicon-o-credit-card')
                    ->group('Finanzas')
                    ->sort(7),
                NavigationItem::make('Ajustes')
                    ->url('/admin/ajustes')
                    ->icon('heroicon-o-cog-6-tooth')
                    ->group('Sistema')
                    ->sort(8),
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                ShareErrorsFromSession::class,
                PreventRequestForgery::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}