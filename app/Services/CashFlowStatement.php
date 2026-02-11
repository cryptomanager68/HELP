<?php

namespace App\Services;

use App\Models\Asset;
use App\Models\Expense;
use App\Models\Wallet; 

class CashFlowStatement
{
    public function operatingActivities(): float
    {
        // Cash from operations (simplified)
        $query = Wallet::query();
        if (auth()->user()->branch_id) {
            $query->where('branch_id', "=", auth()->user()->branch_id);
        }
        return (float) $query->sum('balance');
    }

    public function investingActivities(): float
    {
        // Cash used in investing (equipment purchases)
        $query = Asset::query();
        if (auth()->user()->branch_id) {
            $query->where('branch_id', "=", auth()->user()->branch_id);
        }
        return (float) $query->sum('purchase_cost') * -1;
    }

    public function financingActivities(): float
    {
        // Cash from financing activities
        return 0.0;
    }

    public function netCashFlow(): float
    {
        return $this->operatingActivities() + $this->investingActivities() + $this->financingActivities();
    }

    public function getReportData(): array
    {
        return [
            'operatingActivities' => $this->operatingActivities(),
            'investingActivities' => $this->investingActivities(),
            'financingActivities' => $this->financingActivities(),
            'netCashFlow' => $this->netCashFlow(),
        ];
    }
    
    public function generate(): array
    {
        $data = $this->getReportData();
        
        return [
            ['activity' => 'Operating Activities', 'amount' => $data['operatingActivities']],
            ['activity' => 'Investing Activities', 'amount' => $data['investingActivities']],
            ['activity' => 'Financing Activities', 'amount' => $data['financingActivities']],
            ['activity' => '', 'amount' => 0],
            ['activity' => 'Net Cash Flow', 'amount' => $data['netCashFlow']],
        ];
    }
}
