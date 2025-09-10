<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AboutUs extends Component
{
    
    public $image;
    public $title;
    public $content;

    public function __construct($image,$title,$content)
    {
        $this->image = $image;
        $this->title = $title;
        $this->content = $content;        
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.about-us');
    }
}
