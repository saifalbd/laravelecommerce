<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class FormLayout extends Component
{


    public $title;
    public $action;
    public $isPut;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $title,string $action,$isPut=false)
    {
        $this->title = $title;
        $this->action = $action;
        $this->isPut = $isPut;

        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.form-layout');
    }
}
