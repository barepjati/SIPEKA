<?php

namespace App\View\Components;

use Illuminate\View\Component;

class alert extends Component
{
    public $label, $message;

    /**
     * Create the component instance.
     *
     * @param  string  $label
     * @param  string  $message
     * @return void
     */
    public function __construct($label, $message)
    {
        $this->label = $label;
        $this->message = $message;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.alert');
    }
}
