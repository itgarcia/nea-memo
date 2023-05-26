<?php

namespace App\Filament\Resources\OfficeOrderResource\Widgets;

use App\Models\Advisory;
use App\Models\MemoToEc;
use App\Models\OfficeMemo;
use App\Models\OfficeOrder;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class OfficeOrderOverview extends BaseWidget
{
    
    protected function getCards(): array
    {
        $year = date('Y');

        return [
            Card::make('Office Order', OfficeOrder::whereYear('date_memo', $year)->count())
            ->description('as of this year ' .$year)
            ->descriptionIcon('heroicon-s-trending-up')
            ->chart([7, 2, 10, 3, 15, 4, 7])
            ->color('success'),
      
            Card::make('Office Memo', OfficeMemo::whereYear('date_memo', $year)->count())
            ->description('as of this year ' .$year)
            ->descriptionIcon('heroicon-s-trending-up')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->color('danger'),

            Card::make('Memo to ECs', MemoToEc::whereYear('date_memo', $year)->count())
            ->description('as of this year ' .$year)
            ->descriptionIcon('heroicon-s-trending-up')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->color('warning'),

            Card::make('Advisories', Advisory::whereYear('date_memo', $year)->count())
            ->description('as of this year ' .$year)
            ->descriptionIcon('heroicon-s-trending-up')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->color('purple'),
        // ...
        ];
    }

 
}
