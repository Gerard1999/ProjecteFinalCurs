<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Categories extends Component
{

    public $categoriesCursa = [];


    public function render()
    {
        return view('livewire.categories');
    }
}
