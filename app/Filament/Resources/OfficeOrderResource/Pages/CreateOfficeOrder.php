<?php

namespace App\Filament\Resources\OfficeOrderResource\Pages;

use App\Filament\Resources\OfficeOrderResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateOfficeOrder extends CreateRecord
{
    protected static string $resource = OfficeOrderResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Office Order Successfully Created!';
    }
}
