<?php

namespace App\Policies;

use App\Models\Administrador;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdministradorPolicy
{
    use HandlesAuthorization;

    public function manage(User $user)
    {
        return $user instanceof Administrador;
    }
}
