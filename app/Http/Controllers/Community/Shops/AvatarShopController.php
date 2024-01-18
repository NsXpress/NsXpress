<?php

namespace App\Http\Controllers\Community\Shops;

use App\Models\Avatar;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AvatarShopController extends Controller
{
    public function index(): View
    {
        $avatars = Avatar::whereIsPublic(true)->orderBy('price')->paginate(25);
        $user = Auth::user();

        return view('pages.community.shops.avatars.index', [
            'user' => $user,
            'avatars' => $avatars
        ]);
    }

    public function purchase(Avatar $avatar): mixed
    {
        $user = Auth::user();

        if ($user->coins < $avatar->price) {
            session()->flash('error', 'Du har ikke råd til den figur.');

            return redirect()->route('pages.community.shops.avatars');
        }

        $user->subCoins($avatar->price);
        $user->avatars()->attach($avatar->id);

        session()->flash('success', 'Du har købt figuren.');

        return redirect()->route('pages.community.shops.avatars');
    }
}
