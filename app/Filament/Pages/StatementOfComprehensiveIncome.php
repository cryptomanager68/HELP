<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Services\StatementOfComprehensiveIncome as StatementService;

class StatementOfComprehensiveIncome extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';

    protected static string $view = 'filament.pages.statement-of-comprehensive-income';
    
    protected static ?string $navigationGroup = 'Accounting';
    
    protected static ?string $navigationLabel = 'Statement of Comprehensive Income';
    
    protected static ?int $navigationSort = 5;

    public $statement;

    public function mount(): void
    {
        $service = new StatementService();
        $this->statement = $service->generate();
    }

    /**
     * Allow all authenticated users to access this page
     */
    public static function canAccess(): bool
    {
        return true;
    }
}
