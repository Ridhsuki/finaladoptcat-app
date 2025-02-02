<?php

namespace App\Filament\Resources;

use App\Models\Cat;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\AdopsiPost;
use Filament\Tables\Columns\BadgeColumn;
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
use App\Models\Notification;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\ImageColumn;

class AdopsiPostResource extends Resource
{
    protected static ?string $model = AdopsiPost::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $navigationGroup = 'Content Management';

    public static function getNavigationBadge(): ?string
    {
        return Cat::doesntHave('adoptPost')
            ->orWhereHas('adoptPost', function ($query) {
                $query->where('status', 'pending');
            })
            ->count();
    }
    public static function getNavigationBadgeColor(): string|array|null
    {
        return Cat::doesntHave('adoptPost')
            ->orWhereHas('adoptPost', function ($query) {
                $query->where('status', 'pending');
            })
            ->count() > 1 ? 'warning' : 'secondary';
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('cat_id')
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
                    ->default('pending')
                    ->required(),
                Forms\Components\Hidden::make('user_id')
                    ->default(Auth::id()),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            // ->query(Cat::query())
            ->query(Cat::with('adoptPost'))
            ->columns([
                ImageColumn::make('photo_url')->label('Cat')->square()
                    ->sortable()->searchable(),
                TextColumn::make('name_cat')->label('Name')
                    ->sortable()->searchable(),
                TextColumn::make('age')->label('Age')
                    ->sortable()->searchable(),
                TextColumn::make('gender')->label('Gender')
                    ->sortable()->searchable(),
                TextColumn::make('user.name')->label('Applicant')
                    ->sortable()->searchable(),
                BadgeColumn::make('adoptPost.status')
                    ->colors([
                        'warning' => 'pending',   // Warna untuk status pending
                        'success' => 'approved',  // Warna untuk status approved
                        'danger' => 'rejected',   // Warna untuk status rejected
                    ])->default('pending')
                    ->label('Approval')
                    ->sortable()->searchable(),
                TextColumn::make('created_at')->dateTime('F d, Y')->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                // Aksi untuk menyetujui (approve)
                Tables\Actions\ActionGroup::make([
                    Action::make('approve')
                        ->label('Approve')
                        ->action(function ($record) {
                            $adopsiPost = $record->adopsiPost;
                            if ($adopsiPost && $adopsiPost->status !== 'pending') {
                                return;
                            }

                            AdopsiPost::updateOrCreate(
                                ['cat_id' => $record->id],
                                [
                                    'status' => 'approved',
                                    'user_id' => $record->user_id // pastikan user_id menggunakan milik record yang ada
                                ]
                            );

                            $catName = optional($record->cat)->name_cat;

                            // Buat pesan notifikasi
                            $message = 'Your adoption post has been approved by the admin.';
                            if ($catName) {
                                $message = 'Your adoption post "' . $catName . '" has been approved by the admin.';
                            }

                            Notification::create([
                                'user_id' => $record->user_id, // User yang mengajukan posting
                                'type' => 'approval',
                                'message' => $message,
                                'is_read' => 0,
                            ]);
                        })
                        ->color('success')
                        ->icon('heroicon-o-check'),

                    Action::make('reject')
                        ->label('Reject')
                        ->action(function ($record) {
                            $adopsiPost = $record->adopsiPost;
                            if ($adopsiPost && $adopsiPost->status !== 'pending') {
                                return;
                            }

                            AdopsiPost::updateOrCreate(
                                ['cat_id' => $record->id], // Jika sudah ada, perbarui
                                [
                                    'status' => 'rejected',
                                    'user_id' => $record->user_id // pastikan user_id menggunakan milik record yang ada
                                ]
                            );

                            $catName = optional($record->cat)->name_cat;

                            // Buat pesan notifikasi
                            $message = 'Your adoption post has been rejected by the admin.';
                            if ($catName) {
                                $message = 'Your adoption post "' . $catName . '" has been rejected by the admin.';
                            }

                            Notification::create([
                                'user_id' => $record->user_id, // User yang mengajukan posting
                                'type' => 'rejection',
                                'message' => $message,
                                'is_read' => 0,

                            ]);
                        })
                        ->color('danger')
                        ->icon('heroicon-o-x-circle'),
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
