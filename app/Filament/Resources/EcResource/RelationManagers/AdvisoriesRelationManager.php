<?php

namespace App\Filament\Resources\EcResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AdvisoriesRelationManager extends RelationManager
{
    protected static string $relationship = 'advisories';

    protected static ?string $recordTitleAttribute = 'no_memo';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('no_memo')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('no_memo')->searchable(),
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
            ->headerActions([
              
            ])
            ->actions([
               
            ])
            ->bulkActions([
              
            ]);
    }    
}
