<?php

namespace App\Filament\Resources\AdvisoryResource\Pages;

use App\Filament\Resources\AdvisoryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAdvisory extends CreateRecord
{
    protected static string $resource = AdvisoryResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Advisory Successfully Created!';
    }
}
