<?php

namespace App\View\Components\Card;

use Illuminate\View\Component;

class CardAction extends Component
{
    public $title, $url;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $url)
    {
        $this->title = $title;
        $this->url = $url;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card.card-action');
    }
}
