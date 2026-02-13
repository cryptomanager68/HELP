<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait HasOrganizationScope
{
    protected static function bootHasOrganizationScope(): void
    {
        static::addGlobalScope('org', function (Builder $query) {
            if (auth()->check()) {
                $user = auth()->user();
                
                // Skip organization scope for super_admin users
                if ($user->hasRole('super_admin')) {
                    return;
                }
                
                // Apply organization filter for regular users
                $query->where('organization_id', $user->organization_id)
                    ->orWhere('organization_id', '=', NULL);
            }
        });
    }
}
