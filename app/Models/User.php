<?php

namespace App\Models;

use Carbon\Carbon;
use Filament\Panel;
use App\Enums\UserRole;
use Illuminate\Support\Str;
use Spatie\Activitylog\LogOptions;
use Filament\Models\Contracts\HasName;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable implements FilamentUser, HasName
{
    use HasFactory, Notifiable, HasRoles, LogsActivity, SoftDeletes;

    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'last_login_at' => 'datetime',
        'last_activity_at' => 'datetime',
        'birthday' => 'date'
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->slug = Str::slug($model->username);
        });
    }

    public function canAccessPanel(Panel $panel): bool
    {
        if ($this->getRole() !== UserRole::USER->value) {
            return true;
        }

        return false;
    }

    public function getFilamentName(): string
    {
        return $this->username;
    }

    public function addCoins(int $amount): void
    {
        $this->increment('coins', $amount);
    }

    public function subCoins(int $amount): void
    {
        $this->decrement('coins', $amount);
    }

    protected function birthday(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => (!is_null($value)) ? Carbon::parse($value)->format('d-m-Y') : null,
        );
    }

    public function getAge(): int
    {
        return Carbon::parse($this->birthday)->age;
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    public function isOnline(): bool
    {
        return !is_null($this->last_activity_at) && $this->last_activity_at->isAfter(now()->subMinutes(env('activity_threshold', 15)));
    }

    public function getOnlineTime(): string
    {
        $carbon = Carbon::now()->addSeconds($this->total_online_time);

        $hours = $carbon->diffInHours();
        $minutes = $carbon->diffInMinutes() % 60;
    
        return $hours . ' timer og ' . $minutes . ' minutter';
    }

    public function getHoursForSession(): int
    {
        $totalTimeNow = floor(($this->total_online_time + now()->diffInSeconds($this->last_login_at)) / 3600);
        $totalTime = floor($this->total_online_time / 3600);
        $hours = $totalTimeNow - $totalTime;

        return $hours;
    }

    public function getAvatar(): mixed
    {
        return $this->avatars()->whereActive(true)->first();
    }

    public function getRole(): string
    {
        return $this->getRoleNames()->first();
    }

    public function isBot(): bool
    {
        return ($this->getRole() == UserRole::BOT->value) ? true : false;
    }

    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function avatars(): BelongsToMany
    {
        return $this->belongsToMany(Avatar::class);
    }
}
