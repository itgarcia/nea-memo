<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SignatoryResource\Pages;
use App\Filament\Resources\SignatoryResource\RelationManagers;
use App\Models\Signatory;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\IconColumn;
use Filament\Forms\Components\Select;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\Layout;
use App\Http\Controllers\downloadController;
use Filament\Tables\Actions\RecordCheckboxPosition;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use pxlrbt\FilamentExcel\Exports\ExcelExport;

class SignatoryResource extends Resource
{
    protected static ?string $model = Signatory::class;

    protected static ?string $navigationGroup = 'Settings';
    protected static ?string $navigationLabel = 'Signatory';
    protected static ?string $navigationIcon = 'heroicon-o-user-circle';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Card::make()->schema([
                TextInput::make('fullname')
                ->label('Full Name')
                ->required(),       
            ])->columns(2)
       
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('fullname')->sortable()->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                ->color('warning')
                ->icon('heroicon-s-download')
                ->button(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSignatories::route('/'),
            'create' => Pages\CreateSignatory::route('/create'),
            'edit' => Pages\EditSignatory::route('/{record}/edit'),
            'view' => Pages\ViewSignatory::route('/{record}'),
        ];
    }    
}
