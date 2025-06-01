<?php

namespace App\View\Components\molecules\modal;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ModalDelete extends Component
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
        return view('components.molecules.modal.modal-delete');
    }
}
