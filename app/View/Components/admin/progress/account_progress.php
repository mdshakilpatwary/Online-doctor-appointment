<?php

namespace App\View\Components\admin\progress;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class account_progress extends Component
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
        return view('components.admin.progress.account_progress');
    }
}
