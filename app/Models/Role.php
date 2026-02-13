<?php

namespace App\Models;

use Spatie\Permission\Models\Role as BaseSpatieRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Role extends BaseSpatieRole
{
    use HasFactory;

    // app/Models/Role.php
    protected static function booted(): void
    {


        // Keep your existing org scope
        static::addGlobalScope('org', function (Builder $query) {
            if (auth()->check()) {
                $user = auth()->user();
                
                // Skip scope for super_admin
                // Use direct role check to avoid circular scope issues
                $isSuperAdmin = \DB::table('model_has_roles')
                    ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
                    ->where('model_has_roles.model_id', $user->id)
                    ->where('model_has_roles.model_type', 'App\\Models\\User')
                    ->where('roles.name', 'super_admin')
                    ->exists();
                
                if ($isSuperAdmin) {
                    return;
                }
                
                $query->where('roles.organization_id', $user->organization_id)
                  //  ->where('roles.branch_id', auth()->user()->branch_id)
                    ->orWhereNull('roles.organization_id');
            }
        });
    }
}
