<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InputFieldLabel extends Component
{
    public $field_name;

    public $class;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($field_name = null, $class = null)
    {
        $this->field_name = $field_name;

        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input-field-label');
    }
}
