<?php

namespace App\Filament\Resources\AdopsiPostResource\RelationManagers;

use App\Models\Cat;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Actions\Action;
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
    protected static string $relationship = 'adoptPost';
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
        ->columns([
            TextColumn::make('name_cat')->label('Cat Name'),
            TextColumn::make('age')->label('Age'),
            TextColumn::make('gender')->label('Gender'),
            TextColumn::make('location')->label('Location'),
            BadgeColumn::make('status')
                ->colors([
                    'primary' => 'available',
                    'danger' => 'adopted',
                ]),
        ])
        ->actions([
            Action::make('approve')
                ->label('Approve')
                ->action(function ($record) {
                    $record->update(['status' => 'adopted']);
                })
                ->color('success'),
            Action::make('reject')
                ->label('Reject')
                ->action(function ($record) {
                    $record->update(['status' => 'rejected']);
                })
                ->color('danger'),
        ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
