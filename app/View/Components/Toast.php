<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Toast extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $toasts = [])
    {
        $toasts = session('toasts') ?? [];
        $toast = session('toast') ?? null;

        info('Ini toast: '. json_encode($toast));
        if(isset($toast)){
            $toasts[] = $toast;
        }

        $this->toasts = $toasts;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.toast');
    }
}
