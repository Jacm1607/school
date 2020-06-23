<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InputForm extends Component
{
    public $name;
    public $label;
    public $type;
    public $value;
    public $attr;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name,$type,$label,$value,$attr)
    {
        $this->name=$name;
        $this->type=$type;
        $this->label=$label;
        $this->value=$value;
        $this->attr=$attr;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.input-form');
    }

    public function VefiryValue($info) {
        return empty($this->value);
    }
}
