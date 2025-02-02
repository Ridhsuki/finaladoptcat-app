<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Post;
use Filament\Tables;
use App\Models\Comment;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\CommentResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CommentResource\RelationManagers;
use App\Filament\Resources\CommentResource\RelationManagers\PostRelationManager;
use App\Filament\Resources\CommentResource\RelationManagers\PostsRelationManager;

class CommentResource extends Resource
{
    protected static ?string $model = Comment::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-ellipsis';
    protected static ?string $navigationGroup = 'User & Community';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Input untuk memilih Post
                Select::make('post_id') // Nama field yang sesuai dengan kolom relasi
                    ->label('Select Post')
                    ->options(Post::all()->pluck('title', 'id')) // Mengambil ID dan judul dari post
                    ->searchable()
                    ->required(),
                // Input lainnya seperti content
                Forms\Components\Textarea::make('content')
                    ->label('Comment')
                    ->required(),
                Hidden::make('user_id')
                    ->default(Auth::id()),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')->label('User'),
                TextColumn::make('post.title')->label('Post'),
                TextColumn::make('content')->limit(20),
                TextColumn::make('created_at')->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make()
                        ->form([
                            Select::make('post_id') // Nama field yang sesuai dengan kolom relasi
                                ->label('Select Post')
                                ->options(Post::all()->pluck('title', 'id')) // Mengambil ID dan judul dari post
                                ->searchable() // Agar dapat mencari
                                ->required(), // Field ini wajib diisi
                            // Input lainnya seperti content
                            Forms\Components\Textarea::make('content')
                                ->label('Comment')
                        ]),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
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
            PostRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListComments::route('/'),
            'create' => Pages\CreateComment::route('/create'),
            // 'edit' => Pages\EditComment::route('/{record}/edit'),
        ];
    }
}
