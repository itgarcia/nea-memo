<?php

namespace App\Providers;

use App\Filament\Resources\PermissionResource;
use App\Filament\Resources\RoleResource;
use App\Filament\Resources\UserResource;
use Filament\Facades\Filament;
use Filament\Navigation\UserMenuItem;
use Illuminate\Support\ServiceProvider;


class FilamentServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

        Filament::serving(function () {
            if (auth()->user()){
                if (auth()->user()->hasRole(['superadmin','Admin'])){
                    Filament::registerUserMenuItems([
                        UserMenuItem::make()
                        ->label('Manage Users')
                        ->url(UserResource::getUrl())
                        ->icon('heroicon-o-user-group'),
                        UserMenuItem::make()
                        ->label('Manage Roles')
                        ->url(RoleResource::getUrl())
                        ->icon('heroicon-o-finger-print'),
                        UserMenuItem::make()
                        ->label('Manage Permission')
                        ->url(PermissionResource::getUrl())
                        ->icon('heroicon-o-key'),
                    ]);
                }
            }
                       // Using Vite
            Filament::registerViteTheme('resources/css/filament.css');
         
        });
    }
}
