<?php

namespace App\Http\Controllers\Community\Profile;

use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAvatarRequest;
use Illuminate\Support\Facades\Auth;

class AvatarController extends Controller
{
    public function edit(): View
    {
        $user = Auth::user();

        return view('pages.community.profile.avatar.edit', [
            'user' => $user,
            'avatars' => $user->avatars
        ]);
    }

    public function update(UpdateAvatarRequest $request): View
    {
        $validated = $request->validated();

        $user = Auth::user();

        $user->getAvatar()->pivot->update(['active' => false]);
        $user->avatars()->updateExistingPivot($validated['avatar_id'], ['active' => true]);

        session()->flash('success', 'Dit avatar er blevet opdateret.');

        return view('pages.community.profile.avatar.edit', [
            'user' => $user,
            'avatars' => $user->avatars
        ]);
    }
}
