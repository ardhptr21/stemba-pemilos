<?php

namespace App\View\Components\Card;

use Illuminate\View\Component;

class CardCandidate extends Component
{
    public string $title;
    public string $description;
    public string $image;
    public string $info_link;
    public string $action;

    public function __construct(string $title, string $description, string $image, string $info_link = "#", string $action = "")
    {
        $this->title = $title;
        $this->description = $description;
        $this->image = $image;
        $this->info_link = $info_link;
        $this->action = $action;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card.card-candidate');
    }
}
