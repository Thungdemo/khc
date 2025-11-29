<?php

namespace App\Models;

use App\Helpers\AttributeHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    /** @use HasFactory<\Database\Factories\CalendarFactory> */
    use HasFactory, AttributeHelper;

    protected $guarded = [];

    protected $datable = ['start_date', 'end_date'];

    const TYPE_NATIONAL = 'national';
    const TYPE_RESTRICTED = 'restricted';

    const TYPES = [
        self::TYPE_NATIONAL => 'National',
        self::TYPE_RESTRICTED => 'Restricted',
    ];

    public function scopeFilter($query, $request)
    {
        if ($request->title) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }

        if ($request->type) {
            $query->where('type', $request->type);
        }

        if ($request->start_date) {
            $query->whereDate('start_date', '>=', $request->start_date);
        }

        if ($request->end_date) {
            $query->whereDate('end_date', '<=', $request->end_date);
        }

        return $query;
    }

    public function scopeNewest($query)
    {
        return $query->orderBy('start_date', 'desc');
    }

    public function scopeRecentHolidays($query)
    {
        return $query->where('start_date', '>=', now()->subMonths(6)->toDateString())
                     ->orderBy('start_date');
    }

    public function scopeToFullCalendar($query)
    {
        return $query->selectRaw('title, start_date, DATE_ADD(end_date, INTERVAL 1 DAY) as end_date, type');
    }
}
