<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Post;
use Filament\Infolists\Components\Section;
use Filament\Tables;
use App\Models\Comment;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PostResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Filament\Resources\CommentResource\RelationManagers\PostRelationManager;
use Filament\Forms\Components\Section as ComponentsSection;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'Content Management';
    protected static ?string $recordTitleAttribute = 'title';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('type')
                    ->options([
                        'blog' => 'Blog',
                        'adoption' => 'Adoption'
                    ])->default('blog'),
                TextInput::make('title')
                    ->required()
                    ->unique(ignoreRecord: true),
                RichEditor::make('content')
                    ->required()
                    ->hintColor('primary')
                    ->columnSpanFull(),
                Card::make()->schema([
                    Repeater::make('Comments')
                        ->relationship()
                        ->schema([
                            TextInput::make('content')
                                ->nullable()
                                ->label('comment'),
                            Forms\Components\Hidden::make('user_id')
                                ->default(Auth::id())
                        ])->collapsible(),
                ]),
                Forms\Components\Hidden::make('user_id')
                    ->default(Auth::id())
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->label('Author')
                    ->default(function ($livewire) {
                        return $livewire->getOwnerRecord()?->name;
                    })->searchable(),
                TextColumn::make('type')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'blog' => 'gray',
                        'adoption' => 'success',
                    })->sortable(),
                TextColumn::make('title')
                    ->sortable()
                    ->searchable(),
                // TextColumn::make('content')
                //     ->wrap()->limit(50),
                TextColumn::make('created_at')
                    ->sortable()
                    ->dateTime('Y-m-d')
            ])
            ->filters([
                SelectFilter::make('type')
                    ->options([
                        'blog' => 'Blog',
                        'adoption' => 'Adoption'
                    ]),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make()
                        ->form([
                            TextInput::make('user.name')
                                ->label('Author')
                                ->default(function ($livewire) {
                                    return $livewire->getOwnerRecord()?->name;
                                }),
                            Select::make('type')
                                ->options([
                                    'blog' => 'Blog',
                                    'adoption' => 'Adoption'
                                ]),
                            TextInput::make('title'),
                            RichEditor::make('content')
                                ->label('Content')
                                ->hintColor('primary'),
                            ComponentsSection::make('comments')
                                ->description('This is comment from users')
                                ->schema([
                                    Repeater::make('comments')->label('')
                                        ->relationship()
                                        ->schema([
                                            TextInput::make('content')
                                                ->nullable()
                                                ->label("Comment's User"),
                                        ]),
                                ])->label('Comments'),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
