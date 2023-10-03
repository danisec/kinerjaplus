<?php

namespace App\View\Components\atoms\svg;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ArrowDown extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.atoms.svg.arrow-down');
    }
}
