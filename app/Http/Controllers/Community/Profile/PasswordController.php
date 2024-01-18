<?php

namespace App\Http\Controllers\Community\Profile;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Actions\Fortify\UpdateUserPassword;

class PasswordController extends Controller
{
    public function edit(): View
    {
        return view('pages.community.password.edit');
    }

    public function update(Request $request): View
    {
        (new UpdateUserPassword())->update(Auth::user(), $request->toArray());

        session()->flash('success', 'Din adgangskode er blevet opdateret.');

        return view('pages.community.password.edit');
    }
}
