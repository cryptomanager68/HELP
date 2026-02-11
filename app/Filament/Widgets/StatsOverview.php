<?php

namespace App\Filament\Widgets;

use App\Models\ExpressionOfInterest;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Illuminate\Database\Eloquent\Builder;

class StatsOverview extends BaseWidget
{
    use InteractsWithPageFilters;
    
    protected static ?string $maxHeight = '100px';
    protected static ?int $sort = 1;
    
    public function getColumns(): int
    {
        return 2;
    }

    protected function getStats(): array
    {
        $startDate = $this->filters['startDate'] ?? null;
        $endDate = $this->filters['endDate'] ?? null;
        
        return [
            Stat::make('Total EOI Submissions', ExpressionOfInterest::query()
                ->when($startDate, fn(Builder $query) => $query->whereDate('created_at', '>=', $startDate))
                ->when($endDate, fn(Builder $query) => $query->whereDate('created_at', '<=', $endDate))
                ->count())
                ->description('All Expressions of Interest')
                ->descriptionIcon('heroicon-o-document-text')
                ->color('info')
                ->url('admin/expression-of-interests'),

            Stat::make('Equity Participants', ExpressionOfInterest::query()
                ->when($startDate, fn(Builder $query) => $query->whereDate('created_at', '>=', $startDate))
                ->when($endDate, fn(Builder $query) => $query->whereDate('created_at', '<=', $endDate))
                ->where('participant_type', 'equity_participant')
                ->count())
                ->description('Property Owners with Equity')
                ->descriptionIcon('heroicon-o-home')
                ->color('success')
                ->url('admin/expression-of-interests?tableFilters[participant_type][value]=equity_participant'),

            Stat::make('Property Owners', ExpressionOfInterest::query()
                ->when($startDate, fn(Builder $query) => $query->whereDate('created_at', '>=', $startDate))
                ->when($endDate, fn(Builder $query) => $query->whereDate('created_at', '<=', $endDate))
                ->where('participant_type', 'property_owner')
                ->count())
                ->description('Site Holders / Sellers')
                ->descriptionIcon('heroicon-o-building-office')
                ->color('primary')
                ->url('admin/expression-of-interests?tableFilters[participant_type][value]=property_owner'),

            Stat::make('Recent Submissions (7 days)', ExpressionOfInterest::query()
                ->where('created_at', '>=', now()->subDays(7))
                ->count())
                ->description('Last 7 Days')
                ->descriptionIcon('heroicon-o-clock')
                ->color('warning')
                ->url('admin/expression-of-interests'),
        ];
    }
}
