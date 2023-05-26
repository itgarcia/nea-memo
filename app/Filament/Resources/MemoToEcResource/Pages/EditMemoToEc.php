<?php

namespace App\Filament\Resources\MemoToEcResource\Pages;

use App\Filament\Resources\MemoToEcResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMemoToEc extends EditRecord
{
    protected static string $resource = MemoToEcResource::class;

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
