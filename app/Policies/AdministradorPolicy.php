<?php

namespace App\Policies;

use App\Models\Administrador;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdministradorPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can manage as an administrator.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function manage(User $user): bool
    {
        return $user instanceof Administrador;
    }
}
