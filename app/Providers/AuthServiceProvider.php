<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Administrador;
use App\Models\Consulta;
use App\Models\Medico;
use App\Models\Paciente;
use App\Policies\AdministradorPolicy;
use App\Policies\ConsultaPolicy;
use App\Policies\MedicoPolicy;
use App\Policies\PacientePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Consulta::class => ConsultaPolicy::class,
        Medico::class => MedicoPolicy::class,
        Administrador::class => AdministradorPolicy::class,
        Paciente::class => PacientePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
