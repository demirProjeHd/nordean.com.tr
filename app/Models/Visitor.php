<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip',
        'country_code',
        'country_name',
        'city',
        'user_agent',
        'url',
        'referer',
    ];

    /**
     * Get visitors from last N days grouped by country
     */
    public static function getCountryStats($days = 15)
    {
        return self::where('created_at', '>=', now()->subDays($days))
            ->whereNotNull('country_code')
            ->selectRaw('country_code, country_name, COUNT(*) as visits')
            ->groupBy('country_code', 'country_name')
            ->orderBy('visits', 'desc')
            ->get();
    }
}
