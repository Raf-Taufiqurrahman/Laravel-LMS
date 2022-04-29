<?php

namespace App\View\Components\Alert;

use Illuminate\View\Component;

class AlertDanger extends Component
{
    public $title, $subTitle, $url;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $subTitle, $url)
    {
        $this->title = $title;
        $this->subTitle = $subTitle;
        $this->url = $url;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alert.alert-danger');
    }
}
