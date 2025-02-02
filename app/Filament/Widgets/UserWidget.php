<?php

namespace App\Filament\Widgets;

use App\Models\Cat;
use App\Models\Post;
use App\Models\User;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use PHPUnit\Framework\Attributes\Before;

class UserWidget extends BaseWidget
{
    protected static ?int $sort = -1;

    protected function getStats(): array
    {
        return [
            Stat::make('Users', User::count())
                ->description('All User that register ini this app')
                ->descriptionIcon('heroicon-o-user-group', IconPosition::Before)
                ->color('info'),
            Stat::make('Cats', value: Cat::count())
                ->description('All Cats')
                ->descriptionIcon('heroicon-o-heart', IconPosition::Before)
                ->color('info'),
            Stat::make('Posts', value: Post::count())
                ->description('All Post from Users')
                ->descriptionIcon('heroicon-o-folder', IconPosition::Before)
                ->color('info')
        ];
    }
}
