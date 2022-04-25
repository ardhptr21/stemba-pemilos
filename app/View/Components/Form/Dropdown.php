<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Dropdown extends Component
{
    public string $label;
    public function __construct(string $label)
    {
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.dropdown');
    }
}
