<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateTestMember extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:create-member {--email=member@test.com} {--password=password123}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a test user with active subscription (for development testing)';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->option('email');
        $password = $this->option('password');

        // Check if user already exists
        if (User::where('email', $email)->exists()) {
            $this->error("User with email {$email} already exists!");
            
            if ($this->confirm('Do you want to delete the existing user and create a new one?')) {
                User::where('email', $email)->delete();
                $this->info('Existing user deleted.');
            } else {
                return 0;
            }
        }

        // Create user
        $user = User::create([
            'name' => 'Test Member',
            'email' => $email,
            'password' => bcrypt($password),
            'email_verified_at' => now(),
        ]);

        // Create fake subscription
        $user->subscriptions()->create([
            'name' => 'default',
            'stripe_id' => 'sub_test_' . uniqid(),
            'stripe_status' => 'active',
            'stripe_price' => config('services.stripe.price_id'),
            'quantity' => 1,
            'trial_ends_at' => null,
            'ends_at' => null,
        ]);

        $this->info('✅ Test member created successfully!');
        $this->newLine();
        $this->line('━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━');
        $this->line('📧 Email: ' . $email);
        $this->line('🔑 Password: ' . $password);
        $this->line('🔗 Login URL: ' . url('/login'));
        $this->line('🏠 Dashboard URL: ' . url('/dashboard'));
        $this->line('━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━');
        $this->newLine();
        $this->info('You can now login and access the member dashboard!');

        return 0;
    }
}
