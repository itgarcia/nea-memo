<?php

namespace App\Filament\Resources\SignatoryResource\Pages;

use App\Filament\Resources\SignatoryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSignatory extends EditRecord
{
    protected static string $resource = SignatoryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
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
