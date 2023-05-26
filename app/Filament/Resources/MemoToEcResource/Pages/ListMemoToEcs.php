<?php

namespace App\Filament\Resources\MemoToEcResource\Pages;

use App\Filament\Resources\MemoToEcResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMemoToEcs extends ListRecords
{
    protected static string $resource = MemoToEcResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Create'),
        ];
    }
}
