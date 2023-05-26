<?php

namespace App\Filament\Resources\SignatoryResource\Pages;

use App\Filament\Resources\SignatoryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSignatory extends CreateRecord
{
    protected static string $resource = SignatoryResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
