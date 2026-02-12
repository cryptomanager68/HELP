<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ResetDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:reset-users {--force : Force the operation without confirmation}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete all user data and reset database to original state';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        if (!$this->option('force')) {
            if (!$this->confirm('⚠️  This will DELETE ALL USER DATA. Are you sure?')) {
                $this->info('Operation cancelled.');
                return 0;
            }
            
            if (!$this->confirm('⚠️  This action CANNOT be undone. Continue?')) {
                $this->info('Operation cancelled.');
                return 0;
            }
        }

        $this->info('Starting database reset...');
        
        try {
            // Disable foreign key checks
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            
            // Tables to truncate (in order to respect foreign keys)
            $tables = [
                'password_reset_tokens',
                'sessions',
                'personal_access_tokens',
                'subscriptions',
                'subscription_items',
                'messages',
                'expression_of_interests',
                'payslips',
                'payroll_runs',
                'transfers',
                'transactions',
                'expenses',
                'assets',
                'employees',
                'third_parties',
                'wallets',
                'users',
            ];
            
            foreach ($tables as $table) {
                if (Schema::hasTable($table)) {
                    DB::table($table)->truncate();
                    $this->info("✓ Cleared table: {$table}");
                }
            }
            
            // Re-enable foreign key checks
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            
            $this->newLine();
            $this->info('✅ Database reset completed successfully!');
            $this->info('All user data has been deleted.');
            $this->newLine();
            
        } catch (\Exception $e) {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            
            $this->error('❌ Failed to reset database: ' . $e->getMessage());
            return 1;
        }
        
        return 0;
    }
}
