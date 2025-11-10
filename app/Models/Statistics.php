<?php

namespace App\Models;

use App\Helpers\HasDocument;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Statistics extends Model
{
    use HasFactory, HasDocument;

    protected $guarded = [];

    // Document configuration for HasDocument trait
    public static $documentPath = 'statistics/{year}';
    public static $documentColumn = 'filename';
    public static $documentMaxSize = 10240; // 10MB in KB

    protected $casts = [
        'year' => 'integer',
        'month' => 'integer',
    ];

    public static function getYears()
    {
        $currentYear = date('Y');
        $years = [];
        for ($year = $currentYear; $year >= 2015; $year--) {
            $years[$year] = $year;
        }
        return $years;
    }

    public static function getMonths()
    {
        return [
            1 => 'January',
            2 => 'February', 
            3 => 'March',
            4 => 'April',
            5 => 'May',
            6 => 'June',
            7 => 'July',
            8 => 'August',
            9 => 'September',
            10 => 'October',
            11 => 'November',
            12 => 'December'
        ];
    }

    public function getMonthNameAttribute()
    {
        return self::getMonths()[$this->month] ?? 'Unknown';
    }

    public function scopeForYear($query, $year)
    {
        return $query->where('year', $year);
    }

    public function scopeForMonth($query, $month)
    {
        return $query->where('month', $month);
    }

    public function scopeLatest($query)
    {
        return $query->orderBy('year', 'desc')->orderBy('month', 'desc');
    }
}
