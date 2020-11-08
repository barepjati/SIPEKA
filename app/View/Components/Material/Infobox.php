<?php

namespace App\View\Components\Material;

use Illuminate\View\Component;

class Infobox extends Component
{
    public $count, $label, $icon, $color, $col;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($count, $label, $icon, $color, $col)
    {
        $this->count = $count;
        $this->label = $label;
        $this->col = $col;
        $this->icon = $icon;
        $this->color = $color;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.material.infobox');
    }
}
