<?php

namespace App\View\Components;

use Illuminate\View\Component;

class edit extends Component
{
    public $url;
    public $id;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($url,$id)
    {
        $this->url=$url;
        $this->id=$id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.edit');
    }
}
