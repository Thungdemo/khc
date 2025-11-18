<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Helpers\HasDocument;
use App\Helpers\AttributeHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notice extends Model
{
    /** @use HasFactory<\Database\Factories\NoticeFactory> */
    use HasFactory,AttributeHelper,HasDocument;

    protected $datetimeable = ['published_at'];

    protected $guarded = [];

    public static $documentPath = 'notices/{id}';

    public static $documentMaxSize = 5000;

    public static $documentColumn = 'filename';

    public function scopeFilter($query, $request)
    {
        if ($request->notice_category_id) {
            $query->where('notice_category_id', $request->notice_category_id);
        }

        if ($request->title) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }

        return $query;
    }

    public function noticeCategory()
    {
        return $this->belongsTo(NoticeCategory::class);
    }

    public function noticeSubcategory()
    {
        return $this->belongsTo(NoticeCategory::class, 'notice_subcategory_id');
    }

    public function noticeChildren()
    {
        return $this->hasMany(NoticeChild::class);
    }

    public function scopePublished($query)
    {
        $query->where('published_at','<=',now()->toDatetimeString());
    }

    public function scopeNewest($query)
    {
        $query->orderBy('published_at','desc');
    }

    public function isPublished()
    {
        return $this->published_at && Carbon::parse($this->published_at)->lessThanOrEqualTo(now());
    }

    public function delete()
    {
        foreach($this->noticeChildren as $child)
        {
            $child->delete();
        }
        $this->documentDelete();
        parent::delete();
    }
}
