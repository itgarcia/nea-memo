<?php

namespace App\Filament\Resources\OfficeOrderResource\Widgets;

use App\Models\OfficeOrder;
use Closure;
use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class Memo extends BaseWidget
{
    protected function getTableQuery(): Builder
    {
        return OfficeOrder::query()->latest()->limit(2);
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('date_memo')->sortable()->date('m-d-Y')->size('sm')->label('Date'),
            Tables\Columns\TextColumn::make('title')->sortable()->searchable()
            ->size('sm')->wrap()
            ->description(fn (OfficeOrder $record): string => $record->no_memo, position: 'above')
            ->description(fn (OfficeOrder $record): string => $record->signatory, position: 'below'),
            Tables\Columns\TextColumn::make('date_posted')->sortable()->dateTime()->size('sm'),
        ];
    }
}
