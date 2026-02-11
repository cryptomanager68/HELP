<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Services\CashFlowStatement as CashFlowService;

class CashFlowStatement extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-calculator';

    protected static string $view = 'filament.pages.cash-flow-statement';
    
    protected static ?string $navigationGroup = 'Accounting';
    
    protected static ?string $navigationLabel = 'Cash Flow';
    
    protected static ?int $navigationSort = 6;

    public $statement;

    public function mount(): void
    {
        $service = new CashFlowService();
        $this->statement = $service->generate();
    }
}
