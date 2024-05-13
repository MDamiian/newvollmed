<?php

namespace App\Livewire;

use Livewire\Component;

class ShowPaciente extends Component
{
    public $open = false;
    public $paciente;
    
    public function render()
    {
        return view('livewire.show-paciente');
    }
}
