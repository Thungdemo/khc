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

    public function parent()
    {
        return $this->belongsTo(NoticeCategory::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(NoticeCategory::class, 'parent_id');
    }

    public function scopeIsParent($query)
    {
        return $query->whereNull('parent_id');
    }

    public function scopeRoleAccess($query)
    {
        if(!auth()->user()->hasRole('admin')) 
        {
            $query->whereIn('id',auth()->user()->noticeCategories->pluck('id'));
        }
    }
}
