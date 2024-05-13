<?php

namespace App\Livewire;

use Livewire\Component;

class ActualizarMedico extends Component
{
    public $open = false;
    public $medico;

    public function render()
    {
        return view('livewire.actualizar-medico');
    }
}
