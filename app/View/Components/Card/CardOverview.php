<?php

namespace App\View\Components\Card;

use Illuminate\View\Component;

class CardOverview extends Component
{
    public string $title;
    public string $value;

    public function __construct(string $title, string $value)
    {
        $this->title = $title;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card.card-overview');
    }
}
