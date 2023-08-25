<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ConfirmModel extends Component
{
    public $message;
    public $delFormClass;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($message, $delFormClass)
    {
        $this->message = $message;
        $this->delFormClass = $delFormClass;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.confirm-model');
    }
}