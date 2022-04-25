<?php

namespace App\View\Components\Base;

use Illuminate\View\Component;

class AsideItem extends Component
{
    public string $link;
    public string $text;
    public bool $active;
    public function __construct(string $link = '#', string $text, bool $active = false)
    {
        $this->link = $link;
        $this->text = $text;
        $this->active = $active;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.base.aside-item');
    }
}
