<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ClientSlider extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $image;
    public $clientSlider;

    public function __construct($image , $clientSlider)
    {
        $this->image = $image;
        $this->clientSlider = $clientSlider;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.client-slider');
    }
}
