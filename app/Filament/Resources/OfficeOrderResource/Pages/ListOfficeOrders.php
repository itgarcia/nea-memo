<?php

namespace App\Filament\Resources\OfficeOrderResource\Pages;

use App\Filament\Resources\OfficeOrderResource;
use App\Filament\Resources\OfficeOrderResource\Widgets\OfficeOrderOverview;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOfficeOrders extends ListRecords
{
    protected static string $resource = OfficeOrderResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Create'),
        ];
    }
    
}
