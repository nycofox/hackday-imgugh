<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class Media extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $with = ['user', 'likes'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function toggleLike()
    {
        if ($this->isLiked()) {
            $this->likes()->where('user_id', auth()->id())->delete();
            Cache::forget('like_' . auth()->id() . '_' . $this->id);
        } else {
            $this->likes()->create(['user_id' => auth()->id()]);
            Cache::put('like_' . auth()->id() . '_' . $this->id, '');
        }
    }

    public function isLiked()
    {
        return $this->likes()->where('user_id', auth()->id())->exists();
    }

    public function getUrlAttribute()
    {
        return Storage::temporaryUrl($this->path, now()->addMinute());
    }

}
