<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Consulta;
use App\Models\User;
use App\Policies\ConsultaPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Consulta::class => ConsultaPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('edit-consulta', function (User $user, Consulta $consulta) {
            return $user->id === $consulta->paciente_id;
        });
    }
}
