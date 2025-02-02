<?php

namespace App\Filament\Resources;

use Filament\Tables;
use Filament\Forms\Form;
use App\Models\VisitStat;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Filament\Resources\VisitStatResource\Pages;
use Filament\Tables\Actions\Action;

class VisitStatResource extends Resource
{
    protected static ?string $model = VisitStat::class;

    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';

    protected static ?string $navigationGroup = 'Others';
    public static function canCreate(): bool
    {
        return false;  
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateIcon('heroicon-o-wrench-screwdriver')
            ->emptyStateHeading('Feature Under Development')
            ->emptyStateDescription('Visit statistics data is not available, or this feature is still under development. Please check back later.')
            ->emptyStateActions([
                Action::make('Support')
                    ->label('Support')
                    ->url('https://saweria.co/basukiridho')
                    ->icon('heroicon-m-fire')
                    ->button(),
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
            'index' => Pages\ListVisitStats::route('/'),
        ];
    }
}
