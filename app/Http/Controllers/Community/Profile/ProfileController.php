<?php

namespace App\Http\Controllers\Community\Profile;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Actions\Fortify\UpdateUserProfileInformation;

class ProfileController extends Controller
{
    public function show(User $user): View
    {
        return view('pages.community.profile.show', ['user' => $user]);
    }

    public function edit(): View
    {
        return view('pages.community.profile.edit', ['user' => Auth::user()]);
    }

    public function update(Request $request): View
    {
        (new UpdateUserProfileInformation())->update(Auth::user(), $request->toArray());

        session()->flash('success', 'Din profil er blevet opdateret.');

        return view('pages.community.profile.edit', ['user' => Auth::user()]);
    }
}
