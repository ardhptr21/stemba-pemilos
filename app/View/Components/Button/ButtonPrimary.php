<?php

namespace App\View\Components\Button;

use Illuminate\View\Component;

class ButtonPrimary extends Component
{
    public string $type;
    public string $class;

    public function __construct(string $type = "button", string $class = "")
    {
        $this->type = $type;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.button.button-primary');
    }
}
