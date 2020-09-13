<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
	public $title;
	public $color;
	public $counter;

    public function render()
    {
        return view('dashboard.counter');
    }
}
