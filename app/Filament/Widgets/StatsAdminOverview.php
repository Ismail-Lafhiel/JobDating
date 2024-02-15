<?php

namespace App\Filament\Widgets;

use App\Models\Announcement;
use App\Models\Company;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsAdminOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $userCount = User::count();
        $companyCount = Company::count();
        $announcementCount = Announcement::count();
        return [
            Stat::make('Total Users', $userCount),
            Stat::make('Total Companies', $companyCount),
            Stat::make('Total Announcements', $announcementCount),
        ];
    }
}
