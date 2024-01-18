<?php

namespace App\Livewire\Community\Tagwall;

use Livewire\Component;
use App\Models\TagwallPost;
use Illuminate\Support\Facades\Auth;

class Form extends Component
{
    public string $message;

    public function save()
    {
        TagwallPost::create([
            'user_id' => Auth::id(),
            'message' => $this->message
        ]);

        $this->dispatch('tagwall-post-created')->to(Tagwall::class);

        $this->reset('message');
    }

    public function render()
    {
        return view('livewire.community.tagwall.form');
    }
}
