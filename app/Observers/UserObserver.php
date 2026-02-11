<?php

namespace App\Observers;

use App\Models\User;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
            $sixRandomFigures = random_int(100000, 999999);
            $userId = $user->id;
            $organization_id = $userId . $sixRandomFigures;

            // Only assign super_admin role if this is the first user OR if no organization_id is set
            // This allows the first user to be super admin, subsequent users need roles assigned manually
            if(User::count() == 1 || is_null($user->organization_id) || empty($user->organization_id)){
                // Check if super_admin role exists, if not create it
                $superAdminRole = Role::firstOrCreate(
                    ['name' => 'super_admin', 'guard_name' => 'web'],
                    ['name' => 'super_admin', 'guard_name' => 'web']
                );
                
                $user->assignRole('super_admin');
            }

            if(is_null($user->organization_id) || empty($user->organization_id)){
                $user->organization_id = $organization_id;
                $user->save();
            }

            // Note: Payment/subscription system removed - all users have full access
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {



    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        //
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
