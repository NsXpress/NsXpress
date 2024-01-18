<?php

namespace App\Http\Controllers\Community;

use App\Models\User;
use Illuminate\View\View;
use App\Http\Controllers\Controller;

class TagwallController extends Controller
{
    public function index(): View
    {
        $users = User::where([
            ['last_login_at', '!=', null],
            ['last_activity_at', '>=', now()->subMinutes(env('activity_threshold', 15))]
        ])->get();

        return view('pages.community.tagwall', ['users' => $users]);
    }
}
