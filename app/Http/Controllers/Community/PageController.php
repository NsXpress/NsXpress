<?php

namespace App\Http\Controllers\Community;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function userList(): View
    {
        $users = User::orderBy('username')->paginate(20);

        return view('pages.community.user-list', ['users' => $users]);
    }

    public function search(Request $request): View
    {
        $users = User::where('username', 'like', '%' . $request->get('search_term') . '%')->paginate(25);

        return view('pages.community.user-list', ['users' => $users]);
    }

    public function center(): View
    {
        return view('pages.community.center');
    }
}
