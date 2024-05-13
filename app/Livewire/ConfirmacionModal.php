<?php

namespace App\Livewire;

use Livewire\Component;

class ConfirmacionModal extends Component
{

    public $open = false;
    public $medico;
    public $paciente;
    public $consulta;

    public function render()
    {
        return view('livewire.confirmacion-modal');
    }
}
