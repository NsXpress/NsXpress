<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Enums\UserRole;
use Illuminate\View\View;

class PageController extends Controller
{
    public function team(): View
    {
        $roles = User::with('roles')
            ->whereDoesntHave('roles', function ($query) {
                $query->where('name', UserRole::USER->value)->orWhere('name', UserRole::BOT->value);
            })
            ->get()
            ->groupBy(function ($user) {
                return $user->roles->pluck('name')->implode(', ');
            })
            ->sortBy(function ($users, $role) {
                return $role == UserRole::EDITOR->value ? 0 : 1;
            }, SORT_NUMERIC);

        return view('pages.team', ['roles' => $roles]);
    }

    public function termsOfUse(): View
    {
        return view('pages.terms-of-use');
    }

    public function privacyPolicy(): View
    {
        return view('pages.privacy-policy');
    }
}
