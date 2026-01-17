<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_tr',
        'name_en',
        'category_id',
        'description_tr',
        'description_en',
        'short_description_tr',
        'short_description_en',
        'image',
        'applications_tr',
        'applications_en',
        'pdfs',
        'order',
        'is_active',
    ];

    protected $casts = [
        'pdfs' => 'array',
        'is_active' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('order');
    }
}
