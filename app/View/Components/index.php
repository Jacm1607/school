<?php

namespace App\View\Components;

use Illuminate\View\Component;

class index extends Component
{
    public $pag;
    public $head;
    public $name;
    public $btnSearch;
    public $inputSearch;
    public $url;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($pag , $head=[], $url, $name, $btnSearch, $inputSearch)
    {
        $this->pag          = $pag;
        $this->head         = $head;
        $this->name         = $name;
        $this->url         = $url;
        $this->btnSearch    = $btnSearch;
        $this->inputSearch  = $inputSearch;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.index');
    }
}
