<?php

namespace App\Console\Commands\Community;

use App\Models\User;
use Illuminate\Console\Command;

class updateTimeIfInactive extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'community:users:check-activity';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check activity and update online time';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        User::whereNotNull('last_activity_at')
            ->where('last_activity_at', '<', now()->subMinutes(env('INACTIVITY_THRESHOLD', 15)))
            ->each(function ($user) {
                $user->coins += $user->getHoursForSession();
                $user->total_online_time += now()->diffInSeconds($user->last_login_at);
                $user->last_activity_at = null;
                $user->save();
            });
    }
}
