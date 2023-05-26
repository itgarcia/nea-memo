<?php

namespace App\Filament\Resources\OfficeMemoResource\Pages;

use App\Filament\Resources\OfficeMemoResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOfficeMemos extends ListRecords
{
    protected static string $resource = OfficeMemoResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Create'),
        ];
    }
}
