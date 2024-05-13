<?php

namespace App\Policies;

use App\Models\Medico;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MedicoPolicy
{
    use HandlesAuthorization;

    public function manage(User $user)
    {
        return $user instanceof Medico;
    }
}
