<?php

namespace App\Filament\Resources\OfficeMemoResource\Pages;

use App\Filament\Resources\OfficeMemoResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Pages\Actions\CreateAction;

class CreateOfficeMemo extends CreateRecord
{
    protected static string $resource = OfficeMemoResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Office Memo Successfully Created!';
    }
}
