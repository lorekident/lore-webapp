<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AppLayout extends Component
{
    public $layout, $dir, $assets, $pageTitle, $isHeader1, $isFooter, $isFooter1, $isFooter2;

    public function __construct($layout = '', $dir=false, $assets = [], $pageTitle = null, $isHeader1 = false, $isFooter=false, $isFooter1=false, $isFooter2=false)
    {
        $this->layout = $layout;
        $this->dir = $dir;
        $this->assets = $assets;
        $this->isHeader1 = $isHeader1;
        $this->isFooter = $isFooter;
        $this->isFooter1 = $isFooter1;
        $this->pageTitle = $pageTitle;
        $this->isFooter2 = $isFooter2;
    }

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        switch($this->layout){
            case 'horizontal':
                return view('layouts.dashboard.horizontal', ['pageTitle' => $this->pageTitle]);
            break;
            case 'dualhorizontal':
                return view('layouts.dashboard.dual-horizontal', ['pageTitle' => $this->pageTitle]);
            break;
            case 'dualcompact':
                return view('layouts.dashboard.dual-compact', ['pageTitle' => $this->pageTitle]);
            break;
            case 'boxed':
                return view('layouts.dashboard.boxed', ['pageTitle' => $this->pageTitle]);
            break;
            case 'boxedfancy':
                return view('layouts.dashboard.boxed-fancy', ['pageTitle' => $this->pageTitle]);
            break;
            case 'simple':
                return view('layouts.dashboard.simple', ['pageTitle' => $this->pageTitle]);
            break;
            case 'landing':
                return view('landing-pages.layouts.default', ['pageTitle' => $this->pageTitle]);
            break;
            default:
                return view('layouts.dashboard.dashboard', ['pageTitle' => $this->pageTitle]);
            break;
        }
    }
}
