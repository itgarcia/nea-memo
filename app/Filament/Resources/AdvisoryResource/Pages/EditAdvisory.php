<?php

namespace App\Filament\Resources\AdvisoryResource\Pages;

use App\Filament\Resources\AdvisoryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAdvisory extends EditRecord
{
    protected static string $resource = AdvisoryResource::class;

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
