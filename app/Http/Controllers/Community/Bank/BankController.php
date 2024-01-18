<?php

namespace App\Http\Controllers\Community\Bank;

use App\Models\User;
use App\Enums\UserRole;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\BankTransferRequest;

class BankController extends Controller
{
    public function index(): View
    {
        $users = User::role(UserRole::USER->value)->orderBy('username')->get();
        $user = Auth::user();
        
        return view('pages.community.bank.index', [
            'users' => $users,
            'user' => $user
        ]);
    }

    public function transfer(BankTransferRequest $request): mixed
    {
        $user = Auth::user();

        $validated = $request->validated();

        if ($user->coins < $validated['amount']) {
            session()->flash('error', 'Du har ikke så mange mønter.');

            return redirect()->route('pages.community.bank');
        }

        $reciever = User::findOrFail($validated['user']);

        $user->subCoins($validated['amount']);
        $reciever->addCoins($validated['amount']);

        session()->flash('success', 'Du har overført ' . $validated['amount'] . ' mønter til ' . $reciever->username);

        return redirect()->route('pages.community.bank');
    }
}
