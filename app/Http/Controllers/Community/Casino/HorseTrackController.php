<?php

namespace App\Http\Controllers\Community\Casino;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\Casino\HorseTrackService;

class HorseTrackController extends Controller
{
    public function index(): View
    {
        $user = Auth::user();
        
        return view('pages.community.casino.horsetrack', [
            'user' => $user,
            'horses' => HorseTrackService::getHorses()
        ]);
    }

    public function placeBet(Request $request): View
    {
        $user = Auth::user();

        $validated = $request->validate([
            'picked_horse' => ['required', Rule::in(HorseTrackService::getHorseIds())],
            'bet' => ['required', 'numeric', 'min:1', 'max:' . $user->coins],
        ]);

        $horse = HorseTrackService::getHorseById($validated['picked_horse']);

        $user->subCoins($validated['bet']);

        if (mt_rand(1, 100) <= $horse['win_percentage']) {
            $payout = $validated['bet'] * $horse['multiplier'];
            $user->addCoins($payout);

            session()->flash('success', 'Du vandt ' . $payout . ' mønter! Tillykke!');
        } else {
            session()->flash('error', 'Øv! Du tabte ' . $validated['bet'] . ' mønter.');
        }

        return view('pages.community.casino.horsetrack', [
            'user' => $user,
            'horses' => HorseTrackService::getHorses()
        ]);
    }
}
