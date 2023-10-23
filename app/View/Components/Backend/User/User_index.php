<?php

namespace App\View\Components\Backend\User;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class User_index extends Component
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
        return view('components.backend.user.user_index');
    }
}
