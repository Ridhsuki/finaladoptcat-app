<?php

namespace App\Filament\Resources\CommentResource\RelationManagers;

use Filament\Forms;
use App\Models\Post;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class PostRelationManager extends RelationManager
{
    protected static string $relationship = 'post';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                    // Pilih Post untuk komentar
                    Forms\Components\Select::make('post_id') // Ganti 'name' dengan 'post_id'
                        ->label('Select Post') 
                        ->options(Post::all()->pluck('title', 'id')) // Pilih berdasarkan ID, gunakan 'id' untuk 'post_id'
                        ->searchable() 
                        ->required() 
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordnameAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('post.title'),
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
