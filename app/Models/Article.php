<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Enums\ArticleStatus;
use App\Events\ArticlePublished;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article extends Model
{
    use HasFactory, LogsActivity;

    protected $guarded = [];

    protected $casts = [
        'published_at' => 'datetime'
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    protected static function boot(): void
    {
        parent::boot();

        static::saving(function ($model) {
            $model->slug = Str::slug($model->headline);
        });

        static::created(function ($model) {
            if ($model->status === ArticleStatus::PUBLISHED->value) {
                event(new ArticlePublished($model));
            }
        });

        static::updated(function ($model) {
            if ($model->isDirty('status') && $model->status === ArticleStatus::PUBLISHED->value) {
                event(new ArticlePublished($model));
            }
        });
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    public function scopeIsPublished(Builder $query): void
    {
        $query->whereStatus(ArticleStatus::PUBLISHED->value)
            ->where('published_at', '<=', Carbon::now());
    }

    public function getImage(): string
    {
        return (is_null($this->image)) ? 'images/articles/default.jpg' : $this->image;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
