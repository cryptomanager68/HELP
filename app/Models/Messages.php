<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Builder;

class Messages extends Model
{
    use HasFactory;
    use LogsActivity;

     public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logAll();
    }



    protected static function booted(): void
    {
        static::addGlobalScope('org', function (Builder $query) {
            if (auth()->hasUser()) {
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
                
                $query->where('organization_id', $user->organization_id)
                 ->where('branch_id', $user->branch_id)
                ->orWhere('organization_id',"=",NULL);

            }
        });
    }
}
