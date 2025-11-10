<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NoticeCategory extends Model
{
    // public $incrementing = false;

    public function notices()
    {
        return $this->hasMany(Notice::class);
    }

    public function scopeSort($query)
    {
        $query->orderBy('ordering');
    }
}
