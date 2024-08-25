<?php

namespace App\View\Components\Icons;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PdfIcon extends Component
{
    /**
     * Create a new component instance.
     */
    public $width, $height, $color;
    public function __construct($width, $height, $color = '#ffffff')
    {
        $this->width = $width;
        $this->height = $height;
        $this->color = $color;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.icons.pdf-icon');
    }
}
