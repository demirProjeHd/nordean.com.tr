<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'title_tr',
        'title_en',
        'content_tr',
        'content_en',
        'extra_data',
    ];

    protected $casts = [
        'extra_data' => 'array',
    ];

    public static function getByKey($key)
    {
        return static::where('key', $key)->first();
    }
}
