<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
    public $button_type;

    public $class;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($button_type = "submit",$class = null)
    {
        $this->button_type = $button_type;

        $this->class = $class;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.button');
    }
}
