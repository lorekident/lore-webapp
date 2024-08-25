<?php

namespace App\View\Components\Icons;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PostIcon extends Component
{
    /**
     * Create a new component instance.
     */
    public $height, $width, $color;
    public function __construct($height, $width,$color = '#00CB72')
    {
        $this->height = $height;
        $this->width = $width;
        $this->color = $color;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.icons.post-icon');
    }
}
