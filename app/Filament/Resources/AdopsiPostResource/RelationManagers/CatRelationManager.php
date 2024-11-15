<?php

namespace App\Filament\Resources\AdopsiPostResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class CatRelationManager extends RelationManager
{
    protected static string $relationship = 'cat';

    public function form(Form $form): Form
    {
        return $form
        ->schema([
                TextInput::make('name_cat')
                    ->required()
                    ->maxLength(255),
                TextInput::make('age')
                    ->numeric(),
                Select::make('gender')
                    ->options([
                        'male' => 'Male',
                        'female' => 'Female',
                    ])->default('Male')->placeholder('Select a gender'),
                TextInput::make('description'),
                Select::make('status')
                    ->options([
                        'available' => 'Available',
                        'pending' => 'Pending',
                        'adopted' => 'Adopted',
                    ])
                    ->label('Status')
                    ->placeholder('Select a status')
                    ->default('Available'),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
