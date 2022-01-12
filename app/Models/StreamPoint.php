<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StreamPoint extends Model
{
    protected $fillable = [
        'name',
        'cdn_host',
        'ingest_host',
        'stream_key',
        'stream_name',
        'active',
        'priority',
    ];

    use HasFactory;

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function scopeByPriority($query)
    {
        return $query->orderBy('priority', 'ASC');
    }

    public function scopeByActive($query) {
        return $query->orderBy('active', 'DESC');
    }
}
