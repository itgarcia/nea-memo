<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OfficeMemoResource\Pages;
use App\Filament\Resources\OfficeMemoResource\RelationManagers;
use App\Filament\Resources\OfficeMemoResource\RelationManagers\EmployeesRelationManager;
use App\Filament\Resources\OfficeMemoResource\Widgets\OfficeMemoOverview;
use App\Models\OfficeMemo;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\IconColumn;
use Filament\Forms\Components\Select;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\Layout;
use Filament\Forms\Components\Card;
use App\Http\Controllers\downloadController;
use App\Models\Department;
use App\Models\Signatory;
use Filament\Tables\Actions\Action;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use pxlrbt\FilamentExcel\Exports\ExcelExport;

class OfficeMemoResource extends Resource
{
    protected static ?string $model = OfficeMemo::class;
    protected static ?string $recordTitleAttribute = 'title';

    protected static ?string $navigationGroup = 'NEA Memoranda';
    protected static ?string $navigationLabel = 'Office Memo';
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-list';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Card::make()->schema([
                Textarea::make('title')
                ->rows(3)
                ->cols(20)->required(),

                DatePicker::make('date_memo')->required(),

                Select::make('employees')
                ->label('Employee')
                ->multiple()
                ->relationship('employees', 'name')
                ->preload()
                ->searchable(),
    
                Select::make('signatory')
                ->label('Signatory')
                ->options(Signatory::all()->pluck('fullname','fullname'))
                ->searchable()->required(),

                Select::make('dept')
                ->label('From Department')
                ->options(Department::all()->pluck('code','code'))
                ->searchable()->required(),
    
                DateTimePicker::make('date_posted')->required(),
                FileUpload::make('upload')
                ->preserveFilenames()
                ->acceptedFileTypes(['application/pdf'])
                ->minSize(1)
                ->maxSize(2024)
                ->required(),
            ])->columns(2)
       
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('date_memo')->sortable()->date('m-d-Y')->size('sm')->label('Date'),
            Tables\Columns\TextColumn::make('title')->sortable()->searchable()
            ->size('sm')->wrap()
            ->description(fn (OfficeMemo $record): string => $record->signatory, position: 'below'),
            Tables\Columns\TextColumn::make('date_posted')->sortable()->dateTime()->size('sm'),
            Tables\Columns\TextColumn::make('dept')->sortable()->searchable(),         //
        ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                ->color('warning')
                ->icon('heroicon-s-download')
                ->button(),
                Action::make('download')
                ->color('success')
                ->icon('heroicon-s-download')
                ->button()
                ->url(fn (OfficeMemo $record): string => route('downloadmemo', ['id' => $record]), shouldOpenInNewTab: true),
            ])
            ->bulkActions([
                ExportBulkAction::make()->exports([
                    ExcelExport::make('form')->fromForm()
                    ->askForFilename(),
                ]),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            EmployeesRelationManager::class,
        ];
    }
    public static function getWidgets(): array
    {
        return[
            OfficeMemoOverview::class,
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOfficeMemos::route('/'),
            'create' => Pages\CreateOfficeMemo::route('/create'),
            'edit' => Pages\EditOfficeMemo::route('/{record}/edit'),
            'view' => Pages\ViewOfficeMemo::route('/{record}'),
        ];
    }    
}
