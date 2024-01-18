<?php

namespace App\Http\Controllers;

use App\Models\Contest;
use Illuminate\View\View;

class ContestController extends Controller
{
    public function index(): View
    {
        $contests = Contest::whereDate('start_date', '<=', now())->orderByDesc('end_date')->get();

        return view('pages.contests.index', ['contests' => $contests]);
    }

    public function show(Contest $contest): View
    {
        $prizes = explode(',', $contest->prize);

        return view('pages.contests.show', [
            'contest' => $contest,
            'prizes' => $prizes
        ]);
    }
}
