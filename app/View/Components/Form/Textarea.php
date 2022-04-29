<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Textarea extends Component
{
    public string $name;
    public string $value;
    public string $placeholder;
    public string $label;
    public string $error;
    public string $info;

    public function __construct(string $name, string $value = '', string $placeholder = '', string $label, string $error = '', string $info = '')
    {
        $this->name = $name;
        $this->value = $value;
        $this->placeholder = $placeholder;
        $this->label = $label;
        $this->error = $error;
        $this->info = $info;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.textarea');
    }
}
