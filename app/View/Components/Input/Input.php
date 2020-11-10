<?php

namespace App\View\Components\Input;

use Illuminate\View\Component;

class Input extends Component
{
    // public $validation;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->validation = $validation;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.input.input');
    }
}
