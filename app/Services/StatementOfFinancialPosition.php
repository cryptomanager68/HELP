<?php

namespace App\Services;

use App\Models\Asset;
use App\Models\Expense;
use App\Models\Wallet; 

class StatementOfFinancialPosition
{
    
    public function cashAmount(): float
    {
        $query = Wallet::query();
        if (auth()->user()->branch_id) {
            $query->where('branch_id', "=", auth()->user()->branch_id);
        }
        return (float) $query->sum('balance'); 
    }

    public function equipmentAmount(): float
    {
        $query = Asset::query();
        if (auth()->user()->branch_id) {
            $query->where('branch_id', "=", auth()->user()->branch_id);
        }
        return (float) $query->whereIn('status', ['active'])->sum('net_book_value');
    }

    public function totalAssets(): float
    {
        return $this->cashAmount() + $this->equipmentAmount();
    }

    public function totalLiabilities(): float
    {
        $query = Expense::query();
        if (auth()->user()->branch_id) {
            $query->where('branch_id', "=", auth()->user()->branch_id);
        }
        return (float) $query->sum('expense_amount');
    }

    
    public function totalEquity(): float
    {
        return $this->totalAssets() - $this->totalLiabilities();
    }

   
    public function getReportData(): array
    {
        return [
            'cashAmount' => $this->cashAmount(),
            'equipmentAmount' => $this->equipmentAmount(),
            'totalAssets' => $this->totalAssets(),
            'totalLiabilities' => $this->totalLiabilities(),
            'totalEquity' => $this->totalEquity(),
        ];
    }
    
    public function generate(): array
    {
        $data = $this->getReportData();
        
        return [
            ['account' => 'Cash', 'amount' => $data['cashAmount']],
            ['account' => 'Equipment', 'amount' => $data['equipmentAmount']],
            ['account' => 'Total Assets', 'amount' => $data['totalAssets']],
            ['account' => '', 'amount' => 0],
            ['account' => 'Total Liabilities', 'amount' => $data['totalLiabilities']],
            ['account' => 'Total Equity', 'amount' => $data['totalEquity']],
        ];
    }
}
