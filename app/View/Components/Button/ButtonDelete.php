<?php

namespace App\View\Components\Button;

use Illuminate\View\Component;

class ButtonDelete extends Component
{
    public $id, $url, $title;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $url, $title)
    {
        $this->id = $id;
        $this->url = $url;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.button.button-delete');
    }
}
