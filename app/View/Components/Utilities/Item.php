<?php

namespace App\View\Components\Utilities;

use Illuminate\View\Component;

class Item extends Component
{
    public $date, $level, $status, $episode, $members;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($date, $level, $status, $episode, $members)
    {
        $this->date = $date;
        $this->level = $level;
        $this->status = $status;
        $this->episode = $episode;
        $this->members = $members;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.utilities.item');
    }
}
