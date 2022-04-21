<?php

namespace App\View\Components\Base;

use Illuminate\View\Component;

class Section extends Component
{
    public string $class;
    public function __construct(string $class = '')
    {
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.base.section');
    }
}
