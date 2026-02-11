<?php

namespace App\Providers;
use App\Observers\ActivityLogObserver;
use App\Observers\TransferObserver;
use App\Observers\AssetObserver;
use Filament\Facades\Filament;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use App\Filament\CustomLogOutResponse;
use App\Models\ActivityLogs;
use App\Models\Asset;
use App\Models\Expense;
use App\Models\ExpenseCategory;
use App\Models\Messages;
use App\Models\ThirdParty;
use App\Models\Transaction;
use App\Models\Transfer;
use App\Models\Role;
use Filament\Http\Responses\Auth\Contracts\LogoutResponse as LogoutResponseContract;
use App\Models\User;
use App\Observers\ExpenseCategoryObserver;
use App\Observers\ExpenseObserver;
use App\Observers\MessagesObserver;
use App\Observers\ThirdyPartyObserver;
use App\Observers\TransactionObserver;
use App\Observers\UserObserver;
use App\Observers\WalletObserver;
use App\Observers\RoleObserver;
use App\Models\Wallet;
use App\Models\Branches;
use App\Observers\BranchesObserver;
use App\Models\AssetCategory;
use App\Observers\AssetCategoryObserver;
use App\Models\Employee;
use App\Models\TaxBand;
use App\Models\PayrollRun;
use App\Models\Payslip;
use App\Models\SalaryScale;
use App\Observers\EmployeeObserver;
use App\Observers\TaxBandObserver;
use App\Observers\PayrollRunObserver;
use App\Observers\PayslipObserver;
use App\Observers\SalaryScaleObserver;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->bind(LogoutResponseContract::class, CustomLogOutResponse::class);
        Model::unguard();
        
        Filament::registerNavigationGroups([
            'Branches',
            'Accounting',
            'Expenses',
            'Payroll',
            'Gateway',
            'System',
        ]);

        // Register Observers
        User::observe(UserObserver::class);
        ThirdParty::observe(ThirdyPartyObserver::class);
        Messages::observe(MessagesObserver::class);
        Expense::observe(ExpenseObserver::class);
        ExpenseCategory::observe(ExpenseCategoryObserver::class);
        ActivityLogs::observe(ActivityLogObserver::class);
        Wallet::observe(WalletObserver::class);
        Transfer::observe(TransferObserver::class);
        Transaction::observe(TransactionObserver::class);
        Role::observe(RoleObserver::class);
        Branches::observe(BranchesObserver::class);
        Asset::observe(AssetObserver::class);
        AssetCategory::observe(AssetCategoryObserver::class);
        Employee::observe(EmployeeObserver::class);
        TaxBand::observe(TaxBandObserver::class);
        PayrollRun::observe(PayrollRunObserver::class);
        Payslip::observe(PayslipObserver::class);
        SalaryScale::observe(SalaryScaleObserver::class);
    }


}
