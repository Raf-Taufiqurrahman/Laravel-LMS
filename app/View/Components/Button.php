<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
    public $icon, $title;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($icon, $title)
    {
        $this->title = $title;
        $this->icon = $icon;
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
