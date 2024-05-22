<?php

namespace App\Policies;

use App\Models\Administrador;
use App\Models\Consulta;
use App\Models\Medico;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ConsultaPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Consulta $consulta): bool
    {
        return ($user->paciente->id === $consulta->paciente->id) || ($user instanceof Administrador || $user instanceof Medico);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Consulta $consulta): bool
    {
        return ($user->paciente->id === $consulta->paciente_id
            ? Response::allow()
            : Response::deny('No es tu consulta')) || ($user instanceof Administrador || $user instanceof Medico);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Consulta $consulta): bool
    {
        return ($user->paciente->id === $consulta->paciente_id
            ? Response::allow()
            : Response::deny('No es tu consulta')) || ($user instanceof Administrador);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Consulta $consulta): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Consulta $consulta): bool
    {
        //
    }
}
