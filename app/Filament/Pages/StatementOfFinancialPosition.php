<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Services\StatementOfFinancialPosition as StatementService;

class StatementOfFinancialPosition extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-banknotes';

    protected static string $view = 'filament.pages.statement-of-financial-position';
    
    protected static ?string $navigationGroup = 'Accounting';
    
    protected static ?string $navigationLabel = 'Statement of Financial Position';
    
    protected static ?int $navigationSort = 4;

    public $statement;

    public function mount(): void
    {
        $service = new StatementService();
        $this->statement = $service->generate();
    }
}
