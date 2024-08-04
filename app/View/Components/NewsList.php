<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NewsList extends Component
{
    public $title;
    public $slug;
    public $description;
    public $img;
    public $excerpt;
    public $publish;
    public $loop;

    /**
     * Create a new component instance.
     */
    public function __construct($title, $slug, $description, $img, $excerpt, $publish, $loop){
        $this->title = $title;
        $this->slug = $slug;
        $this->description = $description;
        $this->img = $img;
        $this->excerpt = $excerpt;
        $this->publish = $publish;
        $this->loop = $loop;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.news-list');
    }
}
