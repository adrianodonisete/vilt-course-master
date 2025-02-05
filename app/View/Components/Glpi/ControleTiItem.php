<?php

namespace App\View\Components\Glpi;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

use App\Models\Glpi\ControleTi;

class ControleTiItem extends Component
{
    public $item;

    /**
     * Create a new component instance.
     */
    public function __construct(ControleTi $item)
    {
        $this->item = $item;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.glpi.controle-ti-item');
    }
}
