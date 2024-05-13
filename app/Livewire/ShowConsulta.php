<?php

namespace App\Livewire;

use Livewire\Component;

class ShowConsulta extends Component
{
    public $open = false;
    public $consulta;
    
    public function render()
    {
        return view('livewire.show-consulta');
    }
}
