<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Leftbar extends Component
{
    public $active;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($active)
    {
        $this->active  = $active;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.leftbar');
    }
}
