<?php

namespace App\Filament\Resources\OfficeMemoResource\Pages;

use App\Filament\Resources\OfficeMemoResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOfficeMemo extends EditRecord
{
    protected static string $resource = OfficeMemoResource::class;

    protected function getActions(): array
    {
        return [
         
        ];
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getSavedNotificationTitle(): ?string
{
    return 'Successfully Updated!';
}
}
