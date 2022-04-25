<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Input extends Component
{
    public string $name;
    public string $label;
    public string $type;
    public string $error;

    public function __construct(string $name, string $label, string $type = 'text', string $error = "")
    {
        $this->name = $name;
        $this->label = $label;
        $this->type = $type;
        $this->error = $error;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.input');
    }
}
