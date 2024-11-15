<?php

namespace App\Filament\Resources;

use App\Models\Cat;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\CatResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CatResource\RelationManagers;
use Filament\Forms\Components\Card;

class CatResource extends Resource
{
    protected static ?string $model = Cat::class;

    protected static ?string $navigationIcon = 'heroicon-o-heart';

    protected static ?string $navigationGroup = 'User & Community';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
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
                    FileUpload::make('photo_url')->label('Photo'),
                    Forms\Components\Hidden::make('user_id')
                        ->default(Auth::id()) // Ambil ID user yang sedang login dan simpan sebagai user_id
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name_cat'),
                Tables\Columns\TextColumn::make('age'),
                Tables\Columns\TextColumn::make('gender'),
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\ImageColumn::make('photo_url')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->form([
                        TextInput::make('name_cat'),
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
                        FileUpload::make('photo_url')->label('Photo'),
                    ]),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListCats::route('/'),
            'create' => Pages\CreateCat::route('/create'),
            'edit' => Pages\EditCat::route('/{record}/edit'),
        ];
    }
}
