<?php

namespace App\View\Components;

use Closure;
use App\Models\Comment as ArticleComment;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Comment extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public ArticleComment $comment
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.comment');
    }
}
