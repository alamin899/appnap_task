<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InputField extends Component
{
    public $type;

    public $field;

    public $required;

    public $class;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type = null ,$field = null,$required = false ,$class = null)
    {
        $this->type = $type;

        $this->field = $field;

        $this->required = $required;

        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input-field');
    }
}
