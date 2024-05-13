<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class ActualizarConsulta extends Component
{
    use WithFileUploads;

    public $open = false;
    public $consulta;

    public function render()
    {
        return view('livewire.actualizar-consulta');
    }
}
