<?php

namespace App\Filament\Resources\OfficeMemoResource\Widgets;

use App\Models\OfficeMemo;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class OfficeMemoOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Office Order', OfficeMemo::count())
            ->description('all office order')
            ->descriptionIcon('heroicon-s-trending-up')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->color('primary'),
        // ...
        ];
    }
}
