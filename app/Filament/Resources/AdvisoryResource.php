<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AdvisoryResource\Pages;
use App\Filament\Resources\AdvisoryResource\RelationManagers;
use App\Filament\Resources\AdvisoryResource\RelationManagers\EcsRelationManager;
use App\Models\Advisory;
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
use App\Models\Category;
use App\Models\Department;
use App\Models\Signatory;
use Filament\Tables\Actions\RecordCheckboxPosition;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use pxlrbt\FilamentExcel\Exports\ExcelExport;
use Filament\Tables\Filters\SelectFilter;


class AdvisoryResource extends Resource
{
    protected static ?string $model = Advisory::class;

    protected static ?string $recordTitleAttribute = 'title';

    protected static ?string $navigationGroup = 'NEA Memoranda';
    protected static ?string $navigationLabel = 'Advisory';
    protected static ?string $navigationIcon = 'heroicon-o-exclamation';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Card::make()->schema([

                Select::make('category')
                ->label('Advisory Type')
                ->options(Category::all()->pluck('name','name'))
                ->searchable()->required(),

                TextInput::make('no_memo')
                ->label('Document Number'),

                DatePicker::make('date_memo')->required(),
    
                Textarea::make('title')
                ->rows(3)
                ->cols(20)->required(),
    
                Select::make('signatory')
                ->label('Signatory')
                ->options(Signatory::all()->pluck('fullname','fullname'))
                ->searchable()->required(),

                Select::make('ecs')
                ->label('EC/s')
                ->multiple()
                ->relationship('ecs', 'name')
                ->preload()
                ->searchable(),

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
            ->description(fn (Advisory $record): string => $record->category, position: 'above')
            ->description(fn (Advisory $record): string => $record->no_memo, position: 'above')
            ->description(fn (Advisory $record): string => $record->signatory, position: 'below'),
            Tables\Columns\TextColumn::make('date_posted')->sortable()->dateTime()->size('sm'),
            Tables\Columns\TextColumn::make('dept')->sortable()->searchable(),          //
        ])
            ->filters([
                SelectFilter::make('category')
                ->label('Advisory Type')
                ->multiple()
                ->options([
                    'Advisory to All ECs' => 'Advisory to All ECs',
                    'IT Advisory' => 'IT Advisory',
                    'Institutional Advisory' => 'Institutional Advisory',
                    'Legal Advisory' => 'Legal Advisory',
                    'NETI Advisory' => 'NETI Advisory',
                    'Regulatory Advisory' => 'Regulatory Advisory',
                    'Technical Advisory' => 'Technical Advisory',
                ]),
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
                ->url(fn (Advisory $record): string => route('downloadadv', ['id' => $record]), shouldOpenInNewTab: true),
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
            EcsRelationManager::class,
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAdvisories::route('/'),
            'create' => Pages\CreateAdvisory::route('/create'),
            'edit' => Pages\EditAdvisory::route('/{record}/edit'),
            'view' => Pages\ViewAdvisory::route('/{record}'),
        ];
    }    
}
