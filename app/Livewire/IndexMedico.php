<?php

namespace App\Livewire;

use Livewire\Component;

class IndexMedico extends Component
{
    public $medico;
    public $open = false;
    
    public function render()
    {
        return view('livewire.index-medico');
    }
}
