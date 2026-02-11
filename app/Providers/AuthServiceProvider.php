<?php

namespace App\Providers;

use App\Models\Branches;
use App\Models\ActivityLogs;
use App\Models\Role;
use App\Models\User;
use App\Models\Wallet;
use App\Models\ExpenseCategory;
use App\Models\Expense;
use App\Models\Messages;
use App\Models\ThirdParty;
use App\Models\Transaction;
use App\Models\ExpressionOfInterest;

use App\Policies\BranchesPolicy;
use App\Policies\ActivityLogsPolicy;
use App\Policies\ExpenseCategoryPolicy;
use App\Policies\ExpensePolicy;
use App\Policies\MessagesPolicy;
use App\Policies\RolePolicy;
use App\Policies\ThirdPartyPolicy;
use App\Policies\TransactionPolicy;
use App\Policies\UserPolicy;
use App\Policies\WalletPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Branches::class => BranchesPolicy::class,
        ActivityLogs::class => ActivityLogsPolicy::class,
        ExpenseCategory::class => ExpenseCategoryPolicy::class,
        Expense::class => ExpensePolicy::class,
        Messages::class => MessagesPolicy::class,
        Role::class => RolePolicy::class,
        ThirdParty::class => ThirdPartyPolicy::class,
        Transaction::class => TransactionPolicy::class,
        User::class => UserPolicy::class,
        Wallet::class => WalletPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
