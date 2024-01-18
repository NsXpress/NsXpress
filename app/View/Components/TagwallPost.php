<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use App\Models\TagwallPost as TagwallPostModel;

class TagwallPost extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public TagwallPostModel $post
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.tagwall-post');
    }
}
