<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Anchor extends Model
{
    use HasFactory;

    public const UPDATED_AT = null;


    protected $fillable = ['title', 'url', 'slug', 'ttl', 'max_follows', 'followed'];

    public function getTtlDateAttribute()
    {
        return $this->created_at->copy()->addSeconds($this->attributes['ttl']);
    }

    public function scopeSlug(Builder $builder, string $slug): void
    {
        $builder->where('slug', $slug);
    }
}
