<?php

namespace App\Livewire;

use Livewire\Component;

class ShowMedico extends Component
{
    public $open = false;
    public $medico;

    public function render()
    {
        return view('livewire.show-medico');
    }
}
