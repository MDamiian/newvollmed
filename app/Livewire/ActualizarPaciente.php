<?php

namespace App\Livewire;

use Livewire\Component;

class ActualizarPaciente extends Component
{
    public $open = false;
    public $paciente;

    public function render()
    {
        return view('livewire.actualizar-paciente');
    }
}
