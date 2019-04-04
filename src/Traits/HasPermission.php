<?php

namespace SimplePermission\Traits;


use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;
use SimplePermission\Models\Role;
use SimplePermission\Models\UserPermission;

trait HasPermission
{
    public function permission(): BelongsTo
    {
        return $this->belongsTo(UserPermission::class, 'id', 'user_id');
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, config('permission.table_names.users_roles', 'laravel_users_roles'), 'user_id', 'role_id');
    }

    public function permission_can($slug): bool
    {
        $permissions = $this->allPermission()->toArray();
        return in_array($slug, $permissions);
    }

    public function allPermission(): Collection
    {
        $roles_permission = $this->roles()->get()->pluck('limits')->toArray();
        $users_permission = $this->permission()->get()->first();
        $users_permission && array_push($roles_permission, $users_permission->limits);
        $roles_permission = implode('|', $roles_permission);
        $roles_permission = explode('|', $roles_permission);
        return collect($roles_permission)->unique()->filter(function ($value) {
            return !empty($value);
        });
    }
}