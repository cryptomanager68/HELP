<?php

namespace App\Services;

use App\Models\Expense;

class StatementOfComprehensiveIncome
{
    // Service fee income (can be customized for property syndication fees)
    public function serviceFeeIncome(): float
    {
        // This can be extended to track syndication fees or other income
        return 0.00;
    }

    // Total income
    public function totalIncome(): float
    {
        return $this->serviceFeeIncome();
    }

    // Total regular expenses
    public function totalExpenses(): float
    {
        $query = Expense::query();
        if (auth()->user()->branch_id) {
            $query->where('branch_id', "=", auth()->user()->branch_id);
        }
        return (float) $query->sum('expense_amount');
    }

    // Net profit
    public function netProfit(): float
    {
        return $this->totalIncome() - $this->totalExpenses();
    }

    // Return all data for Blade
    public function getReportData(): array
    {
        return [
            'serviceFeeIncome' => $this->serviceFeeIncome(),
            'totalIncome' => $this->totalIncome(),
            'totalExpenses' => $this->totalExpenses(),
            'netProfit' => $this->netProfit(),
        ];
    }
    
    public function generate(): array
    {
        $data = $this->getReportData();
        
        return [
            ['account' => 'Service Fee Income', 'amount' => $data['serviceFeeIncome']],
            ['account' => 'Total Income', 'amount' => $data['totalIncome']],
            ['account' => '', 'amount' => 0],
            ['account' => 'Total Expenses', 'amount' => $data['totalExpenses']],
            ['account' => '', 'amount' => 0],
            ['account' => 'Net Profit', 'amount' => $data['netProfit']],
        ];
    }
}
