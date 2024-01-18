<?php

namespace App\Livewire\Community\Tagwall;

use Livewire\Component;
use App\Models\TagwallPost;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class Tagwall extends Component
{
    use WithPagination;

    protected $posts;
    
    #[On('tagwall-post-created')]
    public function reloadPosts()
    {
        $this->loadPosts();
        $this->gotoPage(1);
    }

    public function loadPosts()
    {
        $this->posts = TagwallPost::latest()->paginate(20);
    }

    public function render()
    {
        $this->loadPosts();

        return view('livewire.community.tagwall.tagwall', ['posts' => $this->posts]);
    }
}
