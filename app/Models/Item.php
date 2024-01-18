<?php

namespace App\Models;

use App\Events\ItemUpdated;
use App\Models\ItemHistory;
use Illuminate\Support\Str;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Item extends Model
{
    use HasFactory, LogsActivity;

    protected $guarded = [];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    protected static function boot(): void
    {
        parent::boot();

        static::saving(function ($model) {
            $model->slug = Str::slug($model->name);
        });

        static::updated(function ($model) {
            event(new ItemUpdated($model));

            if ($model->isDirty('value')) {
                ItemHistory::create([
                    'item_id' => $model->id,
                    'quantity' => $model->quantity,
                    'value' => $model->value
                ]);
            }
        });
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    public function getImage(): string
    {
        return (is_null($this->image)) ? 'images/items/default.jpg' : $this->image;
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(ItemCategory::class, 'item_item_category');
    }

    public function history(): HasMany
    {
        return $this->hasMany(ItemHistory::class);
    }
}
