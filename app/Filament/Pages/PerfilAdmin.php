<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;

class PerfilAdmin extends Page
{
    protected string $view = 'filament.pages.perfil-admin';
    protected static ?string $slug = 'perfil';
    protected static ?int $navigationSort = 8;

    public static function getNavigationIcon(): string|\BackedEnum|null
    {
        return 'heroicon-o-user-circle';
    }

    public static function getNavigationLabel(): string
    {
        return 'Mi Perfil';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Sistema';
    }

    public function getTitle(): string
    {
        return 'Mi Perfil';
    }

    public function getUserProperty()
    {
        return Auth::user();
    }
}