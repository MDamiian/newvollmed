<?php

namespace App\Policies;

use App\Models\Consulta;
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
        return $user->paciente->id === $consulta->paciente->id;
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
    public function update(User $user, Consulta $consulta): Response
    {
        $isAdmin = $user->email === 'admin@vollmed.com' || $user->id === 1;

        if ($isAdmin) {
            return Response::allow();
        }
    
        // Verificar si el usuario es el dueño de la consulta
        return $user->id === $consulta->paciente_id 
            ? Response::allow()
            : Response::deny('No es tu consulta');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Consulta $consulta): bool
    {
        $isAdmin = $user->email === 'admin@vollmed.com' || $user->id === 1;
        if ($isAdmin) {
            return true;
        }
        return $user->id === $consulta->paciente_id;
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
