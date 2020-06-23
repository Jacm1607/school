<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ButtonForm extends Component
{
    public $name;
    public $success;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name,$success)
    {
        $this->name=$name;
        $this->success=$success;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.button-form');
    }
}
