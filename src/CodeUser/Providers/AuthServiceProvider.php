<?php

namespace CodePress\CodeUser\Providers;

use CodePress\CodeUser\Repository\PermissionRepositoryInterface;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * @param GateContract $gate
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        if (!app()->runningInConsole()) {

            $permissionRepository = app(PermissionRepositoryInterface::class);

            $permissions = $permissionRepository->all();

            foreach ($permissions as $permission) {

                $gate->define($permission->name, function ($user) use ($permission) {

                    return $user->isAdmin() || $user->hasRole($permission->roles);

                });

            }
        }
    }
}
