<?php

namespace App\Filament\Resources\MemoToEcResource\Pages;

use App\Filament\Resources\MemoToEcResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMemoToEc extends CreateRecord
{
    protected static string $resource = MemoToEcResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Memo to ECs Successfully Created!';
    }
}
