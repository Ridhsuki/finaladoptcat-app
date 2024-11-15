<?php

namespace App\Filament\Resources;

use App\Models\Cat;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\AdopsiPost;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AdopsiPostResource\Pages;
use App\Filament\Resources\AdopsiPostResource\RelationManagers\CatRelationManager;


class AdopsiPostResource extends Resource
{
    protected static ?string $model = AdopsiPost::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $navigationGroup = 'Content Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('cat_id') // Menambahkan input untuk memilih kucing
                    ->label('Select Cat')
                    ->options(Cat::all()->pluck('name_cat', 'id')) // Mengambil ID dan nama kucing
                    ->searchable()
                    ->required(),
                Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'approved' => 'Approved',
                        'rejected' => 'Rejected',
                    ])
                    ->required(),
                Forms\Components\Hidden::make('user_id')
                    ->default(Auth::id()),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')->label('Applicant'),
                TextColumn::make('cat.photo_url')->label('Cat'),
                TextColumn::make('status'),
                TextColumn::make('created_at')->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->form([
                        Select::make('status')
                            ->options([
                                'pending' => 'Pending',
                                'approved' => 'Approved',
                                'rejected' => 'Rejected',
                            ])
                            ->required(),
                        // FileUpload::make(Cat::all()->pluck('photo_url', 'id')),
                        Select::make('cat_id') // Menambahkan input untuk memilih kucing
                            ->label('Info Cat')
                            ->options(Cat::all()->pluck('name_cat', 'id')) // Mengambil ID dan nama kucing
                    ]),
                Tables\Actions\EditAction::make(),
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
            CatRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAdopsiPosts::route('/'),
            'create' => Pages\CreateAdopsiPost::route('/create'),
            // 'edit' => Pages\EditAdopsiPost::route('/{record}/edit'),
        ];
    }
}
